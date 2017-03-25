<?php
include ('config.php');


if (isset ( $_REQUEST ['team_id'] ) && ! empty ( $_REQUEST ['team_id'] ) ) {
	
	$TEAM_ID = urldecode ( $_REQUEST ["team_id"] );
	
	$UPDATE_QUERY = "UPDATE `team` SET `status`=0 WHERE id='$TEAM_ID' ";
	$update_result = mysqli_query ( $connection,$UPDATE_QUERY );
	if ($update_result && mysqli_affected_rows ($connection) == 1) 
			echo json_encode ( array (
				"message" => "User logged out"
			) );
	else 
			echo json_encode ( array (
					"message" => "User already logged out"
				) );
}
 else {
	echo json_encode ( array (
			"name" => "Required Feild Missing" 
	) );
}
?>