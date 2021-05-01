<?php
//include 'conn.php';
session_start();
$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,"registration");
$username=$_SESSION['Uname'];
$errors=array();
  $run_sql="";
    $ret=mysqli_query($conn,"SELECT * FROM `users2` WHERE username='$username'");
	$row=mysqli_fetch_array($ret);
	$sname=$row["Name"];
	
	$ret1=mysqli_query($conn,"SELECT * FROM `table1` WHERE sname1='$sname'");
	$row1=mysqli_fetch_array($ret1);
	
	$ret2=mysqli_query($conn,"SELECT * FROM `table2` WHERE sname2='$sname'");
	$row2=mysqli_fetch_array($ret2);
	 
	$ret3=mysqli_query($conn,"SELECT * FROM `table3` WHERE sname3='$sname'");
	$row3=mysqli_fetch_array($ret3); 
	
	if(isset($_POST['edit'])){
	$status=8;
}
	else if($row1 && $row2 && $row3){
	       $status=1;	
    }
	else if($row1 && $row2==0 && $row3==0)
	{
		$status=2;
		echo "<script>alert('You have not fill the details of tabe2 & tabel3');</script>";
	}
	else if($row1==0 && $row2 && $row3==0)
	{
		$status=3;
		echo "<script>alert('You have not fill the details of tabe1 & tabel3');</script>";
	}
	else if($row1==0 && $row2==0 && $row3)
	{
		$status=4;
		echo "<script>alert('You have not fill the details of tabe1 & tabel2');</script>";
	}
	else if($row1 && $row2 && $row3==0)
	{
		$status=5;
		echo "<script>alert('You have not fill the details of tabel3');</script>";
	}
	else if($row1 && $row2==0 && $row3)
	{
		$status=6;
		echo "<script>alert('You have not fill the details of tabel2');</script>";
	}
    else if($row1==0 && $row2 && $row3)
	{
		$status=7;
		echo "<script>alert('You have not fill the details of tabel1');</script>";
	}	
	else{
	$status=0;
	}
	$errors=array();
	if(isset($_POST['submit'])){
				
			if(!empty($_POST['event11'])){
			    $event = strip_tags($_POST['event11']);
			    $place = strip_tags($_POST['place11']);
			    $achievement = $_POST['achievement11'];
			    $year = $_POST['year11'];
			    $errormsg = '';
			    $file11 =$_FILES['file11'];
			    $filename11= $_FILES['file11']['name'];
			    $fileerror11 = $_FILES['file11']['error'];
			    $filetmp11 = $_FILES['file11']['tmp_name'];
			    $fileext11 =explode('.',$filename11);
			    $filecheck11 = strtolower(end($fileext11));
			    $fileextstored11 = array('png','jpg','jpeg','pdf');
					if(in_array($filecheck11,$fileextstored11)){
					    $destinationfile11 = '../upload/'.$filename11;
              move_uploaded_file($filetmp11,$destinationfile11);
                 $ins_sql = "INSERT INTO `table1`(`sname1`, `event`, `place`, `achievement`, `year`, `certificate`) VALUES ('$sname','$event', '$place', '$achievement', '$year','$destinationfile11')";
                 $run_sql = mysqli_query($conn, $ins_sql);
       
					}
					
					else{
              $errormsg = "file type Error";
              echo"<script>alert('please upload document in png jpg or pdf at row1');</script>";
			  
					}
			}	  
        
      
      
			
						/*--------------------------------*/
          //12
     if(!empty($_POST['event12'])){ 
			  $event12 = strip_tags($_POST['event12']);
			  $place12 = strip_tags($_POST['place12']);
			  $achievement12 = $_POST['achievement12'];
			  $year12 = $_POST['year12'];
			
			  $errormsg = '';
			
				$file12 =$_FILES['file12'];
				$filename12= $_FILES['file12']['name'];
				$fileerror12 = $_FILES['file12']['error'];
				$filetmp12 = $_FILES['file12']['tmp_name'];
					
				$fileext12 =explode('.',$filename12);
				$filecheck12 = strtolower(end($fileext12));
					
				$fileextstored12 = array('png','jpg','jpeg','pdf');
				if(in_array($filecheck12,$fileextstored12))
				{
						
						$destinationfile12 = '../upload/'.$filename12;
						move_uploaded_file($filetmp12,$destinationfile12);
            $ins_sql = "INSERT INTO `table1`(`sname1`, `event`, `place`, `achievement`, `year`, `certificate`) VALUES ('$sname','$event12', '$place12', '$achievement12', '$year12','$destinationfile12')";
            $run_sql = mysqli_query($conn, $ins_sql);
				}else{
              $errormsg = "file type Error";
              echo"<script>alert('please upload document in png jpg or pdf');</script>";
        }
       
      }
			
						/*---------------------------*/
            //13
        if(!empty($_POST['event13'])){ 
            $event13 = strip_tags($_POST['event13']);
            $place13 = strip_tags($_POST['place13']);
            $achievement13 = $_POST['achievement13'];
            $year13 = $_POST['year13'];
            $errormsg = '';
        
            $file13 =$_FILES['file13'];
            $filename13= $_FILES['file13']['name'];
            $fileerror13 = $_FILES['file13']['error'];
              $filetmp13 = $_FILES['file13']['tmp_name'];
            
            $fileext13 =explode('.',$filename13);
            $filecheck13 = strtolower(end($fileext13));
            
            $fileextstored13 = array('png','jpg','jpeg','pdf');
            if(in_array($filecheck13,$fileextstored13))
            {
              
              $destinationfile13 = '../upload/'.$filename13;
              move_uploaded_file($filetmp13,$destinationfile13);
              $ins_sql = "INSERT INTO `table1`(`sname1`, `event`, `place`, `achievement`, `year`, `certificate`) VALUES ('$sname','$event13', '$place13', '$achievement13', '$year13','$destinationfile13')";
              $run_sql = mysqli_query($conn, $ins_sql);
      
              
            }else{
                $errormsg = "file type Error";
                echo"<script>alert('please upload document in png jpg or pdf');</script>";
              }
             

      }
						/*-----------------------*/
            //14
      if(!empty($_POST['event14'])){ 
        $event14 = strip_tags($_POST['event14']);
        $place14 = strip_tags($_POST['place14']);
        $achievement14 = $_POST['achievement14'];
        $year14 = $_POST['year14'];

        $errormsg = '';
        
            $file14 =$_FILES['file14'];
            $filename14= $_FILES['file14']['name'];
            $fileerror14 = $_FILES['file14']['error'];
              $filetmp14 = $_FILES['file14']['tmp_name'];
            
            $fileext14 =explode('.',$filename14);
            $filecheck14 = strtolower(end($fileext14));
            
            $fileextstored14 = array('png','jpg','jpeg','pdf');
            if(in_array($filecheck14,$fileextstored14))
            {
              
              $destinationfile14 = '../upload/'.$filename14;
              move_uploaded_file($filetmp14,$destinationfile14);
              $ins_sql = "INSERT INTO `table1`(`sname1`, `event`, `place`, `achievement`, `year`, `certificate`) VALUES ('$sname','$event14', '$place14', '$achievement14', '$year14','$destinationfile14')";
              $run_sql = mysqli_query($conn, $ins_sql);
              
            }else{
                $errormsg = "file type Error";
                echo"<script>alert('please upload document in png jpg or pdf');</script>";
              }
            
        }
      
      if(!empty($_POST['event15'])){ 
        $event15 = strip_tags($_POST['event15']);
        $place15 = strip_tags($_POST['place15']);
        $achievement15 = $_POST['achievement15'];
        $year15 = $_POST['year15'];
        
        $errormsg = '';
			
					$file15 =$_FILES['file15'];
					$filename15= $_FILES['file15']['name'];
					$fileerror15 = $_FILES['file15']['error'];
				    $filetmp15 = $_FILES['file15']['tmp_name'];
					
					$fileext15 =explode('.',$filename15);
					$filecheck15 = strtolower(end($fileext15));
					
					$fileextstored15 = array('png','jpg','jpeg','pdf');
					if(in_array($filecheck15,$fileextstored15))
					{
						
						$destinationfile15 = '../upload/'.$filename15;
            move_uploaded_file($filetmp15,$destinationfile15);
            $ins_sql = "INSERT INTO `table1`(`sname1`, `event`, `place`, `achievement`, `year`, `certificate`) VALUES ('$sname','$event15', '$place15', '$achievement15', '$year15','$destinationfile15')";
            $run_sql = mysqli_query($conn, $ins_sql);    
        
						
					}else{
              $errormsg = "file type Error";
              echo"<script>alert('please upload document in png jpg or pdf');</script>";
            }
	  }   
			/*<------------------------------------------------------------------->*/		
          //21
          
      if(!empty($_POST['event21'])){ 
		      $event21 = strip_tags($_POST['event21']);
		      $place21 = strip_tags($_POST['place21']);
		      $position21 = $_POST['position21'];
		      $year21 = $_POST['year21'];
		
		      $errormsg = '';
		
					$file21 =$_FILES['file21'];
					$filename21= $_FILES['file21']['name'];
					$fileerror21 = $_FILES['file21']['error'];
				  $filetmp21 = $_FILES['file21']['tmp_name'];
					
					$fileext21 =explode('.',$filename21);
					$filecheck21 = strtolower(end($fileext21));
					
					$fileextstored21 = array('png','jpg','jpeg','pdf');
					if(in_array($filecheck21,$fileextstored21))
					{
						
						$destinationfile21 = '../upload/'.$filename21;
            move_uploaded_file($filetmp21,$destinationfile21);
            $ins_sql = "INSERT INTO `table2`(`sname2`, `event21`, `place21`, `position21`, `year21`, `certificate21`) VALUES ('$sname','$event21', '$place21', '$position21', '$year21','$destinationfile21')";
            $run_sql = mysqli_query($conn, $ins_sql);  
						
					}else{
              $errormsg = "file type Error";
              echo"<script>alert('please upload document in png jpg or pdf');</script>";
            }
            
        }    
		
			/*<-------------------------------------------------------------------------->*/			
        //22
        if(!empty($_POST['event22'])){ 
          $event22 = strip_tags($_POST['event22']);
          $place22 = strip_tags($_POST['place22']);
          $position22 = $_POST['position22'];
          $year22 = $_POST['year22'];
		
          $errormsg = '';
					$file22 =$_FILES['file22'];
					$filename22= $_FILES['file22']['name'];
					$fileerror22 = $_FILES['file22']['error'];
				    $filetmp22 = $_FILES['file22']['tmp_name'];
					
					$fileext22 =explode('.',$filename22);
					$filecheck22 = strtolower(end($fileext22));
					
					$fileextstored22 = array('png','jpg','jpeg','pdf');
					if(in_array($filecheck22,$fileextstored22))
					{
						
						$destinationfile22 = '../upload/'.$filename22;
            move_uploaded_file($filetmp22,$destinationfile22);
            $ins_sql = "INSERT INTO `table2`(`sname2`, `event21`, `place21`, `position21`, `year21`, `certificate21`) VALUES ('$sname','$event22', '$place22', '$position22', '$year22','$destinationfile22')";
            $run_sql = mysqli_query($conn, $ins_sql);  
						
					}else{
              $errormsg = "file type Error";
              echo"<script>alert('please upload document in png jpg or pdf');</script>";
            }	
            
          }
		/*<---------------------------------------------------------------------->*/
                    //23
      if(!empty($_POST['event23'])){ 
          $event23 = strip_tags($_POST['event23']);
          $place23 = strip_tags($_POST['place23']);
          $position23 = $_POST['position23'];
          $year23 = $_POST['year23'];	
            
          $errormsg = '';
					$file23 =$_FILES['file23'];
					$filename23 = $_FILES['file23']['name'];
					$fileerror23 = $_FILES['file23']['error'];
				    $filetmp23 = $_FILES['file23']['tmp_name'];
					
					$fileext23 =explode('.',$filename23);
					$filecheck23 = strtolower(end($fileext23));
					
					$fileextstored23 = array('png','jpg','jpeg','pdf');
					if(in_array($filecheck23,$fileextstored23))
					{
						
						$destinationfile23 = '../upload/'.$filename23;
            move_uploaded_file($filetmp23,$destinationfile23);
            $ins_sql = "INSERT INTO `table2`(`sname2`, `event21`, `place21`, `position21`, `year21`, `certificate21`) VALUES ('$sname','$event23', '$place23', '$position23', '$year23','$destinationfile23')";
            $run_sql = mysqli_query($conn, $ins_sql);
						
					}else{
              $errormsg = "file type Error";
              echo"<script>alert('please upload document in png jpg or pdf');</script>";
            }	
             
        }
		/*<---------------------------------------------------------------------->*/
                     //24	
     if(!empty($_POST['event24'])){ 	
          $event24 = strip_tags($_POST['event24']);
          $place24 = strip_tags($_POST['place24']);
          $position24 = $_POST['position24'];
          $year24 = $_POST['year24'];	

			    $errormsg = '';
					$file24 =$_FILES['file24'];
					$filename24 = $_FILES['file24']['name'];
					$fileerror24 = $_FILES['file24']['error'];
				    $filetmp24 = $_FILES['file24']['tmp_name'];
					
					$fileext24 =explode('.',$filename24);
					$filecheck24 = strtolower(end($fileext24));
					
					$fileextstored24 = array('png','jpg','jpeg','pdf');
					if(in_array($filecheck24,$fileextstored24))
					{
						
						$destinationfile24 = '../upload/'.$filename24;
            move_uploaded_file($filetmp24,$destinationfile24);
            $ins_sql = "INSERT INTO `table2`(`sname2`, `event21`, `place21`, `position21`, `year21`, `certificate21`) VALUES ('$sname','$event24', '$place24', '$position24', '$year24','$destinationfile24')";
            $run_sql = mysqli_query($conn, $ins_sql); 
						
					}else{
              $errormsg = "file type Error";
              echo"<script>alert('please upload document in png jpg or pdf');</script>";
            }
                      
        }	

   /*<------------------------------------------------------------------------------>*/
    //25
    if(!empty($_POST['event25'])){
        $event25 = strip_tags($_POST['event25']);
        $place25 = strip_tags($_POST['place25']);
        $position25 = $_POST['position25'];
        $year25 = $_POST['year25'];	
      
		    	$errormsg = '';
					$file25 =$_FILES['file25'];
					$filename25 = $_FILES['file25']['name'];
					$fileerror25 = $_FILES['file25']['error'];
				    $filetmp25 = $_FILES['file25']['tmp_name'];
					
					$fileext25 =explode('.',$filename25);
					$filecheck25 = strtolower(end($fileext25));
					
					$fileextstored25 = array('png','jpg','jpeg','pdf');
					if(in_array($filecheck25,$fileextstored25))
					{
						
						$destinationfile25 = '../upload/'.$filename25;
            move_uploaded_file($filetmp25,$destinationfile25);
            $ins_sql = "INSERT INTO `table2`(`sname2`, `event21`, `place21`, `position21`, `year21`, `certificate21`) VALUES ('$sname','$event25', '$place25', '$position25', '$year25','$destinationfile25')";
            $run_sql = mysqli_query($conn, $ins_sql);
						
					}else{
              $errormsg = "file type Error";
              echo"<script>alert('please upload document in png jpg or pdf');</script>";
            }		
                
        }
/*<-------------------------------------------------------------------------------->*/
                         //31
     if(!empty($_POST['event31'])){
          $event31 = strip_tags($_POST['event31']);
          $place31 = strip_tags($_POST['place31']);
          $achievement31 = $_POST['achievement31'];
          $level31 = $_POST['level31'];
          $year31 = $_POST['year31']; 
			
                    $errormsg = '';
					$file31 =$_FILES['file31'];
					$filename31 = $_FILES['file31']['name'];
					$fileerror31 = $_FILES['file31']['error'];
				    $filetmp31 = $_FILES['file31']['tmp_name'];
					
					$fileext31 =explode('.',$filename31);
					$filecheck31 = strtolower(end($fileext31));
					
					$fileextstored31 = array('png','jpg','jpeg','pdf');
					if(in_array($filecheck31,$fileextstored31))
					{
						
						$destinationfile31 = '../upload/'.$filename31;
            move_uploaded_file($filetmp31,$destinationfile31);
            $ins_sql = "INSERT INTO `table3`(`sname3`, `event31`, `place31`, `achievement31`, `achiev31`, `year31`, `certificate31`) VALUES ('$sname','$event31', '$place31', '$achievement31','$level31', '$year31','$destinationfile31')";
            $run_sql = mysqli_query($conn, $ins_sql); 
						
					}else{
              $errormsg = "file type Error";
              echo"<script>alert('please upload document in png jpg or pdf');</script>";
            }
           
        }
			
/*<----------------------------------------------------------------------------------------->*/
                    //32
     if(!empty($_POST['event32'])){
          $event32 = strip_tags($_POST['event32']);
          $place32 = strip_tags($_POST['place32']);
          $achievement32 = $_POST['achievement32'];
          $level32 = $_POST['level32'];
          $year32 = $_POST['year32']; 
          
          $errormsg = '';
					$file32 =$_FILES['file32'];
					$filename32 = $_FILES['file32']['name'];
					$fileerror32 = $_FILES['file32']['error'];
				    $filetmp32 = $_FILES['file32']['tmp_name'];
					
					$fileext32 =explode('.',$filename32);
					$filecheck32 = strtolower(end($fileext32));
					
					$fileextstored32 = array('png','jpg','jpeg','pdf');
					if(in_array($filecheck32,$fileextstored32))
					{
						
						$destinationfile32 = '../upload/'.$filename32;
            move_uploaded_file($filetmp32,$destinationfile32);
            $ins_sql = "INSERT INTO `table3`(`sname3`, `event31`, `place31`, `achievement31`, `achiev31`, `year31`, `certificate31`) VALUES ('$sname','$event32', '$place32', '$achievement32','$level32', '$year32','$destinationfile32')";
            $run_sql = mysqli_query($conn, $ins_sql); 
						
					}else{
              $errormsg = "file type Error";
              echo"<script>alert('please upload document in png jpg or pdf');</script>";
            }
           
        }	
    /*<--------------------------------------------------------------------------------------------->*/
                      //33
      if(!empty($_POST['event33'])){
						
          $event33 = strip_tags($_POST['event33']);
          $place33 = strip_tags($_POST['place33']);
          $achievement33 = $_POST['achievement33'];
          $level33 = $_POST['level33'];
          $year33 = $_POST['year33']; 
			
          $errormsg = '';
					$file33 =$_FILES['file33'];
					$filename33 = $_FILES['file33']['name'];
					$fileerror33 = $_FILES['file33']['error'];
				    $filetmp33 = $_FILES['file33']['tmp_name'];
					
					$fileext33 =explode('.',$filename33);
					$filecheck33 = strtolower(end($fileext33));
					
					$fileextstored33 = array('png','jpg','jpeg','pdf');
					if(in_array($filecheck33,$fileextstored33))
					{
						
						$destinationfile33 = '../upload/'.$filename33;
            move_uploaded_file($filetmp33,$destinationfile33);
            $ins_sql = "INSERT INTO `table3`(`sname3`, `event31`, `place31`, `achievement31`, `achiev31`, `year31`, `certificate31`) VALUES ('$sname','$event33', '$place33', '$achievement33','$level33', '$year33','$destinationfile33')";
            $run_sql = mysqli_query($conn, $ins_sql);
						
					}else{
              $errormsg = "file type Error";
              echo"<script>alert('please upload document in png jpg or pdf');</script>";
            }
          
        }		
			/*<------------------------------------------------------------------------------------->*/
                           //34
      if(!empty($_POST['event34'])){
          $event34 = strip_tags($_POST['event34']);
          $place34 = strip_tags($_POST['place34']);
          $achievement34 = $_POST['achievement34'];
          $level34 = $_POST['level34'];
          $year34 = $_POST['year34']; 
			
          $errormsg = '';
					$file34 =$_FILES['file34'];
					$filename34 = $_FILES['file34']['name'];
					$fileerror34 = $_FILES['file34']['error'];
				    $filetmp34 = $_FILES['file34']['tmp_name'];
					
					$fileext34 =explode('.',$filename34);
					$filecheck34 = strtolower(end($fileext34));
					
					$fileextstored34 = array('png','jpg','jpeg','pdf');
					if(in_array($filecheck34,$fileextstored34))
					{
						
						$destinationfile34 = '../upload/'.$filename34;
            move_uploaded_file($filetmp34,$destinationfile34);
            $ins_sql = "INSERT INTO `table3`(`sname3`, `event31`, `place31`, `achievement31`, `achiev31`, `year31`, `certificate31`) VALUES ('$sname','$event34', '$place34', '$achievement34','$level34', '$year34','$destinationfile34')";
            $run_sql = mysqli_query($conn, $ins_sql);
						
					}else{
              $errormsg = "file type Error";
              echo"<script>alert('please upload document in png jpg or pdf');</script>";
            }
           
        }							
		/*<-------------------------------------------------------------------------------->*/
        //35
      if(!empty($_POST['event35'])){
          $event35 = strip_tags($_POST['event35']);
          $place35 = strip_tags($_POST['place35']);
          $achievement35 = $_POST['achievement35'];
          $level35 = $_POST['level35'];
          $year35 = $_POST['year35']; 
			
          $errormsg = '';
					$file35 =$_FILES['file35'];
					$filename35 = $_FILES['file35']['name'];
					$fileerror35 = $_FILES['file35']['error'];
				    $filetmp35 = $_FILES['file35']['tmp_name'];
					
					$fileext35 =explode('.',$filename35);
					$filecheck35 = strtolower(end($fileext35));
					
					$fileextstored35 = array('png','jpg','jpeg','pdf');
					if(in_array($filecheck35,$fileextstored35))
					{
						
						$destinationfile35 = '../upload/'.$filename35;
            move_uploaded_file($filetmp35,$destinationfile35);
            $ins_sql = "INSERT INTO `table3`(`sname3`, `event31`, `place31`, `achievement31`, `achiev31`, `year31`, `certificate31`) VALUES ('$sname','$event35', '$place35', '$achievement35','$level35', '$year35','$destinationfile35')";
            $run_sql = mysqli_query($conn, $ins_sql);
						
					}else{
              $errormsg = "file type Error";
              echo"<script>alert('please upload document in png jpg or pdf');</script>";
            }
          
        }
			
  if($run_sql)
	{
    echo "<script>alert('Data Successfully Stored')</script>";
    echo "<script>window.open('applicationform.php', '_self')</script>";
		//header('location:form1.php');
	}
	
	/*else
	{
		echo 'there were errors while saving the data';
	}*/
											
	}
