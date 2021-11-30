<html>
 <head>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <title>PHP Test</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="style_todolist.css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,500i,700,800i" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
  <body>
<?php include 'header.php';?>
<div class="profile-info-brief p-3">
    <div class="text-center">
        <h5 class="text-uppercase mb-4">Jim Halpert</h5>
    </div>
</div>
<div class="container">
        <hr class="m-0">

        <div class="profile-wrapper">
            <div class="profile-section-user">
                <!-- /.profile-info-brief -->
                <div class="hidden-sm-down">
                    <div class="profile-info-contact p-4">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><strong>URL:</strong></td>
                                    <td>
                                        <p class="text-muted mb-0">jim.com</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>EMAIL:</strong></td>
                                    <td>
                                        <p class="text-muted mb-0">jim@gmail.com</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>PHONE:</strong></td>
                                    <td>
                                        <p class="text-muted mb-0">01145525755</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>SKYPE:</strong></td>
                                    <td>
                                        <p class="text-muted mb-0">jimhalp</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.profile-info-general -->
                    <hr class="m-0">
                </div>
                <!-- /.hidden-sm-down -->
            </div>
          </div>
          <div class="todolist_content">
            <?php
                // initialize errors variable
              $errors = "";
              // connect to database
              $db = mysqli_connect("localhost", "root", "Sherry0924", "final_project");

              // insert a quote if submit button is clicked
              if (isset($_POST['submit'])) {
                if (empty($_POST['task'])) {
                  $errors = "*You must fill in the task";
                }else{
                  $task = $_POST['task'];
                  $sql = "INSERT INTO task (task) VALUES ('$task')";
                  mysqli_query($db, $sql);
                  header('location: index.php');
                }
              }
              if (isset($_GET['del_task'])) {
            $id = $_GET['del_task'];

            mysqli_query($db, "DELETE FROM task WHERE id=".$id);
            header('location: index.php');
          }

          ?>
            <!-- h1>Lorem5 press tab -->
            <div class="container">
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

                      </form><p style="font-size:10px;color:red;">*Click Task name to mark it done.</p>
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
                              // select all tasks if page is visited or refreshed
                              $tasks = mysqli_query($db, "SELECT * FROM task");
                              $i = 1; 
                              while ($row = mysqli_fetch_array($tasks)) { ?>
                                  <tr>
                                      <td class="number" width="10"> <?php echo $i; ?> </td>
                                      <td class="task"> <?php echo $row['task']; ?> </td>
                                      <td class="action">
                                          <a href="index.php?del_task=<?php echo $row['id'] ?>" >Remove</a>
                                      </td>
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
    <div class="container">
              <div class="row justify-content-center">

            <ul>
                <li>

                    <div class="content">

                      <p class="title"><b>Work from Admin:</b></p>

                      <form method="post" action="index.php" class="input_form">
                        <?php if (isset($errors)) { ?>
                      <p><?php echo $errors; ?></p>
                    <?php } ?>

                          <input type="text" name="task" class="task_input">
                          <button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>

                      </form><p style="font-size:10px;color:red;">*Click Task name to mark it done.</p>
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
                              // select all tasks if page is visited or refreshed
                              $tasks = mysqli_query($db, "SELECT * FROM task");
                              $i = 1; 
                              while ($row = mysqli_fetch_array($tasks)) { ?>
                                  <tr>
                                      <td class="number" width="10"> <?php echo $i; ?> </td>
                                      <td class="task"> <?php echo $row['task']; ?> </td>
                                      <td class="action">
                                          <a href="index.php?del_task=<?php echo $row['id'] ?>" >Remove</a>
                                      </td>
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
  </div>
  <?php include 'general_includes/footer.php';?>
  </body>
  <script>

// Add a "checked" symbol when clicking on a list item
$(function(){
  var $curParent, Content;
  $(document).delegate("td.task","click", function(){
    if($(this).closest("s").length) {
      Content = $(this).parent("s").html();
      $curParent = $(this).closest("s");
      $(Content).insertAfter($curParent);
      $(this).closest("s").remove();
    }
    else {
      $(this).wrapAll("<s />");
    }
  });
});


</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</html>