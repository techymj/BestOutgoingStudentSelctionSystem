<html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</html>
<?php
//include 'conn.php';
$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,"registration");
//$username=$_SESSION['Uname'];
session_start();

/*$t=mysqli_query($conn,"SELECT * FROM `admin table` where username='$username'");
$r=mysqli_fetch_array($t);
$admin_email=$r['email'];//from*/


//user details
$sname=$_GET['sname'];
$sql="SELECT * from personaldetails where sname='$sname'";
$run=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($run);
$year=$row['year'];

/*
//upadte accept status
$update_status_query="UPDATE  personaldetails set roundstatus='accept' where sname='$sname'";
$ar=mysqli_query($conn,$update_status_query);
*/

//to get user email
$ar=mysqli_query($conn,"SELECT * from personaldetails where sname='$sname'");
$rt=mysqli_fetch_array($ar);
$mail=$rt['email'];

//echo '<script>alert("The Request Successfully Accepted");</script>';






//for sending MAIL

$email = $mail;
$name = $sname;
$body = "You are Selected for Interview<br><br>";
$subject = "Best Outgoing Selection";

$headers = array(
    'Authorization: Bearer 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',
    'Content-Type: application/json'
);

$data = array(
    "personalizations" => array(
        array(
            "to" => array(
                array(
                    "email" => $email,
                    "name" => $name
                )
            )
        )
    ),
    "from" => array(
        "email" => "pallavinivalkar18@gmail.com"
    ),
    "subject" => $subject,
    "content" => array(
        array(
            "type" => "text/html",
            "value" => $body
        )
    )
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);

echo $response;
if($response){
    echo '<script>alert("There is some problem in sending the mail");</script>';
}

else{
   // echo '<script>alert("The mail sent");</script>';
    $update_status_query="UPDATE  users2 set roundstatus='accept' where Name='$sname'";
    $ar=mysqli_query($conn,$update_status_query);
    if($ar){

   
        //redirect to round1 page
        echo '<script>alert("The Request Successfully Accepted");</script>';
        
        echo "<script>window.open('../round2.php?year=$year', '_self')</script>";
        }

}




?>
