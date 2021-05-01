<?php
//include 'conn.php';
$sname=$_GET['sname'];
$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,"registration");
$username=$_SESSION['Uname'];

$sql="SELECT * from academicdetails where sname0='$sname'";
$run=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($run);

$average=$row['average'];
//echo $_GET['sname'];
if($average >=8 && $average<=10 )
	$a1=20;
else if($average >=6 && $average<8)
	$a1=15;
else if($average>=4 && $average<6)
	$a1=10;
else 
	$a1=5;

$a=0;
$ret1=mysqli_query($conn,"SELECT * FROM `table1` WHERE sname1='$sname'");

while($row1=mysqli_fetch_array($ret1))
{
  $achievement=$row1['achievement'];
  if($achievement=='1st Rank'){
    $a=$a+20;
  }
   else if($achievement=='2nd Rank'){
     $a=$a+15;
   }  
   else if($achievement=='3rd Rank'){
    $a=$a+10;
  } 

  else
  $a=$a+5;     
         
}

$p=0;
$ret2=mysqli_query($conn,"SELECT * FROM `table2` WHERE sname2='$sname'");

while($row2=mysqli_fetch_array($ret2))
{
  $position=$row2['position21'];

  if($position=='Head')
	$p=$p+20;
  else
	$p=$p+10;  
}

$l=0;
$ret3=mysqli_query($conn,"SELECT * FROM `table3` WHERE sname3='$sname'");

while($row3=mysqli_fetch_array($ret3))
{
  $level=$row3['achiev31'];

  if($level=='College')
	$l=$l+5;
else if($level=='University')
	$l=$l+10;
else if($level=='State')
	$l=$l+15;
else
	$l=$l+20;  
}
////completion of code

$marks=$a1+$a+$p+$l;
$sql="UPDATE users2 set Marks=$marks where Name='$sname'";
$run=mysqli_query($conn,$sql);

if($run)
{
  $update_status_query="UPDATE  users2 set calstatus='accept' where Name='$sname'";
  $run_sql=mysqli_query($conn,$update_status_query);
  if($run_sql){

    $fetch_records=mysqli_query($conn,"SELECT * from users2 where Name='$sname'");
    if($fetch_records){

      $fetch_one_record=mysqli_fetch_array($fetch_records);
      $year=$fetch_one_record['acyear'];
      header("location:../round1.php?year=$year");
    }
    else{
      echo '<script>alert("Something Wrong")<script>';
    }

  }else{
    echo '<script>alert("Something Wrong")<script>';
  }

}
else{
  echo '<script>alert("Something Wrong")<script>';
}

?>
