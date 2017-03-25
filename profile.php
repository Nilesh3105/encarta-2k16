<?php
require 'header.php';
if(!isset($_SESSION['logged_in'])) {
	header("Location: login.php");
	exit();
}
?>

<div class="container-fluid">
	<div class="row" style="margin-top: 10vh;">
		<div class="col-sm-offset-1 col-sm-10 col-md-offset-3 col-md-6">
			<div class="jumbotron">
				<h2>Hi <?php echo $_SESSION['name']; ?>,</h2>
				<p>
					<span style="font-weight: 400;">Registration:</span><br>
				</p>
				<ol style="font-size: 21px;">
					<li>
						You can select the events you want to participate in <a href="select_events.php">here</a>.
					</li>
					<li>Your Encarta ID is <?php echo $_SESSION['encid']; ?>. Submit the amount mentioned in the previous step at the desk to complete your registration.</li>
				</ol>
				<p>
					<span style="font-weight: 400;">Prelims:</span><br>
					You need to clear the following prelims to participate in corresponding events.
				</p>
				<!-- password is xrrcpnyznaqrawbllbheserrcnff -->
				<ul style="font-size: 18px;">
					<li>
						<a href="code_prelims">Code Fiesta</a> Prelims<br>
						<em>Or</em><br>
						<a href="aptitude_prelims.php">Aptitude Test</a>(only for 1st sem students)
					</li>
					<li><a href="quiz_prelims.php">Quzzirad</a> Prelims</li>
				</ul>
			</div>
		</div>
	</div>
</div>
