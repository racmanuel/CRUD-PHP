<?php
include 'db.php';

if (isset($_GET['id'])) {
  // code...
  $id=$_GET['id'];
  $query ="DELETE FROM task WHERE id='$id'";
  $delete=mysqli_query($conn,$query);
  if (!$delete) {
    // code...
    die("Error");
  }
  $_SESSION['message'] = "Task deleted successfully";
  $_SESSION['message_type'] = "danger";
  header("Location: index.php");
}
 ?>
