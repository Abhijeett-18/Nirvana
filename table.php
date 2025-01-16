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
        <h1 class="mb-5 bread fw-bold">Tables</h1> 
      </div>
    </div>
  </div>
</section>
<div class="container">
			<div class="row justify-content-center mb-3 pb-2">
				<div class="col-md-7 text-center heading-section ftco-animate">
					<span class="subheading mt-5">Select Table</span>
				</div>
			</div>
        <div class="row">
            <?php
            include("config.php");
                $query="SELECT *  from `table_type`";
                $result=mysqli_query($connect,$query);
                while($data=mysqli_fetch_assoc($result)){
                ?>
                <div class="col-md-3 p-4 mt-5">
                <div class="card border-top-0 shadow-lg" style="width: 251px;">
                <img src="images/<?php echo $data['image']?>" class=" card-img-top" style="height:200px;width:250px;">
                  <h5 class="card-title fw-bold mt-2 px-3"><?php echo $data['title']?></h5>
                  <p class="card-text px-3">Table No. - <?php echo $data['table_no'] ?><br>
                    <a href="reservation.php?table=<?php echo $data['table_no']?>" class="btn btn-primary mt-2 mb-3 px-3 w-50" name="submit_btn">Book Table</a>
                  </div>
                </div>
                <?php
           }
            ?>
        </div>
      </div>
          </div>
	
	<?php
include("footer.php");
?>