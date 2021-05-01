<?php
session_start();
$username="";
$password="";
$errors=array();

$conn = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($conn,"registration");


   if(isset($_POST['login'])){     
 
    
	$username=  ($_POST['username']);
	$password= ($_POST['password']);
	
	  if(empty($username) || empty($password)){
	         array_push($errors,"username or password is required");
	}
   if(count($errors)==0)
   {
	$query1 = mysqli_query($conn, "SELECT * FROM `admin table` WHERE Username='$username' AND Password='$password'");
	$rows1 = mysqli_num_rows($query1);
	$password =md5($password);
	$query = mysqli_query($conn, "SELECT * FROM `users2` WHERE Username='$username' AND Password='$password'");
	$rows = mysqli_num_rows($query);

	if($rows == 1)
	{
        $_SESSION['Uname']=$username;
		header("Location:user/user-home.php");
	}
	
	else if($rows1 == 1)
	{
       $_SESSION['Uname']=$username;
		header("Location:admin/home.php");
	}
	else{
	     array_push($errors,"wrong username or password");
	}
	mysqli_close($conn);
   }
   }
   ?>

<!DOCTYPE html>
<html>
<head>
<script language="javascript" type="text/javascript">
function preback(){
	window.history.forward();
}
setTimeout("preback()",0);
window.onunload=function()(null);
</script>
   <title>Login</title>
   <link href="assets/css/style1.css" rel="stylesheet">
</head>
<body>

<div class="header">
  <h2>Login</h2>
</div>
<form method="post" action="login2.php">
<?php include('error.php'); ?>
<div class="input-group">
      <label>Username</label>
	  <input type="text" name="username" value="<?php echo $username; ?>">
</div>

<div class="input-group">
      <label>Password</label>
	  <input type="password" name="password" value="<?php echo $password; ?>">
</div>



<div class="input-group">
      <button type="submit" name="login" class="btn">Login</button>
</div>
<p>
    Not yet a member? <a href="register2.php">Sign up</a><br><br>
	<a href="forgot-password.php">Forgot Password?</a>
	
</p>

</form>  
</body>
</html>






