<?php
include 'db.php';
if (isset($_POST['save'])) {
  // code...
  $title=$_POST['title'];
  $description=$_POST['description'];

  $query="INSERT INTO task(title,description) VALUES ('$title',' $description')";
  $result=mysqli_query($conn,$query);
  if (!$result) {
    // code...
    die("Error");
  }
  $_SESSION['message'] = "Task Saved successfully";
  $_SESSION['message_type'] = "success";  
  header("Location: index.php");
}
 ?>
