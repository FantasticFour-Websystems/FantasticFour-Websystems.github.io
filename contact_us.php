<?php
session_start();
?>
<html>
  
 <head>
   <title>Contact us Page</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
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
  <div id = "contact">
    <form id="addForm" name="addForm" action="#" method="post" onsubmit="return validate(this);">
      <fieldset> 
        <h2>Contact Information</h2>
        <div class="formData">
                        
          <label class="field">First Name:</label>
          <div class="value"><input type="text" size="60" value="" name="firstName" id="firstName"/></div>
          
          <label class="field">Last Name:</label>
          <div class="value"><input type="text" size="60" value="" name="lastName" id="lastName"/></div>
          
          <label class="field">Email:</label>
          <div class="value"><input type="text" size="60" value="" name="email" id="email"/></div>
          
          <label class="field">Comments:</label>
          <div class="value"><input type="text" size="60" value="" name="comments" id="comments"/></div>
          
          <input type="submit" value="save" id="submit" name="save"/>
        </div>
      </fieldset>
    </form>
  </div>
  <?php include 'general_includes/footer.php';?>
  </body>
  <script src="contact.js"></script> 
</html>