?>

<html>
<body>
<head>
   <title>Personal Details </title>
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
			  
			      <div align="left" style="font-size:22px">
                      <a href="applicationform.php?sname=<?php echo $sname?>">
                      <svg class="bi bi-arrow-left-circle-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.646 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L6.207 7.5H11a.5.5 0 0 1 0 1H6.207l2.147 2.146z"/>
</svg>
                      <span>Back</span>
                      </a></div>
			        <br>
				<div class="section-title">
					<h3> Extracurricular Activites</h3>
					
				</div>
                        <form action="" method="post" enctype="multipart/form-data">
						<?php  
						if($status==0){?>
              <div class="heading">
                <h5>Internal(Cultural/sports/Technical event)</h5></div>
                <div align="center">
                  <table width="1116" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <th width="55"><div align="center">Sr.No.</div></th>
                      <th width="300"><div align="center">Event/s</div></th>
                      <th width="300"><div align="center">Place</div></th>
                      <th width="300"><div align="center">Achievement</div></th>
                      <th width="300"><div align="center">Year</div></th>
                      <th width="300"><div align="center">Upload Certificate</div></th>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>
                        <input type="text" name="event11" >
                      </td>
                      
                      <td>
                        <input type="text" name="place11" >
                      </td>
                      <td>
                        <select name="achievement11">
                          <option value="" >---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                      </td>
                      
                         <td><select name="year11">
                      <option value="" >----select year---</option>
                      <option >2015</option>
                      <option >2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    <td>
                        <p ><input type="file" name="file11" ></p>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>
                        <input type="text" name="event12" >
                     </td>
                      <td>
                        <input type="text" name="place12" >
                     </td>
                      <td>
                        <select name="achievement12" id="select6">
                          <option value="" >---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                      </td>
                     
                        <td><select name="year12">
                      <option value="">----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                        <td>
                        <p ><input type="file" name="file12" ></p>
                        </td> 
                      
              </tr>
                    <tr>
                      <td>3</td>
                      <td>
                        <input type="text" name="event13" >
                      </td>
                      <td>
                        <input type="text" name="place13" >
                 <td>
                        <select name="achievement13" size="1" id="select7">
                          <option value="" >---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                     </td>
                     
                          <td><select name="year13">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                      
                      <td>
                        
                        <p ><input type="file" name="file13" ></p>
                      </td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>
                        <input type="text" name="event14" >
                     </td>
                      <td>
                        <input type="text" name="place14" >
                     </td>
                      <td>
                        <select name="achievement14" id="select8">
                          <option value="" >---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                      </td>
                        <td><select name="year14">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                      <td>
                        
                        <p ><input type="file" name="file14"></p>
                      </td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>
                        <input type="text" name="event15">
                      </td>
                      <td>
                        <input type="text" name="place15">
                      </td>
                      <td>
                        <select name="achievement15" id="select9">
                          <option value="">---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                      </td>
                        <td><select name="year15">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                      
                      <td>
                        
                        <p ><input type="file" name="file15"></p>
                      </td>
                    </tr>
                  </table>
                  
                </div>
              <div class="heading">
<h5>Event/s orgnized(Event In charge/Committee Member)</h5></div>
              <div align="center">
                <table width="1116" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="55"><div align="center">Sr.No. </div></th>
                    <th width="300"><div align="center">Event/s</div></th>
                    <th width="300"><div align="center">Place</div></th>
                    <th width="300"><div align="center">Position held</div></th>
                    <th width="300"><div align="center">Year</div></th>
                    <th width="300"><div align="center">Upload Certificate</div></th>
                    </tr>
                  <tr>
                    <td>1</td>
                    <td>
                      <input type="text" name="event21">
                    </td>
                    <td>
                      <input type="text" name="place21">
                    </td>
                    
                    <td>
                      <select name="position21">
                        <option value="">---select option--</option>
                        <option>Head</option>
                        <option>Member</option>
                      </select>
                    </td>
                     <td><select name="year21">
                      <option value="">----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      <p><input type="file" name="file21"></p>
                    </td>
                    
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>
                      <input type="text" name="event22" >
                    </td>
                    <td>
                      <input type="text" name="place22">
                   </td>
                    <td>
                      <select name="position22" id="select6">
                        <option value="">---select option--</option>
                        <option>Head</option>
                        <option>Member</option>
                        
                      </select>
                    </td>
                     <td><select name="year22">
                      <option value="">----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p ><input type="file" name="file22"></p>
                  </td>
                  
                  
                  </tr>
               
                  
                  <tr>
                    <td>3</td>
                    <td>
                      <input type="text" name="event23">
                   </td>
                    <td>
                      <input type="text" name="place23">
                   </td>
                    <td>

                        <select name="position23" size="1" id="select7">
                          <option value="">---select option--</option>
                          <option>Head</option>
                          <option>Member</option>
                        </select>
                   </td>
                      <td><select name="year23">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      <p ><input type="file" name="file23"></p>
                    </td>
            
                  
                  </tr>
              
                  <tr>
                    <td>4</td>
                    <td>
                      <input type="text" name="event24">
                  </td>
                    <td>
                      <input type="text" name="place24">
                   </td>
                    <td>
                      <select name="position24" id="select8">
                        <option value="">---select option--</option>
                        <option>Head</option>
                        <option>Member</option>
                        
                      </select>
                   </td>
                      <td><select name="year24">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      
                      <p >
                      <input type="file" name="file24"></p>
                      
                  </td>
                 
                  
                  </tr>
             
                  <tr>
                    <td>5</td>
                    <td>
                      <input type="text" name="event25">
                  </td>
                    <td>
                      <input type="text" name="place25">
                   </td>
                    <td>
                      <select name="position25" id="select9">
                        <option value="">--select option--</option>
                        <option>Head</option>
                        <option>Member</option>
                        
                      </select>
                   </td>
                      <td><select name="year25">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      <p>
                       <input type="file" name="file25"></p>
                      
                    </td>
                </table>
                
              </div>
              <div class="heading">
<h5>External Participation(Cultural/sports/Technical event)</h5></div>
 <div align="center">
    <table width="1116" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="55"><div align="center">Sr.No. </div></th>
                    <th width="300"><div align="center">Event/s</div></th>
                    <th width="300"><div align="center">Place</div></th>
                    <th width="300"><div align="center">Achievement</div></th>
                    <th width="300"><div align="center">ACHIVEMENT LEVEL</div></th>
                    <th width="300"><div align="center">Year</div></th>
                    <th width="300"><div align="center">Upload Certificate</div></th>
                    </tr>
                  <tr>
                    <td>1</td>
                    <td>
                      <input type="text" name="event31">
                    </td>
                    <td>
                      <input type="text" name="place31">
                    </td>
                    
                    <td>
                      <select name="achievement31">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                      </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level31">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                      <td><select name="year31">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p><input type="file" name="file31"></p>
                      </td>
                    
                    
                    
                    </tr>
                  <tr>
                    <td>2</td>
                    <td>
                      <input type="text" name="event32">
                    </td>
                    <td>
                      <input type="text" name="place32">
                    </td>
                    <td>
                      <select name="achievement32" id="select6">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                      </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level32">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                     <td><select name="year32">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p ><input type="file" name="file32"></p>
                      </td>
                    </tr>
                  <tr>
                    <td>3</td>
                    <td>
                      <input type="text" name="event33">
                    </td>
                    <td>
                      <input type="text" name="place33">
                    </td>
                    <td>
                      
                      <select name="achievement33" size="1" id="select7">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                        </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level33">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                      <td><select name="year33">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p><input type="file" name="file33"></p>
                    </td>
                    
                    </tr>
                  <tr>
                    <td>4</td>
                    <td>
                      <input type="text" name="event34">
                    </td>
                    <td>
                      <input type="text" name="place34">
                    </td>
                    <td>
                      <select name="achievement34" id="select8">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                      </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level34">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                     <td><select name="year34">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p ><input type="file" name="file34"></p>
                    </td>
                    </tr>
                  <tr>
                    <td>5</td>
                    <td>
                      <input type="text" name="event35">
                    </td>
                    <td>
                      <input type="text" name="place35">
                    </td>
                    <td>
                      <select name="achievement35" id="select9">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                      </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level35">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                      <td><select name="year35">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    <td>
                      
                      <p><input type="file" name="file35"></p>
                    </td>
                    </tr>
                  </table>
                
</div>
              <div align="center">
                <input type="submit" name="submit" id="submit" value="submit">
                      </div>
						
				<!-- form with filled details -->
						<?php }else if($status==1){ ?>
						  
				<div class="heading">
                <h5>Internal(Cultural/sports/Technical event)</h5></div>
                <div align="center">
                  <table width="1116" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <th width="55"><div align="center">Sr.No.</div></th>
                      <th width="300"><div align="center">Event/s</div></th>
                      <th width="300"><div align="center">Place</div></th>
                      <th width="300"><div align="center">Achievement</div></th>
                      <th width="300"><div align="center">Year</div></th>
                      <th width="300"><div align="center">Upload Certificate</div></th>
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
                    <td><a href="viewdocactivity.php?doc=<?php echo $row1['certificate'];?>&sname=<?php echo $row1['sname1'];?>">View Document</a>
					           					
                    </td>
					  
                  </tr><?php $cnt=$cnt+1; }?>
                  
