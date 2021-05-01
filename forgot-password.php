<?php

session_start();
$email="";
$newpassword="";
$errors=array();

$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,"registration");

if(isset($_POST['change']))
{
	$email= ($_POST['email']);
	$newpassword=($_POST['newpassword']);
	$confirmpassword=($_POST['confirmpassword']);
	$ret=mysqli_query($conn,"SELECT * FROM `users2` WHERE Email_id='$email'");
    $row=mysqli_fetch_array($ret); 
	if($row){
	}
	else{
		array_push($errors,"Email not found");
	}
	 if($newpassword !=$confirmpassword)
	{
		array_push($errors,"the password do not match");
	}
	$pattern_up = "/^.*(?=.{8,56})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/";
	if(!preg_match($pattern_up,$newpassword)){
	          array_push($errors," password must contain at least 8 character long,1 uppercase letter,1 lowercase letter and 1 number");
	}
	if(count($errors)==0) 
	{
		$newpassword=md5($newpassword);
		$sql="UPDATE `users2` SET Password='$newpassword' WHERE Email_id='$email'";
		$run_sql = mysqli_query($conn, $sql);
		if($run_sql)
		{
			echo "<script>alert('password updated successfully');</script>";
		}
		else
		{
			echo "<script>alert('Error while updating password');</script>";
		}
	}
}		
		
?>
<!DOCTYPE html>
<html 
<head>
    <meta charset="utf-8" />
   
    <title> Password Recovery </title>
    <link href="assets/css/style1.css" rel="stylesheet" />
   
    

</head>
<body>
<div class="header">
 FORGOT-PASSWORD
</div>

<form role="form" name="chngpwd" method="post" >

<div class="input-group">
<label>Enter Reg Email id</label>
<input  type="email" name="email" >
</div>



<div class="input-group">
<label>Password</label>
<input  type="password" name="newpassword"   />
</div>

<div class="input-group">
<label>ConfirmPassword</label>
<input  type="password" name="confirmpassword" >
</div>

 

 <button type="submit" name="change" class="btn">Change Password</button> 
 <a href="login2.php">Sign in</a> 
    
   
</body>
</html>
