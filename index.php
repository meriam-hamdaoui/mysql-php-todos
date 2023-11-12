
<?php
# pull in the data from db

require "conn.php";

$data = $conn->query('SELECT * FROM tasks')

 ?>
<?php include "header.php" ?>
    <div class="container">
      <form method="POST" action="insert.php" class="form-inline">
        <div class="form-group mx-sm-3 mb-2">
          <label for='inputPassword2' class="sr-only">create</label>
          <input name="mytask" type="text" class="form-control" id='inputPassword2' placeholder="Enter Task">
        </div>
        <button name="submit" type="submit" class="btn btn-primary mb-2">ADD</button>
      </form>

<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Task Name</th>
      <th>REMOVE</th>
      <th>EDIT</th>

    </tr>
  </thead>
  <tbody>
<!-- fetch our data  -->

<?php while ($rows = $data->fetch(PDO::FETCH_OBJ)): ?>
   <tr>
      <td><?php echo $rows->task_id; ?> </td>
      <td><?php echo $rows->task_name; ?></td>
      <td>
        <a href="delete.php?delete_id=<?php echo $rows->task_id; ?>"
           class="btn btn-danger"><i class="fa-solid fa-trash "></i></a>
      </td>
      <td>
           <a href="update.php?update_id=<?php echo $rows->task_id; ?>"
              class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
      </td>
    </tr>
<?php endwhile; ?>
  </tbody>
</table>
    </div>


<?php include "footer.php" ?>
