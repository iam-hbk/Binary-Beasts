<link rel="stylesheet" href="style.css">
<?php
include "connect.php";
include "header.php";
?>

<style>
div.postContainer {
  display: grid;
  height: fit-content;
  width: 100%;
  grid-template-columns: 25% 75%;
  grid-template-rows: 85% 15%;
}

div.postCommands {
  grid-area: 2 / 1 / 3 / 3;
  height: fit-content;
  background-color:lightgrey;
  padding: 5px;
}
div.postedBy {
  grid-area: 1 / 1 / 2 / 2;
  background-color: rgb(225, 247, 29);
}
div.postContent {
  grid-area: 1 / 2 / 2 / 3;
  background-color: darkorchid;

}
#content{
    /* height: 100%; */
    overflow: hidden;
}
div#post_date{
    font-size: 11px;
    font-style: italic;
}
</style>

<?php
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
$sql_body2 = "SELECT     posts.post_topic,     posts.post_content,     posts.post_date,     posts.post_by,     users.user_id,     users.user_name FROM     posts LEFT JOIN
users ON     posts.post_by = users.user_id WHERE     users.user_id = posts.post_by AND posts.post_topic = " . mysqli_real_escape_string($conn, $_GET['id']) . "  ORDER BY posts.post_date DESC";

$result_header = mysqli_query($conn, $sql_header);
if (!$result_header) {
    echo "An error occurred while fetching data for header";
} else {
    while ($row = mysqli_fetch_assoc($result_header)) {
        $topic_subject = $row["topic_subject"];
        echo "<div class='headerPost'>$topic_subject</div>";
    }
}

$result_body = mysqli_query($conn, $sql_body2);
if (!$result_body) {echo "An error occurred while fetching data for Body";} else {
    while ($row = mysqli_fetch_assoc($result_body)) {
        // echo "<br><br><br>".$_GET["id"];
        $user_name = $row["user_name"];
        $post_date = $row["post_date"];
        $post_content = $row["post_content"];
        echo <<<EOF
        <div class='postContainer'>
            <div class="postedBy"><div id="username">$user_name</div><div id="post_date">$post_date</div></div>
            <div class="postContent">$post_content</div>
            <div class="postCommands"><span id="reply_button" >reply</span></div>
        </div>
        <div id="form">
            <form style="margin-top: 20px;" id="reply_area" method="post" action="reply.php?id=5">
                <textarea required name="reply-content"></textarea>
                <input type="submit" value="Submit reply" />
            </form>
        </div>
    EOF;

    }

}

include "footer.php";
?>


<script>

$(document).ready(()=>{
    $("div#form").css("display","none");
    var isNone = true;
    console.log("ready");
    $("span#reply_button").click(()=>{
    if (isNone){
        $("div#form").css("display","block");
        isNone = !isNone;

    }
    else{
        $("div#form").css("display","none");
        isNone = !isNone;
    }
    console.log("hidden");
})
})

</script>