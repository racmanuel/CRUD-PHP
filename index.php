<?php include 'db.php'; ?>
<?php include 'includes\header.php'; ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?=$_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>
      <div class="card card-body">
        <form action="insert.php" method="post">
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
          </div>
          <div class="form-group">
            <textarea name="description" rows="8" class="form-control" placeholder="Task Description"></textarea>
          </div>
          <input type="submit" class="btn btn-success btn-block" name="save" value="Save">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Id</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query="SELECT * FROM task";
          $tasks=mysqli_query($conn,$query);
          while ($task =mysqli_fetch_array($tasks)) { ?>
            <tr>
              <td><?php echo $task['title']; ?></td>
              <td><?php echo $task['description']; ?></td>
              <td><?php echo $task['created_ad']; ?></td>
              <td>
                <a href="edit.php?id=<?php echo $task['id']; ?>" type="button" class="btn btn-primary btn-sm">
                  <i class="material-icons">edit</i>
                </a>
                <a href="delete.php?id=<?php echo $task['id']; ?>" type="button" class="btn btn-danger btn-sm">
                  <i class="material-icons">delete_forever</i>
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include 'includes\footer.php'; ?>
