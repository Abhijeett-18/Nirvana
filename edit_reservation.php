<?php
include("admin_header.php");
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bgc.jpg'); height:520px;"" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate text-center mb-5">
        <h1 class="mb-5 bread fw-bold">Reservations</h1>
      </div>
    </div>
  </div>
</section>
<?php
$id=$_GET["id"];
include("config.php");
$query= "SELECT * from `reservation` where `id`='$id'";
$result=mysqli_query($connect,$query);
$data=mysqli_fetch_assoc($result);
?>
<div class="container" >
        <div class="row pb-5 pt-3 mb-5 d-flex justify-content-center" >
            <div class="col-md-4 img-thumbnail d-flex justify-content-center bg-danger-subtle">
                <div class="row px-5">
                    <div class="col-xl-12 pt-4 fs-2 fw-bold text-dark" >Details</div>
                <div class="col-xl-12 pt-4 text-dark">
                    Name - <?php echo $data['name']?>
                 </div>
                 <div class="col-xl-12 pt-4 text-dark">
                    Email - <?php echo $data['email']?>
                 </div>      
                 <div class="col-xl-12 pt-4 text-dark">
                    Contact - <?php echo $data['contact']?>
                 </div>
                 <div class="col-xl-12 pt-4 text-dark">
                    Date of booking - <?php echo $data['date_of_booking']?>
                 </div>
                 <div class="col-xl-12 pt-4 text-dark">
                    Time - <?php echo $data['time']?>
                 </div>
                 <div class="col-xl-12 pt-4 text-dark">
                    No. of guests - <?php echo $data['guest']?>
                 </div>
                 <div class="col-xl-12 pt-4 ">
                      Status - <?php echo $data['status']?>
                    </div>
                    <div class="col-xl-12 py-4">
                        <button class="btn btn-danger w-50 d-block mx-auto text-center" name="submit_btn">Save</button>
                    </div>
        </div>
        </div>
        </div>
        </div>
 <?php
    if(isset($_REQUEST["submit_btn"])){
        $status=$_REQUEST["status"];
        include("config.php");
        $query="UPDATE `reservation` set `status`='$status' where `id`='$id'";
        $result=mysqli_query($connect,$query);
        if($result>0){
            echo "<script>window.location.assign('manage_reservations.php?msg=Updated successfully')</script>";
        }else{
            echo "<script>window.location.assign('manage_reservations.php?msg=Error!!! Try again later')</script>";
        }
    }
?>
<?php
include("footer.php");
?>


