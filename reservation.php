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
        <h1 class="mb-5 bread fw-bold">Book A Table</h1>
        
      </div>
    </div>
  </div>
</section>
	</section>

	<section class="ftco-section ftco-wrap-about ftco-no-pb ftco-no-pt">
		<div class="container">
		
			<div class="row no-gutters my-5">
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
            <?php
            include("config.php");
                $query="SELECT *  from `table_type`";
                $result=mysqli_query($connect,$query);
				$data=mysqli_fetch_assoc($result);
				?>
				<div class="col-sm-12 p-4 p-md-5 d-flex align-items-center justify-content-center bg-primary shadow-lg" >
					<form method="post" class="appointment-form">
						<h3 class="mb-3">Book your Table</h3>
						<div class="row justify-content-center">
						<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Name" name="name" required>
								</div>
							</div>							
							<div class="col-md-6">
								<div class="form-group">
									<div class="input-wrap">
										<div class="icon"><span class="fa fa-calendar"></span></div>
										<input type="text" class="form-control book_date" placeholder="Check-In" name="date_of_booking" required >
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="input-wrap">
										<div class="icon"><span class="fa fa-clock-o"></span></div>
										<input type="text" class="form-control book_time" placeholder="Time" name="time" required>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="guest" placeholder="No of guests" class="form-control" required min="1">
									</div>
								</div>
							</div>
							<div class="col-md-6 d-block mx-auto">
								<div class="form-group">
									<input type="text" name="instruction" placeholder="Additional request/instructions (optional)" class="form-control">
									</div>
								</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" value="Book Your Table Now" class="btn btn-white py-3 px-4 mt-4 " name="submit_btn" >
								</div>
							</div>
						</div>
						<script>
						document.addEventListener('DOMContentLoaded', function() {
   					    const form = document.querySelector('.appointment-form');
    					const dateInput = document.querySelector('input[name="date_of_booking"]');

   						form.addEventListener('submit', function(event) {
      					const selectedDate = new Date(dateInput.value);
       					const today = new Date();
       					today.setHours(0, 0, 0, 0); 

						if (selectedDate < today) {
							alert('You cannot book a table for a past date.');
							event.preventDefault(); 
						}
					});
				});
</script>
					</form>
				</div>
			</div>
		</div>
		<?php
if(isset($_REQUEST["submit_btn"])){
    $name = $_REQUEST["name"];
    $email = $_SESSION["user_email"];
    $table_no = $_GET['table'];
    $contact = $_SESSION["contact"];
    $date_of_booking = $_REQUEST["date_of_booking"];
    $time = $_REQUEST["time"];
    $guest = $_REQUEST["guest"];
    $instruction = $_REQUEST["instruction"];

    if ($guest <= 0) {
        echo "<script>alert('Number of guests must be at least 1.'); window.history.back();</script>";
        exit;
    }

    include("config.php");

    // Check if the reservation already exists
    $check_query = "SELECT * FROM `reservation` 
                    WHERE `name` = '$name' 
                    AND `email` = '$email' 
                    AND `table_no` = '$table_no' 
                    AND `date_of_booking` = '$date_of_booking' 
                    AND `time` = '$time'";
    $check_result = mysqli_query($connect, $check_query);

    if(mysqli_num_rows($check_result) > 0) {
        // If the reservation already exists
        echo "<script>alert('Reservation already exists for the selected details.'); window.history.back();</script>";
    } else {
        // Insert new reservation
        $query = "INSERT INTO `reservation`(`name`, `email`, `contact`, `table_no`, `date_of_booking`, `time`, `guest`, `instruction`) 
                  VALUES ('$name', '$email', '$contact', '$table_no', '$date_of_booking', '$time', '$guest', '$instruction')";
        $result = mysqli_query($connect, $query);

        if($result > 0) {
            echo "<script>window.location.assign('reservation.php?msg=Reservation request sent')</script>";
        } else {
            echo "<script>window.location.assign('reservation.php?msg=Error! Try again later')</script>";
        }
    }
}
?>

	</section>

	<section class="ftco-section ftco-no-pt ftco-no-pb">
		<div class="container">
			<div class="row d-flex">
				<div class="col-md-6 d-flex">
					<div class="img img-2 w-100 mr-md-2 mb-5" style="background-image: url(images/chef3.png);"></div>
					<div class="img img-2 w-100 ml-md-2 mb-5" style="background-image: url(images/bg_4.jpg);"></div>
				</div>
				<div class="col-md-6 ftco-animate makereservation p-4 p-md-5">
					<div class="heading-section ftco-animate mb-5">
						<span class="subheading">This is our secrets</span>
						<h2 class="mb-4">Perfect Ingredients</h2>
						<p>At Nirvana, the secret to our extraordinary dishes lies in our carefully curated selection of ingredients. The passion and dedication to quality in our kitchen are what truly set us apart, making every bite at Nirvana a journey into the heart of Indian cuisine.
						</p>
						<p><a href="reservation.php" class="btn btn-primary">Book Table</a></p>
					</div>
				</div>
			</div>
		</div>
	</section>


	<?php
include("footer.php");
?>