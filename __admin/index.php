<?php
require 'header.php';
array_walk($_POST, 'trim');
if(isset($_POST['admin_login'])) {
	$database = new Database;
	$_POST['user_name'] = strtolower($_POST['user_name']);
	$database->query("SELECT id, password FROM admins WHERE user_name = :user_name");
	$database->bind(":user_name", $_POST['user_name']);
	$row = $database->single();
	if($database->rowCount() == 0){
	alert('<center><strong>Failure!</strong> This user_name is not registered.</center>', "danger");
	}
	else {
		$hash = $row['password'];
		$id = $row['id'];
		$options = ['cost' => 10];
		if (password_verify($_POST['password'], $hash)) {
			// Check if the password needs to be rehashed
			if (password_needs_rehash($hash, PASSWORD_BCRYPT, $options)) {
				// If so, create a new hash, and replace the old one
				$newHash = password_hash($password, PASSWORD_BCRYPT, $options);
				$database->query("UPDATE admins SET password = :pass WHERE id = :id");
				$database->bind(":pass",$newHash);
				$database->bind(":id",$id);
				$database->execute();
			}
			// "User successfully logged in";
			$_SESSION['admin_login'] = true;
			$_SESSION['user_name'] = $_POST['user_name'];
			$_SESSION['id'] = $id;
			alert('<center>User successfully logged in. Redirecting.</center>');
			echo '<meta http-equiv="refresh" content="1.0;userid.php">';
			$redirecting=true;
		}
		else {
			alert('<center><strong>Failure!</strong> The password entered is incorrect.</center>', "danger");
		}
	}
}

?>
<?php
if(isset($_SESSION['admin_login']) && $_SESSION['admin_login'] === true && !isset($redirecting)) {
	alert('<center>You are already Logged in! <a href="logout.php" style="color: teal;">Log out</a></center>');
}
else { ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-offset-1 col-sm-offset-4 col-sm-4 col-xs-10" style="margin-top:50px;margin-bottom:50px;">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<p class="panel-title" style="text-align: center; font-size: 36px; line-height: 1.5;">
						<i class="material-icons" style="font-size: 48px;">school</i><br>
						SIGN IN</p>
					</div>
					<div class="panel-body">
						<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" style="margin-top: 12px;">
							<div class="form-group label-floating">
								<div class="input-group margin-bottom-sm">
									<span class="input-group-addon"><i class="material-icons">person</i></span>
									<label for="user_name" class="control-label">User Name</label>
									<input class="form-control" type="text" name="user_name" maxlength="255"  required>
								</div>
							</div>
							<div class="form-group label-floating">
								<div class="input-group">
									<span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
									<label for="password" class="control-label">Password</label>
									<input class="form-control" type="password" name="password" maxlength="60" required>
								</div>
							</div>
							<button type="submit" class="btn btn-success pull-right" name="admin_login">Sign In</button>
						</form>
						<div class="clearfix"></div>

					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php } ?>