<?php
//include 'includes/conn.php';
session_start();
$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,"registration");
$username=$_SESSION['Uname'];


$sname=$_GET['sname'];
$sql=mysqli_query($conn,"SELECT * from users2 where Name='$sname'");
$run=mysqli_fetch_array($sql);
$user_profile=$run['profile_Image'];
if($user_profile){
    $user_profile=$row['profile_Image'];
}
else{
   $user_profile="default_avatar.png"; 
}

$ret2=mysqli_query($conn,"SELECT * FROM `academicdetails` WHERE sname0='$sname'");
$row2=mysqli_fetch_array($ret2);
$ret1=mysqli_query($conn,"SELECT * FROM `personaldetails` WHERE sname='$sname'");
$row1=mysqli_fetch_array($ret1);

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
					<br><button><a href="round1.php?year=<?php echo $row1['year'];?>">BACK </a></button></div><br>		
<div class="section-title">
					<h3>  Details Of:-   <?php echo $sname; ?></h3>
					
				</div>
                    <form  method="POST">
<div align="center">
  <h5><label for="profile">Profile</label></h5>
  <img src="../user/upload/profile_image/<?php echo $user_profile; ?>" alt="Image1"  width="200px" height="190px" autocomplete="off">
  </div>
					         <div class="row">
								<div class="col-md-6">
									<div class="left-side-form">
									  <h5><label for="sname">Student name</label>
										</h5>
									  <p><input type="text" name="sname" value="<?php echo $row1['sname'];?>" autocomplete="off" required readonly> </p>

										<h5><label for="contact">contact</label></h5>
										<p><input type="text" name="contact" value="<?php echo $row1['contact'];?>" autocomplete="off" required readonly></p>
										
                                        <h5><label for="gender">Sex</label></h5>
										<input type="text" name="sex" value="<?php echo $row1['sex'];?>" autocomplete="off" required readonly>
										
										
										<h5><label for="age">Age</label>
									  </h5>
										<p><input type="text" name="age" value="<?php echo $row1['age'];?>" autocomplete="off" required readonly  ></p>
										
							          <h5><label for="interest">Area of Interest(e.g. Design/Research/Software/Production)</label>
									  </h5>
										<p><input type="text" name="interest" value="<?php echo $row1['interest'];?>" autocomplete="off" required readonly></p>
								  </div>
								</div>

								<div class="col-md-6">
									<div class="right-side-form">
										<h5><label for="Department">Department</label>
									  </h5>
										<p><input type="text" name="Department" value="<?php echo $row1['Department'];?>" autocomplete="off" required readonly > </p>
                                   <h5><label for="email">email</label>
									  </h5>
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
										
										<?php
										//$sn=$_GET['sname'];
										
                               		
										$query = "SELECT * FROM `academicdetails` where sname0='$sname'";
			                            $query_run=mysqli_query($conn,$query)or die(mysqli_error($conn));
			                             if($run1=mysqli_fetch_array($query_run))
			                             {
				                              	echo
						                       "<a href='includes/view.php?doc=$run1[sscdoc]&sname=$run1[sname0]'>View Document</a>";
						                        
			                              }
										
										?>
										</p>
										
										
									 <h5><label for="tep">TE</label></h5>
										<p><input type="text" name="tep" value="<?php echo $row2['cgpi'];?>" autocomplete="off" required readonly>
										   
										
										<?php
										//$sn=$_GET['sname'];
										
										$query = "SELECT * FROM `academicdetails` where sname0='$sname'";
			                            $query_run=mysqli_query($conn,$query)or die(mysqli_error($conn));
			                            if($run1=mysqli_fetch_array($query_run))
										{
				                              	echo
						                       "<a href='includes/view.php?doc=$run1[semdoc]&sname=$run1[sname0]'>View Document</a>";
						                        
										} 
										
										?></p>
										<h5><label for="average">Average marks</label></h5>
									  
										<p><input type="text" name="average" value="<?php echo $row2['average'];?>" autocomplete="off" required readonly>
										
									</p>
										
									</div>
								</div>
								<div class="col-md-6">
									<div class="right-side-form">
									   <h5><label for="se">SE</label></h5>
									  
										<p><input type="text" name="se" value="<?php echo $row2['hsc'];?>"autocomplete="off" required readonly>
										
										
								
									<?php
										//$sn=$_GET['sname'];
										
										$query = "SELECT * FROM `academicdetails` where sname0='$sname'";
			                            $query_run=mysqli_query($conn,$query)or die(mysqli_error($conn));
			                             if($run1=mysqli_fetch_array($query_run))
			                             {
				                              	echo
						                       "<a href='includes/view.php?doc=$run1[hscdoc]&sname=$run1[sname0]'>View Document</a>";
						                        
			                              }
										
										?></p>
										<h5><label for="hsc">Project</label></h5>
									  
										<p><input type="text" name="project" value="<?php echo $row2['project'];?>"autocomplete="off" required readonly>
										
									</p>
									</div>
								 </div>
