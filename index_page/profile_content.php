<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<?php
      // initialize errors variable
    $errors = "";
    // connect to database
    $db = mysqli_connect("localhost", "root", "", "pract");
    $user_id = $_SESSION['user_id'];
    $group_id = $_SESSION['group_id'];
    // $fnmae = $_SESSION['fname'];
    // $lname = $_SESSION['lname'];
    // $email = $_SESSION['email'];
    $user_sql = mysqli_query($db, "SELECT * FROM users WHERE user_id = '$user_id'");
    //$email_sql = mysqli_query($db, "SELECT email FROM users WHERE user_id = '$user_id'");
    //$phone_sql = mysqli_query($db, "SELECT phone FROM users WHERE user_id = '$user_id'");
    //$group_sql = mysqli_query($db, "SELECT * FROM group WHERE group_id = '$group_id'");
    //$name_sql = mysqli_query($db, "SELECT CONCAT(fname,' ', lname) AS fname FROM users WHERE user_id = '$user_id'");
    $user_result = mysqli_fetch_array($user_sql);
    //$group_result = mysqli_fetch_array($group_sql);
  ?>
  <?php
      // initialize errors variable
    $errors = "";
    // connect to database
    $db = mysqli_connect("localhost", "root", "", "pract");
    $group_id = $_SESSION['group_id'];
    //$group_sql = mysqli_query($db, "SELECT * FROM group WHERE group_id = '$group_id'");
    //$group_result = mysqli_fetch_array($group_sql);
  ?>
<div class="container">
    <div class="profile-wrapper">
        <div class="profile-section-user">
            <div class="profile-cover-img"></div>
                <div class="profile-info-brief p-3">
                    <div class="text-center">
                        <h5 class="text-uppercase mb-4"><?php echo $user_result['fname'] ?> <?php echo $user_result['lname'] ?></h5>
                    </div>
                </div>
                <!-- /.profile-info-brief -->
                <hr class="m-0">
                <div class="hidden-sm-down">
                    <hr class="m-0">
                    <div class="profile-info-contact p-4">
                        <h6 class="mb-3">Contact Information</h6>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><strong>GROUP NAME:</strong></td>
                                    <td>
                                        <p class="text-muted mb-0">
                                            <?php 
                                            $sql = "SELECT `gname` FROM `group` WHERE group_id = $group_id";
                                            $res = $db->query($sql);
                                            $num = $res->num_rows;
                                            for ($i=0; $i < $num; $i++) {
                                                $data = $res->fetch_assoc();
                                                echo $data["gname"];
                                            }
                                            ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>EMAIL:</strong></td>
                                    <td>
                                        <p class="text-muted mb-0"><?php echo $user_result['email'] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>PHONE:</strong></td>
                                    <td>
                                        <p class="text-muted mb-0"><?php echo $user_result['phone'] ?></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.profile-info-contact -->
                    <hr class="m-0">
                </div>
            <!-- /.hidden-sm-down -->
        </div>
    </div>
</div>
