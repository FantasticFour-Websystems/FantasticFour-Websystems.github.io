<?php 
session_start(); 

$dbhost= "localhost";
$dbusername= "root";
$dbpassword = "root";

$conn = new PDO('mysql:host=localhost;dbname=pract','root','');
if (!$conn) {
    echo "Connection failed!";
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $uname = validate($_POST['username']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: login.php?error=User Name is required");
        exit();
    } else if(empty($pass)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE username='$uname'";
        $query = $conn->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        if ($query->rowCount() == 1) {
            foreach($result as $row){
            if ($row['username'] === $uname && password_verify($pass,$row['password'])) {
                echo "Logged in!";
                $_SESSION['username'] = $row['username'];
                $_SESSION['fname'] = $row['fname'];
                $_SESSION['lname'] = $row['lname'];
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['group_id'] = $row['group_id'];
                $_SESSION['is_admin'] = $row['is_admin'];
                $_SESSION['phone'] = $row['phone'];
                $_SESSION['email'] = $row['email'];
                header("Location: index.php");
                exit();
            } else {
                header("Location: login.php?error=Incorect credentials");
                exit();
            }
            }
        } 
        else {
            header("Location: login.php?error=Incorect credentials");
            exit();
    }
  }
} else {
  header("Location: index.php");
  exit();
}
?>
