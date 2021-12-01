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


<?php
//index.php
include '../general_includes/header.php';
include 'header.php';
?>

<h3>ITEMS</h3>
<table id="newTable">
<?php
 $dbOk = false;
  @ $db = new mysqli('localhost', 'root', '', 'new_pract');
  if ($db->connect_error) {
    echo '<div class="messages">Could not connect to the database. Error: ';
    echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
  } else {
    $dbOk = true; 
  }
    
  if ($dbOk) {
      
    $query = 'SELECT  *
   FROM categories
   INNER JOIN topics
   ON categories.cat_id = topics.topic_cat;';
    $result = $db->query($query);
    $numRecords = $result->num_rows;
    
    echo '<tr><th>Category:</th><th>Topic:</th></tr>';
    for ($i=0; $i < $numRecords; $i++) {
      $record = $result->fetch_assoc();
      if ($i % 2 == 0) {
        echo "\n".'<tr id="iden-' . $record['cat_id'] . '"><td>';
      } else {
        echo "\n".'<tr class="odd" id="iden-' . $record['cat_id'] . '"><td>';
      }
      echo htmlspecialchars($record['cat_name']);
      echo '</td><td>';
      echo ('<a href="topic.php?id=' . $record['topic_id']. '">' . $record['topic_subject'] .'</a>'  );
      echo '</td></tr>';
    }
    }
      
?>
</table>

<?php
include '../general_includes/footer.php';
?>
  </body>
</html>