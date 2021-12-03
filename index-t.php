<?php 
  session_start();
  if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
?>

<html>
 <head>
   <title>Index Page</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,500i,700,800i" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="script.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
  <body>
  <?php include 'general_includes/header.php';?>
  <div class="profile-cover-img"><img src="https://bootdey.com/img/Content/flores-amarillas-wallpaper.jpeg" alt=""></div>
        <div class="profile-info-brief p-3"><img class="img-fluid user-profile-avatar" src="resources/jim.png" alt="">
            <div class="text-center">
                <h5 class="text-uppercase mb-4"><?php echo $_SESSION['username']?></h5>
            </div>
        </div>

<div class="container">
        <hr class="m-0">

<div class="profile-wrapper">
    <div class="profile-section-user">
        <!-- /.profile-info-brief -->
        <div class="hidden-sm-down">
            <div class="profile-info-contact p-4">
                <h6 class="mb-10">Reminders</h6>
                <ul>
                  <li>Finish Presentation</li>
                  <li>Look over Project Proposal</li>
                  <li>Meet with Dwight Schrute</li>
                </ul>
            </div>
            <!-- /.profile-info-contact -->
            <hr class="m-0">
            <div class="profile-info-general p-4">
                <h6 class="mb-10">Team Members</h6>
                <ul>
                  <li>Dwight Schrute</li>
                  <li>Pamela Beesly</li>
                  <li>Kevin Malone</li>
                  <li>Andy Bernard</li>
                </ul>
            </div>
            <!-- /.profile-info-general -->
            <hr class="m-0">
        </div>
        <!-- /.hidden-sm-down -->
    </div>
    <!-- /.profile-section-user -->
    <div class="profile-section-main" style = "margin-top: 4vh;">
           <h6 class="mb-10">Recent Posts</h6>
                <!-- /.post-editor -->
                <div class="stream-posts">
                    <div class="stream-post">
                        <div class="sp-author">
                            <a href="#" class="sp-author-avatar"><img src="resources/dwight.png" alt=""></a>
                            <h6 class="sp-author-name"><a href="#">Dwight Schrute</a></h6></div>
                        <div class="sp-content">
                            <div class="sp-info">posted 1h ago</div>
                            <p class="sp-paragraph mb-0">Auk Soldanella plainscraft acetonylidene wolfishness irrecognizant Candolleaceae provision Marsipobranchii arpen Paleoanthropus supersecular inidoneous autoplagiarism palmcrist occamy equestrianism periodontoclasia mucedin overchannel goelism decapsulation pourer zira</p>
                        </div>
                        <!-- /.sp-content -->
                    </div>
                    <!-- /.stream-post -->
                    <div class="stream-post mb-0">
                        <div class="sp-author">
                            <a href="#" class="sp-author-avatar"><img src="resources/pam.png" alt=""></a>
                            <h6 class="sp-author-name"><a href="#">Pam Beesly</a></h6></div>
                        <div class="sp-content">
                            <div class="sp-info">posted 2 days ago</div>
                            <p class="sp-paragraph">Auk Soldanella plainscraft acetonylidene wolfishness irrecognizant Candolleaceae provision Marsipobranchii arpen Paleoanthropus supersecular inidoneous</p>
                            <p class="sp-paragraph">autoplagiarism palmcrist occamy equestrianism periodontoclasia mucedin overchannel goelism decapsulation pourer zira</p>
                        </div>
                        <!-- /.sp-content -->
                    </div>
                    <!-- /.stream-post -->
                </div>
                <!-- /.stream-posts -->
            </div>
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- /.profile-section-main -->

  <?php include 'general_includes/footer.php';?>
  </body>
</html>

<?php 
} else {
  header("Location: login.php");
  exit();
}
?>