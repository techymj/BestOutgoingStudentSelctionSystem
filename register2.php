<?php 

session_start();
$Name="";
$email="";
$contact="";
$username="";
$password="";
$status="";
$Submit_status="";
$errors=array();
//$user = array();



/*$db_user="root";
$db_pass="";
$db_name="registration";

$db= new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8',$db_user,$db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);*/

$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,"registration");

if(isset($_POST['register']))
{
	$Name= ($_POST['Name']);
	$email=($_POST['email']);
	$contact=($_POST['contact']);
	$username=($_POST['username']);
	$password=($_POST['password']);
	$cpassword=($_POST['cpassword']);
	
$ret=mysqli_query($conn,"SELECT * FROM `users2` WHERE Username='$username'");
$row=mysqli_fetch_array($ret);
$ret1=mysqli_query($conn,"SELECT * FROM `users2` WHERE Name='$Name'");
$row1=mysqli_fetch_array($ret1);
//$uname=$row["Username"];
//$nm=$row["Name"];	

                    




	if($row)
	{
		array_push($errors,"Username is already exist. pleasse try another.");
	}
	if($row1)
	{
		array_push($errors,"You are already registered");
	}
	if(empty($Name)){
	         array_push($errors,"Name is required");
	}
	if(empty($email)){
	          array_push($errors,"email is required");
	}
		if(empty($contact)){
	          array_push($errors,"contact is required");
	}
	
		
	      
	
		if(empty($username)){
	          array_push($errors,"username is required");
	}
		if(empty($password)){
	          array_push($errors,"password is required");
	}
        if($password !=$cpassword)
	{
		array_push($errors,"the password do not match");
	}
	$n=$_POST['Name'];
	if(!preg_match("/^[a-zA-Z\s]+$/",$n))
	{
		array_push($errors,"please enter correct Name");
	}
	    $m=$_POST['contact'];
	    if(!preg_match('/^[0-9]*$/',$m))
	      {
		          array_push($errors,"please enter correct contact number");
		  }
		  
		 if(strlen($_POST['contact'])!=10){
		          array_push($errors,"mobile number should be of 10 digits");
	}  
	if(!filter_var($email,FILTER_VALIDATE_EMAIL))
	{
		array_push($errors,"Invalid email");
	}
	
	$pattern_up = "/^.*(?=.{8,56})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/";
	if(!preg_match($pattern_up,$password)){
	          array_push($errors," password must contain at least 8 character long,1 uppercase letter,1 lowercase letter and 1 number");
	}
	
	
			
		$status="pending";
		$Submit_status="pending";
		$calstatus="pending";
		$roundstatus="pending";
       
					
   
	if(count($errors)==0)  
	
	{
		
		$password=md5($password);
		$sql="INSERT INTO `users2`(`Name`, `Email_id`, `Contact No`, `Username`, `Password`,`status`, `Submit_status`,`calstatus`, `roundstatus`) VALUES ('$Name','$email','$contact','$username','$password','$status','$Submit_status','$calstatus','$roundstatus')";
	    $run_sql = mysqli_query($conn, $sql);
	 
	 // $result = $stmtinsert->execute([$Name,$email,$contact,$username,$password]);
	if($run_sql)
	{
		echo "<script>alert('succesfully registered');</script>";
		//header('location:login2.php');
		//echo "<script>window.open('academic1.php','_self')</script>";
	}
	
	else
	{
		echo 'there were errors while saving the data';
	}
	
	
	}


}


 ?>



<!DOCTYPE html>
<html>
<head>
   <title>user registration system using PHP</title>
   <link rel="stylesheet" type="text/css" href="assets/css/style1.css">
</head>
<body>




</div>
<div class="header">
  <h2>Register</h2>
</div>

<form method="post" action="register2.php" enctype="multipart/form-data" >

<?php include('error.php'); ?>
<div class="input-group">
      <label>Full Name</label>
	  <input type="text" id="Name" name="Name" value="<?php echo $Name; ?>">
</div>

<div class="input-group">
      <label>Email_id</label>
	  <input type="text" id="email" name="email" value="<?php echo $email; ?>">
</div>

<div class="input-group">
      <label>Contact No</label>
	  <input type="text" id="contact" name="contact" value="<?php echo $contact; ?>">
</div>

<div class="input-group">
      <label>Username</label>
	  <input type="text" id="username" name="username" value="<?php echo $username; ?>">
</div>

<div class="input-group">
      <label>Password</label>
	  <input type="password" id="password" name="password" value="<?php echo $password; ?>">
</div>

<div class="input-group">
      <label>Confirm Password</label>
	  <input type="password" name="cpassword" >
</div>



<div class="input-group">
      <button type="submit" id="register" name="register" class="btn" value="Register">Register</button>
</div>
<p>
    Already a member? <a href="login2.php">Sign in</a>
</p>
</form>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    $(function(){
			$('#register').click(function(e){
				var valid = this.form.checkValidity();
				
				if(valid){
					
					var Name= $('#Name').val();
					var email= $('#email').val();
					var contact= $('#contact').val();
					var username= $('#username').val();
					
					e.preventDefault();
					
					$.ajax({
						type: 'POST',
						url: 'register2.php',
						data:{Name:Name,email:email,contact:contact,username:username},
						success:function(data){
						Swal.fire({
				'title':'Successful',
				'text':'successfully registered',
				'type':'success'
			})	
						},
						error: function(data){
							Swal.fire({
				'title':'Errors',
				'text':'There were errors while saving the data',
				'type':'error'
			})
						}
					});
					
					
				}else{
				
				}
			});
			
	});
</script>
</body>
</html>