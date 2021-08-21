<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>passport appointment request</title>
 

  
  <!-- Vendor CSS Files -->
   <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header style="" id="header" >

    <div class="container d-flex align-items-left">
      <a href="index.php">
        <img src="download.png">
      </a>

     
      <nav class="nav-menu d-none d-lg-block align-items-right">
        <ul> 
          <li ><a href="index.php">Home</a></li>

         
              <?php
       if ( isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)  {
      
          if ($_SESSION["is_user"] === true) {
            echo "<li><a  href='form.php'>schedule Appointment</a></li>"; 
            echo "<li><a  href='user_dashboard.php'>User Dashboard</a></li>";      
          } else {
             echo "<li><a  href='admin.php'>Admin Panel</a></li>";
          }
      echo "<li><a  href='logout.php'>Logout</a></li>";
      } else {
        echo "<li><a  href='form.php'>schedule Appointment</a></li>";
      echo "<li><a   href='register.php'>Register</a></li>";          
        echo "<li><a  href='login.php'>Login</a></li>";
      }
?>
               <!--  -->

            </ul>       
      </nav><!-- .nav-menu -->

      

    </div>
  </header><!-- End Header -->