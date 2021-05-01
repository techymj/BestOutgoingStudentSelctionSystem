<?php
  $conn = mysqli_connect("localhost","root","");
  $db = mysqli_select_db($conn,"registration");
				   
session_start();
$errors=array();		

 $username=$_SESSION['Uname'];
$ret=mysqli_query($conn,"SELECT * FROM `users2` WHERE Username='$username'");
$row=mysqli_fetch_array($ret);
$sname=$row["Name"];	
$ret1=mysqli_query($conn,"SELECT * FROM `personaldetails` WHERE sname='$sname'");
$row1=mysqli_fetch_array($ret1);

if($row1){
	$status=1;	
}else{
	$status=0;
}	  
	if(isset($_POST['submit'])){
		
			$sname = strip_tags($_POST['sname']);
			$contact = strip_tags($_POST['contact']);
			$email = strip_tags($_POST['email']);
			$age = strip_tags($_POST['age']);
			$Department =strip_tags($_POST['Department']);
			$interest = strip_tags($_POST['interest']);
			$hobbies =strip_tags($_POST['hobbies']);
			$year=strip_tags($_POST['year']);
			$language=implode(',',$_POST['language']);	
			$count=1;			
			if(isset($_POST['sex']))
				$sex = $_POST['sex'];
			/*
			//profile
			$errormsg ='';	
			$profile =$_FILES['profile'];
			$profilename= $_FILES['profile']['name'];
			$profileerror = $_FILES['profile']['error'];
			$profiletmp = $_FILES['profile']['tmp_name'];
			$profileext =explode('.',$profilename);
			$profilecheck = strtolower(end($profileext));
			$profileextstored = array('png','jpg','jpeg');
			if(in_array($profilecheck,$profileextstored))
			{
				$prodestinationfile = '../upload/'.$profilename;
				move_uploaded_file($profiletmp,$prodestinationfile);
			}else{
				$errormsg = "file type Error";
				$count=0;
			}*/

			/*if($row1){
				$count=0;
				array_push($errors,"<script>alert('You have already filled this details');</script>");
				echo "<script>window.open('../applicationform.php', '_self')</script>";
			}*/			
			if($row1==0){
				
			//$sql="INSERT INTO `personaldetails`(`sname`, `email`, `contact`, `Department`, `age`, `sex`, `language`, `hobbies`, `interest`,`profile`, `year`) VALUES ('$sname','$email','$contact','$Department',$age,'$sex','$language','$hobbies','$interest','$prodestinationfile','$year')";
			$sql="INSERT INTO `personaldetails`(`sname`, `email`, `contact`, `Department`, `age`, `sex`, `language`, `hobbies`, `interest`, `year`) VALUES ('$sname','$email','$contact','$Department',$age,'$sex','$language','$hobbies','$interest','$year')";
			$run_sql = mysqli_query($conn, $sql);
				if($run_sql){
					echo '<script>alert("Data stored successfully");</script>';
					echo "<script>window.open('academic.php', '_self')</script>";	
				}else
				{
					echo '<script>alert("there were errors while saving the data");</script>';
				}
			}else{
				$update_query="UPDATE `personaldetails` SET `contact`='$contact',`Department`='$Department',`age`='$age',`sex`='$sex',`language`='$language',`hobbies`='$hobbies',`interest`='$interest',`year`='$year' WHERE sname='$sname'";
	$run_query=mysqli_query($conn,$update_query);
	if($run_query){
		echo '<script>alert("Data Successfully Edit");</script>';
		header("Refresh:0");

	}
	else{
		echo '<script>alert("There is some problem while eding data");</script>';
	}
			}				
						
							
	}

if(isset($_POST['edit'])){
	$status=2;
}

	

