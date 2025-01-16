<?php
include("header.php");
?>
<?php
if(!isset($_SESSION["user_email"])){
    echo "<script>window.location.assign('user_login.php?msg=Please Login.')</script>";
}
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bgc.jpg'); height:520px;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-5">
                <h1 class="mb-5 bread fw-bold">Your Reservations</h1>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <?php
        include("config.php");
        if(isset($_SESSION["user_email"])){
            $email=$_SESSION["user_email"];
            $query="SELECT * FROM `reservation` WHERE `email`='$email' ORDER BY `created_at` DESC";
        } else {
            echo "<script>window.location.assign('user_login.php?msg=You have no reservations!!')</script>";
        }
        $result=mysqli_query($connect, $query);
        while($data=mysqli_fetch_assoc($result)){
        ?>
            <div class="col-md-4 my-5">
                <div class="card shadow-lg" style="height:360px;">
                    <h2 class="class-title fw-bold p-3 text-danger"> Reservation Details</h2>
                    <p class="card-text px-3">Name - <?php echo $data['name']?><br>
                    Table No. - <?php echo $data['table_no'] ?><br>
                    Date of booking - <?php echo $data['date_of_booking']?><br>
                    Time - <?php echo $data['time']?><br>
                    No. of guests - <?php echo $data['guest']?><br>
                    Status - <?php echo $data['status']?><br></p>
                    <?php
                    if($data['status']=="Checked-In"){
                        ?>
                        <a href="order.php?id=<?php echo $data['id']?>" class="btn btn-success w-25 mx-3 ">Order </a>
                    <?php
                    }
                    ?>
                    <p class="fw-light text-end px-2"><?php echo $data['created_at']?></p>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<?php
include("footer.php");
?>
