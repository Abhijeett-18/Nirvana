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
                <h1 class="mb-5 bread fw-bold">Manage Orders</h1>
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
            <th>Reservation ID</th>
            <th>Order ID</th>
            <th>Total amount</th>
            <th>Status</th>
            <th>Update Status</th>
        </tr>
        <?php
            include("config.php");
           
            $query = "SELECT * FROM `order` ORDER BY `created_at` DESC"; 
            $result = mysqli_query($connect, $query);
            $sno = 1;
            while($data = mysqli_fetch_assoc($result)){
        ?>
            <tr>
                <td><?php echo $sno; ?></td>
                <td><?php echo $data['reservation_id'] ?></td>
                <td><?php echo $data['order_id'] ?></td>
                <td><?php echo $data['total_amount'] ?></td>
                <td><?php echo $data['status'] ?></td>
                <td>
                    <?php
                    if($data['status'] == "Placed"){
                        ?>
                        <a href="changestatus1.php?status=Being Prepared&id=<?php echo $data['id'] ?>" class="btn btn-success w-75 mb-2">Being Prepared</a>
                        <?php
                    } else if($data['status'] == "Being Prepared"){
                        ?>
                        <a href="changestatus1.php?status=Served&id=<?php echo $data['id'] ?>" class="btn btn-success w-75 mb-2">Served</a>
                        <?php
                    }
                    else{
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
