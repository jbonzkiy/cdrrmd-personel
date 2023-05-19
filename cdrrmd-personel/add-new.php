<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
   $full_name = $_POST['full_name'];
   $first_name = $_POST['first_name'];
   $last_name = $_POST['last_name'];
   $middle_name = $_POST['middle_name'];
   $status = $_POST['regular'];
   $division = $_POST['division'];
   $position = $_POST['position'];
   $date_created = $_POST['date_created'];

   $sql = mysqli_query($conn,"INSERT INTO `cdrrmd_personnel`(`id`,`full_name`,`first_name`, `last_name`,`middle_name`, `regular`,`division`, `position`, `date_created`) VALUES (NULL,'$full_name','$first_name','$last_name','$middle_name','$status','$division','$position','$date_created')");

   //$result = mysqli_query($conn, $sql);
   if ($sql) {
    //header("Location: index.php?msg=New personel created successfully");
      echo "<script>alert('New record successfully added!!!');</script>";
      echo "<script>document.location='index.php';</script>";
   } else {
    echo "Failed: " . mysqli_error($sql);
   }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <title>CDRRMD</title>
</head>

<body>
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
    <img src="assets/img/oro_rescue_logo_100px.png" width="30" height="30" class="d-inline-block align-top" alt="">
    CDRRMD PERSONEL 
  </a>
  
</nav>
<br>
   <div class="container">
      <div class="text-center mb-4">
         <h3>Add New Personel</h3>
         
      </div>
</br>
      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">

            <div class="mb-3">
          <label class="form-label">Full Name:</label>
          <input type="text" class="form-control" name="full_name" placeholder="" required>
        </div>

          <div class="col">
            <label class="form-label">First Name:</label>
            <input type="text" class="form-control" name="first_name" placeholder="" required>
          </div>

          <div class="col">
            <label class="form-label">Middle Name:</label>
            <input type="text" class="form-control" name="middle_name" placeholder="" required>
          </div>
        </div>

        <div class="col">
            <label class="form-label">Last Name:</label>
            <input type="text" class="form-control" name="last_name" placeholder="" required>
          </div>

          <div class="col">
            <label class="form-label">Status:</label>
            <input type="number" class="form-control" name="regular" min="0" max="1" placeholder="Regular = 1 or JO & Casual = 0" required>
          </div>
        

        <div class="col">
            <label class="form-label">Division:</label>
            <input type="text" class="form-control" name="division" placeholder="" required>
          </div>
        

        <div class="col">
            <label class="form-label">Position:</label>
            <input type="text" class="form-control" name="position" placeholder="" >
          </div>

          <div class="col">
            <label class="form-label">Date:</label>
            <input type="datetime-local" class="form-control" name="date_created" placeholder="" required>
          </div>
        

            <br><div>
               <button type="submit" class="btn btn-success" name="submit" onclick="return confirm('Are you sure you want to save?')">Save</button>
               <a href="add-new.php" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel?')">Cancel</a>
            </div></br>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>