
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  
  <title>CDRRMD</title>
</head>

<body>
  <nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">
    <h1><img src="assets/img/oro_rescue_logo_100px.png" width="50" height="50" class="d-inline-block align-top" alt="index.php">
    CDRRMD PERSONEL 
</h1></img>
  </a>
  
</nav>

  <div class="container">
    <?php
   header('Content-Type: text/html; charset=UTF-8');
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
      <h3>List of Records<a href="add-new.php"  class="btn btn-outline-success float-end"><span class="glyphicon glyphicon-plus"></span> Add new Personel</a>
  </div>
  </div>
   
   
<div class="row">
 <div class="col-md-12">
   <div class="form-group m-3">
      <input type="text" id="getName" class="form-control form-control-lg rounded-2 border-dark" placeholder="Search..." >
  </div>

  <div class= "table-responsive">
    <table class="table table-hover text-center table-striped">
      <thead class="table-dark">
        <tr>
          <th scope="col"><h5>#</h5></th>
          <th scope="col"><h5>First Name</h5></th>
          <th scope="col"><h5>Middle Name</h5></th>
          <th scope="col"><h5>Last Name</h5></th>
          <th scope="col"><h5>Division</h5></th>
          <th scope="col"><h5>Position</h5></th>
          <th scope="col"><h5>Date Created</h5></th>
          <th scope="col"><h5>Action</h5></th>
          
        </tr>
      </thead>
      <tbody id="showdata">
        <?php
       require_once "db_conn.php";
       header('Content-Type: text/html; charset=UTF-8');
      if(isset($_GET['page_no']) && $_GET['page_no']!=""){
        $page_no = $_GET['page_no'];
      }else{
        $page_no = 1;
      }
        $total_records_per_page = 20;
        $offset = ($page_no-1) * $total_records_per_page;
        $previous_page = $page_no - 1;
        $next_page = $page_no + 1;
        $adjacents = "2";

        $result_count=mysqli_query($conn,"SELECT COUNT(*) as total_records FROM cdrrmd_personnel ");
        $total_records = mysqli_fetch_array($result_count);
        $total_records = $total_records['total_records'];
        $total_no_of_pages = ceil($total_records / $total_records_per_page );
        $second_last = $total_no_of_pages - 1;

      



        $sql = mysqli_query($conn,"SELECT * FROM `cdrrmd_personnel` ORDER BY `first_name` LIMIT $offset,$total_records_per_page ");
        //$result = mysqli_query($conn, $sql);
        $count = 1;
        $row = mysqli_num_rows($sql);
        if($row > 0){
          while ($row = mysqli_fetch_assoc($sql)) {
        ?>
        
          <tr>
            <td><h5><?php echo $count;?></h5></td>
            <td><h5><?php echo $row["first_name"]  ?></h5></td>
            <td><h5><?php echo $row["middle_name"] ?></h5></td>
            <td><h5><?php echo $row["last_name"] ?></h5></td>
            <td><h5><?php echo $row["division"] ?></h5></td>
            <td><h5><?php echo $row["position"] ?></h5></td>
            <td><h5><?php echo $row["date_created"] ?></h5></td>
            
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
              <nav aria-label="Page navigation example">
             <ul class="pagination justify-content-center">
            <!-- <li class="justify-content-right btn btn-default disabled m-3">Showing page <?php echo $page_no. " of ". $total_no_of_pages; ?></li> -->
              <li <?php if($page_no <= 1) {echo "class='disabled'";}?>>
              <a <?php if($page_no > 1) { echo "href='?page_no=$previous_page'";}?>>Previous</a>
            
            </li>

            <?php
              if($total_no_of_pages <= 10){

                for($counter = 1; $counter <=$total_no_of_pages;$counter++){
                  if($counter == $page_no){
                    echo "<li class='active'><a>$counter</a></li>";
                }else{
                  echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }
              }
              }elseif($total_no_of_pages > 10){
                if($page_no <=4){
                    for($counter = 1; $counter < 8; $counter++){
                      if($counter == $page_no ){
                        echo "<li class='active'><a>$counter</a></li>";
                      }else{
                        echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                      }
                    }
                      echo "<li><a>...</a></li>";
                      echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                      echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                }elseif($page_no > 4 && $page_no < $total_no_of_pages - 4 ){
                  echo "<li><a href='?page_no=1'>First</a></li>";
                  echo "<li><a href='?page_no=2'>1</a></li>";
                  echo "<li><a>...</a></li>";

                  for($counter = $page_no - $adjacents; $counter <=$page_no + $adjacents;$counter++){
                    if($counter == $page_no){
                      echo "<li class='active'><a>$counter</a></li>";
                    }else{
                      echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                    }

                  }
                  echo "<li><a>...</a></li>";
                  echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                  echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";

                }else{
                  echo "<li><a href='?page_no=1'>First</a></li>";
                  echo "<li><a href='?page_no=2'>1</a></li>";
                  echo "<li><a>...</a></li>";
                  for($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages;$counter++){
                    if($counter == $page_no){
                      echo "<li class='active'><a>$counter</a></li>";
                    }else{
                      echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                    }
                  }

                }

              }
            ?>
            <li <?php if($page_no >=$total_no_of_pages){ echo "class='disabled'";}?>>
            <a <?php if($page_no < $total_no_of_pages){ echo "href='?page_no=$next_page'";}?>>Next</a>
            </li>
              <?php if($page_no < $total_no_of_pages) {echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo; &rsaquo; </a></li>";}?>
            </ul>
            </nav>


  </div>
</div>

      </div>
      </div>
      </div>
      </div>
      </div>
      </div>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        </div>


        <?php
$ipAddress = '192.168.0.147'; // Replace with the desired IP address

// Using the IP address as hostname in PHP cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://$ipAddress/cdrrmd-personel");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Output the response
echo $response;
?>





        <script>
  $(document).ready(function(){
   $('#getName').on("keyup", function(){
     var getName = $(this).val();
     $.ajax({
       method:'POST',
       url:'searchajax.php',
       data:{name:getName},
       success:function(response)
       {
            $("#showdata").html(response);
       } 
     });
   });
  });
</script>
</body>

</html>