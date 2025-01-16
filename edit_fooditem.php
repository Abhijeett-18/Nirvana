<?php
include("admin_header.php");
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bgc.jpg'); height:520px;"" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate text-center mb-5">
        <h1 class="mb-5 bread fw-bold">Edit Food Items</h1>
      </div>
    </div>
  </div>
</section>
<h1 class="text-center mt-4 mb-3 mb-3 h1"><img src="images/nirvana.png" style="height:40px;"></h1>
<?php
$id=$_GET["id"];
include("config.php");
$query= "SELECT * from `food_item` where `id`='$id'";
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
<div class="container" >
        <div class="row pb-5 pt-3 mb-5 d-flex justify-content-center" >
            <div class="col-md-4 img-thumbnail d-flex justify-content-center bg-danger-subtle">
                <div class="row px-5">
                    <div class="col-xl-12 pt-4 fs-2 fw-bold text-dark" >Add Food Items</div>
                    <form enctype="multipart/form-data" method="post">
                    <div class="col-xl-12 pt-4">
                        <input type="text" placeholder="Item Name" name="item_name" class="form-control " required value="<?php echo $data['food_item_name']?>">
                    </div>
                    <div class="col-xl-12 pt-2">
                    <select class="form-control" name="category" value="<?php echo $data['category_name']?>">
                        <option disabled>Choose Category</option>
                        <?php
                            include("config.php");
                            $query1="SELECT * from `category`";
                            $result1=mysqli_query($connect,$query1);
                            while($data1=mysqli_fetch_assoc($result1)){
                                ?>
                                <option value="<?php echo $data1['id']?>" 
                                <?php
                                if($data['category']==$data1['id']){
                                    echo "selected";
                                } 
                                ?> 
                                ><?php echo $data1['category_name']?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </select>   
                    </div>
                    <div class="col-xl-12 pt-2">
                        <input type="file" placeholder="image" name="image" class="form-control "  >
                    </div>
                    <div class="col-xl-12 pt-2">
                        <input type="text" placeholder="Price" name="price" class="form-control " required value="<?php echo $data['price']?>"> 
                    </div>
                    <div class="col-xl-12 pt-2">
                        <input type="text" placeholder="description" name="description" class="form-control" required value="<?php echo $data['description']?>">
                    </div>
                    <div class="col-xl-12 py-4">
                        <button class="btn btn-danger w-50 d-block mx-auto text-center" name="submit_btn" >Save</button>
                    </div>
        </div>
        </div>
        </div></div>
<?php
    if(isset($_REQUEST["submit_btn"])){
        $item_name=$_REQUEST["item_name"];
        $category=$_REQUEST["category"];
        $price=$_REQUEST["price"];
        $description=$_REQUEST["description"];
        if($_FILES["image"]["name"]){
            $image=$_FILES["image"];
            $image_name=$image["name"];
            $tmp_path=$image["tmp_name"];
            $new_name=rand().$image_name;
            move_uploaded_file($tmp_path,"images/".$new_name);
        }else{
            $new_name=$data["image"];
        }
        include("config.php");
        $query="UPDATE `food_item` SET `food_item_name`='$item_name', `category`='$category', `image`='$new_name', `price`='$price', `description`='$description' where `id`='$id'";
        $result=mysqli_query($connect,$query);
        if($result>0){
            echo "<script>window.location.assign('manage_food_item.php?msg=Updated successfully')</script>";
        }else{
            echo "<script>window.location.assign('manage_food_item.php?msg=Error!!! Try again later')</script>";
        }
    }
?>
<?php
include("footer.php");
?>