</table>  
                   </div>
              <div class="heading">
<h5>Event/s orgnized(Event In charge/Committee Member)</h5></div>
              <div align="center">
                <table width="1116" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="55"><div align="center">Sr.No. </div></th>
                    <th width="300"><div align="center">Event/s</div></th>
                    <th width="300"><div align="center">Place</div></th>
                    <th width="300"><div align="center">Position held</div></th>
                    <th width="300"><div align="center">Year</div></th>
                    <th width="300"><div align="center">Upload Certificate</div></th>
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
                    <td><a href="viewdocactivity.php?doc=<?php echo $row1['certificate21'];?>&sname=<?php echo $row1['sname2'];?>">View Document</a>
					</td>
				  </tr>
					<?php $cn=$cn+1; }?>
                   
</table>
                    
                
              </div>
              <div class="heading">
<h5>External Participation(Cultural/sports/Technical event)</h5></div>
 <div align="center">
    <table width="1116" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="55"><div align="center">Sr.No. </div></th>
                    <th width="300"><div align="center">Event/s</div></th>
                    <th width="300"><div align="center">Place</div></th>
                    <th width="300"><div align="center">Achievement</div></th>
                    <th width="300"><div align="center">ACHIVEMENT LEVEL</div></th>
                    <th width="300"><div align="center">Year</div></th>
                    <th width="300"><div align="center">Upload Certificate</div></th>
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
                    
                    <td><a href="viewdocactivity.php?doc=<?php echo $row1['certificate31'];?>&sname=<?php echo $row1['sname3'];?>">View Document</a>
					</td>
				  </tr>
					<?php $c=$c+1; }?>
                   
