
<?php
session_start(); 

//topic.php
include 'connect.php';
include 'header.php';

//first select the topic based on $_GET['topic_id']
$sql = "SELECT
        topic_id,
        topic_subject
        FROM
        topics
        WHERE
        topics.topic_id = " . mysqli_real_escape_string($conn, $_GET['id']);

$result = mysqli_query($conn, $sql);

$topic_var = mysqli_real_escape_string($conn, $_GET['id']);
if(!$result){
    echo 'The topic could not be displayed, please try again later.' . mysqli_error($conn);
}
else
{
    echo '<div class="post-editor">
    <form style ="display: block;" method="post" action="reply.php?id=' . $topic_var . '"><textarea name="reply-content" id="post-field" class="post-field" placeholder="Write Something Cool!"></textarea> 
                    <br>
                    <input type="submit" value="Submit reply" class="btn btn-success px-4 py-1" style = "background-color: #7b876d; width: 20vw; float: right;" /><br><br><br>
                </form></div>';
    
    if(mysqli_num_rows($result) == 0)
    {
        echo 'This topic does not exist.';
    }
    else
    {
        //display category data
        while($row = mysqli_fetch_assoc($result))
        {
            //this works
            echo '<h2>Topic: ' . $row['topic_subject'] . '</h2>';
        }

        //do a query for the posts
        
                    
                    
        $sql = "SELECT
                posts.post_id,
                posts.post_topic,
                posts.post_content,
                posts.post_date,
                posts.post_by,
                users.user_id,
                users.fname,
                users.lname
                FROM
                posts
                LEFT JOIN
                users
                ON
                posts.post_by = users.user_id
                order by post_date DESC;";
        $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            echo 'ehh.';
        }
        else
        {
            if(mysqli_num_rows($result) == 0)
            {
                echo 'This topic is empty.';
            }
            else
            {
                while($row = mysqli_fetch_assoc($result)){
                    $mydate = strtotime($row['post_date']);
                    echo ('<div class="stream-post mb-0"><div class="sp-author"> <a href="#" class="sp-author-avatar"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt=""></a><h6 class="sp-author-name"><a href="#">Response</a></h6></div><div class="sp-content" style = "position: static; font-style: italic; margin-bottom: 1rem;"> Posted ' . date('F jS Y', $mydate). ' by '. $row['fname'] . ' '. $row['lname'] .'<p class="sp-paragraph">' .$row['post_content'] .'</p></div></div><br>');
            }
        }
    }
}
}

include 'footer.php';
?>