<?php 
session_start();

include 'include/header.php';
include 'db.php';


    if(isset($_POST['approve'])){
      $update_query = "UPDATE request SET status = 1, appointment_date = '".$_POST['date1']."' WHERE id = ".$_POST['approve'];
      mysqli_query($connection, $update_query);
    } elseif (isset($_POST['reject'])) {
      $update_query = "UPDATE request SET status = 3 WHERE id = ".$_POST['reject'];
      mysqli_query($connection, $update_query);
    }
?>
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

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>



<div class="container" >
  <div class="row">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Full Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    <?php


  $query = "SELECT * FROM request WHERE status = 0";
    $result = mysqli_query($connection, $query);
    $count = 0;
    while ($row = mysqli_fetch_array($result)) {

      
      echo "<tr>";
      echo "<td>".++$count."</td>";
      echo "<td>".$row['name']."</td>";
      echo "<td>".$row['phone']."</td>";
      echo "<td>".$row['email']."</td>";

      echo '<td>
<div class="modal fade" id="'.$row['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p> Name: '.$row['name'].'</P>
        <p> Nationality: '.$row['nationality'].'</P>
        <p> Phone: '.$row['phone'].'</P>
        <p> Email: '.$row['email'].'</P>
        <p> Birth Place: '.$row['birth_place'].'</P>
        <p> Birth Date: '.$row['birth_date'].'</P>
        <p> Occupation: '.$row['occupation'].'</P>
        <p> Marital Status: '.$row['maritial_status'].'</P>
        <p> Height: '.$row['height'].'</P>
        <p> Region: '.$row['region'].'</P>
        <p> City: '.$row['city'].'</P>
        <p> Passport Type: '.$row['passport_type'].'</P>
        <p> Request Date: '.$row['request_date'].'</P>
      </div>
      <div class="modal-footer">
      <form method="post">
        <input type="date" class="form-control" name="date1">
        <button type="submit" name = "reject" value="'. $row['id'].'" class="btn btn-danger">Reject</button>
        <button type="submit" name = "approve" value="'. $row['id'].'" class="btn btn-success">Approve</button>
      </form>
        
      </div>
    </div>
  </div>
</div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#'.$row['id'].'">show</button>
      </td>';

      echo "</tr>";

    }

 /*   while($row=mysqli_fetch_assoc($result))
    {
      
    }*/

?>
  </tbody>
</table>





</div>
</div>

    </section><!-- End About Us Section -->
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
 
  <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script type="text/javascript">
    

    $('#exampleModalCenter').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
  </script>

</body>

</html>