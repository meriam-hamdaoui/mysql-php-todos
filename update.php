<?php
require 'conn.php';



if(isset($_GET['update_id'])){

  $id = $_GET['update_id'];

  $data = $conn->query("SELECT * FROM tasks WHERE task_id='$id'");

#print_r($data);

$rows = $data->fetch(PDO::FETCH_OBJ);

if(!empty($_POST['mytask']) and isset($_POST['submit'])){
  #create a var and assigned to the data we have
  $task = $_POST['mytask'];

  #create a prepare PDOStatement
  $update = $conn->prepare("UPDATE tasks SET task_name=:name WHERE task_id='$id'");

  #execute commande
  $update->execute([':name' => $task]);

  #keep the landing page on index after adding a tasks
  header('location:index.php');

}
}

 ?>

 <?php include "header.php" ?>

 <form method="POST" action="update.php?update_id=<?php echo $id;?>" class="form-inline">
   <div class="form-group mx-sm-3 mb-2">
     <label for='inputPassword2' class="sr-only">create</label>
     <input name="mytask" type="text"
     class="form-control" id='inputPassword2' placeholder="Enter Task"
     value="<?php echo $rows->task_name; ?>">
   </div>
   <button name="submit" type="submit" class="btn btn-primary mb-2">EDIT</button>
 </form>

<?php include "footer.php" ?>
