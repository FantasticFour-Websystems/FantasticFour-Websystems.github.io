<?php
//create_cat.php
include 'connect.php';
include 'header.php';

if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    //the form hasn't been posted yet, display it
    echo '<form method="post" action="">
        <div class="row mb-3">
            <label for="CatName" class="col-sm-2 col-form-label">Category Name</label>
            <div class="col-sm-10">
                <input type="text" name = "cat_name" class="form-control" id="inputCatName" placeholder="Category Name">
            </div>
        </div>
        <div class="row mb-3">
            <label for="CatDesc" class="col-sm-2 col-form-label">Category Description</label>
            <div class="col-sm-10">
                <textarea name = "cat_description" class="form-control" id="inputCatDesc" placeholder="Category Description"></textarea>
            </div>
        </div>
        <input class="btn btn-primary" type="submit" style = "width: 16vw; float: right;" value="SUBMIT CATEGORY" /><br><br>
     </form>';
    
    
}

                            
                            
else
{
    //the form has been posted, so save it
    $sql = "INSERT INTO categories(cat_name, cat_description)
       VALUES('" . mysqli_real_escape_string($conn, $_POST['cat_name']) . "',
             '" . mysqli_real_escape_string($conn, $_POST['cat_description']). "');";
    $result = mysqli_query($conn, $sql);
    if(!$result)
    {
        //something went wrong, display the error
        echo 'Error' . mysqli_error();
    }
    else
    {
        echo 'New category successfully added.';
    }
}

include 'footer.php';

?>