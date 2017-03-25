<?php
include ('config.php');

	$TEAM_ID = urldecode ( $_REQUEST ["team_id"] );
	
	
$query3 = "SELECT score,FIND_IN_SET(score,(select GROUP_CONCAT(score order by score desc)from scores))as rank from `scores` where id=$TEAM_ID " ;
	$check_result1 = mysqli_query ( $connection,$query3 );
	if (mysqli_affected_rows ($connection) >0) {
		$row = mysqli_fetch_object ( $check_result1 );
		
			echo json_encode ( array (
					"score" => $row->score ,
					"rank" => $row->rank
			) );}
			?>
	