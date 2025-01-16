<?php
include("header.php");
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bgc.jpg'); height:520px;" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate text-center mb-5">
        <h1 class="mb-5 bread fw-bold">Contact us</h1>
        
      </div>
    </div>
  </div>
</section>
<?php
if(isset($_GET["msg"])){
            ?>
                <div class="alert alert-info w-50 d-flex justify-content-center d-block mx-auto mt-5">
                    <?php
                        echo $_GET["msg"];
                    ?>
                </div>
            <?php
            }
            ?>
<section class="ftco-section contact-section bg-light">
  
  <div class="container">
    <div class="row d-flex contact-info">
      <div class="col-md-12">
        <h2 class="h4 font-weight-bold">Contact Information</h2>
      </div>
      <div class="w-100"></div>
      <div class="col-md-3 d-flex">
       <div class="dbox">
         <p><span>Address:</span> C/O The Heritage Village, G T Road, G T Road, Jalandhar - 144001</p>
       </div>
     </div>
     <div class="col-md-3 d-flex">
       <div class="dbox">
         <p><span>Phone:</span> <a href="tel://1234567920">+91 8288909235</a></p>
       </div>
     </div>
     <div class="col-md-3 d-flex">
       <div class="dbox">
         <p><span>Email:</span> <a href="mailto:info@yoursite.com">nirvanajalandhar@gmail.com</a></p>
       </div>
     </div>
     <div class="col-md-3 d-flex">
       <div class="dbox">
         <p><span>Website</span> <a href="#">NirvanaRestaurant.com</a></p>
       </div>
     </div>
   </div>
 </div>
</section>

<section class="ftco-section ftco-no-pt contact-section">
 <div class="container">   
  <div class="row d-flex align-items-stretch no-gutters">
   <div class="col-md-6 p-5 order-md-last">
    <h2 class="h4 mb-5 font-weight-bold">Contact Us</h2>
    <form action="#">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Your Name" name="name" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Your Email" name="email" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Subject" name="subject" required>
      </div>
      <div class="form-group">
        <textarea cols="30" rows="5" class="form-control" placeholder="Message" name="message" required></textarea>
      </div>
      <div class="form-group">
        <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5" name="submit_btn">
      </div>
    </form>
  </div>
  <div class="col-md-6 d-flex align-items-stretch">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3409.9366397045555!2d75.67390577560181!3d31.277847774326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a58d254051053%3A0x79a3b83ecfe44040!2sHaveli!5e0!3m2!1sen!2sin!4v1720106043235!5m2!1sen!2sin" width="600" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</div>
</div>
<?php
    if(isset($_REQUEST["submit_btn"])){
		$name=$_REQUEST["name"];
  $email=$_REQUEST["email"];
  $subject=$_REQUEST["subject"];
  $message=$_REQUEST["message"];
  

  include("config.php");

  $query= "INSERT into `contact_us`(`name`,`email`,`subject`,`message`)VALUES('$name','$email','$subject','$message')";
  $result=mysqli_query($connect,$query);
  if($result>0){
      echo "<script>window.location.assign('contact.php?msg=Your message has been sent')</script>";
   }else{
    echo "<script>window.location.assign('contact.php?msg=Error! Try again later')</script>";
   }
}
?>
</section>

<?php
include("footer.php");
?>