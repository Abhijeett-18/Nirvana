<?php
$id= $_GET["id"];
$status=$_GET["status"];
include("config.php");
$query="UPDATE `reservation` set `status`='$status' where `id`='$id'";
$result=mysqli_query($connect,$query);
if($result>0){
    echo "<script>window.location.assign('manage_reservations.php?msg=Status Updated')</script>";
}else{
    echo "<script>window.location.assign('manage_reservations.php?msg=Try again later')</script>";
}