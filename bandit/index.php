<?php include 'connect.php';
      $sel_u="select * from userx where teamx_id='".$_SESSION['session_id']."' ";
      $exe_u=mysql_query($sel_u);
	  $fetch_u=mysql_fetch_array($exe_u);
?>
<html >
<head>
	<link rel="stylesheet" type="text/css" href="allchallenges.css"> 
	</head>
	<body style="background:black;">
		<div class="userdetail">
        	<?php include'user.php' ?>
            <a href="logout.php" style="text-decoration:none;"><br />logout</a>
        </div>
        <div>
			<img src="BANDIT.jpg" class="center-block" style="height: 250px;width: 400px;">
		</div>
		<div class="center-block">
			<p>Welcome to Bandit. All the challenges are organised into levels from easy to difficult.</p>
			<p>Each challenge earns you virtual money, which can be spent on hints for the problems.</p>
			<p>Teams would be judged based on number of challenges they solved.</p>
			<p>The challenges on this level are based on topics social engineering, javascript, cracking, html, simple stegno, logic, cross-site scripting, SQL injection.</p> 
			<p>YOU ARE START WITH 100 Bitcoins</p><span>|</span>
		</div>
		<a href="challenge1.php" style="text-decoration: none; color:lime;"><div id="button">Click here to start Bandit</div></a>
</body></html>