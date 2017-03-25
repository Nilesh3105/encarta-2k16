<?php
require 'header.php';
if(!isset($_SESSION['admin_login']) || $_SESSION['admin_login'] !== true) {
	header("Location: index.php");
	exit();
}
else if(!isset($_SESSION['encarta_id'])) {
	header("Location: userid.php");
	exit();
}

$database = new Database;
$database->query("SELECT total FROM events WHERE id = :id");
$database->bind(":id", $_SESSION['encarta_id']);
$row = $database->single();

if(isset($_POST['pass']) && $_POST['pass'] == "unlock") {
	$database->query("UPDATE events SET locked = 0 WHERE id = :id");
	$database->bind(":id", $_SESSION['encarta_id']);
	try {
		$database->execute();
		alert("<center><strong>Success!</strong> Redirecting...</center>");
		echo '<meta http-equiv="refresh" content="1.0;payment.php">';
	}
	catch(PDOException $e){
		alert('<center><strong>Failure!</strong> An error occurred. '.$e->getMessage().'.</center>', "danger");
	}
}
?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-offset-1 col-sm-offset-4 col-sm-4 col-xs-10" style="margin-top:50px;margin-bottom:50px;">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<p class="panel-title" style="text-align: center; font-size: 36px; line-height: 1.5;">
						<i class="material-icons" style="font-size: 48px;">lock</i><br>
						User Locked</p>
					</div>
					<div class="panel-body">
						<h4>This user has already completed the procedure for registration and payment.</h4>
						<h4>Payment of Rs.<?php echo $row['total']; ?> was recieved</h4>
						<hr>
						<h4>Do you want to unlock this user?</h4>
						<form action="" method="POST" style="margin-top: 12px;">
							<input class="form-control" type="hidden" name="pass" value="unlock" maxlength="60">

							<button type="submit" class="btn btn-success pull-right" name="user_unlock">YES!</button>
						</form>
						<div class="clearfix"></div>

					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
