<?php
session_start();
//include 'includes/conn.php';
$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,"registration");

$username=$_SESSION['Uname'];
$sql = "SELECT * FROM `admin table` where username='$username'";
$run= mysqli_query($conn, $sql);
$row = mysqli_fetch_array($run);

$user_id = $row['id'];
$username = $row['username'];
$email = $row['email'];

$user_profile = $row['profile_image'];
if($user_profile){
    $user_profile=$row['profile_image'];
}
else{
   $user_profile="default_avatar.png"; 
}

	                
//Getting notification number
$get_noti_number="SELECT count(*)as notinumber from notifications where check_status='pending'";
$run_number=mysqli_query($conn,$get_noti_number);
$fetch_number=mysqli_fetch_array($run_number);

$notification_number=$fetch_number['notinumber'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Manage Users</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">
    <style type="text/css">
    #container #main-content .wrapper .row .col-md-12 .content-panel .table.table-striped.table-advance.table-hover.table-dark.table-bordered tbody tr td {
	text-align: center;
}
    #container #main-content .wrapper .table.table-striped.table-advance.table-hover.table-dark.table-bordered tbody tr td {
	text-align: center;
}
    </style>
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="#" class="logo"><b>Admin Dashboard</b></a>
            <div class="nav notify-row" id="top_menu">
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                <a class="btn btn-primary" href="../logout.php" role="button">Logout</a>
</ul>      
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.php"><img src="upload/profile_image/<?php echo $user_profile;?>" class="img-circle" width="100px"></a></p>
                    
                    <li class="hm">
                      <a href="addyear.php">
                      <i class="glyphicon glyphicon-plus"></i>
                        <span>Add Year</span>
                      </a>
                    </li>
              	  <li class="sub-menu">
                      <a href="home.php">
                      <i class="glyphicon glyphicon-home"></i>
                        <span>Home</span>
                      </a>
                  </li>	
                 

                  <li class="sub-menu">
                      <a href="notification.php" >
                          <i class="fa fa-bell"></i>
                          <span>Notifications</span><span class="badge badge-light"><?php echo $notification_number; ?></span>
                      </a>
                   
                  </li>
                  
              </ul>
          </div>
      </aside>
      <section id="main-content">
          <section class="wrapper">
                <div class="content-panel">
                <div class="text-center mt-5">
            <h2>BOS Selection System</h2></div></div><br>
                          <table align="center" class="table table-striped table-advance table-hover table-dark table-bordered">
                          <div class="text-center mt-5"><h3>List of Selected Participants for Interview</h3></div>
                          <div align="left" style="font-size:22px">
                      <a href="home.php">
                    <i class="fa fa-arrow-circle-left"></i>
                      <span>Back</span>
                      </a></div>
                        
                       <br>
                                                     
	                  	  	  <hr>
                              <thead>
                              <tr>
                                <th>Sno.</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Marks</th>
                                <th scope="col">Marks of Interview</th>
                                <th scope="col">Total Marks</th>
                                <th scope="col">Action</th>
                               
                              </tr>
                              </thead>
                              <tbody>
                              <?php 
                                    
                              
                                    $ret=mysqli_query($conn,"select * from users2 where acyear='".$_GET['year']."' and users2.roundstatus='accept'" );
                                    
							                      $cnt=1;
							                      while($row=mysqli_fetch_array($ret))
							                  {
                                  $sname=$row['Name'];
                                  $sql=mysqli_query($conn,"SELECT * from users2 where Name='$sname'");
                                  $run=mysqli_fetch_array($sql);
								  $edit_status=$run['edit_status'];
								  ?>
								  
                              <tr>
                                    <td><?php echo $cnt;?></td>  
                                    <td><?php echo $run['Name'];?></td>
                                    <td><?php echo $run['Marks'];?></td>
                                    <td><?php echo $run['intmarks'];?></td>
                                    <td><?php echo $run['total'];?></td>
                                    <td>
									<?php if($edit_status=='changed'){?>
                                    <button class="btn btn-primary btn-xs"disabled>EDIT</button>
									<?php }else {?>
									<a href="edit.php?sname=<?php echo $run['Name'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>EDIT</button></a>
									<?php }?>
                                    </td>
                                   
                                  
                                   
                                     
                                  
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
							  
                          </table>
                      </div>
                  </div>
              </div>
		</section>
      </section
  ></section>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="../assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
    