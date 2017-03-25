<?php
require 'header.php';
if(!isset($_SESSION['admin_login']) || $_SESSION['admin_login'] !== true) {
	header("Location: index.php");
	exit();
}
array_walk($_POST, 'trim');
if(isset($_POST['enc_sub'])) {
	$database = new Database;
	$database->query("SELECT id FROM users WHERE id = :id");
	$database->bind(":id", $_POST['encarta_id']);
	$row = $database->single();
	if($database->rowCount() == 0){
		alert('<center><strong>Failure!</strong> This Encarta ID is not registered.</center>', "danger");
	}
	else {
		$database->query("SELECT * FROM events WHERE id = :id");
		$database->bind(":id", $_POST['encarta_id']);
		$row = $database->single();
		if($database->rowCount() == 0){
			try {
				$database->query("INSERT INTO events(id) VALUES (:id)");
				$database->bind(":id", $_POST['encarta_id']);
				$database->execute();
				$database->query("SELECT * FROM events WHERE id = :id");
				$database->bind(":id", $_POST['encarta_id']);
				$row = $database->single();
			}
			catch(PDOException $e){
				alert('<center><strong>Failure!</strong> An error occurred. '.$e->getMessage().'.</center>', "danger");
			}
		}
		$_SESSION['encarta_id']=$_POST['encarta_id'];
		alert('<center>Redirecting...</center>');
		if($row['locked']==0)
		{
			echo '<meta http-equiv="refresh" content="0;payment.php">';
		}
		else
		{
			echo '<meta http-equiv="refresh" content="0;unlock.php">';
		}
	}	
}
?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-offset-1 col-sm-offset-4 col-sm-4 col-xs-10" style="margin-top:50px;margin-bottom:50px;">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<p class="panel-title" style="text-align: center; font-size: 36px; line-height: 1.5;">
						<i class="material-icons" style="font-size: 48px;">school</i><br>
						Enter Encarta ID</p>
					</div>
					<div class="panel-body">
						<form action="" method="POST" style="margin-top: 12px;">
							<div class="form-group label-floating">
								<div class="input-group margin-bottom-sm">
									<span class="input-group-addon"><i class="material-icons">person</i></span>
									<label for="encarta_id" class="control-label">Encarta ID</label>
									<input class="form-control" type="number" name="encarta_id" maxlength="255"  required>
								</div>
							</div>
							<button type="submit" class="btn btn-success pull-right" name="enc_sub">Submit</button>
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
