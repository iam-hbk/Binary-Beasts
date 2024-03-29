<?php include "forumHeader.php"?>
<!-- -------------------------------------------------------------POTENTIAL HEADER ------------------------------------------------- -->


      <section class="table">
        <table>
          <thead>
            <tr>
              <th>Topic</th>
              
              <th>Category</th>
              
              <th>Last activity</th>
              
            </tr>
          </thead>
<?php

$query = "SELECT topics.topic_id,topics.topic_subject,categories.cat_name,topic_date
          FROM topics,categories
          WHERE topics.topic_cat = categories.cat_id ORDER BY topic_date DESC";
$res = mysqli_query($conn,$query);

$evenRows = '<tr class="rowData">';
$oddRows = '<tr class="rowData odd">';



$iterator = 0;
while($data = mysqli_fetch_assoc($res)){
  $tId = $data["topic_id"];
  $tsubject = $data["topic_subject"];
  $tcat = $data["cat_name"];
  $tdate = $data["topic_date"];
  $start_date = new DateTime($tdate);
  $since_start = $start_date->diff(new DateTime());
  $newTdate = ($since_start->y > 0 ? $since_start->y.' years ago' :
    ($since_start->m > 0 ? $since_start->m.'months ago':
    ($since_start->d > 0 ? $since_start->d.'d ago'  :
    ($since_start->h > 0 ? $since_start->h.'h ago'     :
    ($since_start->i > 0 ? $since_start->i.'m ago'     :
    ($since_start->s > 0 ? $since_start->s.'s ago': '-' ))))))
    ;
    
    $html = <<<EOF
    <td><a class="toTopicLink" href="topic.php?topic_id=$tId&topic_subject=$tsubject" >$tsubject</a></td>
    <td>$tcat</td>
    
    <td>$newTdate</td>
  </tr>
  EOF;
      if ($iterator % 2 == 0) {
          echo $oddRows . $html;
      } else {
          echo $evenRows . $html;
      }

  $iterator++;
}

?>
        </table>
      </section>
    </div>

    <!-- TEST STUFF HERE -->

<?php include "forumFooter.php"?>