</table>
                
</div>
              <div align="center">
                <input type="submit" name="edit" id="edit" value="Edit">
                      </div>
					   <!--- Tabel 2 && Tabel 3 Empty ---->
						<?php }else if($status==2){?>
							<div class="heading">
                <h5>Internal(Cultural/sports/Technical event)</h5></div>
                <div align="center">
                  <table width="1116" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <th width="55"><div align="center">Sr.No.</div></th>
                      <th width="300"><div align="center">Event/s</div></th>
                      <th width="300"><div align="center">Place</div></th>
                      <th width="300"><div align="center">Achievement</div></th>
                      <th width="300"><div align="center">Year</div></th>
                      <th width="300"><div align="center">Upload Certificate</div></th>
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
                    <td><a href="viewdocactivity.php?doc=<?php echo $row1['certificate'];?>&sname=<?php echo $row1['sname1'];?>">View Document</a>
					           					
                    </td>
					  
                  </tr><?php $cnt=$cnt+1; }?>
				
                    <tr>
                      <td><?php echo $cnt++?></td>
                      <td>
                        <input type="text" name="event11" >
                      </td>
                      
                      <td>
                        <input type="text" name="place11" >
                      </td>
                      <td>
                        <select name="achievement11">
                          <option value="" >---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                      </td>
                      
                         <td><select name="year11">
                      <option value="" >----select year---</option>
                      <option >2015</option>
                      <option >2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    <td>
                        <p ><input type="file" name="file11" ></p>
                      </td>
                    </tr>
					
					
                    <tr>
                      <td><?php echo $cnt++;?></td>
                      <td>
                        <input type="text" name="event12" >
                     </td>
                      <td>
                        <input type="text" name="place12" >
                     </td>
                      <td>
                        <select name="achievement12" id="select6">
                          <option value="" >---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                      </td>
                     
                        <td><select name="year12">
                      <option value="">----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                        <td>
                        <p ><input type="file" name="file12" ></p>
                        </td> 
                      
              </tr>
                   
					
                  </table>
                  
                </div>
              <div class="heading">
<h5>Event/s orgnized(Event In charge/Committee Member)</h5></div>
              <div align="center">
                <table width="1116" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="55"><div align="center">Sr.No. </div></th>
                    <th width="300"><div align="center">Event/s</div></th>
                    <th width="300"><div align="center">Place</div></th>
                    <th width="300"><div align="center">Position held</div></th>
                    <th width="300"><div align="center">Year</div></th>
                    <th width="300"><div align="center">Upload Certificate</div></th>
                    </tr>
                  <tr>
                    <td>1</td>
                    <td>
                      <input type="text" name="event21">
                    </td>
                    <td>
                      <input type="text" name="place21">
                    </td>
                    
                    <td>
                      <select name="position21">
                        <option value="">---select option--</option>
                        <option>Head</option>
                        <option>Member</option>
                      </select>
                    </td>
                     <td><select name="year21">
                      <option value="">----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      <p><input type="file" name="file21"></p>
                    </td>
                    
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>
                      <input type="text" name="event22" >
                    </td>
                    <td>
                      <input type="text" name="place22">
                   </td>
                    <td>
                      <select name="position22" id="select6">
                        <option value="">---select option--</option>
                        <option>Head</option>
                        <option>Member</option>
                        
                      </select>
                    </td>
                     <td><select name="year22">
                      <option value="">----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p ><input type="file" name="file22"></p>
                  </td>
                  
                  
                  </tr>
               
                  
                  <tr>
                    <td>3</td>
                    <td>
                      <input type="text" name="event23">
                   </td>
                    <td>
                      <input type="text" name="place23">
                   </td>
                    <td>

                        <select name="position23" size="1" id="select7">
                          <option value="">---select option--</option>
                          <option>Head</option>
                          <option>Member</option>
                        </select>
                   </td>
                      <td><select name="year23">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      <p ><input type="file" name="file23"></p>
                    </td>
            
                  
                  </tr>
              
                  <tr>
                    <td>4</td>
                    <td>
                      <input type="text" name="event24">
                  </td>
                    <td>
                      <input type="text" name="place24">
                   </td>
                    <td>
                      <select name="position24" id="select8">
                        <option value="">---select option--</option>
                        <option>Head</option>
                        <option>Member</option>
                        
                      </select>
                   </td>
                      <td><select name="year24">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      
                      <p >
                      <input type="file" name="file24"></p>
                      
                  </td>
                 
                  
                  </tr>
             
                  <tr>
                    <td>5</td>
                    <td>
                      <input type="text" name="event25">
                  </td>
                    <td>
                      <input type="text" name="place25">
                   </td>
                    <td>
                      <select name="position25" id="select9">
                        <option value="">--select option--</option>
                        <option>Head</option>
                        <option>Member</option>
                        
                      </select>
                   </td>
                      <td><select name="year25">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      <p>
                       <input type="file" name="file25"></p>
                      
                    </td>
                </table>
                
              </div>
              <div class="heading">
<h5>External Participation(Cultural/sports/Technical event)</h5></div>
 <div align="center">
    <table width="1116" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="55"><div align="center">Sr.No. </div></th>
                    <th width="300"><div align="center">Event/s</div></th>
                    <th width="300"><div align="center">Place</div></th>
                    <th width="300"><div align="center">Achievement</div></th>
                    <th width="300"><div align="center">ACHIVEMENT LEVEL</div></th>
                    <th width="300"><div align="center">Year</div></th>
                    <th width="300"><div align="center">Upload Certificate</div></th>
                    </tr>
                  <tr>
                    <td>1</td>
                    <td>
                      <input type="text" name="event31">
                    </td>
                    <td>
                      <input type="text" name="place31">
                    </td>
                    
                    <td>
                      <select name="achievement31">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                      </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level31">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                      <td><select name="year31">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p><input type="file" name="file31"></p>
                      </td>
                    
                    
                    
                    </tr>
                  <tr>
                    <td>2</td>
                    <td>
                      <input type="text" name="event32">
                    </td>
                    <td>
                      <input type="text" name="place32">
                    </td>
                    <td>
                      <select name="achievement32" id="select6">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                      </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level32">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                     <td><select name="year32">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p ><input type="file" name="file32"></p>
                      </td>
                    </tr>
                  <tr>
                    <td>3</td>
                    <td>
                      <input type="text" name="event33">
                    </td>
                    <td>
                      <input type="text" name="place33">
                    </td>
                    <td>
                      
                      <select name="achievement33" size="1" id="select7">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                        </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level33">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                      <td><select name="year33">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p><input type="file" name="file33"></p>
                    </td>
                    
                    </tr>
                  <tr>
                    <td>4</td>
                    <td>
                      <input type="text" name="event34">
                    </td>
                    <td>
                      <input type="text" name="place34">
                    </td>
                    <td>
                      <select name="achievement34" id="select8">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                      </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level34">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                     <td><select name="year34">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p ><input type="file" name="file34"></p>
                    </td>
                    </tr>
                  <tr>
                    <td>5</td>
                    <td>
                      <input type="text" name="event35">
                    </td>
                    <td>
                      <input type="text" name="place35">
                    </td>
                    <td>
                      <select name="achievement35" id="select9">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                      </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level35">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                      <td><select name="year35">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    <td>
                      
                      <p><input type="file" name="file35"></p>
                    </td>
                    </tr>
                  </table>
                
