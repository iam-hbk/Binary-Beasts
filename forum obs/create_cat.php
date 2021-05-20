<?php

include 'connect.php';
include 'header.php';
if ($_SESSION['signed_in'] == false) {
    //the user is not signed in
    echo 'Sorry, you have to be <a href="signin.php">signed in</a> to create a Category.';
} else {
    if ($_SESSION['user_level'] == 0) {
        echo 'You have to be an Administrator to create a category.';
        echo "<br>Check some available categories <a href='index.php'>here</a>";
    } else {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            //the form hasn't been posted yet, display it
            echo "<form method='post' action=''>
                            Category name: <input type='text' name='cat_name' />
                            Category description: <textarea name='cat_description' /></textarea>
                            <input type='submit' value='Add category' />
                         </form>";
        } else {
            //the form has been posted, so save it
            $cat_name = mysqli_real_escape_string($conn, $_POST['cat_name']);
            $cat_description = mysqli_real_escape_string($conn, $_POST['cat_description']);

            $sql = "INSERT INTO categories(cat_name, cat_description)
                                    VALUES('$cat_name','$cat_description')";

            $result = mysqli_query($conn, $sql);
            if (!$result) {
                //something went wrong, display the error
                echo 'Error' . mysqli_error($conn);
            } else {
                echo 'New category successfully added.';
            }
        }
    }

}
include 'footer.php';
