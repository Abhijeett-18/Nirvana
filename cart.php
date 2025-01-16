<?php
include("header.php");

if (!isset($_SESSION['user_email'])) {
  header('Location: user_login.php?msg=Please login to view your cart.');
  exit();
}

$reservation_id = $_GET['id'];

if (isset($_POST['update_cart'])) {
  foreach ($_POST['quantity'] as $id => $quantity) {
    if ($quantity == 0) {
      unset($_SESSION['cart'][$id]);
    } else {
      $_SESSION['cart'][$id]['quantity'] = $quantity;
    }
  }
  header('Location: cart.php?id=' . $reservation_id . '&msg=Cart updated successfully');
  exit();
}

if (isset($_GET['remove'])) {
  $id = $_GET['remove'];
  unset($_SESSION['cart'][$id]);
  header('Location: cart.php?id=' . $reservation_id . '&msg=Item removed from cart successfully');
  exit();
}

if (isset($_POST['place_order'])) {
  include("config.php");

  $email = $_SESSION['user_email'];
  $total_amount = 0;

  foreach ($_SESSION['cart'] as $item) {
    $total_amount += $item['price'] * $item['quantity'];
  }

  $order_id = random_int(100000, 999999);
  $query = "INSERT INTO `order` (`email`, `reservation_id`, `total_amount`,`order_id`) VALUES ('$email', '$reservation_id', '$total_amount','$order_id')";
  $result=mysqli_query($connect,$query);

  foreach ($_SESSION['cart'] as $id => $item) {
    $food_id = $item['id'];
    $quantity = $item['quantity'];
    $total = $item['price'] * $quantity;
  
  $query1 = "INSERT INTO `order_details` (`order_id`, `food_id`, `quantity`, `total_price`) VALUES ('$order_id','$food_id','$quantity','$total')";
  $result1=mysqli_query($connect,$query1);
  }

  unset($_SESSION['cart']);

  header('Location: order_status.php?order_id=' . $order_id . '&reservation_id=' . $reservation_id);
  exit();
}
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bgc.jpg'); height:520px;" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate text-center mb-5">
        <h1 class="mb-5 bread fw-bold">View Cart</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-3 pb-2">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <img src="images/nirvana.png" style="height:40px;" class="mb-3">
      </div>
    </div>
    <?php
    if (isset($_GET["msg"])) {
      echo '<div class="alert alert-info w-50 d-flex justify-content-center d-block mx-auto">' . $_GET["msg"] . '</div>';
    }
    ?>
    <div class="container">
      <div class="row">
        <div class="col-md-10 offset-md-1">
          <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
          <form method="post">
            <div class="table-responsive shadow-lg">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $total = 0;
                  foreach ($_SESSION['cart'] as $id => $item) {
                    $item_total = floatval($item['price']) * intval($item['quantity']);
                    $total += $item_total;
                  ?>
                  <tr>
                    <td><?php echo $item['name']; ?></td>
                    <td>&#8377;<?php echo $item['price']; ?></td>
                    <td>
                      <input type="number" name="quantity[<?php echo $id; ?>]" value="<?php echo $item['quantity']; ?>" min="0">
                    </td>
                    <td>&#8377;<?php echo $item_total; ?></td>
                    <td>
                      <a href="cart.php?id=<?php echo $reservation_id; ?>&remove=<?php echo $id; ?>" class="btn btn-danger">Remove</a>
                    </td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td colspan="3" class="text-end fw-bold">Total</td>
                    <td colspan="2" class="fw-bold">&#8377;<?php echo $total; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="text-end d-inline">
              <button class="btn btn-success" type="submit" name="place_order">Place Order</button>
            </div>
            <div class="text-end d-inline">
              <button class="btn btn-primary" type="submit" name="update_cart">Update Cart</button>
            </div>
          </form>
          <?php } else { ?>
          <p class="text-center">Your cart is empty.</p>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include("footer.php");
?>
