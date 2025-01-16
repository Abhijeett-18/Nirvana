<?php
include("header.php");
?>
	
	<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bgc.jpg'); height:520px;" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate text-center mb-5">
        <h1 class="mb-5 bread fw-bold">Menu</h1>
        
      </div>
    </div>
  </div>
</section>
	<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-3 pb-2">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <span class="subheading">Specialties</span>
        <h2 class="mb-2">Our Menu</h2>
      </div>
    </div>
    <div class="container">
      <div class="row">
      <?php
        include("config.php");

        $category_query = "SELECT DISTINCT c.category_name as category_name, c.id as category_id 
                           FROM `category` c 
                           INNER JOIN `food_item` f ON c.id = f.category";
        $category_result = mysqli_query($connect, $category_query);

        while($category_data = mysqli_fetch_assoc($category_result)) {
          $category_name = $category_data['category_name'];
          $category_id = $category_data['category_id'];
        ?>
        <div class="col-12 mb-4">
          <h3 class="fw-bold text-center fs-1 mt-3"><?php echo $category_name; ?></h3> 
        </div>
        <?php
          $food_query = "SELECT * FROM `food_item` WHERE `category` = '$category_id'";
          $food_result = mysqli_query($connect, $food_query);

          while($food_data = mysqli_fetch_assoc($food_result)){
        ?>
       <div class="col-sm-12 col-md-12 col-lg-12 mb-4">
          <div class="card h-100 border-start-0 border-end-0 border-top-0 shadow-lg p-2">
            <div class="row g-0 d-flex align-items-center"> 
              <div class="col-3 d-flex justify-content-center align-items-center"> 
                <img src="images/<?php echo $food_data['image']; ?>" class="img-fluid rounded-start pt-4 mb-3"  style="width: 120px; height: 120px; object-fit: cover;">
              </div>
              <div class="col-9">
                <div class="card-body p-1">
                  <img src="images/Veg_symbol.svg.png" style="height:15px;">
                  <h5 class="card-title fw-bold mb-1 fs-5"><?php echo$food_data['food_item_name']; ?></h5>
                  <p class="card-text fw-light mb-0"><?php echo $food_data['description']; ?>
                    <br><span class="fw-bold">&#8377;<?php echo $food_data['price']; ?></span>
                  </p>
                  <form method="post" action="add_to_cart.php?id=<?php echo $_GET['id']?>">
                    <input type="hidden" name="food_id" value="<?php echo $food_data['id']; ?>">
                    <input type="hidden" name="food_item_name" value="<?php echo $food_data['food_item_name']; ?>">
                    <input type="hidden" name="price" value="<?php echo $food_data['price']; ?>">
                    <input type="number" name="quantity" min="1" value="1" required>
                    <button class="btn btn-success" name="add_to_cart" type="submit">Add to Cart</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        }
      }
        ?>
      </div>
    </div>
  </div>
</section>
<nav class="text-light bg-success" style="position:sticky;bottom:0;">
  <div class="container-fluid text-center">
    <a class="text-light fs-5 fw-bold" href="cart.php?id=<?php echo $_GET['id']?>">View Cart</a>
  </div>
</nav>
<?php
include("footer.php");
?>
