<?php
/* DB posts table->isMainTopic is always = 0 here */
include "connect.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "<h3 style='font-size:3em;text-align:center;'>This page cannot be accessed this way!</h3>";
} else {
    print_r($_POST);
    echo "<br><br><br>";
    print_r($_SESSION);



    $sql = "BEGIN WORK;";
    $result = mysqli_query($conn, $sql);

    $sql = "INSERT INTO
                posts(post_content,
                post_date,
                post_topic,
                post_by,
                isMainTopic)
            VALUES
                ('" . mysqli_real_escape_string($conn, $_POST["reply-area"]) . "',
                    NOW(),
                    " . $_SESSION['topic_id'] . ",
                    " . $_SESSION['user_id'] . ",
                    0
                )";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        //something went wrong, display the error
        echo 'An error occurred while inserting your post. Please try again later.' . mysqli_error($conn);
        $sql = "ROLLBACK;";
        $result = mysqli_query($conn, $sql);
    } else {
        $sql = "COMMIT;";
        $result = mysqli_query($conn, $sql);

        //after a lot of work, the query succeeded!
        header("Location: http:/Binary-Beasts/forum/topic.php?topic_id=" . $_SESSION['topic_id'] . "&topic_subject=" . $_SESSION['topic_subject']);
    }
}
