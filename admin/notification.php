<?php
//include 'includes/conn.php';
$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,"registration");
session_start();
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

    <title>Admin |Notification</title>
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
	font-weight: bold;
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
                          <span>Notification</span><span class="badge badge-light"><?php echo $notification_number; ?></span>
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
                          <div class="text-center mt-5"><h3>Notifications</h3><hr></div>
                         
                          <div align="left" style="font-size:22px">
                      <a href="home.php">
                    <i class="fa fa-arrow-circle-left"></i>
                      <span>Back</span>
                      </a></div>         
    
              <?php
              $sql2=mysqli_query($conn,"SELECT * from notifications where check_status='pending' order by date");
              while($run2=mysqli_fetch_array($sql2)){
                $name=$run2['user_name'];
                $message=$run2['message'];
                $date=$run2['date'];
                $user_id=$run2['user_id'];
                $notification_id=$run2['notification_id'];
                ?>
            
              <div class=" list-group-item-primary list-group-item-active flex-column align-items-start">
              
              <div class="d-flex w-100 justify-content-between">
               
                <table class="table table-striped table-advance table-hover table-dark table-bordered">
                  <tr>
                  <h4 class="mb-1"><strong><?php echo $message?></strong></h4>
               <td width="30%"><strong>From:</strong><?php echo $name?></td>
               <td width="26%"><strong>Time:</strong><?php echo $date?></td>
              <td width="44%"> <a href="includes/open_notification.php?uid=<?php echo $user_id?>&notification_id=<?php echo $notification_id?>"> <button class="btn btn-success">OPEN</button></a>
               <a href="includes/delete_notification.php?uid=<?php echo $user_id?>&notification_id=<?php echo $notification_id?>"><button class="btn btn-danger">DELETE</button></a></td>
                
              
              </tr>
              <?php  }
              ?>
              </table>                  
                </div>
              </div>
             
            </div>

          
         
          
         
     
    </div>
  </div>
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
    