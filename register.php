<?php
include("header.php");
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bgc.jpg'); height:520px;" data-stellar-background-ratio="0.5">
<div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate text-center mb-5">
        <h1 class="mb-5 bread fw-bold">User Register</h1>
      </div>
    </div>
  </div>
</section>

<h1 class="text-center mt-4 mb-3 h1"><img src="images/nirvana.png" style="height:40px;"></h1>
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
<div class="container-fluid">
    <div class="row pb-5 pt-3 d-flex justify-content-center">
        <div class="col-md-4 img-thumbnail d-flex justify-content-center bg-danger-subtle shadow-lg">
            <div class="row px-5">
                <div class="col-xl-12 pt-4 fs-2 fw-bold text-dark">Sign Up</div>
                <form enctype="multipart/form-data" method="post" onsubmit="return validateForm()">
                    <div class="col-xl-12 pt-4">
                        <input type="text" id="username" placeholder="Name" name="username" class="form-control" required>
                    </div>
                    <div class="col-xl-12 pt-3">
                        <input type="email" id="email" placeholder="Email" name="email" class="form-control" required>
                    </div>
                    <div class="col-xl-12 pt-3">
                        <input type="password" id="password" placeholder="Password" name="password" class="form-control" required>
                    </div>
                    <div class="col-xl-12 pt-3">
                        <input type="text" id="contact" placeholder="Contact" name="contact" class="form-control" required>
                    </div>
                    <div class="col-xl-12 pt-3">
                        <input type="text" id="address" placeholder="Address" name="address" class="form-control" required>
                    </div>
                    <div class="col-xl-12 py-4">
                        <button class="btn btn-danger w-50 d-block mx-auto text-center" name="submit_btn">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>

<script>
function validateForm() {
    let username = document.getElementById('username').value.trim();
    let email = document.getElementById('email').value.trim();
    let password = document.getElementById('password').value.trim();
    let contact = document.getElementById('contact').value.trim();
    let address = document.getElementById('address').value.trim();

    if (username === "") {
        alert("Name is required.");
        return false;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;
    }

    const contactRegex = /^[0-9]{10}$/;
    if (!contactRegex.test(contact)) {
        alert("Please enter a valid 10-digit contact number.");
        return false;
    }

    if (address === "") {
        alert("Address is required.");
        return false;
    }

    return true;
}
</script>

<?php
if (isset($_REQUEST["submit_btn"])) {
    $name = $_REQUEST["username"];
    $email = $_REQUEST["email"];
    $password = md5($_REQUEST["password"]);
    $contact = $_REQUEST["contact"];
    $address = $_REQUEST["address"];

    include("config.php");
    $query = "INSERT INTO `user_register`(`name`, `email`, `password`, `contact`, `address`) VALUES ('$name', '$email', '$password', '$contact', '$address')";
    $result = mysqli_query($connect, $query);
    if ($result > 0) {
        echo "<script>window.location.assign('user_login.php?msg=Login to continue')</script>";
    } else {
        echo "<script>window.location.assign('register.php?msg=Error. Try again later!!')</script>";
    }
}
?>
