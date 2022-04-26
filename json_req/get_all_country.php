<?php
 include "../connection.php";
 $resultset = mysqli_query($con,"SELECT * from countries");
 $json_array=array();
 while($row = mysqli_fetch_assoc($resultset))
 {
     $json_array[]=$row;
 }
 print(json_encode($json_array));
?>