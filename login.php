<html>
 <head>
  <title>PRACT | LogIn</title>
  <link href="login.css" rel="stylesheet" type="text/css" />
</head>
  <body>
  <div id = "header">
  <h1 id ="title">PRACT</h1>
  <h3 id ="sub-title">Progress, Reminders, and Consultant Team</h3>
</div>
  <div class="wrapper fadeInDown">
      <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
          <img src="resources/logo.png" style = "width: 7vw; height 7vw;"id="icon" alt="User Icon" />
        </div>

        <!-- Login Form -->
        <form id = "login" action="db_login.php" method="post">
          <input type="text" id="username" class="fadeIn first" name="username" placeholder="username">
          <input type="password" id="password" class="fadeIn second" name="password" placeholder="password">
          <a href="#"><input type="submit" class="fadeIn second" value="Log In"></a>
        </form>

        <!-- Remind Password -->
        <div id="formFooter">
        
        <a class="underlineHover" href="register.php">Sign Up</a>
        </div>

      </div>
    </div>
  </body>
</html>