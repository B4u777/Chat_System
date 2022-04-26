<?php
 include "../connection.php";
 $id=$_GET['state_id'];
 $resultset = mysqli_query($con,"SELECT * from cities where state_id=$id");
 $json_array=array();
 while($row = mysqli_fetch_assoc($resultset))
 {
     $json_array[]=$row;
 }
 print(json_encode($json_array));
?>