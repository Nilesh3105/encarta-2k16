<?php
include ('config.php');

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

	
	$Q_id = urldecode ( $_REQUEST ["q_id"] );
	$TEAM_ID = urldecode ( $_REQUEST ["team_id"] );
	
	$query1 = "SELECT lat,longitude from `ques_table` where q_id='$Q_id'" ;
	$result=mysqli_query($connection,$query1);
	if (mysqli_affected_rows ($connection)>0)
  {  $row = mysqli_fetch_object ($result );
		echo  json_encode ( array (
					"lat" => $row->lat ,
					"longitude" => $row->longitude
			) );
  
$sql = "UPDATE Scores SET score=score-5 WHERE  id='$TEAM_ID'";
$result2=mysqli_query($connection,$sql);
 
		
					
	 

    
	
	
    
	}
	
	
	
	
	

	
$connection->close();
?>