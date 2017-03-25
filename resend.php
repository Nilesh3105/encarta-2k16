<?php
include_once 'header.php';
array_walk($_POST, 'trim');

if(isset($_POST['resend_link'])) {
	$database = new Database;
	$email = strtolower($_POST['email']);
	$database->query("SELECT email, code, active FROM users WHERE email = :email");
	$database->bind(":email", $email);
	$database->execute();

	if($database->rowCount() == 0) {
		alert("<center><strong>Failure!</strong> This email is not registered.</center>", "danger");
	}
	else {
		$row=$database->single();
		if($row["active"]==1) {
			alert("<center>This email has already been activated. You can login <a href='login.php' style='color: #333;'><b>here</b></a>.</center>", "info");
		}
		else{

			$code    = $row["code"];
			$from    = "noreply@csembm.in";
	        $to      = $email;
	        $subject = 'Signup | Verification';
	        $message = 'Thanks for signing up!

Your account has been created, you need to verify your email before you can login.

Please click this link to activate your account:
http://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']).'verify.php?code='.$code.'&email='.$_POST['email'].'

Thanks!
';
	        $headers = "From: $from \r\n";
	        $headers .= "Reply-To: $from \r\n";
	        $headers .= "Return-Path: $from\r\n";
	        $headers .= "X-Mailer: PHP \r\n";
			if(mail($to,$subject,$message,$headers))
		    {
				alert("<center><strong>Success!</strong> Activation link has been sent to your email id.</center>");
			}
			else {
				alert("<center><strong>Failure!</strong> There was an error sending the mail. Please try again later.</center>", "danger");
			}
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
					<i class="material-icons" style="font-size: 48px;">lock</i><br>
					RESEND VERIFICATION MAIL</p>
				</div>
				<div class="panel-body">
					<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" style="margin-top: 12px;">
						<div class="form-group label-floating">
							<div class="input-group margin-bottom-sm">
								<span class="input-group-addon"><i class="material-icons">email</i></span>
								<label for="email" class="control-label">Email</label>
								<input class="form-control" type="email" name="email" maxlength="255" pattern="([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)" required>
							</div>
						</div>
						<div class="row" style="margin-top: 10px;">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-danger btn-raised btn-block" name="resend_link">Send</button>
							</div>
						</div>
					</form>
					<div class="clearfix"></div>
					<div style="margin-top: 30px;">
						<p style="text-align: center;">Account already activated? <a href="login.php" style="color: #2196f3;"> Login</a><br />
						                               Need an account?<a href="signup.php" style="color: #2196f3;"> Register</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
