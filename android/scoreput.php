<?php
include ('config.php');

if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$TEAM_ID = urldecode ( $_REQUEST ["team_id"] );
$Q_id = urldecode ( $_REQUEST ["q_id"] );
$Ans = urldecode ( $_REQUEST ["answer"] );

echo "$TEAM_ID $Q_id $Ans";
$query1 = "SELECT answer from `ques_table` where q_id='$Q_id'" ;
if ($result=mysqli_query($connection,$query1))
{
  // Fetch one and one row
	while ($row=mysqli_fetch_row($result))
	{
    //printf ("%s (%s)\n",$row[0],$row[1]);
		if(!strcmp("$row[0]","$Ans"))
		{
			$sql = "UPDATE Scores SET score=score+10 WHERE  id='$TEAM_ID'";

			if ($connection->query($sql) === TRUE) {
				echo  json_encode ( array (
					"result" => "1" ,
					"message" => "correct answer!"
					) );
			}
		}
		else{
			echo  json_encode ( array (
				"result" => "0" ,
				"message" => "incorrect answer!"
				) );}

		}
	}
	
	
	
	
	

	
	$connection->close();
	?>