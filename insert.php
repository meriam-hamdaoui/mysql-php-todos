<?php
# require my connection file
require 'conn.php';

# check if there is any input on button action
if(!empty($_POST['mytask']) and isset($_POST['submit'])){
  #create a var and assigned to the data we have
  $task = $_POST['mytask'];

  #create a prepare PDOStatement
  $insert = $conn->prepare('INSERT INTO tasks(task_name) VALUES(:name)');

  #execute commande
  $insert->execute([':name' => $task]);

  #keep the landing page on index after adding a tasks
  header('location:index.php');

} else if(empty($_POST['mytask'])){

  $message = "insert a task";
  echo '<script language="javascript">';
  echo "alert('$message')";
  echo '</script>';


header('location:index.php');
}
?>
