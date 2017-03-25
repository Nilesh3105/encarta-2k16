<?php
	  error_reporting(0);
	  mysql_connect('localhost','root','');
	  mysql_select_db('bandit');
	  session_start();
	  
	  if($_SESSION['session_id']=='')
      {
        echo '<script>window.location="login.php"</script>';
      }
?>