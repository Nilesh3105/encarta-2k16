<?php
include 'config.php';

$TEAM_ID = urldecode ( $_REQUEST ["team_id"] );
$SELECT_QUERY="Select * from `ques_table` where status='$TEAM_ID'";
$select_result = mysqli_query ($connection,$SELECT_QUERY );

 $post = array();
    while($row = mysqli_fetch_assoc($select_result))
    {
        $post[] = $row;
    }
 echo json_encode($post);
?>	