</div>
              <div align="center">
                <input type="submit" name="submit" id="submit" value="submit">
                      </div>
					  
					  
					  <!----- Tabel 1 & Tabel 3 Empty --->
						<?php }else if($status==3) {?>
						 <div class="heading">
                <h5>Internal(Cultural/sports/Technical event)</h5></div>
                <div align="center">
                  <table width="1116" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <th width="55"><div align="center">Sr.No.</div></th>
                      <th width="300"><div align="center">Event/s</div></th>
                      <th width="300"><div align="center">Place</div></th>
                      <th width="300"><div align="center">Achievement</div></th>
                      <th width="300"><div align="center">Year</div></th>
                      <th width="300"><div align="center">Upload Certificate</div></th>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>
                        <input type="text" name="event11" >
                      </td>
                      
                      <td>
                        <input type="text" name="place11" >
                      </td>
                      <td>
                        <select name="achievement11">
                          <option value="" >---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                      </td>
                      
                         <td><select name="year11">
                      <option value="" >----select year---</option>
                      <option >2015</option>
                      <option >2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    <td>
                        <p ><input type="file" name="file11" ></p>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>
                        <input type="text" name="event12" >
                     </td>
                      <td>
                        <input type="text" name="place12" >
                     </td>
                      <td>
                        <select name="achievement12" id="select6">
                          <option value="" >---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                      </td>
                     
                        <td><select name="year12">
                      <option value="">----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                        <td>
                        <p ><input type="file" name="file12" ></p>
                        </td> 
                      
              </tr>
                    <tr>
                      <td>3</td>
                      <td>
                        <input type="text" name="event13" >
                      </td>
                      <td>
                        <input type="text" name="place13" >
                 <td>
                        <select name="achievement13" size="1" id="select7">
                          <option value="" >---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                     </td>
                     
                          <td><select name="year13">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                      
                      <td>
                        
                        <p ><input type="file" name="file13" ></p>
                      </td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>
                        <input type="text" name="event14" >
                     </td>
                      <td>
                        <input type="text" name="place14" >
                     </td>
                      <td>
                        <select name="achievement14" id="select8">
                          <option value="" >---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                      </td>
                        <td><select name="year14">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                      <td>
                        
                        <p ><input type="file" name="file14"></p>
                      </td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>
                        <input type="text" name="event15">
                      </td>
                      <td>
                        <input type="text" name="place15">
                      </td>
                      <td>
                        <select name="achievement15" id="select9">
                          <option value="">---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                      </td>
                        <td><select name="year15">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                      
                      <td>
                        
                        <p ><input type="file" name="file15"></p>
                      </td>
                    </tr>
                  </table>
                  
                </div>
              <div class="heading">
<h5>Event/s orgnized(Event In charge/Committee Member)</h5></div>
              <div align="center">
                <table width="1116" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="55"><div align="center">Sr.No. </div></th>
                    <th width="300"><div align="center">Event/s</div></th>
                    <th width="300"><div align="center">Place</div></th>
                    <th width="300"><div align="center">Position held</div></th>
                    <th width="300"><div align="center">Year</div></th>
                    <th width="300"><div align="center">Upload Certificate</div></th>
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
                    <td><a href="viewdocactivity.php?doc=<?php echo $row1['certificate21'];?>&sname=<?php echo $row1['sname2'];?>">View Document</a>
					</td>
				  </tr>
					<?php $cn=$cn+1; }?>
                  <tr>
                    <td><?php echo $cn++;?></td>
                    <td>
                      <input type="text" name="event21">
                    </td>
                    <td>
                      <input type="text" name="place21">
                    </td>
                    
                    <td>
                      <select name="position21">
                        <option value="">---select option--</option>
                        <option>Head</option>
                        <option>Member</option>
                      </select>
                    </td>
                     <td><select name="year21">
                      <option value="">----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      <p><input type="file" name="file21"></p>
                    </td>
                    
                  </tr>
                  <tr>
                    <td><?php echo $cn++;?></td>
                    <td>
                      <input type="text" name="event22" >
                    </td>
                    <td>
                      <input type="text" name="place22">
                   </td>
                    <td>
                      <select name="position22" id="select6">
                        <option value="">---select option--</option>
                        <option>Head</option>
                        <option>Member</option>
                        
                      </select>
                    </td>
                     <td><select name="year22">
                      <option value="">----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p ><input type="file" name="file22"></p>
                  </td>
                  
                  
                  </tr>
               
                  
                  
                </table>
                
              </div>
              <div class="heading">
<h5>External Participation(Cultural/sports/Technical event)</h5></div>
 <div align="center">
    <table width="1116" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="55"><div align="center">Sr.No. </div></th>
                    <th width="300"><div align="center">Event/s</div></th>
                    <th width="300"><div align="center">Place</div></th>
                    <th width="300"><div align="center">Achievement</div></th>
                    <th width="300"><div align="center">ACHIVEMENT LEVEL</div></th>
                    <th width="300"><div align="center">Year</div></th>
                    <th width="300"><div align="center">Upload Certificate</div></th>
                    </tr>
                  <tr>
                    <td>1</td>
                    <td>
                      <input type="text" name="event31">
                    </td>
                    <td>
                      <input type="text" name="place31">
                    </td>
                    
                    <td>
                      <select name="achievement31">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                      </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level31">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                      <td><select name="year31">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p><input type="file" name="file31"></p>
                      </td>
                    
                    
                    
                    </tr>
                  <tr>
                    <td>2</td>
                    <td>
                      <input type="text" name="event32">
                    </td>
                    <td>
                      <input type="text" name="place32">
                    </td>
                    <td>
                      <select name="achievement32" id="select6">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                      </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level32">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                     <td><select name="year32">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p ><input type="file" name="file32"></p>
                      </td>
                    </tr>
                  <tr>
                    <td>3</td>
                    <td>
                      <input type="text" name="event33">
                    </td>
                    <td>
                      <input type="text" name="place33">
                    </td>
                    <td>
                      
                      <select name="achievement33" size="1" id="select7">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                        </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level33">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                      <td><select name="year33">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p><input type="file" name="file33"></p>
                    </td>
                    
                    </tr>
                  <tr>
                    <td>4</td>
                    <td>
                      <input type="text" name="event34">
                    </td>
                    <td>
                      <input type="text" name="place34">
                    </td>
                    <td>
                      <select name="achievement34" id="select8">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                      </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level34">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                     <td><select name="year34">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p ><input type="file" name="file34"></p>
                    </td>
                    </tr>
                  <tr>
                    <td>5</td>
                    <td>
                      <input type="text" name="event35">
                    </td>
                    <td>
                      <input type="text" name="place35">
                    </td>
                    <td>
                      <select name="achievement35" id="select9">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                      </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level35">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                      <td><select name="year35">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    <td>
                      
                      <p><input type="file" name="file35"></p>
                    </td>
                    </tr>
                  </table>
                
