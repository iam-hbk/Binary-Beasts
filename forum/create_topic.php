<?php
include "connect.php";

/* DB posts table->isMainTopic is always = 1 here */


if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "<h1>this page can't be accessed this way!</h1>";
}else{
    session_start();
    print_r($_POST);
    echo "<br><br><br><br>";
    print_r($_SESSION);

    $topic_name = mysqli_real_escape_string($conn, $_POST["topicName"]);
    $topic_cat = mysqli_real_escape_string($conn, $_POST["createCategoryCategory"]);
    $topic_content = mysqli_real_escape_string($conn, $_POST["topicContent"]);
// $user_id = $_SESSION["user_id"];

// get topic_cat Id
    $query = "SELECT cat_id FROM categories WHERE cat_name = '$topic_cat'";
    $res = mysqli_query($conn, $query);
    while ($data = mysqli_fetch_assoc($res)) {
        $topic_cat_id = $data["cat_id"];
    }

    echo "<br><br><br><br>";
    echo $topic_cat_id;

    $query = "  INSERT INTO
                topics(topic_subject,
                topic_date,
                topic_cat,
                topic_by)
            VALUES('$topic_name',
                NOW(),
                '$topic_cat_id',
                " . $_SESSION['user_id'] . "
                )";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        //something went wrong, display the error
        echo 'An error occurred while inserting your data. Please try again later.' . mysqli_error($conn);
        $sql = "ROLLBACK;";
        $result = mysqli_query($conn, $sql);
    } else {
        //the first query worked, now start the second, posts query
        //retrieve the id of the freshly created topic for usage in the posts query
        $topic_id = mysqli_insert_id($conn);

        $sql = "INSERT INTO
                posts(post_content,
                post_date,
                post_topic,
                post_by,isMainTopic)
            VALUES
                ('" . mysqli_real_escape_string($conn, $topic_content) . "',
                    NOW(),
                    " . $topic_id . ",
                    " . $_SESSION['user_id'] . ",
                    1
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
            echo 'You have successfully created <a href="topic.php?id=' . $topic_id . '">your new topic</a>.';
        }
    }

    $_SESSION["isTopicCreated"] = true;
    header("Location: http:/Binary-Beasts/forum/");
}
