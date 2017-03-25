<?php   	
				$sel="select * from userx where teamx_id='".$_SESSION['session_id']."' ";
				$exe=mysql_query($sel);
			    $fetch=mysql_fetch_array($exe);
				echo $fetch['userx1_id']."<br>";
				echo $fetch['userx2_id'];
				
?>