</div>
              <div align="center">
                <input type="submit" name="submit" id="submit" value="submit">
                      </div>
					  <!----Tabel 1 && Tabel 2 Empty---->
						<?php }else if($status==4){?>
						<div class="heading">
                <h5>Internal(Cultural/sports/Technical event)</h5></div>
                <div align="center">
                  <table width="1116" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <th width="55"><div align="center">Sr.No.</div></th>
                      <th width="300"><div align="center">Event/s</div></th>
                      <th width="300"><div align="center">Place</div></th>
                      <th width="300"><div align="center">Achievement</div></th>
                      <th width="300"><div align="center">Year</div></th>
                      <th width="300"><div align="center">Upload Certificate</div></th>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>
                        <input type="text" name="event11" >
                      </td>
                      
                      <td>
                        <input type="text" name="place11" >
                      </td>
                      <td>
                        <select name="achievement11">
                          <option value="" >---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                      </td>
                      
                         <td><select name="year11">
                      <option value="" >----select year---</option>
                      <option >2015</option>
                      <option >2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    <td>
                        <p ><input type="file" name="file11" ></p>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>
                        <input type="text" name="event12" >
                     </td>
                      <td>
                        <input type="text" name="place12" >
                     </td>
                      <td>
                        <select name="achievement12" id="select6">
                          <option value="" >---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                      </td>
                     
                        <td><select name="year12">
                      <option value="">----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                        <td>
                        <p ><input type="file" name="file12" ></p>
                        </td> 
                      
              </tr>
                    <tr>
                      <td>3</td>
                      <td>
                        <input type="text" name="event13" >
                      </td>
                      <td>
                        <input type="text" name="place13" >
                 <td>
                        <select name="achievement13" size="1" id="select7">
                          <option value="" >---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                     </td>
                     
                          <td><select name="year13">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                      
                      <td>
                        
                        <p ><input type="file" name="file13" ></p>
                      </td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>
                        <input type="text" name="event14" >
                     </td>
                      <td>
                        <input type="text" name="place14" >
                     </td>
                      <td>
                        <select name="achievement14" id="select8">
                          <option value="" >---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                      </td>
                        <td><select name="year14">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                      <td>
                        
                        <p ><input type="file" name="file14"></p>
                      </td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>
                        <input type="text" name="event15">
                      </td>
                      <td>
                        <input type="text" name="place15">
                      </td>
                      <td>
                        <select name="achievement15" id="select9">
                          <option value="">---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                      </td>
                        <td><select name="year15">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                      
                      <td>
                        
                        <p ><input type="file" name="file15"></p>
                      </td>
                    </tr>
                  </table>
                  
                </div>
              <div class="heading">
<h5>Event/s orgnized(Event In charge/Committee Member)</h5></div>
              <div align="center">
                <table width="1116" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="55"><div align="center">Sr.No. </div></th>
                    <th width="300"><div align="center">Event/s</div></th>
                    <th width="300"><div align="center">Place</div></th>
                    <th width="300"><div align="center">Position held</div></th>
                    <th width="300"><div align="center">Year</div></th>
                    <th width="300"><div align="center">Upload Certificate</div></th>
                    </tr>
                  <tr>
                    <td>1</td>
                    <td>
                      <input type="text" name="event21">
                    </td>
                    <td>
                      <input type="text" name="place21">
                    </td>
                    
                    <td>
                      <select name="position21">
                        <option value="">---select option--</option>
                        <option>Head</option>
                        <option>Member</option>
                      </select>
                    </td>
                     <td><select name="year21">
                      <option value="">----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      <p><input type="file" name="file21"></p>
                    </td>
                    
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>
                      <input type="text" name="event22" >
                    </td>
                    <td>
                      <input type="text" name="place22">
                   </td>
                    <td>
                      <select name="position22" id="select6">
                        <option value="">---select option--</option>
                        <option>Head</option>
                        <option>Member</option>
                        
                      </select>
                    </td>
                     <td><select name="year22">
                      <option value="">----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p ><input type="file" name="file22"></p>
                  </td>
                  
                  
                  </tr>
               
                  
                  <tr>
                    <td>3</td>
                    <td>
                      <input type="text" name="event23">
                   </td>
                    <td>
                      <input type="text" name="place23">
                   </td>
                    <td>

                        <select name="position23" size="1" id="select7">
                          <option value="">---select option--</option>
                          <option>Head</option>
                          <option>Member</option>
                        </select>
                   </td>
                      <td><select name="year23">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      <p ><input type="file" name="file23"></p>
                    </td>
            
                  
                  </tr>
              
                  <tr>
                    <td>4</td>
                    <td>
                      <input type="text" name="event24">
                  </td>
                    <td>
                      <input type="text" name="place24">
                   </td>
                    <td>
                      <select name="position24" id="select8">
                        <option value="">---select option--</option>
                        <option>Head</option>
                        <option>Member</option>
                        
                      </select>
                   </td>
                      <td><select name="year24">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      
                      <p >
                      <input type="file" name="file24"></p>
                      
                  </td>
                 
                  
                  </tr>
             
                  <tr>
                    <td>5</td>
                    <td>
                      <input type="text" name="event25">
                  </td>
                    <td>
                      <input type="text" name="place25">
                   </td>
                    <td>
                      <select name="position25" id="select9">
                        <option value="">--select option--</option>
                        <option>Head</option>
                        <option>Member</option>
                        
                      </select>
                   </td>
                      <td><select name="year25">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      <p>
                       <input type="file" name="file25"></p>
                      
                    </td>
                </table>
                
              </div>
              <div class="heading">
<h5>External Participation(Cultural/sports/Technical event)</h5></div>
 <div align="center">
    <table width="1116" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="55"><div align="center">Sr.No. </div></th>
                    <th width="300"><div align="center">Event/s</div></th>
                    <th width="300"><div align="center">Place</div></th>
                    <th width="300"><div align="center">Achievement</div></th>
                    <th width="300"><div align="center">ACHIVEMENT LEVEL</div></th>
                    <th width="300"><div align="center">Year</div></th>
                    <th width="300"><div align="center">Upload Certificate</div></th>
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
                    
                    <td><a href="viewdocactivity.php?doc=<?php echo $row1['certificate31'];?>&sname=<?php echo $row1['sname3'];?>">View Document</a>
					</td>
				  </tr>
					<?php $c=$c+1; }?>
                  <tr>
                    <td><?php echo $c++;?></td>
                    <td>
                      <input type="text" name="event31">
                    </td>
                    <td>
                      <input type="text" name="place31">
                    </td>
                    
                    <td>
                      <select name="achievement31">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                      </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level31">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                      <td><select name="year31">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p><input type="file" name="file31"></p>
                      </td>
                    
                    
                    
                    </tr>
                  <tr>
                    <td><?php echo $c++;?></td>
                    <td>
                      <input type="text" name="event32">
                    </td>
                    <td>
                      <input type="text" name="place32">
                    </td>
                    <td>
                      <select name="achievement32" id="select6">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                      </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level32">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                     <td><select name="year32">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p ><input type="file" name="file32"></p>
                      </td>
                    </tr>
                  <tr>
                   
                  </table>
                
</div>
<div align="center">
                <input type="submit" name="edit" id="edit" value="Edit">
                      </div>
                      <!---  Tabel 1 & Tabel 2 filled --->
						<?php }else if($status==5){?>
						<div class="heading">
                <h5>Internal(Cultural/sports/Technical event)</h5></div>
                <div align="center">
                  <table width="1116" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <th width="55"><div align="center">Sr.No.</div></th>
                      <th width="300"><div align="center">Event/s</div></th>
                      <th width="300"><div align="center">Place</div></th>
                      <th width="300"><div align="center">Achievement</div></th>
                      <th width="300"><div align="center">Year</div></th>
                      <th width="300"><div align="center">Upload Certificate</div></th>
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
                    <td><a href="viewdocactivity.php?doc=<?php echo $row1['certificate'];?>&sname=<?php echo $row1['sname1'];?>">View Document</a>
					           					
                    </td>
					  
                  </tr><?php $cnt=$cnt+1; }?>
				
                    <tr>
                      <td><?php echo $cnt++?></td>
                      <td>
                        <input type="text" name="event11" >
                      </td>
                      
                      <td>
                        <input type="text" name="place11" >
                      </td>
                      <td>
                        <select name="achievement11">
                          <option value="" >---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                      </td>
                      
                         <td><select name="year11">
                      <option value="" >----select year---</option>
                      <option >2015</option>
                      <option >2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    <td>
                        <p ><input type="file" name="file11" ></p>
                      </td>
                    </tr>
					
					
                    <tr>
                      <td><?php echo $cnt++;?></td>
                      <td>
                        <input type="text" name="event12" >
                     </td>
                      <td>
                        <input type="text" name="place12" >
                     </td>
                      <td>
                        <select name="achievement12" id="select6">
                          <option value="" >---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                      </td>
                     
                        <td><select name="year12">
                      <option value="">----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                        <td>
                        <p ><input type="file" name="file12" ></p>
                        </td> 
                      
              </tr>
                   
					
                  </table>
                  
                </div>
					<div class="heading">
<h5>Event/s orgnized(Event In charge/Committee Member)</h5></div>
              <div align="center">
                <table width="1116" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="55"><div align="center">Sr.No. </div></th>
                    <th width="300"><div align="center">Event/s</div></th>
                    <th width="300"><div align="center">Place</div></th>
                    <th width="300"><div align="center">Position held</div></th>
                    <th width="300"><div align="center">Year</div></th>
                    <th width="300"><div align="center">Upload Certificate</div></th>
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
                    <td><a href="viewdocactivity.php?doc=<?php echo $row1['certificate21'];?>&sname=<?php echo $row1['sname2'];?>">View Document</a>
					</td>
				  </tr>
					<?php $cn=$cn+1; }?>
                  <tr>
                    <td><?php echo $cn++;?></td>
                    <td>
                      <input type="text" name="event21">
                    </td>
                    <td>
                      <input type="text" name="place21">
                    </td>
                    
                    <td>
                      <select name="position21">
                        <option value="">---select option--</option>
                        <option>Head</option>
                        <option>Member</option>
                      </select>
                    </td>
                     <td><select name="year21">
                      <option value="">----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      <p><input type="file" name="file21"></p>
                    </td>
                    
                  </tr>
                  <tr>
                    <td><?php echo $cn++;?></td>
                    <td>
                      <input type="text" name="event22" >
                    </td>
                    <td>
                      <input type="text" name="place22">
                   </td>
                    <td>
                      <select name="position22" id="select6">
                        <option value="">---select option--</option>
                        <option>Head</option>
                        <option>Member</option>
                        
                      </select>
                    </td>
                     <td><select name="year22">
                      <option value="">----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p ><input type="file" name="file22"></p>
                  </td>
                  
                  
                  </tr>
               
                  
                  
                </table>
                
              </div>	 
              <div class="heading">
