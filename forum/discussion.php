<?php
//index.php
include 'header.php';
?>
    
<h3>Discussion Topics</h3>
<?php
 $dbOk = false;
  @ $db = new mysqli('localhost', 'root', '', 'pract');
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
   ON categories.cat_id = topics.topic_cat order by categories.cat_id';
    $result = $db->query($query);
    $numRecords = $result->num_rows;
    
    echo '<div class="m-4">
    <div class="accordion" id="myAccordion">';
    if ($numRecords > 0){
        $record = $result->fetch_assoc();
        $var_cat = $record['cat_id'];
        //initialize first category section
        echo '<div class="accordion-item">
            <h2 class="accordion-header" id="heading'. $record['cat_id'] .'">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse'. $record['cat_id'] .'">'. $record['cat_name'] .'</button>	
            </h2>
            <div id="collapse'. $record['cat_id'] .'" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
                <div class="card-body">';
          for ($i=0; $i < $numRecords; $i++) {
              if ($i>0){
                  $record = $result->fetch_assoc();
              }
              if ($record['cat_id'] == $var_cat){
                  //just add in the subcategory
                  echo ('<a href="topic.php?id=' . $record['topic_id']. '">' . $record['topic_subject'] .'</a><br>'  );
              }
              else{ 
               $var_cat = $record['cat_id'];
                //make a new category section
                echo ' </div></div></div><div class="accordion-item">
                <h2 class="accordion-header" id="heading'. $record['cat_id'] .'">
                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse'. $record['cat_id'] .'">'. $record['cat_name'] .'</button>	
                </h2>
                <div id="collapse'. $record['cat_id'] .'" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
                    <div class="card-body">';
                 echo ('<a href="topic.php?id=' . $record['topic_id']. '">' . $record['topic_subject'] .'</a><br>'  );
                      
              }
        }
        echo '</div>
            </div>
        </div>';
        } 
    }
    echo ' </div> </div>';
      
?>


<?php
include 'footer.php';
?>