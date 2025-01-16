<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
            background-image:url("images/bgc.jpg");
            background-size:cover;
        }
        </style>
</head>
<body>
    
   <h1 class="text-center mt-5 mb-3 h1"><img src="images/nirvana.png" style="height:50px; margin-top:40px;"></h1>
   <?php
                if(isset($_GET["msg"])){
                  ?>
                      <div class="alert alert-info w-50 d-flex justify-content-center d-block mx-auto mt-4">
                          <?php
                              echo $_GET["msg"];
                          ?>
                      </div>
                  <?php
                  }
                  ?>
  <div class="container" >
    
  <form method="post">
        <div class="row pt-2 mb-5 d-flex justify-content-center" >
            <div class="col-md-5 img-thumbnail d-flex justify-content-center bg-danger-subtle">
                <div class="row px-5">
                    <div class="col-xl-12 pt-4 fs-2 fw-bold text-dark" >Admin Login</div>
                    <div class="col-xl-12 pt-3">
                        <input type="text" placeholder="abc@gmail.com" name="email" class="form-control">
                    </div>
                    <div class="col-xl-12 pt-3">
                        <input type="password" placeholder="Password" name="password" class="form-control">
                    </div>
                    <div class="col-xl-12 pt-3">
                        <button class="btn btn-danger w-25 d-block mx-auto mb-3" name="submit_btn">Login</button>
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
        $query= "SELECT * from `admin` where `email`='$email' and `password`='$password'";
        $result=mysqli_query($connect,$query); 
        if(mysqli_num_rows($result)>0){
            $data=mysqli_fetch_assoc($result);
            $_SESSION["email"]=$email;
            $_SESSION["user_type"]="admin";
            $_SESSION["name"]=$data["name"];
            $_SESSION["user_id"]=$data["id"];
            echo "<script>window.location.assign('admin.php?msg=Login successfully!!')</script>";
        }else{
            echo "<script>window.location.assign('admin_login.php?msg=Invalid credentails')</script>";
        }
      }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>