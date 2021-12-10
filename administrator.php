<?php 

session_start();
$conn = new PDO('mysql:host=localhost;dbname=pract','root','');
if (!$conn) {
    echo "Connection failed!";
}

?>

<?php
if(isset($_POST[""]))
?>

<html>
 <head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <title>PHP Test</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,500i,700,800i" rel="stylesheet">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
  <body>
  <?php include 'general_includes/header.php';?>

  <div class = "main-text">
  <?php 

$group = $_SESSION["group_id"];


?>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="profile-wrapper">
    <div class="profile-section-user">
        <div class="profile-cover-img"><img src="https://bootdey.com/img/Content/flores-amarillas-wallpaper.jpeg" alt=""></div>
        <div class="profile-info-brief p-3"><img class="img-fluid user-profile-avatar" src="resources/michael.png" alt="">
            <div class="text-center">
                <h5 class="text-uppercase mb-4"><?php echo $_SESSION["fname"]. " " . $_SESSION["lname"];?></h5>
                <p class="text-muted fz-base"></p>
            </div>
        </div>
        <!-- /.profile-info-brief -->
        <hr class="m-0">
        <div class="hidden-sm-down">
            <hr class="m-0">
            <div class="profile-info-contact p-4">
                <h6 class="mb-3"><?php $g = "SELECT gname FROM `group` where group_id = $group";
                        $qg = $conn->prepare($g);
                        $qg->execute();
                        $gg = $qg->fetchAll();
                        foreach ($gg as $u) {
                            echo $u["gname"];
                        }?></h6>
                <table class="table-admin">
                 <form method="post" action="administrator.php">
                    <tbody>
                        <?php 
                        $sql_users = "SELECT * FROM `users` where group_id = $group";
                        $query_users = $conn->prepare($sql_users);
                        $query_users->execute();
                        $q_users = $query_users->fetchAll();
                        foreach ($q_users as $u) {
                            $html = "<tr><td>" . $u["fname"] . " " . $u["lname"] . "</td><td>User ID:</td><td><input type=\"submit\" name=\"view_task\"value=\"". $u["user_id"] ."\"></td></tr>";
                            echo $html;
                        }
                        ?>   
                        <form action="administrator.php" method="post" name="all_view">
                        <input type="submit" name="view_all" value="View All Tasks"/></form>
                    </tbody>
                    </form> 
                </table>
            </div>
            <!-- /.profile-info-contact -->
            <hr class="m-0">
            <div class="profile-info-general p-4">
                <h6 class="mb-3">General Information</h6>
                <table class="table">
                    <tbody>
                        <tr>
                            <td><strong>JOB:</strong></td>
                            <td>
                                <p class="text-muted mb-0">Web Developer</p>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>POSITION:</strong></td>
                            <td>
                                <p class="text-muted mb-0">Team Manager</p>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>STUDIED:</strong></td>
                            <td>
                                <p class="text-muted mb-0">Computer Science</p>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>LAST SEEN:</strong></td>
                            <td>
                                <p class="text-muted mb-0">Yesterday 8:00 AM</p>
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
    <!-- /.profile-section-user -->
    <div class="profile-section-main">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs profile-tabs" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#profile-overview" role="tab">ASSIGN A TASK</a></li>
            <li class="nav-item">
            <form id="add_task" method="post" action="administrator.php">

            <select class="sel_user" name="user" id="users_assign">
                <?php 
                $sql = "SELECT * FROM `users` WHERE group_id = $group";
                $query = $conn->query($sql);
                $res = $query->fetchAll();
                foreach ($res as $row){
                  echo "<option class=\"opt\" value =\"" . $row["user_id"] ."\">" . $row["fname"] ." ". $row["lname"] ."</option>"; 
                }
                ?>
            </select> 
            </li>
        </ul>
        <!-- /.nav-tabs -->
        <!-- Tab panes -->
        <div class="tab-content profile-tabs-content">
            <div class="tab-pane active" id="profile-overview" role="tabpanel">
            
            <div class="post-editor">
                    <textarea form="add_task" name="post-field" id="post-field" class="post-field" placeholder="Write The Assignment"></textarea>
                    <div class="d-flex">
                        <button type="submit" name="add_t" form="add_task" class="btn btn-success px-4 py-1">CREATE TASK</button>
                    </div>
                </div>
              
                <!-- /.post-editor -->
                
            </form> 
                <div class="stream-posts">
                    <form action="administrator.php" method="post">
                    <?php 
                    if (isset($_POST["view_task"])) {
                      $user = $_POST["view_task"];
                      $sql_n = "SELECT `fname`,`lname` FROM `users` WHERE `user_id` = $user";
                        $query_n = $conn->prepare($sql_n);
                        $query_n->execute();
                        $q_n = $query_n->fetchAll();
                        foreach ($q_n as $n) {
                          echo "<h3>Tasks For: ".$n["fname"] . " " . $n["lname"]."</h3>";
                        }
                      $sql_t = "SELECT * FROM `task` WHERE `task_userid` = $user";
                        $query_t = $conn->prepare($sql_t);
                        $query_t->execute();
                        $q_t = $query_t->fetchAll();
                        foreach ($q_t as $t) {
                          $html = "<div class=\"stream-post\">".
                          "<div class=\"sp-author\">
                            <a href=\"#\" class=\"sp-author-avatar\"><img src=\"https://bootdey.com/img/Content/avatar/avatar6.png\" alt=\"\"></a>
                            <h6 class=\"sp-author-name\"><a href=\"#\">".$n["fname"] . " " . $n["lname"] ."</a></h6></div>".
                          "<div class=\"sp-content\"><div class=\"sp-info\">".$n["fname"] . " " . $n["lname"]."</div><p class=\"sp-paragraph mb-0\">".$t["text"]."</p></div>
                          <input class=\"remove\"type=\"submit\" name=\"remove_t\"value=\"". $t["id"] ."\"></div>";
                          echo $html;
                        }
                    }
                    if (isset($_POST["view_all"])) {
                        $sql_a = "SELECT * FROM `task` WHERE task_userid IN (SELECT `user_id` FROM users WHERE group_id = $group) ";
                        $query_a = $conn->prepare($sql_a);
                        $query_a->execute();
                        $q_a = $query_a->fetchAll();
                        echo "<h3>All Tasks:</h3><form>";
                        foreach ($q_a as $a) {
                            $id = $a["task_userid"];
                            $sql = "SELECT * FROM `users` WHERE `user_id` = $id";
                            $query = $conn->prepare($sql);
                            $query->execute();
                            $qa = $query->fetchAll();
                            $html1;
                            foreach ($qa as $q) {
                                $html1 = "<div class=\"stream-post\">".
                            "<div class=\"sp-author\">
                            <a href=\"#\" class=\"sp-author-avatar\"><img src=\"https://bootdey.com/img/Content/avatar/avatar6.png\" alt=\"\"></a>
                            <h6 class=\"sp-author-name\"><a href=\"#\">".$q["fname"] . " " . $q["lname"] ."</a></h6></div>";
                            }
                            $html2 = "<div class=\"sp-content\"><div class=\"sp-info\">".$q["fname"] . " " . $q["lname"]."</div><p class=\"sp-paragraph mb-0\">".$a["text"]."</p></div>
                            <input type=\"submit\" class=\"remove\" name=\"remove_t\"value=\"". $a["id"] ."\"></div>";
                            $html3 = $html1.$html2;
                            echo $html3;
                        }
                    
                    }

                    ?>    
                    </form> 
                </div>
                <!-- /.stream-posts -->
            </div>
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- /.profile-section-main -->
</div>

</div>

</div>
    </div>
  <?php include 'general_includes/footer.php';?>
  </body>
  <?php 
if (isset($_POST["add_t"])) {
  $task = $_POST["post-field"];
  $uid = $_POST["user"];
  $s = "INSERT INTO `task` (`id`, `text`, `task_userid`, `group_id`, `from_admin`) VALUES (NULL,'$task',$uid,$group,1)";
  $query = $conn->prepare($s);
  $query->execute();
}

if (isset($_POST["remove_t"])) {
    $id = $_POST["remove_t"];
    $sql = "DELETE FROM `task` WHERE `id` = $id";
    $query = $conn->prepare($sql);
    $query->execute();
}

?>
</html>
