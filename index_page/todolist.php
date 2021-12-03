<div class="todolist">
  <?php
      // initialize errors variable
    $errors = "";
    // connect to database
    $db = mysqli_connect("localhost", "root", "", "pract");
    // insert a quote if submit button is clicked
    if (isset($_POST['submit']))
    {
      if (empty($_POST['task']))
      {
        $errors = "*You must fill in the task";
      }
      else
      {
        $task = $_POST['task'];
        $group_id = $_SESSION['group_id'];
        $user_id = $_SESSION['user_id'];
        $sql = "INSERT INTO `task`(`text`, `task_userid`, `group_id`, `from_admin`) VALUES ('$task','$user_id','$group_id',0)";
        //$sql = "INSERT INTO task (task) VALUES ('$task')";
        mysqli_query($db, $sql);
      }
    }
    if (isset($_GET['del_task']))
    {
      $id = $_GET['del_task'];
      mysqli_query($db, "DELETE FROM task WHERE id=".$id);
    }
  ?>
  <div>
    <div class="row justify-content-center">
      <ul>
        <li>
          <div class="content">
            <p class="title"><b>TO DO LIST:</b></p>
            <form method="post" action="index.php" class="input_form">
              <?php if (isset($errors)) { ?>
              <p><?php echo $errors; ?></p>
              <?php } ?>
              <input type="text" name="task" class="task_input">
              <button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
            </form>
            <center>
            <table>
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Tasks</th>
                  <th style="width: 60px;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // select user created tasks if page is visited or refreshed
                $user_id = $_SESSION['user_id'];
                $tasks = mysqli_query($db, "SELECT * FROM task where from_admin = 0 && task_userid = '$user_id'");
                $i = 1; 
                while ($row = mysqli_fetch_array($tasks)) { ?>
                  <tr>
                    <td class="number" width="10"> <?php echo $i; ?> </td>
                    <td class="task"> <?php echo $row['text']; ?> </td>
                    <td class="action">
                        <a href="index.php?del_task=<?php echo $row['id'] ?>" >Remove</a>
                    </td>
                  </tr>
                  <?php $i++; } ?>
              </tbody>
              <tbody>
                <?php
                // select tasks from admin assigned if page is visited or refreshed
                $user_id = $_SESSION['user_id'];
                $tasks = mysqli_query($db, "SELECT * FROM task where from_admin = 1 && task_userid = '$user_id'");
                $i = 1; 
                while ($row = mysqli_fetch_array($tasks)) { ?>
                  
                  <tr>
                    <td class="number" width="10"> <?php echo $i; ?> </td>
                    <td class="task"> <?php echo $row['text']; ?> </td>
                  </tr>
                  <?php $i++; } ?>
              </tbody>
              </table></center>
            </div>
        </li>
      </ul>
    </div>
  </div>
</div>