<h5>External Participation(Cultural/sports/Technical event)</h5></div>
 <div align="center">
    <table width="1116" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="55"><div align="center">Sr.No. </div></th>
                    <th width="300"><div align="center">Event/s</div></th>
                    <th width="300"><div align="center">Place</div></th>
                    <th width="300"><div align="center">Achievement</div></th>
                    <th width="300"><div align="center">ACHIVEMENT LEVEL</div></th>
                    <th width="300"><div align="center">Year</div></th>
                    <th width="300"><div align="center">Upload Certificate</div></th>
                    </tr>
                  <tr>
                    <td>1</td>
                    <td>
                      <input type="text" name="event31">
                    </td>
                    <td>
                      <input type="text" name="place31">
                    </td>
                    
                    <td>
                      <select name="achievement31">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                      </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level31">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                      <td><select name="year31">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p><input type="file" name="file31"></p>
                      </td>
                    
                    
                    
                    </tr>
                  <tr>
                    <td>2</td>
                    <td>
                      <input type="text" name="event32">
                    </td>
                    <td>
                      <input type="text" name="place32">
                    </td>
                    <td>
                      <select name="achievement32" id="select6">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                      </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level32">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                     <td><select name="year32">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p ><input type="file" name="file32"></p>
                      </td>
                    </tr>
                  <tr>
                    <td>3</td>
                    <td>
                      <input type="text" name="event33">
                    </td>
                    <td>
                      <input type="text" name="place33">
                    </td>
                    <td>
                      
                      <select name="achievement33" size="1" id="select7">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                        </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level33">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                      <td><select name="year33">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p><input type="file" name="file33"></p>
                    </td>
                    
                    </tr>
                  <tr>
                    <td>4</td>
                    <td>
                      <input type="text" name="event34">
                    </td>
                    <td>
                      <input type="text" name="place34">
                    </td>
                    <td>
                      <select name="achievement34" id="select8">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                      </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level34">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                     <td><select name="year34">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p ><input type="file" name="file34"></p>
                    </td>
                    </tr>
                  <tr>
                    <td>5</td>
                    <td>
                      <input type="text" name="event35">
                    </td>
                    <td>
                      <input type="text" name="place35">
                    </td>
                    <td>
                      <select name="achievement35" id="select9">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                      </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level35">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                      <td><select name="year35">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    <td>
                      
                      <p><input type="file" name="file35"></p>
                    </td>
                    </tr>
                  </table>
                
</div>
              <div align="center">
                <input type="submit" name="submit" id="submit" value="submit">
                      </div>
					  <!----Tabel 1 & Tabel 3 filled --->
						<?php }else if($status==6){?>
						<div class="heading">
                <h5>Internal(Cultural/sports/Technical event)</h5></div>
                <div align="center">
                  <table width="1116" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <th width="55"><div align="center">Sr.No.</div></th>
                      <th width="300"><div align="center">Event/s</div></th>
                      <th width="300"><div align="center">Place</div></th>
                      <th width="300"><div align="center">Achievement</div></th>
                      <th width="300"><div align="center">Year</div></th>
                      <th width="300"><div align="center">Upload Certificate</div></th>
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
                    <td><a href="viewdocactivity.php?doc=<?php echo $row1['certificate'];?>&sname=<?php echo $row1['sname1'];?>">View Document</a>
					           					
                    </td>
					  
                  </tr><?php $cnt=$cnt+1; }?>
				
                    <tr>
                      <td><?php echo $cnt++?></td>
                      <td>
                        <input type="text" name="event11" >
                      </td>
                      
                      <td>
                        <input type="text" name="place11" >
                      </td>
                      <td>
                        <select name="achievement11">
                          <option value="" >---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                      </td>
                      
                         <td><select name="year11">
                      <option value="" >----select year---</option>
                      <option >2015</option>
                      <option >2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    <td>
                        <p ><input type="file" name="file11" ></p>
                      </td>
                    </tr>
					
					
                    <tr>
                      <td><?php echo $cnt++;?></td>
                      <td>
                        <input type="text" name="event12" >
                     </td>
                      <td>
                        <input type="text" name="place12" >
                     </td>
                      <td>
                        <select name="achievement12" id="select6">
                          <option value="" >---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                      </td>
                     
                        <td><select name="year12">
                      <option value="">----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                        <td>
                        <p ><input type="file" name="file12" ></p>
                        </td> 
                      
              </tr>
                   
					
                  </table>
                  
                </div>
				<!------>
				 <div class="heading">
<h5>Event/s orgnized(Event In charge/Committee Member)</h5></div>
              <div align="center">
                <table width="1116" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="55"><div align="center">Sr.No. </div></th>
                    <th width="300"><div align="center">Event/s</div></th>
                    <th width="300"><div align="center">Place</div></th>
                    <th width="300"><div align="center">Position held</div></th>
                    <th width="300"><div align="center">Year</div></th>
                    <th width="300"><div align="center">Upload Certificate</div></th>
                    </tr>
                  <tr>
                    <td>1</td>
                    <td>
                      <input type="text" name="event21">
                    </td>
                    <td>
                      <input type="text" name="place21">
                    </td>
                    
                    <td>
                      <select name="position21">
                        <option value="">---select option--</option>
                        <option>Head</option>
                        <option>Member</option>
                      </select>
                    </td>
                     <td><select name="year21">
                      <option value="">----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      <p><input type="file" name="file21"></p>
                    </td>
                    
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>
                      <input type="text" name="event22" >
                    </td>
                    <td>
                      <input type="text" name="place22">
                   </td>
                    <td>
                      <select name="position22" id="select6">
                        <option value="">---select option--</option>
                        <option>Head</option>
                        <option>Member</option>
                        
                      </select>
                    </td>
                     <td><select name="year22">
                      <option value="">----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p ><input type="file" name="file22"></p>
                  </td>
                  
                  
                  </tr>
               
                  
                  <tr>
                    <td>3</td>
                    <td>
                      <input type="text" name="event23">
                   </td>
                    <td>
                      <input type="text" name="place23">
                   </td>
                    <td>

                        <select name="position23" size="1" id="select7">
                          <option value="">---select option--</option>
                          <option>Head</option>
                          <option>Member</option>
                        </select>
                   </td>
                      <td><select name="year23">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      <p ><input type="file" name="file23"></p>
                    </td>
            
                  
                  </tr>
              
                  <tr>
                    <td>4</td>
                    <td>
                      <input type="text" name="event24">
                  </td>
                    <td>
                      <input type="text" name="place24">
                   </td>
                    <td>
                      <select name="position24" id="select8">
                        <option value="">---select option--</option>
                        <option>Head</option>
                        <option>Member</option>
                        
                      </select>
                   </td>
                      <td><select name="year24">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      
                      <p >
                      <input type="file" name="file24"></p>
                      
                  </td>
                 
                  
                  </tr>
             
                  <tr>
                    <td>5</td>
                    <td>
                      <input type="text" name="event25">
                  </td>
                    <td>
                      <input type="text" name="place25">
                   </td>
                    <td>
                      <select name="position25" id="select9">
                        <option value="">--select option--</option>
                        <option>Head</option>
                        <option>Member</option>
                        
                      </select>
                   </td>
                      <td><select name="year25">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      <p>
                       <input type="file" name="file25"></p>
                      
                    </td>
                </table>
                
              </div>
				
				<div class="heading">
<h5>External Participation(Cultural/sports/Technical event)</h5></div>
 <div align="center">
    <table width="1116" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="55"><div align="center">Sr.No. </div></th>
                    <th width="300"><div align="center">Event/s</div></th>
                    <th width="300"><div align="center">Place</div></th>
                    <th width="300"><div align="center">Achievement</div></th>
                    <th width="300"><div align="center">ACHIVEMENT LEVEL</div></th>
                    <th width="300"><div align="center">Year</div></th>
                    <th width="300"><div align="center">Upload Certificate</div></th>
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
                    
                    <td><a href="viewdocactivity.php?doc=<?php echo $row1['certificate31'];?>&sname=<?php echo $row1['sname3'];?>">View Document</a>
					</td>
				  </tr>
					<?php $c=$c+1; }?>
                  <tr>
                    <td><?php echo $c++;?></td>
                    <td>
                      <input type="text" name="event31">
                    </td>
                    <td>
                      <input type="text" name="place31">
                    </td>
                    
                    <td>
                      <select name="achievement31">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                      </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level31">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                      <td><select name="year31">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p><input type="file" name="file31"></p>
                      </td>
                    
                    
                    
                    </tr>
                  <tr>
                    <td><?php echo $c++;?></td>
                    <td>
                      <input type="text" name="event32">
                    </td>
                    <td>
                      <input type="text" name="place32">
                    </td>
                    <td>
                      <select name="achievement32" id="select6">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                      </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level32">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                     <td><select name="year32">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p ><input type="file" name="file32"></p>
                      </td>
                    </tr>
                  <tr>
                   
                  </table>
                
