
<?php 
  include("db_conn.php");
 
   $name = $_POST['name'];

  
   $sql =  mysqli_query($conn, "SELECT * FROM cdrrmd_personnel WHERE  
       first_name  LIKE '%$name%' 
   OR  full_name LIKE '%$name%'
   OR  middle_name LIKE '%$name%' 
   OR  last_name LIKE '%$name%'
   OR  division LIKE '%$name%'
   OR  position LIKE '%$name%'
   ");  
   //$result = mysqli_fetch_array($sql);
   $count = 1;
  
   if (mysqli_num_rows($sql) > 0) {
   //$data='';
   while($row = mysqli_fetch_assoc($sql))
   {
    
     echo "<table>";
    echo "<tr>";
        echo "<tr><td><h5>".$count."</h5></td>
        <td><h5>".$row["first_name"]."</h5></td>
        <td><h5>".$row["middle_name"]."</h5></td>
        <td><h5>".$row["last_name"]."</h5></td>
        <td><h5>".$row["division"]."</h5></td>
        <td><h5>".$row["position"]."</h5></td>
        <td><h5>".$row["date_created"]."</h5></td>
        <td>"

       ."<a href='edit.php?id=".$row['id']."'> <i class='fa-solid fa-pen-to-square fs-5 me-3 link-dark'></i></a>
        <a href='delete.php?id=".$row['id']."'> <i class='fa-solid fa-trash fs-5 link-dark'></i></a>
       <a ".$row["full_name"]." class = 'hidden:true'></a>
       </td></tr>";
       
     echo "</table>";
     
     $count = $count+1;
   }
   //echo $data;
  }
     

  else {
    echo "<tr><td colspan='10'align='center'><h3>No records found </h3></td></tr>";
    
}



mysqli_close($conn);
       
 ?>
