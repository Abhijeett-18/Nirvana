<?php
session_start();
session_destroy(); 
echo "<script>window.location.assign('admin_login.php?msg=Logout successfully!!')</script>";
?>