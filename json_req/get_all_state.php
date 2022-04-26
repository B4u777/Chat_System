<?php
 include "../connection.php";
 $id=$_GET['country_id'];
 $resultset = mysqli_query($con,"SELECT * from states where country_id=$id");
 $json_array=array();
 while($row = mysqli_fetch_assoc($resultset))
 {
     $json_array[]=$row;
 }
 print(json_encode($json_array));
?>