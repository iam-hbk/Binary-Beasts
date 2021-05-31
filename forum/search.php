<?php 
include "connect.php";


$search = $_POST['search'];


$query = "SELECT topic_subject, topic_id FROM topics WHERE topic_subject like '%$search%';";
$results = mysqli_query($conn, $query) or die("sql query failed:".mysqli_error($conn));

$subject = array();
$id = array();
while ($line = mysqli_fetch_assoc($results)) {
  $subject[] = $line['topic_subject'];
  $id[] = $line['topic_id'];
}

$json[] = array($id, $subject);

print(json_encode($json));


 ?>