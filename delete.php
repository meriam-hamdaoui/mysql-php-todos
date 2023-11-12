<?php
require 'conn.php';

if(isset($_GET['delete_id'])){

$id = $_GET['delete_id'];
  $delete = $conn->prepare('DELETE FROM tasks WHERE task_id=:task_id');

  $delete->execute([':task_id' => $id]);

  header('location:index.php');
}


 ?>
