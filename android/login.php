<?php
include ('config.php');


if (isset ( $_REQUEST ['team_id'] ) && ! empty ( $_REQUEST ['team_id'] ) && isset ( $_REQUEST ['password'] ) && ! empty ( $_REQUEST ['password'] )) {
	
	$TEAM_ID = urldecode ( $_REQUEST ["team_id"] );
	$PASSWORD = urldecode ( $_REQUEST ["password"] );
	
	$CHECK_QUERY = "SELECT * FROM `team` WHERE  id='$TEAM_ID' AND  password='$PASSWORD'";
	$check_result = mysqli_query ( $connection,$CHECK_QUERY );
	if (mysqli_affected_rows ($connection) == 1) {
		$row = mysqli_fetch_object ( $check_result );
		if ($row->status==1)
			echo json_encode ( array (
					"result" => "0" ,
					"message" => "User already logged in on other device"
			) );
		else {
			$UPDATE_QUERY = "UPDATE `team` SET `status`=1 WHERE id='$TEAM_ID'";
			$update_result = mysqli_query ( $connection,$UPDATE_QUERY );
			if (mysqli_affected_rows ($connection) == 1) 
			if($row->status==0)
				echo json_encode ( array (
							"result" => "1" ,
							"message" => "login !!"
					) );
			else
				echo json_encode ( array (
						"result" => "0" ,
						"message" => "Some error occured. Please try again!"
				) );
		}
	} else {
		echo json_encode ( array (
				"result" => "0" ,
				"message" => "Invalid team id or password"
		) );
	}
} else {
	echo json_encode ( array (
			"name" => "Required Feild Missing" 
	) );
}
?>
