
<!------ Include the above in your HEAD tag ---------->

<div id = "header">
  <h1 id ="title">PRACT</h1>
  <h3 id ="sub-title">Progress, Reminders, and Consultant Team</h3>
</div>
  
    <nav class="navbar navbar-expand-sm   navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact_us.php">CONTACT US</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="forum/discussion.php">DISCUSSION</a>
            </li>
              
            <?php 
            if ($_SESSION["is_admin"] == 1) {
              echo "<a class=\"nav-link\" href=\"administrator.php\">ADMIN</a>";
            }
            ?>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">LOG OUT</a>
            </li>
          </ul>
        </div>
      </nav>
  

