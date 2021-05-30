<?php include "forumHeader.php";
// session_start();
// print_r($_SESSION[]);
$_SESSION["topic_subject"] = $_GET["topic_subject"];
?>

<script>
    $("div.titles").html("<?php echo $_GET["topic_subject"] ?>");
    $("h3 a").attr("href","/Binary-Beasts/forum")
</script>
<style>
    body{
        font-family: poppins !important;
        font-weight: 800 !important;
    }
    div.titles{
        font-size:3em !important;
        font-weight:bolder !important;
        letter-spacing:1px !important;

    }
    div#topicWrapper{
        border:2px solid #9e103031;
        position:relative;
        border-radius:20px;
        padding: 15px 25px;
        margin-top:5vw;
    }
    div#originalPost{
        /* border:2px solid #9e1030ff; */
        top: -15px;
        left: -25px;
        width:auto;
        height:auto;
        margin-right: 20%;
        border-radius:20px;
        padding: 15px 25px;
        position:relative;
        background-color: #9e103035;

    }
    #topicUserName{
        font-size: 1.5em;
        font-family: poppins;
        text-decoration: underline;
        font-weight: bold;
    }
    .topicTop{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .topicTopRight{
        display: flex;
        justify-content: space-evenly;
        align-items: center;
    }
    div.topicBottom{
        display: inline-flex;
        justify-content: flex-end;
        width: 100%;
        text-transform:Capitalize;
        padding: 10px;
        font-family: poppins;
        font-weight: bold;

    }
    div.topicBottom span{
        position: relative;
        margin:0 15px;
        border: 2px solid black;
        border-radius: 10px;
        background-color: #9e103035;
        padding: 0;
        color: #111;
        cursor: pointer;
    }
    div.topicBottom span:not(:first-of-type),#upvote{
        background-color: rgb(11, 150, 15);
        color: #fff;
        border: none;
        padding: 5px 10px;
    }
    div.topicBottom span:last-of-type{
        background-color: #9e1030ff;
        color: #fff;
        border: none;
        padding: 5px 10px;
    }
    .replies{
        /* top: -15px; */
        right: -25px;
        width:auto;
        height:auto;
        border-radius:20px;
        padding: 15px 25px;
        margin-top: 20px;
        margin-left: 20%;
        position:relative;
        background-color: #001ca635;

    }
    .reply-form{
        padding: 0;
        position:relative;
        height: 180px;
        margin-top: 20px;
    }
    textarea#reply-area{
        width:45%;
        height: 60%;
        position: absolute;
        top: 0;
        right:10%;
        margin: 0;
        font-family: inherit;
        font-weight: 700;
    }
    button{
        border: none;
        position: relative;
        top: 0;
        left: 0;
        padding: 5px 10px;
        background-color: transparent;
        cursor: pointer;
        width: 100%;
        height: 100%;
    }
    input[name="submit-reply"]{
        position:absolute;
        bottom:0;
        right:10%;
        outline: none;
        color: white;
        font-family: poppins;
        padding: 5px 10px;
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        -o-border-radius: 10px;
        margin: 5px 20px;
        background-color: rgb(11, 150, 15);
        font-weight: bolder;
        cursor: pointer;
        text-transform: capitalize;
        letter-spacing: 1.2px;
    }
    input[name="submit-reply"]:disabled{
        position: relative;
        background-color: #fff;
        color: #9e1030ff;
        border: none;
        font-weight: bold;
        cursor: default;
    }
    span#reply-disabled{
        bottom: 0;
        right: 5%;
        position: absolute;

    }
    span.cancel-reply{
        margin: 5px 20px;
        border-radius: 10px;
        padding: 5px 10px;
        background-color: #9e1030ff;
        position:absolute;
        bottom:0;
        right:20%;
        color: white;
        cursor: pointer;
    }
    span#no-replies{
        font-style: italic;
        display: inline-block;
        text-align: center;
    }
</style>


<?php

$query = "SELECT topics.topic_subject,topics.topic_date,topics.topic_by,users.user_name,users.user_email,users.user_id
        FROM topics,users
        WHERE topics.topic_id = '" . $_GET["topic_id"] . "' AND topics.topic_by = users.user_id;";
$resOriginalTopic = mysqli_query($conn, $query);
/* if(!$resOriginalTopic){
echo mysqli_error($conn);
} */
// print_r($_GET);
// echo $_GET["topic_id_"];
// print_r($resOriginalTopic);
// print_r(mysqli_fetch_assoc($resOriginalTopic));
?>

