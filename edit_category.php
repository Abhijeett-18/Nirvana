<?php
include("admin_header.php");
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bgc.jpg'); height:520px;"" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate text-center mb-5">
        <h1 class="mb-5 bread fw-bold">Edit Category</h1>
      </div>
    </div>
  </div>
</section>
<h1 class="text-center mt-4 mb-3 mb-3 h1"><img src="images/nirvana.png" style="height:40px;"></h1>
<?php
$id=$_GET["id"];
include("config.php");
$query= "SELECT * from `category` where `id`='$id'";
$result=mysqli_query($connect,$query);
$data=mysqli_fetch_assoc($result);
?>

            <?php
            if(isset($_GET["msg"])){
            ?>
                <div class="alert alert-info">
                    <?php
                        echo $_GET["msg"];
                    ?>
                </div>
            <?php
            }
            ?>
            <?php
                if(isset($_GET["msg"])){
                    echo "<div class='alert alert-info'>".$_GET['msg']."</div>";
                }
            ?>
<div class="container">
        <div class="row pb-5 pt-3 mb-5 d-flex justify-content-center" >
            <div class="col-md-4  img-thumbnail d-flex justify-content-center bg-danger-subtle">
                <div class="row px-5">
                    <div class="col-xl-12 pt-4 fs-2 fw-bold text-dark">Edit Category</div>
                    <form method="post">
                    <div class="col-xl-12 pt-4">
                        <input type="text" placeholder=" Category Name" name="category_name" class="form-control " required value="<?php echo $data['category_name']?>">
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
        $category_name=$_REQUEST["category_name"];
        include("config.php");
        $query="UPDATE `category` set `category_name`='$category_name' where `id`='$id'";
        $result=mysqli_query($connect,$query);
        if($result>0){
            echo "<script>window.location.assign('manage_category.php?msg=Updated successfully')</script>";
        }else{
            echo "<script>window.location.assign('manage_category.php?msg=Error!!! Try again later')</script>";
        }
    }
?>
<?php
include("footer.php");
?>