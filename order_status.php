<?php
include("header.php");
?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bgc.jpg'); height:520px;" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate text-center mb-5">
        <h1 class="mb-5 bread fw-bold">Order Status</h1>
      </div>
    </div>
  </div>
</section>

<?php
include("config.php");

if (!isset($_SESSION['user_email'])) {
  header('Location: user_login.php?msg=Please login to view your order status.');
  exit();
}

$order_id = $_GET['order_id'];
$reservation_id = $_GET['reservation_id'];
$user_email = $_SESSION['user_email'];

$query = "SELECT * FROM `order` WHERE `order_id` = '$order_id' AND `reservation_id` = '$reservation_id' AND `email` = '$user_email'";
$result = mysqli_query($connect, $query);
$order = mysqli_fetch_assoc($result);

if (!$order) {
  echo '<div class="alert alert-danger">Invalid Order ID or Reservation ID.</div>';
  exit();
}

$query1 = "SELECT od.*, fi.food_item_name FROM `order_details` od
           JOIN `food_item` fi ON od.food_id = fi.id
           WHERE od.order_id = '$order_id'";
$result1 = mysqli_query($connect, $query1);
?>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-3 pb-2">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <h2 class="mb-2">Order Details</h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-lg bg-danger-subtle">
          <div class="card-body">
            <h4 class="fw-bold">Order ID: <?php echo $order_id; ?></h4>
            <h4 class="fw-bold">Reservation ID: <?php echo $reservation_id; ?></h4>
            <h4 class="fw-bold">Total Amount: &#8377;<?php echo $order['total_amount']; ?></h4>
            <h4 class="fw-bold">Order Status: <?php echo $order['status']; ?></h4>
            
            <h4 class="fw-bold mt-4">Ordered Items:</h4>
            <ul class="list-group">
              <?php while($item = mysqli_fetch_assoc($result1)) { ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <?php echo $item['food_item_name']; ?>
                  <span class="badge bg-primary rounded-pill">× <?php echo $item['quantity']; ?></span>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include("footer.php");
?>
