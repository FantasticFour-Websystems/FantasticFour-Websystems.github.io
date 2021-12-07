<?php 
try {
    $dbconn = new PDO('mysql:host=localhost;dbname=pract','root','');
    //echo "connected \n";
} catch (PDOException $e ) {
    echo 'PDO exception thrown: '.$e->getMessage();
}
$err = Array();

if(isset($_POST["admin_signup"])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
    $user = validate($_REQUEST["username"]);
    $pass = validate($_REQUEST["password"]);
    $first = validate($_REQUEST["fname"]);
    $last = validate($_REQUEST["lname"]);
    $group = validate($_REQUEST["gname"]);
    $email = validate($_REQUEST["email"]);
    $phone = validate($_REQUEST["phone"]);

    if (empty($user)) {
        header("Location: register_admin.php?error=User Name is required");
        exit();
    } else if(empty($pass)) {
        header("Location: register_admin.php?error=Password is required");
        exit();
    } else if(empty($first)) {
        header("Location: register_admin.php?error=firstname is required");
        exit();
    }
    else if(empty($last)) {
        header("Location: register_admin.php?error=lastname is required");
        exit();
    }
    else if(empty($group)) {
        header("Location: register_admin.php?error=Group is required");
        exit();
    }
    else if(empty($email)) {
        header("Location: register_admin.php?error=email is required");
        exit();
    } else {
        $sql = "SELECT COUNT(group_id) as group_count FROM `group`";
        $query = $dbconn->query($sql);
        $res = $query->fetchAll();
        foreach ($res as $row){
            $count = $row["group_count"]+1;
        }
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `users` (`user_id`, `username`, `password`, `is_admin`, `group_id`, `fname`, `lname`, `email`, `phone`) 
        VALUES (NULL,'$user','$hashed_password','1','$count','$first','$last','$email','$phone')";
        $query = $dbconn->query($sql);

        $sql = "SELECT `user_id` FROM `users` WHERE `group_id` = '$count'";
        $query = $dbconn->query($sql);
        $res = $query->fetchAll();
        $adminid;
        foreach ($res as $row){
            $adminid = $row["userid"];
        }
        $sql = "INSERT INTO `group` (`group_id`,`admin_id`,`gname`) VALUES ($count, '$adminid','$group')";
        $query = $dbconn->query($sql);
        header("Location: login.php");
        exit();
    }
}

?>

<html>
 <head>
  <title>Sign Up</title>
  <link href="login.css" rel="stylesheet" type="text/css" />
</head>
  <body>
  <div id = "header">
  <h1 id ="title">PRACT</h1>
  <h3 id ="sub-title">Progress, Reminders, and Consultant Team</h3>
</div>
  <div class="form_title">
  <div class="wrapper fadeInDown">
  <h3>Register and Create Your Account</h3>
  <h4>You are making an account as a group administrator</h4>
      <div id="formContent">
        <!-- Tabs Titles -->
        
        <!-- Icon -->
        <div class="fadeIn first">
          <img src="resources/logo.png" style = "width: 7vw; height 7vw;"id="icon" alt="User Icon" />
        </div>

        <!-- Login Form -->
        <form id = "login" action="register_admin.php" method="post">
        <input type="text" id="password" class="fadeIn second" name="gname" placeholder="Enter a Group Name">
        <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username">
        <input type="text" id="password" class="fadeIn second" name="password" placeholder="Password (at least 8 characters)">
          <input type="text" id="username" class="fadeIn second" name="fname" placeholder="First Name">
          <input type="text" id="password" class="fadeIn third" name="lname" placeholder="Last Name">
          <input type="text" id="username" class="fadeIn third" name="email" placeholder="Email">
          <input type="text" id="password" class="fadeIn third" name="phone"  maxlength="10" placeholder="Phone">
          
          <a href="#"><input type="submit" class="fadeIn fourth" name="admin_signup" value="Sign Up"></a>
          </br>
        </form>
      </div>
    </div>
  </body>
</html>
