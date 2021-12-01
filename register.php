<?php 
try {
    $dbconn = new PDO('mysql:host=localhost;dbname=pract','root','');
    //echo "connected \n";
} catch (PDOException $e ) {
    echo 'PDO exception thrown: '.$e->getMessage();
}
$err = Array();

if(isset($_POST["signup"])) {
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
    $group = validate($_REQUEST["group"]);
    $email = validate($_REQUEST["email"]);
    $phone = validate($_REQUEST["phone"]);

    if (empty($user)) {
        header("Location: register.php?error=User Name is required");
        exit();
    } else if(empty($pass)) {
        header("Location: register.php?error=Password is required");
        exit();
    } else if(empty($first)) {
        header("Location: register.php?error=firstname is required");
        exit();
    }
    else if(empty($last)) {
        header("Location: register.php?error=lastname is required");
        exit();
    }
    else if(empty($group)) {
        header("Location: register.php?error=Group is required");
        exit();
    }
    else if(empty($email)) {
        header("Location: register.php?error=email is required");
        exit();
    } else {
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
        

        $sql = "INSERT INTO `users` (`userid`, `username`, `password`, `is_admin`, `group_id`, `fname`, `lname`, `email`, `phone`) 
        VALUES (NULL,'$user','$hashed_password','0','$group','$first','$last','$email','$phone')";
        $query = $dbconn->query($sql);
        header("Location: login.php");
        exit();
    }
    

}

?>

<html>
 <head>
  <title>Sign Up</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
  <body>
  <div class="form_title">
  <div class="wrapper fadeInDown">
  <h3>Register and Create Your Account</h3>
      <div id="formContent">
        <!-- Tabs Titles -->
        
        <!-- Icon -->
        <div class="fadeIn first">
          <img src="resources/logo.png" style = "width: 7vw; height 7vw;"id="icon" alt="User Icon" />
        </div>

        <!-- Login Form -->
        <form id = "login" action="register.php" method="post">
            <label for="group">Choose the group to join</label>  
            <select name="group" id="groups">
                <?php 
                $sql = "SELECT * FROM `group`";
                $query = $dbconn->query($sql);
                $res = $query->fetchAll();
                foreach ($res as $row){
                  echo "<option value =\"" . $row["group_id"] ."\">" . $row["gname"] . " | group id:" . $row["group_id"] ."</option>"; 
                }
                ?>
            </select>
        <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username">
          <input type="text" id="password" class="fadeIn second" name="password" placeholder="Password">
          <input type="text" id="username" class="fadeIn second" name="fname" placeholder="First Name">
          <input type="text" id="password" class="fadeIn third" name="lname" placeholder="Last Name">
          <input type="text" id="username" class="fadeIn third" name="email" placeholder="Email">
          <input type="text" id="password" class="fadeIn third" name="phone"  maxlength="10" placeholder="Phone">
          <a href="#"><input type="submit" class="fadeIn fourth" name="signup" value="Sign Up"></a>
          </br>
        </form>

        <div id="formFooter">
        
        <a class="underlineHover" href="#">Forgot Password?</a>
        <a class="underlineHover" href="register_admin.php">Sign Up as a Group Admin</a>
        </div>

      </div>
    </div>
  </body>
</html>