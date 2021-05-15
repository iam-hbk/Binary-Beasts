<link rel="stylesheet" href="style.css">
<?php
include "connect.php";
include "header.php";

$sql_header = "SELECT
    topic_id,
    topic_subject
    FROM
    topics
    WHERE
    topics.topic_id = " . mysqli_real_escape_string($conn, $_GET['id']);
$sql_body = "SELECT
    posts.post_topic,
    posts.post_content,
    posts.post_date,
    posts.post_by,
    users.user_id,
    users.user_name
    FROM
    posts
    LEFT JOIN
    users
    ON
    posts.post_by = users.user_id
    WHERE
    posts.post_topic = " . mysqli_real_escape_string($conn, $_GET['id']);

$result_header = mysqli_query($conn, $sql_header);
if (!$result_header) {
    echo "An error occurred while fetching data for header";
} else {
    while ($row = mysqli_fetch_assoc($result_header)) {
        $topic_subject = $row["topic_subject"];
        echo "<div class='headerPost'>$topic_subject</div>";
    }
}

$result_body = mysqli_query($conn, $sql_body);
if (!$result_body) {echo "An error occurred while fetching data for Body";} else {
    while ($row = mysqli_fetch_assoc($result_body)) {
        $user_name = $row["user_name"];
        $post_date = $row["post_date"];
        $post_content = $row["post_content"];
        
    }

}

include "footer.php";