<div id="topicWrapper">
    <div id="originalPost">
        <span class="topicTop">
            <span class="topicTopLeft"><i style="font-size: 2em;" id ="topicUserIcon" class="fa fa-user-circle" aria-hidden="true"></i>
            <span id="topicUserName"><?php while ($data = mysqli_fetch_assoc($resOriginalTopic)) {
    echo $data["user_name"];
    ?> </span></span>
    <span class="topicTopRight">
        <?php echo $data["topic_date"];} ?>
    </span>

        </span>

        <div class="topicMain">
            <?php
            $q = "SELECT * FROM posts WHERE post_topic = '".$_GET["topic_id"]."'";
            $r = mysqli_query($conn,$q);
            
            while($data = mysqli_fetch_assoc($r)){
                echo $data["post_content"];
            }

            ?>
        </div>
        <div class="topicBottom">
            <span><button id='reply_0' onclick='show_reply(this.id)'  class="reply">reply <i class="fas fa-reply"></i></button></span>
            <span class="upVote">9 <i class="fas fa-chevron-up"></i></span>
            <span class="downVote">8 <i class="fas fa-chevron-down"></i></span>
        </div>
    </div>
    <form class="reply-form" id="form_0" method="POST" action="reply.php">
        <textarea placeholder="Type your reply here..." required name="reply-area" id="reply-area" cols="30" rows="10"></textarea>
        <?php $_SESSION["topic_id"] = $_GET["topic_id"]; ?>
        <?php echo ($_SESSION["signed_in"])? '<input type="submit" name="submit-reply" value="Post reply" >' :
        '<span id ="reply-disabled"><i class="fas fa-exclamation-triangle"></i><input type="submit" name="submit-reply" value="Sign In to reply" disabled ></span>'  ?>
        
        <span class="cancel-reply">Cancel</span>

    </form>
    <?php
    $query="SELECT post_id,post_date,post_content,users.user_name 
            FROM posts,users 
            WHERE (isMainTopic = 0 AND users.user_id = posts.post_by)
            AND (post_topic)='".$_GET["topic_id"]."'
            ORDER BY post_date DESC;";
    $res = mysqli_query($conn,$query);

    $i = 1;

        if(mysqli_num_rows($res)<1){
            echo "<span id='no-replies'>There's no reply yet, be the first !</span>";
        }else{
            while($data = mysqli_fetch_assoc($res)) {
                $post_date = $data["post_date"];
                $user_name = $data["user_name"];
                $post_content = $data["post_content"];
                $html = <<<EOF
                <div class="replies">
                    <div class="topicTop">
                        <span>$post_date</span>
                        <span class="topicTopRight"><span>$user_name</span>
                        <i style="font-size: 2em;" class="fa fa-user-circle" aria-hidden="true"></i></span>
                    </div>
                    <div class="topicMain">
                        $post_content
                    </div>
                    <div class="topicBottom">
                        
                        <span id="upvote" class="upVote">43 <i class="fas fa-chevron-up"></i></span>
                        <span class="downVote">8 <i class="fas fa-chevron-down"></i></span>
                    </div>
                </div>
                EOF;
                echo /* ($_SESSION["signed_in"])?  */$html;
            }
        }

    ?>
</div>


<script>



    var previous = 0;
    function show_reply(value){
        console.log("running")
        arr = value.split('_');
        btn_id = arr[1];
        reply_id = '#'+"form_"+btn_id;
        console.log(reply_id)

        forms = document.querySelectorAll(".reply-form");
        forms.forEach((form) => {
            form.style.display = 'none';
        })


        if($(reply_id).is(":visible")){
            $(reply_id).hide(300,"swing");
        }else{
            $(reply_id).show(300,"swing");
        }
    }

    $(document).ready(()=>{



        forms = document.querySelectorAll(".reply-form");
        forms.forEach((form) => {
            form.style.display = 'none';
        })
        var cancels = document.querySelectorAll(".cancel-reply");
        cancels.forEach((cancel)=>{
            cancel.addEventListener("click",()=>{
                forms = document.querySelectorAll(".reply-form");
                forms.forEach((form) => {
                    form.style.display = 'none';
                })
            })
        })

        $("label.reply").click(()=>{
            console.log($("label.reply").prev().data());
        })
    });

</script>
<script>

    


</script>



<?php include "forumFooter.php"?>