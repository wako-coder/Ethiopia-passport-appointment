<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: form.php");
  exit;
}


include 'include/header.php';
include 'db.php';
if (isset($_POST['submit'])) {
    $name = $_POST["name"];  
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    if($name !='' && $email != '' && $password != ''){
      // prepare and bind
      $stmt = $connection->prepare("INSERT INTO user(name, email, password, user_type) VALUES (?, ?, ?, ?)");
      $stmt->bind_param("sssi", $pre_name, $pre_email, $pre_password, $pre_user_type);

      // set parameters and execute
      $pre_name = $name;
      $pre_email = $email;
      $pre_password = $hashed_password;
      $pre_user_type = 1;
      $stmt->execute();




/*
      $query = "INSERT INTO `user`( `name`, `email`, `password`, `user_type`) 
        VALUES ('".$name."', '".$email."', '".$hashed_password. "' ,1)";
        $result = mysqli_query($connection, $query);*/

        header("location: login.php?register=true");
      }
     else {
         echo "<p class='bg-danger text-white text-center'>Please fill all the require fields</p>";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Register</title>
   <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">	  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	  <!-- ======= Header ======= -->
<!--
  <header style="background-color: blue;" id="header" class="fixed-top ">

    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a style=" color: white;" href="index.html">INVEA</a></h1>
     
      <nav class="nav-menu d-none d-lg-block">
        <ul> 
          <li ><a style=" color: white;" href="index.html">Home</a></li>
          <li><a style=" color: white;" href="form.html">schedule Appointment</a></li>            
              <li><a style=" color: yellow;"  href="rigester.html">Register</a></li>
               <li><a style=" color: white;" href="login.html">Login</a></li>
            </ul>       
      </nav><!-- .nav-menu -->

      

    </div>
  </header><!-- End Header -->	
	<section id="myform">
		<form action="register.php" method="POST">
			<div ><img class="img" src="1200px-Emblem_of_Ethiopia.png"></div>
			<div style="padding-bottom: 10px;"><h4>Welcome to Ethiopian <br> passport seervice</h4></div>
				<div class="input"><i class="fas fa-user"></i>
					<input type="text" name="name" placeholder="name" required></div>
					<div class="input"><i class="fas fa-user"></i>
					<input type="email" name="email" placeholder="email" required></div>
					<div class="input"> <i class="fas fa-key"></i>
						<input type="password" name="password" placeholder="password" required></div>
						<button name="submit" class="button">register</button>
						<div><p>do you have account? <span class="sp"> </span><a style=" background-color: white;" href="login.php">Login</a></p>
					</div>
		</form>
	</section>
     <footer style="margin-top: 20px;" id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="copyright"  style="text-align: center;">
          &copy; Copyright <strong><span>INVEA</span></strong>. All Rights Reserved
        </div>
        </div>
      </div>
           
  </footer><!-- End Footer -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>


 <script src="assets/js/main.js"></script>
</body>
</html>