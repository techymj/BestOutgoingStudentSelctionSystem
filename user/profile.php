<?php
//include 'includes/conn.php';
include 'profilemanag.php';
//Getting notification number
 $conn = mysqli_connect("localhost","root","");
 $db = mysqli_select_db($conn,"registration");
$username=$_SESSION['Uname'];
$sql = "select * from users2 where Username='$username'";
$run= mysqli_query($conn, $sql);
$row = mysqli_fetch_array($run);
$user_id = $row['id'];
$username = $row['Username'];
//$email = $row['email'];
$user_profile = $row['profile_Image'];
if($user_profile){
    $user_profile=$row['profile_Image'];
}
else{
   $user_profile="default_avatar.png"; 
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

    <title>User |Profile Management</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style3.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">
    <style type="text/css">
    #container #main-content .wrapper .row .col-md-12 .content-panel .table.table-striped.table-advance.table-hover.table-dark.table-bordered tbody tr td {
	text-align: center;
}
    #main-content .wrapper form label {
	font-family: Times New Roman, Times, serif;
}
    body,td,th {
	font-family: Ruda, sans-serif;
	font-size: 18px;
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
            <a href="#" class="logo"><b>User Dashboard</b></a>
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
                      <a href="myprofile.php">
                      <i class="glyphicon glyphicon-plus"></i>
                        <span>My Profile</span>
                      </a>
                    </li>
                  
              	  <li class="sub-menu">
                      <a href="user-home.php">
                      <i class="glyphicon glyphicon-home"></i>
                        <span>Home</span>
                      </a>
                  </li>	
                 

                  <li class="sub-menu">
                      <a href="applicationform.php" >
                          <i class="fa fa-users"></i>
                          <span>Application Form</span>
                      </a>
                   
                  </li>
                  <li class="sub-menu">
                      <a href="myform2.php" >
                          <i class="fa fa-users"></i>
                          <span>My Form</span>
                      </a>
                   
                  </li>
                  
                 
              </ul>
          </div>
      </aside>
        <section id="main-content">
            <section class="wrapper">
                <div class="content-panel ">
                    <div class="text-center mt-5">
                        <h2>BOS Selection System</h2>
                    </div>
                </div>
                <div class="text-center mt-5"><h3>Profile Management </h3><hr></div>
                <div align="left" style="font-size:22px">
                      <a href="home.php">
                    <i class="fa fa-arrow-circle-left"></i>
                      <span>Back</span>
                      </a></div>
                
                    <div align="center">
                      <img src="upload/profile_image/<?php echo $user_profile; ?>" alt="Avatar" class="img-circle"  name="profile_img" style="width: 100px">
                      <br><br><form  method="post" enctype="multipart/form-data">
                      <div style="width: 300px">
                        <input class="form-control"type="file" name="profile_img">
                      </div>
                    </div>
               
                    <div align="center">
                      <label>Choose file</label><br>
                      <input type="submit" name="upload_img" class="btn btn-primary" style="display-block: inline" value="Upload"><br></br></form>
                     <form method="post"> <label for="inputlg">Username</label></br>
                      <input class="form-control" placeholder="<?php echo $username; ?>" type="text" name="setting_username">
                      <label for="inputlg" class="font-weight-bold">Email</label><br>
                      <input class="form-control" placeholder="<?php echo $user_email; ?>" type="email" name="setting_email" id="">
                      <label for="inputlg" class="font-weight-bold">Change Password</label></br>
                      <input class="form-control" type="password" name="setting_password" id="">
                      <label for="inputlg">Re-Enter Password</label>
                      <input class="form-control" type="password" name="setting_re_password" id=""></br>
                        
                      
                    
                   
                       
                         
                        
                        
                          <button type="submit" class="btn btn-primary" id="settings" name="setting_submit">Save Changes</button>
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
    