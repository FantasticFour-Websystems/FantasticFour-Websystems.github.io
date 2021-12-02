<?php 
  session_start(); //on new page new to continue session
  session_unset(); 
  session_destroy();
  setcookie(session_name(), "", time() - 3600); //take cookie to past
  header("Location: index.php");
?>