</div>
              <div align="center">
                <input type="submit" name="submit" id="submit" value="submit">
                      </div>
						
						<!----Tabel 2 & Tabel 3 filled--->
						<?php }else if($status==7){?>
						 <div class="heading">
                <h5>Internal(Cultural/sports/Technical event)</h5></div>
                <div align="center">
                  <table width="1116" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <th width="55"><div align="center">Sr.No.</div></th>
                      <th width="300"><div align="center">Event/s</div></th>
                      <th width="300"><div align="center">Place</div></th>
                      <th width="300"><div align="center">Achievement</div></th>
                      <th width="300"><div align="center">Year</div></th>
                      <th width="300"><div align="center">Upload Certificate</div></th>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>
                        <input type="text" name="event11" >
                      </td>
                      
                      <td>
                        <input type="text" name="place11" >
                      </td>
                      <td>
                        <select name="achievement11">
                          <option value="" >---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                      </td>
                      
                         <td><select name="year11">
                      <option value="" >----select year---</option>
                      <option >2015</option>
                      <option >2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    <td>
                        <p ><input type="file" name="file11" ></p>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>
                        <input type="text" name="event12" >
                     </td>
                      <td>
                        <input type="text" name="place12" >
                     </td>
                      <td>
                        <select name="achievement12" id="select6">
                          <option value="" >---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                      </td>
                     
                        <td><select name="year12">
                      <option value="">----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                        <td>
                        <p ><input type="file" name="file12" ></p>
                        </td> 
                      
              </tr>
                    <tr>
                      <td>3</td>
                      <td>
                        <input type="text" name="event13" >
                      </td>
                      <td>
                        <input type="text" name="place13" >
                 <td>
                        <select name="achievement13" size="1" id="select7">
                          <option value="" >---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                     </td>
                     
                          <td><select name="year13">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                      
                      <td>
                        
                        <p ><input type="file" name="file13" ></p>
                      </td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>
                        <input type="text" name="event14" >
                     </td>
                      <td>
                        <input type="text" name="place14" >
                     </td>
                      <td>
                        <select name="achievement14" id="select8">
                          <option value="" >---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                      </td>
                        <td><select name="year14">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                      <td>
                        
                        <p ><input type="file" name="file14"></p>
                      </td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>
                        <input type="text" name="event15">
                      </td>
                      <td>
                        <input type="text" name="place15">
                      </td>
                      <td>
                        <select name="achievement15" id="select9">
                          <option value="">---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                      </td>
                        <td><select name="year15">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                      
                      <td>
                        
                        <p ><input type="file" name="file15"></p>
                      </td>
                    </tr>
                  </table>
                  
                </div>
				<div class="heading">
<h5>Event/s orgnized(Event In charge/Committee Member)</h5></div>
              <div align="center">
                <table width="1116" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="55"><div align="center">Sr.No. </div></th>
                    <th width="300"><div align="center">Event/s</div></th>
                    <th width="300"><div align="center">Place</div></th>
                    <th width="300"><div align="center">Position held</div></th>
                    <th width="300"><div align="center">Year</div></th>
                    <th width="300"><div align="center">Upload Certificate</div></th>
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
                    <td><a href="viewdocactivity.php?doc=<?php echo $row1['certificate21'];?>&sname=<?php echo $row1['sname2'];?>">View Document</a>
					</td>
				  </tr>
					<?php $cn=$cn+1; }?>
                  <tr>
                    <td><?php echo $cn++;?></td>
                    <td>
                      <input type="text" name="event21">
                    </td>
                    <td>
                      <input type="text" name="place21">
                    </td>
                    
                    <td>
                      <select name="position21">
                        <option value="">---select option--</option>
                        <option>Head</option>
                        <option>Member</option>
                      </select>
                    </td>
                     <td><select name="year21">
                      <option value="">----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      <p><input type="file" name="file21"></p>
                    </td>
                    
                  </tr>
                  <tr>
                    <td><?php echo $cn++;?></td>
                    <td>
                      <input type="text" name="event22" >
                    </td>
                    <td>
                      <input type="text" name="place22">
                   </td>
                    <td>
                      <select name="position22" id="select6">
                        <option value="">---select option--</option>
                        <option>Head</option>
                        <option>Member</option>
                        
                      </select>
                    </td>
                     <td><select name="year22">
                      <option value="">----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p ><input type="file" name="file22"></p>
                  </td>
                  
                  
                  </tr>
               
                  
                  
                </table>
                
              </div>
			   <div class="heading">
<h5>External Participation(Cultural/sports/Technical event)</h5></div>
 <div align="center">
    <table width="1116" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="55"><div align="center">Sr.No. </div></th>
                    <th width="300"><div align="center">Event/s</div></th>
                    <th width="300"><div align="center">Place</div></th>
                    <th width="300"><div align="center">Achievement</div></th>
                    <th width="300"><div align="center">ACHIVEMENT LEVEL</div></th>
                    <th width="300"><div align="center">Year</div></th>
                    <th width="300"><div align="center">Upload Certificate</div></th>
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
                    
                    <td><a href="viewdocactivity.php?doc=<?php echo $row1['certificate31'];?>&sname=<?php echo $row1['sname3'];?>">View Document</a>
					</td>
				  </tr>
					<?php $c=$c+1; }?>
                  <tr>
                    <td><?php echo $c++;?></td>
                    <td>
                      <input type="text" name="event31">
                    </td>
                    <td>
                      <input type="text" name="place31">
                    </td>
                    
                    <td>
                      <select name="achievement31">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                      </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level31">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                      <td><select name="year31">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p><input type="file" name="file31"></p>
                      </td>
                    
                    
                    
                    </tr>
                  <tr>
                    <td><?php echo $c++;?></td>
                    <td>
                      <input type="text" name="event32">
                    </td>
                    <td>
                      <input type="text" name="place32">
                    </td>
                    <td>
                      <select name="achievement32" id="select6">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                      </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level32">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                     <td><select name="year32">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p ><input type="file" name="file32"></p>
                      </td>
                    </tr>
                  <tr>
                   
                  </table>
                
</div>
<div align="center">
                <input type="submit" name="submit" id="submit" value="Submit">
                      </div>
				<!---- Code for Edit --->
						<?php }else{?>
						<div class="heading">
                <h5>Internal(Cultural/sports/Technical event)</h5></div>
                <div align="center">
                  <table width="1116" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <th width="55"><div align="center">Sr.No.</div></th>
                      <th width="300"><div align="center">Event/s</div></th>
                      <th width="300"><div align="center">Place</div></th>
                      <th width="300"><div align="center">Achievement</div></th>
                      <th width="300"><div align="center">Year</div></th>
                      <th width="300"><div align="center">Upload Certificate</div></th>
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
                    <td><a href="viewdocactivity.php?doc=<?php echo $row1['certificate'];?>&sname=<?php echo $row1['sname1'];?>">View Document</a>
					           					
                    </td>
					  
                  </tr><?php $cnt=$cnt+1; }?>
				
                    <tr>
                      <td><?php echo $cnt++?></td>
                      <td>
                        <input type="text" name="event11" >
                      </td>
                      
                      <td>
                        <input type="text" name="place11" >
                      </td>
                      <td>
                        <select name="achievement11">
                          <option value="" >---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                      </td>
                      
                         <td><select name="year11">
                      <option value="" >----select year---</option>
                      <option >2015</option>
                      <option >2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    <td>
                        <p ><input type="file" name="file11" ></p>
                      </td>
                    </tr>
					
					
                    <tr>
                      <td><?php echo $cnt++;?></td>
                      <td>
                        <input type="text" name="event12" >
                     </td>
                      <td>
                        <input type="text" name="place12" >
                     </td>
                      <td>
                        <select name="achievement12" id="select6">
                          <option value="" >---select option--</option>
                          <option>1st Rank</option>
                          <option>2nd Rank</option>
                          <option>3rd Rank</option>
                          <option>Participation</option>
                        </select>
                      </td>
                     
                        <td><select name="year12">
                      <option value="">----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                        <td>
                        <p ><input type="file" name="file12" ></p>
                        </td> 
                      
              </tr>
                   
					
                  </table>
                  
                </div>
					<div class="heading">
<h5>Event/s orgnized(Event In charge/Committee Member)</h5></div>
              <div align="center">
                <table width="1116" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="55"><div align="center">Sr.No. </div></th>
                    <th width="300"><div align="center">Event/s</div></th>
                    <th width="300"><div align="center">Place</div></th>
                    <th width="300"><div align="center">Position held</div></th>
                    <th width="300"><div align="center">Year</div></th>
                    <th width="300"><div align="center">Upload Certificate</div></th>
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
                    <td><a href="viewdocactivity.php?doc=<?php echo $row1['certificate21'];?>&sname=<?php echo $row1['sname2'];?>">View Document</a>
					</td>
				  </tr>
					<?php $cn=$cn+1; }?>
                  <tr>
                    <td><?php echo $cn++;?></td>
                    <td>
                      <input type="text" name="event21">
                    </td>
                    <td>
                      <input type="text" name="place21">
                    </td>
                    
                    <td>
                      <select name="position21">
                        <option value="">---select option--</option>
                        <option>Head</option>
                        <option>Member</option>
                      </select>
                    </td>
                     <td><select name="year21">
                      <option value="">----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      <p><input type="file" name="file21"></p>
                    </td>
                    
                  </tr>
                  <tr>
                    <td><?php echo $cn++;?></td>
                    <td>
                      <input type="text" name="event22" >
                    </td>
                    <td>
                      <input type="text" name="place22">
                   </td>
                    <td>
                      <select name="position22" id="select6">
                        <option value="">---select option--</option>
                        <option>Head</option>
                        <option>Member</option>
                        
                      </select>
                    </td>
                     <td><select name="year22">
                      <option value="">----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p ><input type="file" name="file22"></p>
                  </td>
                  
                  
                  </tr>
               
                  
                  
                </table>
                
              </div>
						
						 <div class="heading">
<h5>External Participation(Cultural/sports/Technical event)</h5></div>
 <div align="center">
    <table width="1116" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="55"><div align="center">Sr.No. </div></th>
                    <th width="300"><div align="center">Event/s</div></th>
                    <th width="300"><div align="center">Place</div></th>
                    <th width="300"><div align="center">Achievement</div></th>
                    <th width="300"><div align="center">ACHIVEMENT LEVEL</div></th>
                    <th width="300"><div align="center">Year</div></th>
                    <th width="300"><div align="center">Upload Certificate</div></th>
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
                    
                    <td><a href="viewdocactivity.php?doc=<?php echo $row1['certificate31'];?>&sname=<?php echo $row1['sname3'];?>">View Document</a>
					</td>
				  </tr>
					<?php $c=$c+1; }?>
                  <tr>
                    <td><?php echo $c++;?></td>
                    <td>
                      <input type="text" name="event31">
                    </td>
                    <td>
                      <input type="text" name="place31">
                    </td>
                    
                    <td>
                      <select name="achievement31">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                      </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level31">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                      <td><select name="year31">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p><input type="file" name="file31"></p>
                      </td>
                    
                    
                    
                    </tr>
                  <tr>
                    <td><?php echo $c++;?></td>
                    <td>
                      <input type="text" name="event32">
                    </td>
                    <td>
                      <input type="text" name="place32">
                    </td>
                    <td>
                      <select name="achievement32" id="select6">
                        <option value="">---select option--</option>
                        <option>1st Rank</option>
                        <option>2nd Rank</option>
                        <option>3rd Rank</option>
                        <option>Participation</option>
                      </select>
                    </td>
                    <td>
                      
                      <select id="level" name="level32">
                        <option value="">---select level--</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                        </select>
                      
                    </td>
                     <td><select name="year32">
                      <option value="" >----select year---</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option></select></td>
                    
                    <td>
                      
                      <p ><input type="file" name="file32"></p>
                      </td>
                    </tr>
                  <tr>
                   
                  </table>
                
</div>
<div align="center">
                <input type="submit" name="submit" id="submit" value="Submit">
                      </div>
						<?php }?>
</form>					
</body>
</html>