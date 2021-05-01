<?php
//include 'includes/conn.php';
session_start();
$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,"registration");
$username=$_SESSION['Uname'];
$ret=mysqli_query($conn,"SELECT * FROM `users2` WHERE Username='$username'");
$row=mysqli_fetch_array($ret);
$user_profile=$row['profile_Image'];
if($user_profile){
    $user_profile=$row['profile_Image'];
}
else{
   $user_profile="default_avatar.png"; 
}
$sname=$row["Name"];
//Validating user fill the personaldetails or not
$ret1=mysqli_query($conn,"SELECT * FROM `personaldetails` WHERE sname='$sname'");
$row1=mysqli_fetch_array($ret1);
if($row1==0){
	echo '<script>alert("You are not fill the Personaldetails!Please fill the form ")</script>';
	echo "<script>window.open('personal.php', '_self')</script>";
}
else{
$acyear=$row1['year'];
}
//Validating user fill the academicdetails  or not
$ret2=mysqli_query($conn,"SELECT * FROM `academicdetails` WHERE sname0='$sname'");
$row2=mysqli_fetch_array($ret2);
if($row2==0){
	echo '<script>alert("You are not fill the Academicdetails!Please fill the form ")</script>';
	echo "<script>window.open('academic.php', '_self')</script>";
}
//Validating user fill the activitiesdetails  or not
$ret31=mysqli_query($conn,"SELECT * FROM `table1` WHERE sname1='$sname'");
$row31=mysqli_fetch_array($ret31);

$ret32=mysqli_query($conn,"SELECT * FROM `table2` WHERE sname2='$sname'");
$row32=mysqli_fetch_array($ret32);
if($row32){
	$table=2;
}
$ret33=mysqli_query($conn,"SELECT * FROM `table3` WHERE sname3='$sname'");
$row33=mysqli_fetch_array($ret33);
if($row33){
	$table=3;
}
if($row31==0 && $row32==0 && $row33==0){
	echo '<script>alert("You are not fill the Activities Details!Please fill the form ")</script>';
	echo "<script>window.open('activities.php', '_self')</script>";
}



if(isset($_POST['submit'])){

	$id=$row['id'];

	
	$ins_sql = "UPDATE `users2`set acyear='$acyear'where Username='$username'";
	$run_sql = mysqli_query($conn,$ins_sql);

	
	$update_status_query="UPDATE  users2 set Submit_status='submitted' where Username='$username'";
	$ar=mysqli_query($conn,$update_status_query);
	if($run_sql){
	/*	$sql3="SELECT * from users where username='$username'";
		$run3=mysqli_query($conn,$sql3);

		$row3=mysqli_fetch_array($run3);
		if($row3){
			$submit_date=$row3['submit_date'];*/
			//$submit_date=date('Y m,d');
			$check_status='pending';
		$query = "INSERT INTO `notifications`(`user_id`, `user_name`, `message`,`check_status`) values ($id, '$sname', 'You Have A New Report','$check_status')";
		$run = mysqli_query($conn,$query);
		if($run){
			echo "<script>alert('You are successfully applied for BOS');</script>";

		}
			else{
			echo "Something wrong";
			}
		
		
		
	}
	
}

