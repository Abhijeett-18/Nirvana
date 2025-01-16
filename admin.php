<?php
include("admin_header.php")
?>
<?php
if(!isset($_SESSION["email"])){
    echo "<script>window.location.assign('admin_login.php?msg=Please Login to continue.')</script>";
}
?>
<?php

if(isset($_SESSION["email"])){
    $q = "SELECT count(id) as reservations from `reservation`";
    include("config.php");
    $result_user = mysqli_query($connect,$q);
    $data_user = mysqli_fetch_array($result_user);
}
?>

<?php

if(isset($_SESSION["email"])){
    $q = "SELECT count(id) as orders from `order`";
    include("config.php");
    $resultpro = mysqli_query($connect,$q);
    $data_pro = mysqli_fetch_array($resultpro);
}
?>
<?php

if(isset($_SESSION["email"])){
    $q = "SELECT count(id) as users from `user_register`";
    include("config.php");
    $result_user1 = mysqli_query($connect,$q);
    $data_user1 = mysqli_fetch_array($result_user1);
}
?>
<?php

if(isset($_SESSION["email"])){
    $q = "SELECT count(id) as enquiries from `contact_us`";
    include("config.php");
    $result_user2 = mysqli_query($connect,$q);
    $data_user2 = mysqli_fetch_array($result_user2);
}
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bgc.jpg'); height:520px;" >
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate text-center mb-5">
					<h1 class="mb-5 bread fw-bold" style="margin-bottom:150px;">Admin Dashboard</h1>
				</div>
			</div>
		</div>
	</section>
	<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-4 mx-2 card border-start mb-3 bg-danger-subtle shadow-lg">
            <div class="card-body text-center">
                <h4 class="fw-bold">Total Reservations</h4>
                <p class="display-5"><?php echo $data_user['reservations']; ?></p>
                <a href="manage_reservations.php" class="btn btn-danger w-75 d-block mx-auto">Manage Reservations</a>
            </div>    
        </div>

        <div class="col-md-4 mx-2 card border-start mb-3 bg-danger-subtle shadow-lg">
            <div class="card-body text-center">
                <h4 class="fw-bold">Total Orders</h4>
                <p class="display-5"><?php echo $data_pro['orders']; ?></p>
                <a href="manage_order.php" class="btn btn-danger w-75 d-block mx-auto">Manage Orders</a>
            </div>
        </div>
<div class="col-md-4 mx-2 card border-start mb-3 bg-danger-subtle shadow-lg">
            <div class="card-body text-center">
                <h4 class="fw-bold">Total Users</h4>
                <p class="display-5"><?php echo $data_user1['users']; ?></p>
                <a href="userlist.php" class="btn btn-danger w-75 d-block mx-auto">View Users</a>
            </div>
        </div>
<div class="col-md-4 mx-2 card border-start mb-3 bg-danger-subtle shadow-lg">
            <div class="card-body text-center">
                <h4 class="fw-bold">Enquiries</h4>
                <p class="display-5"><?php echo $data_user2['enquiries']; ?></p>
                <a href="enquiry.php" class="btn btn-danger w-75 d-block mx-auto">View Enquiries</a>
            </div>
        </div>
    </div>
</div>

    <?php
    include("footer.php");
    ?>