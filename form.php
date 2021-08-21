<?php 
session_start();
include 'include/header.php';
include 'db.php';
if(!isset($_SESSION["loggedin"])){
  header("location: login.php");
} 
 // && $_SESSION["loggedin"] === true && $_SESSION["is_user"] = true

if (isset($_POST['submit'])) { 
  $user_id = $_SESSION['id'];
  $name = $_POST["name"];
  $nationality = $_POST["nationality"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $b_place = $_POST["b_place"];
  $b_date = $_POST["b_date"];
  $occupation = $_POST["occupation"];
  $gender = $_POST["gender"];
  $marital = $_POST["marital"];
  $height = $_POST["height"];
  $region = $_POST["region"];
  $city = $_POST["city"];
  $passport_type = $_POST["passport_type"];
  $photo = $_POST["photo"];
  $b_certificate = $_POST["b_certificate"];


$stmt = $connection->prepare("INSERT INTO `request`( `user_id`, `name`, `nationality`, `phone`, `email`, `birth_place`, `birth_date`, `occupation`, `gender`, `maritial_status`, `height`, `region`, `city`, `passport_type`, `photo`, `birth_certificate`, `request_date`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)"); 
 $stmt->bind_param("ississssssdsssssi", $pre_user_id, $pre_name, $pre_nationality, $pre_phone, $pre_email, $pre_birth_place, $pre_birth_date, $pre_occupation, $pre_gender, $pre_maritial_status, $pre_height, $pre_region, $pre_city, $pre_passport_type, $pre_photo, $pre_certificate, $pre_status);

 $pre_user_id = $user_id;
 $pre_name = $name;
 $pre_nationality = $nationality;
 $pre_phone = $phone;
 $pre_email =$email;
 $pre_birth_place = $b_place;
 $pre_birth_date =$b_date;
 $pre_occupation = $occupation;
 $pre_gender = $gender;
 $pre_maritial_status = $marital;
 $pre_height = $height;
 $pre_region = $region;
 $pre_city = $city;
 $pre_passport_type = $passport_type;
 $pre_photo = $photo;
 $pre_certificate = $b_certificate;
 $pre_status = 0;
 $stmt->execute();
 header("location: user_dashboard.php");

}
?>

<div class="container " >
  <div class="row">

  <form  action="form.php" method="POST">
      <div class="col-md-4 mb-3 mt-5">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">NAME</span>
        </div>
        <input type="text" class="form-control" name="name" id="validationCustomUsername" placeholder="Username" required>
      </div>
    </div>
      <div class="col-md-4 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" >Nationality</span>
        </div>
        <select name="nationality" class="form-control">
        <option selected>Ethiopian</option>
        <option>Non-Ethiopian</option>
      </select>
      </div>
    </div>

    <div class="col-md-4 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">email</span>
        </div>
        <input type="email" name="email" class="form-control" placeholder="email"  required>
      </div>
    </div>

   <div class="col-md-4 mb-3">
      
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">phone</span>
        </div>
        <input type="tel" name="phone" class="form-control" placeholder="phone number"  required>       
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">Birth_place</span>
        </div>
        <input type="text" name="b_place" class="form-control" placeholder="Adama"  required>
      
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"  id="inputGroupPrepend">Birth_date</span>
        </div>
        <input type="date" class="form-control" name="b_date"  placeholder="1/21/2021" required>
      </div>
    </div>
     <div class="col-md-4 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"   id="inputGroupPrepend">occupation</span>
        </div>
        <input type="text" class="form-control" name="occupation" placeholder="1/21/2021"  required>
       
      </div>
    </div>
      <div class="col-md-4 mb-3">
      
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">Gender</span>
        </div>
          <div class="custom-control custom-radio">
          <input type="radio" id="customRadio1" name="gender" value="Female" class="custom-control-input m-2">
          <label class="custom-control-label" for="customRadio1">Female</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" id="customRadio2" name="gender" value="Male" class="custom-control-input m-2">
          <label class="custom-control-label " for="customRadio2">Male</label>
        </div>

        <div class="invalid-feedback">
          Please insert your gender.
        </div>
      </div>
    </div>
     <div class="col-md-4 mb-3">
      
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">Marital status</span>
        </div>
          <div class="custom-control custom-radio">
          <input type="radio" id="customRadio1" name="marital" value="Single" class="custom-control-input m-2">
          <label class="custom-control-label" for="customRadio1">Single</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" id="customRadio2" name="marital" value="Married" class="custom-control-input m-2">
          <label class="custom-control-label " for="customRadio2">Married</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" id="customRadio2" name="marital" value="Divorced" class="custom-control-input m-2">
          <label class="custom-control-label " for="customRadio2">Divorced</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" id="customRadio2" name="marital" value="widowed" class="custom-control-input m-2">
          <label class="custom-control-label " for="customRadio2">widowed</label>
        </div>

        <div class="invalid-feedback">
          Please insert your marital status.
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
    
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">Height</span>
        </div>
        <input type="text" class="form-control" name="height" id="validationCustomUsername" placeholder="1.75m" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">
          Please insert your height.
        </div>
      </div>
    </div>
     <div class="col-md-4 mb-3">
      
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">Region</span>
        </div>
          <select name="region" name="region" class="form-control">
                        <option value="Addis Ababa City">Addis Ababa City</option>
                        <option value="Afar Region">Afar Region</option>
                        <option value="Amhara Region">Amhara Region</option>
                        <option value="Benishangul-Gumuz Region">Benishangul-Gumuz Region</option>
                        <option value="Dire Dawa City">Dire Dawa City</option>
                        <option value="Gambela Region">Gambela Region</option>
                        <option value="Harari Region">Harari Region</option>
                        <option value="Oromia region">Oromia Region</option>
                        <option value="Somali Region">Somali Region</option>
                        <option value="Souther Nations, Nationalities And Peoples' Region">Souther Nations, Nationalities And Peoples' Region</option>
                        <option value="Tigray Region">Tigray Region</option>
                        <option value="Sidama">Sidama</option>
                    </select>


        <div class="invalid-feedback">
          Please insert your  region.
        </div>
      </div>
    </div>   
     <div class="col-md-4 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">city</span>
        </div>
        <input type="text" class="form-control" name="city" id="validationCustomUsername" placeholder="Adama" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">
          Please insert a city.
        </div>
      </div>
    </div> 
        <div class="col-md-4 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">passport_type</span>
        </div>
        <select id="inputState" name="passport_type" class="form-control">
        <option value="32" selected>32-page</option>
        <option value="64">64-page</option>
      </select>
        <div class="invalid-feedback">
          Please choose a passport_type.
        </div>
      </div>
    </div>
        <div class="col-md-4 mb-3">
     <label for="validationCustomUsername">3*4 size photo</label>
      <div class="input-group">
       
        <input type="file" name="photo" class="form-control" id="validationCustomUsername" placeholder="3*4 size photo" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">
          Please insert your photo.
        </div>
      </div>
    </div>
        <div class="col-md-4 mb-3">
     <label for="validationCustomUsername">Birth_certificate</label>
      <div class="input-group">
       
        <input type="file" name="b_certificate" class="form-control" id="validationCustomUsername" placeholder="" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">
          Please insert your birth_certificate.
        </div>
      </div>
    </div>
  <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
</form>
</div>
</div>

    </section><!-- End form field Section -->
     <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="copyright"  style="text-align: center;">
          &copy; Copyright <strong><span>INVEA</span></strong>. All Rights Reserved
        </div>
        </div>
      </div>
           
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>