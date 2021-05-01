<?php
session_start();
    //include 'includes/conn.php';
	$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,"registration");
    $username=$_SESSION['Uname'];
$sql = "SELECT * FROM `admin table`  where username='$username'";
$run= mysqli_query($conn, $sql);
$row = mysqli_fetch_array($run);

//Getting notification number
$get_noti_number="SELECT count(*)as notinumber from notifications where check_status='pending'";
$run_number=mysqli_query($conn,$get_noti_number);
$fetch_number=mysqli_fetch_array($run_number);

$notification_number=$fetch_number['notinumber'];
   

$user_profile = $row['profile_image'];
	                
    if(isset($_POST['submit'])){
    
            $ac=strip_tags($_POST['academic_year']);
            $sd=strip_tags($_POST['starting_Date']);
            $ed=strip_tags($_POST['ending_Date']);
            $sql="SELECT * from academicyear where acyear='$ac'";
            $run=mysqli_query($conn,$sql);
            if (mysqli_num_rows($run) > 0){
              /*echo "<script>alert('Year Already exists');</script>";*/
              $msg="Year Already Inserted";
            }
            else{

           
                $ins_sql = "INSERT INTO `academicyear`(`acyear`, `sdate`, `edate`) VALUES ('$ac','$sd','$ed')";
                $run_sql = mysqli_query($conn, $ins_sql);
                echo "<script>alert('Year Inserted');</script>";
                echo "<script>window.open('home.php')</script>";

                header('location:home.php');
            }
           
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin |Add Year</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">
    <style type="text/css">
    #container #main-content .wrapper .row .col-md-12 .content-panel .table.table-striped.table-advance.table-hover.table-dark.table-bordered tbody tr td {
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
              
              	  <p class="centered"><a href="profile.php"><img src="../upload/profile_image/<?php echo $user_profile;?>" class="img-circle" width="100px"></a></p>
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
          <div class="content-panel ">
          <div class="text-center mt-5">
            <h2>BOS Selection System</h2></div></div>
            
            <form method="post"enctype="multipart/form-data">
                <table class="table table-striped table-advance table-hover table-dark table-bordered">
                
                    <div class="text-center mt-5"><h3>Add Year </h3></div>
                     <div align="left" style="font-size:22px">
                      <a href="home.php">
                    <i class="fa fa-arrow-circle-left"></i>
                      <span>Back</span>
                      </a></div>
                    <hr>             
                
                        <tr <?php if (isset($msg)): ?> class="form_error" <?php endif ?>>
                            <td><label><strong>Academic Year</strong></label></td>
                            <td><input type="year" value="" name="academic_year" required>
                              <?php if (isset($msg)): ?>
      	                      <span><?php echo $msg; ?></span><?php endif ?>
                            </td>

                    </tr>
                    <tr>
                            <td><label><strong>Starting Date</strong></label></td>
                            <td><input type="date" value="" name="starting_Date" required></td>
                    </tr>   
                    <tr>
                            <td><label><strong>Ending Date</strong></label></td>
                            <td><input type="date" value="" name="ending_Date" required></td>
                    </tr>   
                </table> <br>   
                    <div align="center">
                            <input type="submit" name="submit" id="submit" value="Submit">
                        </div>      
                        
                    
            </form>
            
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
    