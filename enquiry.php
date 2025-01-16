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
        <h1 class="mb-5 bread fw-bold">Enquiries</h1>
        
      </div>
    </div>
  </div>
</section>
	</section>
	<div class="container table-responsive">
    <?php
    if(isset($_GET["msg"])){
        echo "<div class='alert alert-info'>".$_GET['msg']."</div>";
    }
    ?>
    <table class="table table-striped table-hover my-5">
        <tr >
            <th>Sno</th>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            
        </tr>
        <?php
            include("config.php");
            $query="SELECT * from `contact_us` ORDER BY `created_at` DESC";
            $result=mysqli_query($connect,$query);
            $sno=1;
            while($data=mysqli_fetch_assoc($result)){
                
                ?>
            <tr>
                <td><?php echo $sno;?></td>
                <td><?php echo $data['name']?></td>
                <td><?php echo $data['email']?></td>
                <td><?php echo $data['subject']?></td>
                <td><?php echo $data['message']?></td>          
            </tr>

        <?php
        // $sno=$sno+1;
        $sno++;
            }
        ?>
        
    </table>
</div>
<?php
include("footer.php");
?>