?>
<html>
<style type="text/css">
.h {
	text-align: center;
}
.h {
	text-align: center;
}
.h {
	text-align: center;
}
.h {
	text-align: center;
}
.h {
	text-align: center;
}
.h {
	text-align: center;
}
a:visited {
	color: #63F;
}
</style>
<body>
	<head>
	<title>Personal Details </title>
	<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/style0.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/style3.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/owl.carousel.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	</head>

	<div class="form-area">
		<div class="container">
			<div class="row">
			
				<div class="col-md-12">
					<div align="left">
					<br><button><a href="user-home.php">BACK </a></button>
				</div><br>	
				<div class="section-title">
					<h3>  Details Of:-   <?php echo $sname; ?></h3>
					
				</div>
            	<form  method="POST">
					<div align="center">
  						<h5><label for="profile">Profile</label></h5>
  						<img src="upload/profile_image/<?php echo $user_profile;?>"alt="Image1"  width="200px" height="190px" autocomplete="off">
  					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="left-side-form">
									<h5><label for="sname">Student name</label></h5>
									<p><input type="text" name="sname" value="<?php echo $row1['sname'];?>" autocomplete="off" required readonly> </p>
									<h5><label for="contact">contact</label></h5>
									<p><input type="text" name="contact" value="<?php echo $row1['contact'];?>" autocomplete="off" required readonly></p>
									<h5><label for="gender">Sex</label></h5>
									<input type="text" name="sex" value="<?php echo $row1['sex'];?>" autocomplete="off" required readonly>
									<h5><label for="age">Age</label></h5>
									<p><input type="text" name="age" value="<?php echo $row1['age'];?>" autocomplete="off" required readonly  ></p>
									<h5><label for="interest">Area of Interest(e.g. Design/Research/Software/Production)</label></h5>
									<p><input type="text" name="interest" value="<?php echo $row1['interest'];?>" autocomplete="off" required readonly></p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="right-side-form">
									<h5><label for="Department">Department</label></h5>
									<p><input type="text" name="Department" value="<?php echo $row1['Department'];?>" autocomplete="off" required readonly > </p>
                                   	<h5><label for="email">email</label></h5>
									<p><input type="text" name="email" value="<?php echo $row1['email'];?>" autocomplete="off" required readonly></p>
                                	<h5><label for="language">Language Known</label></h5>
									<input type="text" name="language" value="<?php echo $row1['language'];?>" autocomplete="off" required readonly>
									<h5><label for="hobbies">Hobbies</label></h5>
									<p><input type="text" name="hobbies" value="<?php echo $row1['hobbies'];?>" autocomplete="off" required readonly></p>
								</div>
							</div>
						</div>
					
				

						<div class="section-title">
							<h3> Acadedmic Details</h3>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="left-side-form">
									<h5><label for="ssc">FE</label></h5>
									<p><input type="text" name="ssc" value="<?php echo $row2['ssc'];?>" autocomplete="off" required readonly>
									<?php if($row2){
			            					echo "<a href='view.php?doc=$row2[sscdoc]&sname=$row2[sname0]'>View Document</a>";
						                }
									?></p>
									<h5><label for="tep">TE</label></h5>
									<p><input type="text" name="tep" value="<?php echo $row2['cgpi'];?>" autocomplete="off" required readonly>
									<?php if($row2){
				                        	echo "<a href='view.php?doc=$row2[semdoc]&sname=$row2[sname0]'>View Document</a>";
						                } 
									?></p>
									<h5><label for="average">Average marks</label></h5>
									<p><input type="text" name="average" value="<?php echo $row2['average'];?>" autocomplete="off" required readonly></p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="right-side-form">
									<h5><label for="se">SE</label></h5>
									<p><input type="text" name="se" value="<?php echo $row2['hsc'];?>"autocomplete="off" required readonly>
									<?php if($row2){
				                            	echo "<a href='view.php?doc=$row2[hscdoc]&sname=$row2[sname0]'>View Document</a>";
						                    }
									?></p>
									<h5><label for="hsc">Project</label></h5>
									<p><input type="text" name="project" value="<?php echo $row2['project'];?>"autocomplete="off" required readonly></p>
								</div>
							</div>
						</div>	


					
						<div class="section-title">
							<h3> Extracurricular Activites</h3>
        				</div><br>
						<?php if($row31){?>
							<div class="heading">
									<h5>Internal(Cultural/sports/Technical event)</h5>
							</div>
							<table width="1116" border="0" cellspacing="0" cellpadding="0">
								<tr class="h">
									<th width="55">Sr.No. </th>
									<th width="160">Event/s</th>
									<th width="160">Place</th>
									<th width="178">Achievement</th>
									<th width="254">Year</th>
									<th width="309">Upload Certificate</th>
								</tr>
								<?php 
									$ret1=mysqli_query($conn,"SELECT * FROM `table1` WHERE sname1='$sname'");
									$cnt=1;
									while($row=mysqli_fetch_array($ret1))
									{?>
										<tr class="h">
											<td><?php echo $cnt?></td>
											<td><?php echo $row['event'];?></td>
											<td><?php echo $row['place'];?></td>
											<td><?php echo $row['achievement'];?></td>
											<td><?php echo $row['year'];?></td>                    
											<td><a href="view.php?doc=<?php echo $row['certificate'];?>&sname=<?php echo $row['sname1'];?>">View Document</a></td>					           									  
										</tr>
										<?php $cnt=$cnt+1; 
									}?> 
													
							</table> 
						<?php }?>
						<?php if($row32){?>              
							<div class="heading">
								<h5>Event/s orgnized(Event In charge/Committee Member)</h5>
							</div>
							<table width="1116" border="0" cellspacing="0" cellpadding="0">
								<tr class="h">
									<th width="55">Sr.No. </th>
									<th width="160">Event/s</th>
									<th width="160">Place</th>
									<th width="178">Position</th>
									<th width="254">Year</th>
									<th width="309">Upload Certificate</th>					
								</tr>
								<?php 
									$ret1=mysqli_query($conn,"SELECT * FROM `table2` WHERE sname2='$sname'");
									$cn=1;
									while($row1=mysqli_fetch_array($ret1))
									{?>
										<tr class="h">
											<td><?php echo $cn?></td>
											<td><?php echo $row1['event21'];?></td>
											<td><?php echo $row1['place21'];?></td>
											<td><?php echo $row1['position21'];?></td>                      
											<td><?php echo $row1['year21'];?></td>                   
											<td><a href="view.php?doc=<?php echo $row1['certificate21'];?>&sname=<?php echo $row1['sname2'];?>">View Document</a></td>
										</tr>
										<?php $cn=$cn+1;
									}?>                   
							</table>
						<?php }?>
						<?php if($row33){?>
							<div class="heading">
								<h5>External Participation(Cultural/sports/Technical event)</h5>
							</div>
							<table width="1116" border="0" cellspacing="0" cellpadding="0">
								<tr class="h">
									<th width="53">Sr.No. </th>
									<th width="138">Event/s</th>
									<th width="135">Place</th>
									<th width="160">Achievement</th>
									<th width="146">ACHIVEMENT LEVEL</th>
									<th width="177">Year</th>
									<th width="307">Upload Certificate</th>
								</tr>
								<?php 
									$ret1=mysqli_query($conn,"SELECT * FROM `table3` WHERE sname3='$sname'");
									$c=1;
									while($row1=mysqli_fetch_array($ret1))
									{?>
										<tr class="h">
											<td><?php echo $c?></td>
											<td><?php echo $row1['event31'];?></td>
											<td><?php echo $row1['place31'];?></td>
											<td><?php echo $row1['achievement31'];?></td>
											<td><?php echo $row1['achiev31'];?></td>
											<td><?php echo $row1['year31'];?></td>                    
											<td><a href="view.php?doc=<?php echo $row1['certificate31'];?>&sname=<?php echo $row1['sname3'];?>">View Document</a></td>
										</tr>
										<?php $c=$c+1; 
									}?>					
							</table>
						<?php }?>
						<br><br>
						<?php 
							$ret=mysqli_query($conn,"SELECT * FROM users2 WHERE Username='$username'");
						  	$row=mysqli_fetch_array($ret);
						  	$status=$row['Submit_status'];
						  	if($status=="pending"){?>
								<div align="center">
                        			<input type="submit" name="submit" id="submit" value="submit">
                      			</div>
								<?php 
							}?>
				</form>
			</div>
		</div>
	</div>
</body>
</html>						  