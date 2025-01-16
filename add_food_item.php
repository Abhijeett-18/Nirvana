<?php
include("admin_header.php");
?>
<?php
if(!isset($_SESSION["email"]) || $_SESSION["user_type"]=='user'){
    echo "<script>window.location.assign('admin_login.php?msg=Unauthorized access')</script>";
}
?>
	
	<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bgc.jpg'); height:520px;"" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate text-center mb-5">
        <h1 class="mb-5 bread fw-bold">Food Items</h1>
        
      </div>
    </div>
  </div>
</section>
	</section>

<h1 class="text-center mt-4 mb-3 h1"><img src="images/nirvana.png" style="height:35px;"></h1>
<?php
            if(isset($_GET["msg"])){
            ?>
                <div class="alert alert-info w-50 d-flex justify-content-center d-block mx-auto">
                    <?php
                        echo $_GET["msg"];
                    ?>
                </div>
            <?php
            }
            ?>
  <div class="container" >
        <div class="row pb-5 pt-3 mb-5 d-flex justify-content-center" >
            <div class="col-md-4 img-thumbnail d-flex justify-content-center bg-danger-subtle shadow-lg">
                <div class="row px-5">
                    <div class="col-xl-12 pt-4 fs-2 fw-bold text-dark" >Add Food Items</div>
                    <form enctype="multipart/form-data" method="post">
                    <div class="col-xl-12 pt-4">
                        <input type="text" placeholder="Item Name" name="item_name" class="form-control " required>
                    </div>
                    <div class="col-xl-12 pt-2">
                    <select class="form-control" name="category">
                        <option>Choose Category</option>
                        <?php
                            include("config.php");
                            $query="SELECT * from `category`";
                            $result=mysqli_query($connect,$query);
                            while($data=mysqli_fetch_assoc($result)){
                                ?>
                                <option value="<?php echo $data['id']?>"><?php echo $data['category_name']?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </select>   
                    </div>
                    <div class="col-xl-12 pt-2">
                        <input type="file" placeholder="image" name="image" class="form-control " required >
                    </div>
                    <div class="col-xl-12 pt-2">
                        <input type="text" placeholder="Price" name="price" class="form-control " required>
                    </div>
                    <div class="col-xl-12 pt-2">
                        <input type="text" placeholder="Description" name="description" class="form-control" required>
                    </div>
                    <div class="col-xl-12 py-4">
                        <button class="btn btn-danger w-50 d-block mx-auto text-center" name="submit_btn" >Save</button>
                    </div>
        </div>
        </div>
        </div></div>
                    <?php
                    include("footer.php");
                    ?>
                    <?php
                    if(isset($_REQUEST["submit_btn"])){
  $category=$_REQUEST["category"];
  $item_name=$_REQUEST["item_name"];
  $image=$_FILES["image"];
    $img_name=$image["name"];
    $tmp_path=$image["tmp_name"];
    $new_name=rand().$img_name;

    move_uploaded_file($tmp_path, "images/".$new_name);

  $price= $_REQUEST["price"];
  $description=$_REQUEST["description"];
  


  include("config.php");
  $query= "INSERT into `food_item`(`food_item_name`,`category`,`image`,`price`,`description`)VALUES('$item_name','$category','$new_name','$price','$description')";
  $result=mysqli_query($connect,$query);
  if($result>0){
      echo "<script>window.location.assign('add_food_item.php?msg=Data Inserted')</script>";
   }else{
    echo "<script>window.location.assign('add_food_item.php?msg=Error. Try again later!!')</script>";
   }
}

?>

