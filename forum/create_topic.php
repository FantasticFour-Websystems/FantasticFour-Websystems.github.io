<?php
include 'connect.php';
include 'header.php';


echo '<h2>Create a topic</h2>';
    //the user is signed in
    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {
        //get categories from the database for use in the dropdown
        $sql = "SELECT
                    cat_id,
                    cat_name,
                    cat_description
                FROM
                    categories";

        $result = mysqli_query($conn, $sql);

        if(!$result)
        { 
            echo 'Error while selecting from database. Please try again later.';
        }
        else
        {
            if(mysqli_num_rows($result) == 0)
            {
                if($_SESSION['is_admin'] == 1)
                {
                    echo 'You have not created categories yet.';
                }
                else
                {
                    echo 'Before you can post a topic, you must wait for an admin to create some categories.';
                }
            }
            else
            {
                echo '<form method="post" action="" style = "padding-left: 30px; padding-right: 30px;">
                    <div class="row mb-3">
                        <label for="inputSubject" class="col-sm-2 col-form-label">Subject</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" placeholder="Subject">
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                    <label  class="col-sm-2 col-form-label" for="inputCategory">Category</label>                        
                    <div class="col-sm-10">';
                    
                    

                echo '<select name="topic_cat" style = "inline-block">';
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo '<option value="' . $row['cat_id'] . '">' . $row['cat_name'] . '</option>';
                    }
                echo '</select> </div> </div>';
                echo '<div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="inputMessage">Message</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name = "post_content" placeholder="Submit content as the first post under this topic!">
                      </div>
                      </div>
                
                    <input class="btn btn-primary" type="submit" style = "width: 12vw; float: right;" value="SUBMIT TOPIC" /><br><br>
                 </form>';
                
            
            }
        }
    }
    else
    {
        //start the transaction
        $query  = "BEGIN WORK;";
        $result = mysqli_query($conn, $query);

        if(!$result)
        {
            echo 'An error occured while creating your topic. Please try again later.';
        }
        else
        {
            $sql = "INSERT INTO
                        topics(topic_subject,
                               topic_date,
                               topic_cat,
                               topic_by)
                   VALUES('" . mysqli_real_escape_string($conn, $_POST['topic_subject']) . "',
                               NOW(),
                               " . mysqli_real_escape_string($conn, $_POST['topic_cat']) . ",
                               " . $_SESSION['userid'] . "
                               )";

            $result = mysqli_query($conn ,$sql);
            if(!$result)
            {
                echo 'An error occured while inserting your data. Please try again later.' . mysqli_error($conn);
                $sql = "ROLLBACK;";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
    
                $topicid = mysqli_insert_id($conn);
                $topic_category = mysqli_real_escape_string($conn, $_POST['topic_cat']);

                $sql = "INSERT INTO
                            posts(post_content,
                                  post_date,
                                  post_topic,
                                  post_by)
                        VALUES
                            ('" . mysqli_real_escape_string($conn ,$_POST['post_content']) . "',
                                  NOW(),
                                  " . $topicid . ",
                                  " . $_SESSION['userid'] . "
                            )";
                $result = mysqli_query($conn, $sql);

                if(!$result)
                {
                    echo 'An error occured while inserting your post. Please try again later.' . mysqli_error($conn);
                    $sql = "ROLLBACK;";
                    $result = mysqli_query($conn, $sql);
                }
                else
                {
                    $sql = "COMMIT;";
                    $result = mysqli_query($conn, $sql);

                    //after a lot of work, the query succeeded!
                    echo 'You have successfully created <a href="category.php?id='. $topic_category . '">See your new topic</a>.';
                }
            }
        }

}

include 'footer.php';
?>