</div>
							
                           <div class="section-title">
					<h3> Extracurricular Activites</h3>
        </div><br>
            <form method="POST" enctype="multipart/form-data">
              <div class="heading">
                <h5>Internal(Cultural/sports/Technical event)</h5></div>
                <table width="1116" border="0" cellspacing="0" cellpadding="0">
                  <tr class="h">
						        <th width="55">Sr.No. </th>
                    <th width="160">Event/s</th>
                    <th width="160">Place</th>
                    <th width="178">Achievement</th>
                    <th width="254">Year</th>
                    <th width="309">Upload Certificate</th>
					
                  </tr>
                  <tr class="h">
				  <?php 
				  $ret1=mysqli_query($conn,"SELECT * FROM `table1` WHERE sname1='$sname'");
				  $cnt=1;
				  while($row1=mysqli_fetch_array($ret1))
				  {?>
                    <td><?php echo $cnt?></td>
                   <td><?php echo $row1['event'];?></td>

                    <td><?php echo $row1['place'];?></td>
                    <td><?php echo $row1['achievement'];?>
                    </td>
                    <td><?php echo $row1['year'];?>
                    </td>
                    <td><a href="includes/view.php?doc=<?php echo $row1['certificate'];?>&sname=<?php echo $row1['sname1'];?>">View Document</a>
					           					
                    </td>
					  
                  </tr><?php $cnt=$cnt+1; }?>
                  
</table>                
              <div class="heading">
                <h5>Event/s orgnized(Event In charge/Committee Member)</h5></div>
                <table width="1116" border="0" cellspacing="0" cellpadding="0">
                  <tr class="h">
						        <th width="55">Sr.No. </th>
                    <th width="160">Event/s</th>
                    <th width="160">Place</th>
                    <th width="178">Position</th>
                    <th width="254">Year</th>
                    <th width="309">Upload Certificate</th>
					
                  </tr>
                  <tr class="h">
				  <?php 
				  $ret1=mysqli_query($conn,"SELECT * FROM `table2` WHERE sname2='$sname'");
				  $cn=1;
				  while($row1=mysqli_fetch_array($ret1))
				  {?>
                    <td><?php echo $cn?></td>
                   <td><?php echo $row1['event21'];?></td>

                    <td><?php echo $row1['place21'];?></td>
					<td><?php echo $row1['position21'];?></td>
                      </td>
                    <td><?php echo $row1['year21'];?>
                    </td>
                    <td><a href="includes/view.php?doc=<?php echo $row1['certificate21'];?>&sname=<?php echo $row1['sname2'];?>">View Document</a>
					</td>
				  </tr>
					<?php $cn=$cn+1; }?>
                   
</table>
                    
				<div class="heading">
<h5>External Participation(Cultural/sports/Technical event)</h5></div>
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
                  <tr class="h">
				  <?php 
				  $ret1=mysqli_query($conn,"SELECT * FROM `table3` WHERE sname3='$sname'");
				  $c=1;
				  while($row1=mysqli_fetch_array($ret1))
				  {?>
                    <td><?php echo $c?></td>
                   <td><?php echo $row1['event31'];?></td>

                    <td><?php echo $row1['place31'];?></td>
					<td><?php echo $row1['achievement31'];?></td>
					<td><?php echo $row1['achiev31'];?></td>
                    <td><?php echo $row1['year31'];?></td>
                    
                    <td><a href="includes/view.php?doc=<?php echo $row1['certificate31'];?>&sname=<?php echo $row1['sname3'];?>">View Document</a>
					</td>
				  </tr>
					<?php $c=$c+1; }?>
                   
</table><br><br>
			
						 
						
</body>
</html>
						 