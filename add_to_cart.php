<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
  $food_id = $_POST['food_id'];
  $food_item_name = $_POST['food_item_name'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];

  $item = [
    'id' => $food_id,
    'name' => $food_item_name,
    'price' => $price,
    'quantity' => $quantity
  ];

  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
  }

  $found = false;
  foreach ($_SESSION['cart'] as &$cart_item) {
    if ($cart_item['id'] == $food_id) {
      $cart_item['quantity'] += $quantity;
      $found = true;
      break;
    }
  }

  if (!$found) {
    $_SESSION['cart'][] = $item;
  }

  header('Location: order.php?id=' . $_GET['id']);
  exit();
}
?>
