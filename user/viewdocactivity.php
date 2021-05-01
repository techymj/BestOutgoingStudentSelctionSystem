<?php
 $conn = mysqli_connect("localhost","root","");
 $db = mysqli_select_db($conn,"registration");
//include "conn.php";
$doc=$_GET['doc'];
$ext=pathinfo($doc,PATHINFO_EXTENSION);
$sname=$_GET['sname'];

?>
<html>
<head>
    <title>Document</title>
  
</head>
    <body>
        
     
        <div align="left" style="font-size:22px">
                      <a href="activities.php?sname=<?php echo $sname?>">
                      <svg class="bi bi-arrow-left-circle-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.646 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L6.207 7.5H11a.5.5 0 0 1 0 1H6.207l2.147 2.146z"/>
</svg>
                      <span>Back</span>
                      </a></div>
            <?php 
                
            ?>
        </div>
        <div align="center">
        <?php 
        if($ext=='pdf'){?>
                <embed src="<?php echo $doc?>" alt="pdf1"  style="width:60% ; height:90% ;  padding:10px;"/>
        <?php
        }else{?>
            <img src="<?php echo $doc?>" alt="Image1"  style="width:60% ; height:90% ;  padding:10px;"/>
        <?php
        }
       
        ?>
        
        </div>	
   
    </body>
</html>