<?php
include "forumHeader.php";
include "connect.php";
?>
<script>
    $("div.titles").html("<h1 id='cat_main_title'><?php echo $_GET["cat_name"] ?></h1>");
    $("h3 a").attr("href","/Binary-Beasts/forum")
</script>
<style>
    h1#cat_main_title{
        font-size: 4em;
        font-weight: 900;
    }
</style>
<!--
    IF mysqli_count_row > 0
        table
        TOPICS | POSTS
    ELSE
        NO TOPIC HAS BEEN CREATED YET 
    
-->

<section class="table">
    
    
    <?php
        $cat_id =  $_GET["cat_id"];
        $query = "SELECT topic_id,topic_subject AS TOPIC ,count(posts.post_topic) AS POSTS
        FROM topics,posts
        WHERE topic_id = posts.post_topic
        AND topic_cat = $cat_id
        GROUP BY posts.post_topic
        ORDER BY count(posts.post_topic) DESC;" ;

        $res = mysqli_query($conn,$query);

        $skeleton = <<<EOF
        <table>
            <thead>
            <tr>
                <th>Topic</th>
                <th>Posts</th>
            </tr>
            </thead>
        EOF;
        $evenRows = '<tr class="rowData">';
        $oddRows = '<tr class="rowData odd">';

        $iterator = 0;

        if(mysqli_num_rows($res)>0){
            echo $skeleton;
            while($data = mysqli_fetch_assoc($res)){
                
                $topics = ucwords($data["TOPIC"]);
                $posts = $data["POSTS"];
                $tId = $data["topic_id"];
                $html= <<<EOF
                        <td><a class="toTopicLink" href="topic.php?topic_id=$tId&topic_subject=$topics" >$topics</a></td>
                        <td>$posts</td>
                    </tr>
                EOF;
                
                if ($iterator % 2 == 0) {
                    echo $oddRows . $html;
                } else {
                    echo $evenRows . $html;
                }
    
                $iterator++;
            }
        }else{
            echo "No Topic has been created in this category yet !";
        }
    ?>
    </table>




    
</section>

<?php
include "forumFooter.php";
?>