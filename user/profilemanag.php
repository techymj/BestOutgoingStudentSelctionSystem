<?php
   session_start();
   $conn = mysqli_connect("localhost","root","");
 $db = mysqli_select_db($conn,"registration");
$username=$_SESSION['Uname'];
    //getting users details
    $getting_user_details_query = "select * from users2 where Username='$username'";
    $run_getting_user_details_query = mysqli_query($conn, $getting_user_details_query);
    $row = mysqli_fetch_array($run_getting_user_details_query);
    $user_id = $row['id'];
   
    $user_email=$row['Email_id'];
    $user_profile = $row['profile_Image'];
   
    if(!isset($_SESSION['Uname'])){
        echo '<script>alert("Invalid Action?.Let me Redirect You to Login Page");</script>';
        echo "<script>window.open('../login2.php', '_self')</script>";
    }
    if(isset($_POST['upload_img'])){
        $file = $_FILES['profile_img']; // print_r($file);
    
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileUploadError = $file['error'];
        $fileType = $file['type'];
    
         $fileExt = explode('.', $fileName); 
         //explode creates an array of a string saperates by '.' -> first paramater and not containing second paramater
        $fileAcutalExt = strtolower(end($fileExt)); //end gets the last block of the array
    
        $file_allowed_type = array('jpg', 'jpeg', 'png');
    
    
        if(in_array($fileAcutalExt, $file_allowed_type)){
            if($fileUploadError === 0){
                if($fileSize < 20000000){
                    $fileNewName = 'profile_img_'.$user_id.'.'.$fileAcutalExt;
                    $fileDestinationFolder = 'upload/profile_image/'.$fileNewName;
                    move_uploaded_file($fileTmpName, $fileDestinationFolder);
                    $read_query = "update users2 set profile_Image='$fileNewName' where id='$user_id'";
                    $run_read_query = $conn->query($read_query);
                    if($run_read_query){
                        //uploaded successfully!!
                        echo '<script>alert("Image Uploaded Successfully!!!");</script>';
                      header("Refresh:0");
                    }else{
                        echo "Oops! Something went wrong";
                    }
                } else {
                    //file size is way too big
                    echo '<script>alert("File Size is Big");</script>';
                }
            } else {
                //there has been an error in uploading the file
                echo '<script>alert("error uploading image");</script>';
            }
        } else {
            //invalid img format
            echo '<script>alert("not valid image format");</script>';
        }
       
    }
    
    if(isset($_POST['setting_submit'])){
        $setting_username = $_POST['setting_username'];
        $setting_email = $_POST['setting_email'];
        $setting_password = $_POST['setting_password'];
        $setting_re_password = $_POST['setting_re_password'];
        $setting_receive_notification ="";
       
       
        if(!empty($setting_username)){
            if ( !preg_match('/^[A-Za-z][A-Za-z0-9 ]{1,50}$/', $setting_username) ){
                echo '<script>alert("invalid username... username can only be leaders and numbers and spaces");</script>';
            } else {
                $update_username_query = "update users2 set Username='$setting_username' where id='$user_id'";
                $run_update_username_query = $conn->query($update_username_query);
                if($run_update_username_query){
                    echo '<script>alert("username successfully updated");</script>';
                }else{
                    echo '<script>alert("error occured in changing username");</script>';
                }
            }
        }

       if(!empty($setting_email)){
            if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $setting_email)){
                echo '<script>alert("invalid email address");</script>';
            } else {
                $update_email_query = "update users2 set Email_id='$setting_email' where id='$user_id'";
                $run_update_email_query = $conn->query($update_email_query);
                if($run_update_email_query){
                    $_SESSION['user_email'] = $setting_email;
                    echo '<script>alert("email successfully updated");</script>';
                }else{
                    echo '<script>alert("error occured in changing email");</script>';
                }
            }
        }

        if(!empty($setting_password)){
           
            if($setting_password != $setting_re_password){
                echo '<script>alert("password mismatch");</script>';
            } else {
                if ( !preg_match("/^.*(?=.{8,56})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/", $setting_password) ){
                    echo '<script>alert("invalid password... password can only be leaders and numbers max 50 characters");</script>';
                }else{
                    $setting_password_hash=hash('sha256',$setting_password);
                    $update_password_query = "update users2 set Password='$setting_password' where id='$user_id'";
                    $run_update_password_query = $conn->query($update_password_query);
                    if($run_update_password_query){
                        echo '<script>alert("password successfully updated");</script>';
                    }else{
                        echo '<script>alert("error occured in changing password");</script>';
                    }
                }
                
            }
        }
    }

        
        
    

?>