?>
<html>
<body>
	<head>
	<title>Personal Details </title>
	 <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style0.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style3.css">
	 <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
	  <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
	   <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	</head>
	<div class="form-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div align="left">
						<br><button><a href="applicationform.php">Back </a></button>
					</div><br>
					<div class="section-title">
						<h3> Personal Details</h3>
					</div>
					<form  method="post" enctype="multipart/form-data">
						<?php 
							 $username=$_SESSION['Uname'];
							$ret=mysqli_query($conn,"SELECT * FROM `users2` WHERE Username='$username'");
							$row=mysqli_fetch_array($ret);
							if($status==0){
						?>
						
							<div class="row">
								<div class="col-md-6">
									<div class="left-side-form">
										<h5><label for="sname">Student name</label></h5>
										<input type="text" name="sname" value="<?php echo $row['Name'];?>" autocomplete="off" required readonly>
										<h5><label for="contact">contact</label></h5>
										<input type="text" name="contact" value="<?php echo $row['Contact No']; ?>" autocomplete="off" required readonly >
										<h5><label for="gender">Sex</label></h5>
											<input type="radio" name="sex" value="male" required><span>Male</span>
											<input type="radio" name="sex" value="female"><span>Female</span>
											<input type="radio" name="sex" value="others"><span>Others</span>
											<h5><label for="age">Age</label></h5>
											<input type="text" name="age" required>
											<h5><label for="language">Language Known</label></h5>
											<input type="checkbox" name="language[]" value="Marathi"><span>Marathi</span>
											<input type="checkbox" name="language[]" value="Hindi"><span>Hindi</span>
											<input type="checkbox" name="language[]" value="English"><span>English</span>
										
									</div>
								</div>
								<div class="col-md-6">
									<div class="right-side-form">
										<h5><label for="Department">Department</label></h5>
										<input type="text" name="Department"  required> 
										<h5><label for="email">email</label></h5>
										<input type="text" name="email" value="<?php echo $row['Email_id']; ?>" autocomplete="off" required readonly>
										<h5><label for="interest">Area of Interest(e.g. Design/Research/Software/Production)</label></h5>
										<input type="text" name="interest"required>
										<h5><label for="hobbies">Hobbies</label></h5>
										<input type="text" name="hobbies"  required>
										<h5><label for="age"> Academic Year</label></h5>
										<input type="text" name="year" placeholder="2019,2020 etc" required>
										<!-- <h5><label for="profile">Profile Image</label></h5> 
										<p><input type="file" name="profile" required></p>-->
										<br><br>
									</div>
								</div>
						</div><br><br>
						<div align="center">
							<input type="submit" name="submit" id="submit" value="Submit">
						
						</div>
						
					<?php }else if($status==1){?>
						<div class="row">
							<div class="col-md-6">
								<div class="left-side-form">
									<h5><label for="sname">Student name</label></h5>
									<input type="text" name="sname" value="<?php echo $row1['sname'];?>" autocomplete="off" required readonly>
									<h5><label for="contact">contact</label></h5>
									<input type="text" name="contact" value="<?php echo $row1['contact'];?>" autocomplete="off" required readonly>
									<h5><label for="gender">Sex</label></h5>
									<input type="text" name="sex" value="<?php echo $row1['sex'];?>" autocomplete="off" required readonly>
									<h5><label for="age">Age</label></h5>
									<input type="text" name="age" value="<?php echo $row1['age'];?>" autocomplete="off" required readonly  >
									<h5><label for="interest">Area of Interest(e.g. Design/Research/Software/Production)</label></h5>
									<input type="text" name="interest" value="<?php echo $row1['interest'];?>" autocomplete="off" required readonly>
										
								</div>
							</div>
							<div class="col-md-6">
								<div class="right-side-form">
									<h5><label for="Department">Department</label></h5>
									<input type="text" name="Department" value="<?php echo $row1['Department'];?>" autocomplete="off" required readonly > 
                                   	<h5><label for="email">email</label></h5>
									<input type="text" name="email" value="<?php echo $row1['email'];?>" autocomplete="off" required readonly>
									<h5><label for="language">Language Known</label></h5>
									<input type="text" name="language" value="<?php echo $row1['language'];?>" autocomplete="off" required readonly>
									<h5><label for="hobbies">Hobbies</label></h5>
									<input type="text" name="hobbies" value="<?php echo $row1['hobbies'];?>" autocomplete="off" required readonly>
                                    <h5><label for="age"> Academic Year</label></h5>
                                    <input type="text" name="year" value="<?php echo $row1['year'];?>" autocomplete="off" required readonly >
                                </div>
							</div>
						</div><br><br>
						<div align="center">
						
							<input type="submit" name="edit" id="edit" value="Edit">
						</div>
					<?php }else if($status==2){?>
						<div class="row">
                                <div class="col-md-6">
                                    <div class="left-side-form">
                                    <h5><label for="sname">Student name</label></h5>
									<input type="text" name="sname" value="<?php echo $row1['sname'];?>" autocomplete="off" required readonly>
									<h5><label for="contact">contact</label></h5>
									<input type="text" name="contact" value="<?php echo $row1['contact'];?>" required autofocus >
                                        <h5><label for="gender">Sex</label></h5>
                                            <input type="radio" name="sex" value="male" required><span>Male</span>
                                            <input type="radio" name="sex" value="female"><span>Female</span>
                                            <input type="radio" name="sex" value="others"><span>Others</span>
                                            <h5><label for="age">Age</label></h5>
                                            <input type="text" name="age" value="<?php echo $row1['age'];?>" required  >
									        <h5><label for="interest">Area of Interest(e.g. Design/Research/Software/Production)</label></h5>
									        <input type="text" name="interest" value="<?php echo $row1['interest'];?>" required >
                                           
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="right-side-form">
                                        <h5><label for="Department">Department</label></h5>
									    <input type="text" name="Department" value="<?php echo $row1['Department'];?>"required > 
                                        <h5><label for="email">email</label></h5>
                                        <input type="text" name="email" value="<?php echo $row['Email_id']; ?>" autocomplete="off" required readonly>
                                        <h5><label for="language" >Language Known</label></h5>
                                            <input type="checkbox" name="language[]" value="Marathi">Marathi
                                            <input type="checkbox" name="language[]" value="Hindi">Hindi
                                            <input type="checkbox" name="language[]" value="English">English
                                            <h5><label for="hobbies">Hobbies</label></h5>
									        <input type="text" name="hobbies" value="<?php echo $row1['hobbies'];?>" required>
                                            <h5><label for="age"> Academic Year</label></h5>
                                            <input type="text" name="year" value="<?php echo $row1['year'];?>"required>
                                       
                                        <!-- <h5><label for="profile">Profile Image</label></h5> 
                                        <p><input type="file" name="profile" required></p>-->
                                        <br><br>
                                    </div>
								</div>	
						<div align="center">
							<input type="submit" name="submit" id="submit" value="Submit">
							
					</div>
					<?php }?>
					
					</form>
					
				</div>
			</div>
		</div>
	</div>
</body>
</html>
