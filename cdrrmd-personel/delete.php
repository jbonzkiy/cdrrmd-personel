<?php
include "db_conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM `cdrrmd_personnel` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  //header("Location: index.php?msg=Data deleted successfully");
  echo "<script>alert('Personel data delete successfully!!!');</script>";
      echo "<script>document.location='index.php';</script>";
  return "index.php";
} else {
  echo "Failed: " . mysqli_error($conn);
}
