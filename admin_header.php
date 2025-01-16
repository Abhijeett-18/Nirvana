
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> Nirvana </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="images/favicon1.jpg">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/animate.css">
	
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">

	
	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
	<nav class="navbar navbar-expand-lg ftco-navbar-light" >
		<div class="container">
			<a class="navbar-brand" href="admin.php"><img src="images/nirvana.png" style="height:20px;"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item "><a href="admin.php" class="nav-link">Home</a></li>
            <div class="dropdown nav-item">
              <a class="nav-link dropdown-toggle text-light" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Menu
              </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="add_category.php">Add category</a>
                <a class="dropdown-item" href="manage_category.php">Manage category</a>
				<a class="dropdown-item" href="add_food_item.php">Add food items</a>
				<a class="dropdown-item" href="manage_food_item.php">Manage food items</a>
              </div>
            </div>
            <div class="dropdown nav-item">
              <a class="nav-link dropdown-toggle text-light" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Tables
              </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="add_table_type.php">Add</a>
                <a class="dropdown-item" href="manage_table.php">Manage</a>
              </div>
            </div>
					<li class="nav-item"><a href="manage_order.php" class="nav-link">Orders</a></li>
					<li class="nav-item"><a href="manage_reservations.php" class="nav-link">Reservations</a></li>
					<li class="nav-item"><a href="enquiry.php" class="nav-link">Enquiry</a></li>
					<li class="nav-item"><a href="userlist.php" class="nav-link">Users</a></li>
					<?php
          if(isset($_SESSION["email"])){
            ?>
			 <li class="nav-item"><a href="admin_logout.php" class="nav-link">Logout</a></li>
            <?php
          }else{
            ?>
			 <li class="nav-item"><a href="admin_login.php" class="nav-link">Login</a></li>
            <?php
          }
          ?>
					<div class="top-quote mr-lg-2 text-center">
        </div>
				</ul>
			</div>
		</div>
	</nav>