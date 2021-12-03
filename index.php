<?php 
  session_start();
  if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
?>
<?php 
} else {
  header("Location: login.php");
  exit();
}
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
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
  <body>
<?php include 'general_includes/header.php';?>
<div class = "main-text" id = "todolist_hight">
<?php include 'index_page/profile_content.php';?>
<?php include 'index_page/todolist.php';?>
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