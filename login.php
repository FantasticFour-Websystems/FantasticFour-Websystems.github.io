<html>
 <head>
  <title>PHP Test</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
  <body>
  <div class="wrapper fadeInDown">
      <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
          <img src="resources/logo.png" style = "width: 7vw; height 7vw;"id="icon" alt="User Icon" />
        </div>

        <!-- Login Form -->
        <form id = "login" action="db_login.php" method="post">
          <input type="text" id="username" class="fadeIn second" name="username" placeholder="username">
          <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
          <a href="#"><input type="submit" class="fadeIn fourth" value="Log In"></a>
            
          </br>
        </form>

        <!-- Remind Password -->
        <div id="formFooter">
        
        <a class="underlineHover" href="#">Forgot Password?</a>
        <a class="underlineHover" href="register.php">Sign Up</a>
        </div>

      </div>
    </div>
  </body>
</html>