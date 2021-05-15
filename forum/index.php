<?php
//create_cat.php
include 'connect.php';
include 'header.php';

$sql = "SELECT
            categories.cat_id,
            categories.cat_name,
            categories.cat_description,
            topics.topic_id,
            topics.topic_subject,
            topics.topic_date
        FROM
            categories,topics
        WHERE
            categories.cat_id = topics.topic_cat";
$result = mysqli_query($conn, $sql);
// var_dump($result);
if (!$result) {
    echo 'The categories could not be displayed, please try again later.';
} else {
    if (mysqli_num_rows($result) == 0) {
        echo 'No categories defined yet.';
    } else {
        //prepare the table
        echo '<table border="1">
            <tr>
                <th>Category</th>
                <th>Last topic</th>
            </tr>';
        // print_r($row = mysqli_fetch_assoc($result));
        while ($row = mysqli_fetch_assoc($result)) {

            $cat_id = $row['cat_id'];
            $cat_name = $row['cat_name'];
            $cat_description = $row['cat_description'];
            $topic_id = $row['topic_id'];
            $topic_subject = $row['topic_subject'];
            $topic_date = $row['topic_date'];

            echo '<tr>';
            echo '<td class="leftpart">';
            echo "<h3><a href='category.php?id=$cat_id'>$cat_name</a></h3>$cat_description";
            echo '</td>';
            echo '<td class="rightpart">';
            echo "<a href='topic.php?id=$topic_id'>$topic_subject</a> $topic_date";
            echo '</td>';
            echo '</tr>';
        }
    }
}

include 'footer.php';
