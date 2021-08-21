<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: form.php");
}

include 'include/header.php';
include 'db.php';
if (isset($_POST['submit'])) {  
    $email = $_POST["email"];
    $password = $_POST["password"];
    $query = "SELECT * FROM user WHERE email = '".$email."'";
    $result = mysqli_query($connection, $query);

    while($row=mysqli_fetch_assoc($result))
    {
      $id = $row['id'];
      $user_type =$row['user_type'];
      $checkedEmail=$row['email'];
      $checkedPassword=$row['password'];
    }

    if(password_verify($password, $checkedPassword)){
      $_SESSION["loggedin"] = true;
      $_SESSION["id"] = $id;
      if($user_type ==1){
        $_SESSION["is_user"] = true;
        $query = "SELECT * FROM request WHERE user_id = '".$_SESSION["id"]."'";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result)>0){
          header("location: user_dashboard.php");
        } else{
          header("location: form.php");
        }
        
      } else  {
        $_SESSION["is_user"] = false;
         header("location: admin.php");
      }
      //echo "Correct!";
    } else { 
      echo "<p class='bg-danger text-white text-center'>password or email is Not Correct </p>";
    }
  }


  if(isset($_GET['register']) && $_GET['register'] == "true"){
    echo "<p class='bg-success text-white text-center'>You have successfully registered</p>";
  }
 

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

  <title>Login</title>
   <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">    
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  <section id="myform">
    <form action="login.php" method="POST">
      <div><img class="img" src="1200px-Emblem_of_Ethiopia.png"></div>
      <div style="padding-bottom: 10px;"><h4>Welcome to Ethiopian <br> passport seervice</h4>
        </div>
        <div class="input"><i class="fas fa-user"></i>
          <input type="email" name="email" placeholder="email"></div>
          <div class="input"> <i class="fas fa-key"></i>
            <input type="password" name="password" placeholder="password"></div>
            <button name="submit" class="button">Login</button>
            <div><p>You dont have account? <span class="sp"> </span><a style=" background-color: white;"  href="register.php">Register</a></p>
          </div>
    </form>
  </section>
       <footer style="margin-top: 65px;" id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="copyright"  style="text-align: center;">
          &copy; Copyright <strong><span>INVEA</span></strong>. All Rights Reserved
        </div>
        </div>
      </div>
           
  </footer><!-- End Footer -->
   <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>


 <script src="assets/js/main.js"></script>
</body>
</html>