
<?php
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


  <!-- Bootstrap -->

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  
  <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  
  <script>
        $(document).ready(function(){
          $("#myInput").on("keyup",function(){
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function(){
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        </script>

  
  <title>CDRRMD</title>
</head>

<body>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <div class="navbar-header">
  <a class="navbar-brand" href="#">
    <img src="assets/img/oro_rescue_logo_100px.png" width="50" height="50" class="d-inline-block align-top" alt="Brand">
    CDRRMD PERSONEL 
  </a>
      </div>
      </div>
</nav>

  <div class="container-fluid">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
   <div class="container m-2">
    <div class="row">
      <div class="col-md-12 form-group">
      <h3>List of Records<a href="add-new.php" class="btn btn-outline-success float-end"><span class="glyphicon glyphicon-plus"></span> Add new Personel</a>
  </div>
  </div>
   
   
<div class="row">
 <div class="col-md-12">
   <div class="form-group m-3">
      <input type="text" id="myInput" class="form-control form-control-lg rounded-2 border-dark" placeholder="Search..." >
  </div>

  <div class= "table-responsive">
    <table class="table table-hover text-center table-striped">
      <thead class="table-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">First Name</th>
          <th scope="col">Middle Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Division</th>
          <th scope="col">Position</th>
          <th scope="col">Date Created</th>
          <th scope="col">Action</th>
          
        </tr>
      </thead>
      <tbody id="myTable">
        <?php
       require_once "db_conn.php";

    
        $sql = mysqli_query($conn,"SELECT * FROM `cdrrmd_personnel` ORDER BY `first_name`");
        //$result = mysqli_query($conn, $sql);
        $count = 1;
        $row = mysqli_num_rows($sql);
        if($row > 0){
          while ($row = mysqli_fetch_array($sql)) {
        ?>
          <tr>
            <td><?php echo $count;?></td>
            <td><?php echo $row["first_name"]  ?></td>
            <td><?php echo $row["middle_name"] ?></td>
            <td><?php echo $row["last_name"] ?></td>
            <td><?php echo $row["division"] ?></td>
            <td><?php echo $row["position"] ?></td>
            <td><?php echo $row["date_created"] ?></td>
            
            <td>
              <a href="edit.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="delete.php?id=<?php echo $row["id"] ?>" onclick="return confirm('Do you really want to remove this record?')" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        $count = $count+1;
          }}
        ?>
      </tbody>
    </table>
              


  </div>
</div>
      </div>
  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        </div>
</body>

</html>