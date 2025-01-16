<?php
include("admin_header.php");
?>
<?php
if(!isset($_SESSION["email"])){
    echo "<script>window.location.assign('admin_login.php?msg=Please Login.')</script>";
}
?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bgc.jpg'); height:520px;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-5">
                <h1 class="mb-5 bread fw-bold">Manage Reservations</h1>
            </div>
        </div>
    </div>
</section>
<div class="container table-responsive">
    <h1 class="text-center mt-4 mb-3 h1"><img src="images/nirvana.png" style="height:40px;"></h1>
    <?php
    if(isset($_GET["msg"])){
        echo "<div class='alert alert-info'>".$_GET['msg']."</div>";
    }
    ?>
    <table class="table table-striped table-hover mb-5">
        <tr>
            <th>Sno</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Date of booking</th>
            <th>Table No.</th>
            <th>Time</th>
            <th>No. of guests</th>
            <th>Instructions</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
            include("config.php");
            $query="SELECT * FROM `reservation` ORDER BY `created_at` DESC"; 
            $result=mysqli_query($connect, $query);
            $sno = 1;
            while($data = mysqli_fetch_assoc($result)){
        ?>
            <tr>
                <td><?php echo $sno; ?></td>
                <td><?php echo $data['name'] ?></td>
                <td><?php echo $data['email'] ?></td>
                <td><?php echo $data['contact'] ?></td>
                <td><?php echo $data['date_of_booking'] ?></td>
                <td><?php echo $data['table_no'] ?></td>
                <td><?php echo $data['time'] ?></td>
                <td><?php echo $data['guest'] ?></td>
                <td><?php echo $data['instruction'] ?></td>
                <td><?php echo $data['status'] ?></td>
                <td>
                    <?php
                    if($data['status'] == "pending"){
                        ?>
                        <a href="changestatus.php?status=Confirmed&id=<?php echo $data['id'] ?>" class="btn btn-success w-100 mb-2">Confirm </a>
                        <a href="changestatus.php?status=Declined&id=<?php echo $data['id'] ?>" class="btn btn-danger w-100 mb-2">Decline</a>
                        <?php
                    } else if($data['status'] == "Confirmed"){
                        ?>
                        <a href="changestatus.php?status=Checked-In&id=<?php echo $data['id'] ?>" class="btn btn-success w-100 mb-2">Check-In</a>
                        <?php
                    } else if($data['status'] == "Checked-In"){
                        ?>
                        <a href="changestatus.php?status=Checked-Out&id=<?php echo $data['id'] ?>" class="btn btn-danger w-100 mb-2">Check-Out</a>
                        <?php
                    } else {
                        echo $data['status'];
                    }
                    ?>
                </td>
            </tr>
        <?php
            $sno++;
            }
        ?>
    </table>
</div>
<?php
include("footer.php");
?>
