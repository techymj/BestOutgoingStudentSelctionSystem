<?php
//include 'conn.php';
$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,"registration");
$year=$_GET['year'];

$sql="SELECT * FROM `users2` WHERE acyear='$year' AND edit_status='changed' order by total DESC";
$run=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($run);
/*$totalmarks=$row['max(total)'];
$sql1="SELECT * from users2 WHERE total=$totalmarks";
$run1=mysqli_query($conn,$sql);
$row1=mysqli_fetch_array($run1);*/
if($row){
    $totalmarks=$row['total'];
    $sname=$row['Name'];
    
    $sql1="UPDATE academicyear set  winner_name='$sname' where acyear='$year'";
    $run1=mysqli_query($conn,$sql1);

    $sql="UPDATE academicyear set  marks=$totalmarks where acyear='$year'";
    $run=mysqli_query($conn,$sql);
    if($run1 && $run){
        header('Location:../home.php');

    }else{
        echo '<script>alert("There is some error")</script>';
    }

}else{
    echo '<script>alert("The interview process is not completed")</script>';
    echo "<script>window.open('../home.php', '_self')</script>";
}
/*
$totalmarks=$row['totalmarks'];
$sname=$row['sname'];

$sql1="UPDATE academicyear set  winner_name='$sname' where acyear='$year'";
$run1=mysqli_query($conn,$sql1);

$sql="UPDATE academicyear set  marks=$totalmarks where acyear='$year'";
$run=mysqli_query($conn,$sql);
if($run1 && $run){
    header('Location:../home.php');

}else{
    echo '<script>alert("There is some error")</script>';
}*/


?>