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

                echo '<form method="post" action="">
                    Subject: <input type="text" name="topic_subject" />
                    Category:';

                echo '<select name="topic_cat">';
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo '<option value="' . $row['cat_id'] . '">' . $row['cat_name'] . '</option>';
                    }
                echo '</select>';

                echo 'Message: <textarea name="post_content" /></textarea>
                    <input type="submit" value="Create topic" />
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
