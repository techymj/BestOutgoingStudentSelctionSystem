<?php
session_start();
//include 'includes/conn.php';
$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,"registration");
$username=$_SESSION['Uname'];
$sql = "SELECT * FROM `admin table` WHERE username='$username'";
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

    <title>Admin |Home</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">
    <style type="text/css">
    #container #main-content .wrapper .row .col-md-12 .content-panel .table.table-striped.table-advance.table-hover.table-dark.table-bordered tbody tr td {
	text-align: center;
}
    #main-content .wrapper .table.table-striped.table-advance.table-hover.table-dark.table-bordered tbody tr td {
	text-align: center;
}
    body,td,th {
	font-family: Ruda, sans-serif;
}
a {
	font-size: 16px;
	color: #563D7C;
	font-weight: bold;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
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



            </ul>
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                <a class="btn btn-primary" href="../logout.php" role="button">Logout</a>
     
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
                      <a href="notification.php">
                          <i class="fa fa-bell"></i>
                          <span>Notifications </span><span class="badge badge-light"><?php echo $notification_number; ?></span>
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
            <table class="table table-striped table-advance table-hover table-dark table-bordered">
                          <div class="text-center mt-5"><h3>Home Page</h3></div>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                <th width="7%">Sr.No.</th>
                                <th width="14%" scope="col">Academic Year</th>
                                <th width="15%" scope="col">No.Participants</th>
                                <th width="20%" scope="col">Winner Name</th>
                                <th width="12%" scope="col">Total Marks</th>
                                <th width="14%" scope="col">Action</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php 
                                    $ret=mysqli_query($conn,"select * from academicyear order by acyear desc");
                                     
                                    $cnt=1;
                              
                                
							  while($row=mysqli_fetch_array($ret))
							  {?>
                              <tr>
                              
                                    <td><?php echo $cnt?></td>  
                                    <td><?php echo $row['acyear'];?></td>
                                    <td><?php 
                                    $t=$row['acyear'];
                                    $sql=mysqli_query($conn,"select count(*) as no from users2 where acyear='$t'and users2.submit_status='submitted'");
                                    $run=mysqli_fetch_array($sql);
                                    if($run){
                                    $j=$run['no'];
                                   
                                    echo $j;}
                                    else{
                                      echo '-';
                                    }
                                    ?>
                                    </td>
                                   
                                    </td>  
                                    <td><?php echo $row['winner_name'];
                                       
                                       
                                    ?></td>
                                    <td><?php echo $row['marks'];?></td>
                                    <td width="18%"><p><a href="round1.php?year=<?php echo $row['acyear'];?>">Round1</a>
                                      <a href="round2.php?year=<?php echo $row ['acyear'];?>">Round2</a>
                                </p>
                                <p><a href="includes/winner.php?year=<?php echo $row['acyear'];?>">Get Winner</a></p></td>
                                                                
                                    
                                       
                                     
                                  
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
    