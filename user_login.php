<?php
include("header.php");
?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bgc.jpg'); height:520px;"" data-stellar-background-ratio="0.5">
<div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate text-center mb-5">
        <h1 class="mb-5 bread fw-bold">User Login</h1>
      </div>
    </div>
  </div>
</section>
	</section>
    <h1 class="text-center mt-4 mb-3 h1"><img src="images/nirvana.png" style="height:50px;"></h1>
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
                  <form method="post">
  <div class="container" >
        <div class="row pb-5 pt-3 mb-5 d-flex justify-content-center " >
            <div class="col-md-6 img-thumbnail d-flex justify-content-center bg-danger-subtle shadow-lg">
                <div class="row px-5">
                    <div class="col-xl-12 pt-4 fs-2 fw-bold text-dark">Login</div>
                    <div class="col-xl-12 pt-3">
                        <input type="text" placeholder="abc@gmail.com" class="form-control" name="email">
                    </div>
                    <div class="col-xl-12 pt-3">
                        <input type="password" placeholder="Password" class="form-control" name="password">
                    </div>
                    <div class="col-xl-12 pt-3">
                        <button class="btn btn-danger w-25 d-block mx-auto" name="submit_btn">Login</button>
                    </div>
                    <div class="col-xl pt-3 pb-3 d-flex justify-content-between "> 
                        <div >
                           <p class="d-inline fs-0 text-dark">Don't have an account? </p><p class="d-inline text-danger"><a href="register.php">Sign Up</a></p>
                        </div>
                    </div>
                    
             </div>
            </div>
        </div>
    </div>
    <?php
    if(isset($_REQUEST["submit_btn"])){
        $email=$_REQUEST["email"];
        $password=md5($_REQUEST["password"]);
        include("config.php");
        $query= "SELECT * from `user_register` where `email`='$email' and `password`='$password'";
        $result=mysqli_query($connect,$query); 
        if(mysqli_num_rows($result)>0){
            $data=mysqli_fetch_assoc($result);
            $_SESSION["user_email"]=$email;
            $_SESSION["password"]=$password;
            $_SESSION["contact"]=$data["contact"];
            $_SESSION["user_type"]="user";
            $_SESSION["name"]=$data["name"];
            $_SESSION["user_id"]=$data["id"];
            echo "<script>window.location.assign('index.php?msg=Login successfully!!')</script>";
        }else{
            echo "<script>window.location.assign('user_login.php?msg=Invalid credentails')</script>";
        }
    }
?>
<?php
include("footer.php");
?>