<?php
//include 'conn.php';
 $conn = mysqli_connect("localhost","root","");
 $db = mysqli_select_db($conn,"registration");
session_start();
$errors=array();
$username=$_SESSION['Uname'];
$ret=mysqli_query($conn,"SELECT * FROM `users2` WHERE Username='$username'");
$row=mysqli_fetch_array($ret);
$sname=$row["Name"];	

$ret1=mysqli_query($conn,"SELECT * FROM `academicdetails` WHERE sname0='$sname'");
$row1=mysqli_fetch_array($ret1);

$count=1;
if($row1){
	//$count=0;
	$status=1;
	//array_push($errors,"<script>alert('You have already filled this details');</script>");
	//echo "<script>alert('You have already filled this details');</script>";
	//echo "<script>window.open('../applicationform.php', '_self')</script>";
	//$destinationfile=$row1['fep'];
	//$destinationfile2=$row1['sep'];
	//$destinationfile3=$row1['tep'];

}else{
	$status=0;
}
if(isset($_POST['edit'])){
	$status=2;
}
if(isset($_POST['submit'])){
	//first year pointer
	if(!empty($_POST['fep'])){
		$fep1   = $_POST['fep'];
	}else{
		$fep1=$row1['ssc'];
	}
	//second year pointer
	if(!empty($_POST['sep'])){
		$sep1 =$_POST['sep'];
	}else{
		$sep1=$row1['hsc'];
	}
	//third year pointer
	if(!empty($_POST['tep'])){
		$tep1 =$_POST['tep'];
	}else{
		$tep1=$row1['cgpi'];
	}
	//project
	if(!empty($_POST['project'])){
		$project = $_POST['project'];
	}else{
		$project=$row1['project'];
	}
   
					
    
	//average of pointers		
		$fep=floatval($fep1);
		$sep=floatval($sep1);
		$tep=floatval($tep1);
		$average=($fep1+$sep1+$tep1)/3;
		$average=number_format($average,2);
						
	//FE MARKSHEET	
	//if(!empty($_POST['fedoc'])){			
		$errormsg = '';
		$fssc =$_FILES['fedoc'];
		$filename= $_FILES['fedoc']['name'];
		$fileerror = $_FILES['fedoc']['error'];
		$filetmp = $_FILES['fedoc']['tmp_name'];
						
		$fileext =explode('.',$filename);
		$filecheck = strtolower(end($fileext));
						
		$fileextstored = array('png','jpg','jpeg','pdf');
		if(in_array($filecheck,$fileextstored)){
							
			$destinationfile = '../upload/'.$filename;
			move_uploaded_file($filetmp,$destinationfile);
							
		}else{
			$errormsg = "file type Error";
			echo"<script>alert('please upload document FE marksheet in png jpg or pdf');</script>";
		}
	//}else{
			//$destinationfile=$row1['ssc'];
//	}	
	//SE MARKSHEET
	//if(!empty($_POST['sedoc'])){
		$errormsg ='';	
		$fhsc =$_FILES['sedoc'];	
		$filename1= $_FILES['sedoc']['name'];
		$fileerror1 = $_FILES['sedoc']['error'];
		$filetmp1 = $_FILES['sedoc']['tmp_name'];
							
		$fileext1 =explode('.',$filename1);
		$filecheck1 = strtolower(end($fileext1));
							
		$fileextstored1 = array('png','jpg','jpeg','pdf');
		if(in_array($filecheck1,$fileextstored1)){

			$destinationfile2 = '../upload/'.$filename1;
			move_uploaded_file($filetmp1,$destinationfile2);
									
		}else{
			$errormsg = "file type Error"; 
			echo"<script>alert('please upload SE marksheet in png jpg or pdf');</script>";
		}
	/*}else{
		$destinationfile2=$row1['hsc'];
	}*/			
	//TE MARKSHEET
	//if(!empty($_POST['tedoc'])){
		$errormsg ='';	
		$fsem =$_FILES['tedoc'];
		$filename2= $_FILES['tedoc']['name'];
		$fileerror2 = $_FILES['tedoc']['error'];
		$filetmp2 = $_FILES['tedoc']['tmp_name'];
							
		$fileext2 =explode('.',$filename2);
		$filecheck2 = strtolower(end($fileext2));
							
		$fileextstored2 = array('png','jpg','jpeg','pdf');
		if(in_array($filecheck2,$fileextstored2)){
			$destinationfile3 = '../upload/'.$filename2;
			move_uploaded_file($filetmp2,$destinationfile3);
								
		}else{
			$errormsg = "file type Error";
			echo"<script>alert('please upload TE marksheet in png jpg or pdf');</script>";
		}	 
	/*}else{
		$destinationfile3=$row1['cgpi'];
	}*/				
	if($row1==0){
		$sql="INSERT INTO `academicdetails`(`sname0`, `ssc`, `hsc`, `cgpi`, `sscdoc`, `hscdoc`, `semdoc`, `project`, `average`)VALUES ('$sname',$fep,$sep,$tep,'$destinationfile','$destinationfile2','$destinationfile3','$project',$average)";
	    $run_sql = mysqli_query($conn, $sql);
	         
		if($run_sql)
		{
			echo "<script>alert('Data stored succesfully');</script>";
			echo "<script>window.open('activities.php', '_self')</script>";
			//header('location:form1.php');
		}else{
			echo "<script>alert('There is some error while inserting data');</script>";
		}
	}
	else{
		$sql="UPDATE `academicdetails` SET `ssc`=$fep,`hsc`=$sep,`cgpi`=$tep,`sscdoc`='$destinationfile',`hscdoc`='$destinationfile2',`semdoc`='$destinationfile3',`project`='$project' WHERE sname0='$sname'";
		$run_sql=mysqli_query($conn, $sql);
		if($run_sql)
		{
			echo "<script>alert('Data Updated succesfully');</script>";
			header("Refresh:0");
			//echo "<script>window.open('academicdetails.php', '_self')</script>";
			//header('location:form1.php');
		}else{
			echo "<script>alert('There is some error while updating data');</script>";
		}
	}			
}
?>

