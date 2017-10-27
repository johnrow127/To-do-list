<?php 
$id=$_GET['id'];
include 'connectDB.php';
mysqli_query($con,"DELETE FROM `task` WHERE `ID`='$id'");
?>