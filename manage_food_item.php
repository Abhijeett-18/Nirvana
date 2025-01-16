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
        <h1 class="mb-5 bread fw-bold">Manage Food Items</h1>
        
      </div>
    </div>
  </div>
</section>
	</section>
    <h1 class="text-center mt-4 mb-3 h1"><img src="images/nirvana.png" style="height:40px;"></h1>
	<div class="container table-responsive">
    <?php
    if(isset($_GET["msg"])){
        echo "<div class='alert alert-info'>".$_GET['msg']."</div>";
    }
    ?>
    <table class="table table-striped table-hover mb-5">
        <tr >
            <th>Sno</th>
            <th>Image</th>
            <th>Item Name</th>
            <th>Category Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
            include("config.php");
            $query="SELECT food_item.*, category.category_name from `food_item` inner join `category` on  food_item.category=category.id";
            $result=mysqli_query($connect,$query);
            $sno=1;
            while($data=mysqli_fetch_assoc($result)){
                
                ?>
            <tr>
                <td><?php echo $sno;?></td>
                <td>
                    <img src="images/<?php echo $data['image']?>" style="height:100px;width:100px;">
                </td>
                <td><?php echo $data['food_item_name']?></td>
                <td><?php echo $data['category_name']?></td>
                <td>&#8377;<?php echo $data['price']?></td>
                <td><?php echo $data['description']?></td>
            
                <td>
                <a href="edit_fooditem.php?id=<?php echo $data['id']?>" class="btn btn-success">
                        <i class="bi bi-pencil-square"></i>
                    </a> 
                    
                </td>
                <td>
                <a href="delete_fooditem.php?id=<?php echo $data['id']?>" class="btn btn-danger">
                        <i class="bi bi-trash"></i>
                    </a> 
                </td>
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