<html>
<body>
	<head>
	<title>Academic Details </title>
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
						<h3> Academic Details</h3>
					</div>
					<form method="post" enctype="multipart/form-data">
						<?php include('error.php'); 
						if($status==0){?>      
						<div class="row">
							<div class="col-md-6">
								<div class="left-side-form">
									<h5><label for="fep">FE Pointer</label></h5>
									<p><input type="text" name="fep" required> </p>
									<p><input type="file" name="fedoc" required></p>
									<h5><label for="tep">TE Pointer</label></h5>
									<p><input type="text" name="tep" required> </p>
									<input type="file" name="tedoc" required></p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="right-side-form">
									<h5><label for="sep">SE pointer</label></h5>
									<p><input type="text" name="sep" required></p>
									<p><input type="file" name="sedoc" required></p>
									<h5><label for="project">Project Name</label></h5>
									<p><input type="text" name="project" required ></p>
								</div>
							</div>
						</div><br><br>
						<!-- after edit option -->
						<div align="center">
							<input type="submit" name="submit" id="submit" value="Submit">	
						</div>
						<?php }else if($status==1){?>
							<div class="row">
								<div class="col-md-6">
									<div class="left-side-form">
										<h5><label for="fep">FE</label></h5>
										<p><input type="text" name="fep" value="<?php echo $row1['ssc'];?>" autocomplete="off" required readonly>
										<?php if($row1){
												echo "<a href='viewdoc.php?doc=$row1[sscdoc]&sname=$row1[sname0]'>View Document</a>";
											}
										?></p>
										<h5><label for="tep">TE</label></h5>
										<p><input type="text" name="tep" value="<?php echo $row1['cgpi'];?>" autocomplete="off" required readonly>
										<?php if($row1){
												echo "<a href='viewdoc.php?doc=$row1[semdoc]&sname=$row1[sname0]'>View Document</a>";
											} 
										?></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="right-side-form">
										<h5><label for="sep">SE</label></h5>
										<p><input type="text" name="sep" value="<?php echo $row1['hsc'];?>"autocomplete="off" required readonly>
										<?php if($row1){
													echo "<a href='viewdoc.php?doc=$row1[hscdoc]&sname=$row1[sname0]'>View Document</a>";
												}
										?></p>
										<h5><label for="project">Project</label></h5>
										<p><input type="text" name="project" value="<?php echo $row1['project'];?>"autocomplete="off" required readonly></p>
									</div>
								</div><br><br>
								<div align="center">
									<input type="submit" name="edit" id="edit" value="Edit">	
								</div>
							</div>	
							<!-- Code for edit option -->
						<?php }else{?>
								<div class="row">
							<div class="col-md-6">
								<div class="left-side-form">
									<h5><label for="fep">FE Pointer</label></h5>
									<p><input type="text" name="fep" value="<?php echo $row1['ssc'];?>"  autofocus required> </p>
									<?php if($row1){
												echo "<a href='viewdoc.php?doc=$row1[sscdoc]&sname=$row1[sname0]'>View Document</a>";
											}
										?>
									<p><input type="file" name="fedoc" required></p>
									<h5><label for="tep">TE Pointer</label></h5>
									<p><input type="text" name="tep" value="<?php echo $row1['cgpi'];?>" autofocus required> </p>
									<?php if($row1){
												echo "<a href='viewdoc.php?doc=$row1[semdoc]&sname=$row1[sname0]'>View Document</a>";
											} 
										?>
									<p><input type="file" name="tedoc" required></p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="right-side-form">
									<h5><label for="sep">SE pointer</label></h5>
									<p><input type="text" name="sep" value="<?php echo $row1['hsc'];?>" autofocus required></p>
									<?php if($row1){
													echo "<a href='viewdoc.php?doc=$row1[hscdoc]&sname=$row1[sname0]'>View Document</a>";
												}
										?>
									<p><input type="file" name="sedoc" required></p>
									<h5><label for="project">Project Name</label></h5>
									<p><input type="text" name="project" value="<?php echo $row1['project'];?>"required ></p>
								</div>
							</div>
						</div><br><br>
						<!-- after edit option -->
						<div align="center">
							<input type="submit" name="submit" id="submit" value="Submit">	
						</div>
						<?php } ?>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>