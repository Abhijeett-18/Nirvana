<?php
$id= $_GET["id"];
include("config.php");
$query= "DELETE from `reservation` where `id`='$id'";
$result=mysqli_query($connect,$query);
if($result>0){
    echo "<script>window.location.assign('manage_reservations.php?msg=Data deleted successfully')</script>";
}else{
    echo "<script>window.location.assign('manage_reservations.php?msg=Try again later')</script>";
}
?>