<?php
    //include 'conn.php';
$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,"registration");
session_start();
    $notification_id = $_GET['notification_id'];

    $query = "delete from notifications where notification_id = '$notification_id'";
    //$run=mysqli_query($conn,$query);
   $run = $conn->query($query);

    if($run){
        echo '<script>alert("successfully deleted")</script>';
        header('location: ../notification.php');
    }else{
        echo "Oops! Something went wrong";
    }
?>