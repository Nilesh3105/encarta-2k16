<?php
require 'header.php';
require 'OnlineJudge.php';
if(!isset($_SESSION['logged_in'])) {
	header("Location: ../login.php");
	exit();
}
if(isset($_GET['ques'])) {
if(isset($_POST['prelim_submit'])) {
	if(isset($_FILES['ans'])){
		//$file_name = $_FILES['ans']['name'];
		$file_name = "solution.".$_POST['lang'];
		$file_size = $_FILES['ans']['size'];
		$file_tmp = $_FILES['ans']['tmp_name'];
		$file_type = $_FILES['ans']['type'];
		
		$finfo = finfo_open(FILEINFO_MIME_TYPE);
    	$mime = finfo_file($finfo, $file_tmp);
		
		if($mime != 'text/plain' && $mime != 'text/x-c') {
			alert("<center><strong>Failure!</strong> $mime This file type is not allowed please upload a plain text file.</center>", "danger");
		}

		else {
			if (!file_exists("uploads/code_prelims/{$_SESSION['id']}/{$_GET['ques']}/")) {
			    mkdir("uploads/code_prelims/{$_SESSION['id']}/{$_GET['ques']}/", 0755, true);
			}
			if(move_uploaded_file($file_tmp,"uploads/code_prelims/{$_SESSION['id']}/{$_GET['ques']}/".$file_name)){
				$source = "uploads/code_prelims/{$_SESSION['id']}/{$_GET['ques']}/".$file_name;
				switch ($_POST['lang']) {
					case 'c':
						$verdict = judgeC($source, $_GET['ques']);
						break;

					case 'cpp':
						$verdict = judgeCPP($source, $_GET['ques']);
						break;

					case 'py':
						$verdict = judgePY($source, $_GET['ques']);
						break;
				}
				$database = new Database;
				$database->query("SELECT * FROM code_prelims WHERE user_id = :id");
				$database->bind(":id", $_SESSION['id']);
				$row = $database->single();
				if($database->rowCount() == 0){
					try {
						$database->query("INSERT INTO code_prelims(user_id) VALUES (:id)");
						$database->bind(":id", $_SESSION['id']);
						$database->execute();
						$database->query("SELECT * FROM code_prelims WHERE user_id = :id");
						$database->bind(":id", $_SESSION['id']);
						$row = $database->single();
					}
					catch(PDOException $e){
						alert('<center><strong>Failure!</strong> An error occurred. '.$e->getMessage().'.</center>', "danger");
						exit();
					}
				}
				try {
					if($row["q{$_GET['ques']}"] != "solved") {
						$decode = array("CE" => "not_solved", "WA" => "not_solved", "TLE" => "not_solved","CA" => "solved");
						$status = $decode[$verdict[0]];
						$database->query("UPDATE code_prelims SET `q{$_GET['ques']}`='{$status}' WHERE user_id = :id");
						$database->bind(":id", $_SESSION['id']);
						$database->execute();
					}
				}
				catch(PDOException $e){
					alert('<center><strong>Failure!</strong> An error occurred. '.$e->getMessage().'.</center>', "danger");
					exit();
				}

				if($verdict[0]=="CE")
				{
					$verdict[1] = str_ireplace("uploads/code_prelims/{$_SESSION['id']}/{$_GET['ques']}/", "", $verdict[1]);
				}
				$decode = array( "CE" => "Compilation Error", "WA" => "Wrong Answer", "CA" => "Correct Answer", "TLE" => "Time Limit Exceeded");
				?>
				<div class="container-fluid">
					<div class="row" style="margin-top: 5vh;">
						<div class="col-sm-offset-1 col-sm-10 col-md-offset-3 col-md-6">
							<div class="well" style="text-align: center;">
								<h3>Submission Status</h3>
								<hr>
								<center><?php status_icon($verdict[0]); ?></center>
								<?php echo $decode[$verdict[0]]; ?><br />
								<?php if($verdict[0]=="CE") echo '<pre>'.$verdict[1].'</pre>'; ?>
							</div>
						</div>	
					</div>
				</div>
			<?php
			}
			else {
				alert("<center><strong>Failure!</strong> Sorry there was an error while uploading. Please try again after some time.</center>", "danger");
			}
		}
	}	
}
?>

<div class="container-fluid">
	<div class="row" <?php if(!isset($verdict)) echo 'style="margin-top: 15vh;"'; ?> >
		<div class="col-sm-offset-1 col-sm-10 col-md-offset-3 col-md-6">
			<div class="jumbotron">
				<h2>Submit a solution: Question <?php echo $_GET['ques']; ?></h2>
				<hr>
				<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype = "multipart/form-data" class="form-horizontal">
					<fieldset>
						<div class="form-group">
							<label for="inputFile" class="col-md-2 control-label" style="">Source Code:</label>
							<div class="col-md-6">
								<input readonly="" class="form-control" placeholder="Browse..." type="text">
								<input id="inputFile" type="file" name="ans" required>
							</div>
						</div>
						<div class="form-group">
							<label for="language" class="col-md-2 control-label">Language:</label>
							<div class="col-md-6">
								<select id="language" class="form-control" name="lang">
									<option value="c">C (C99)</option>
									<option value="cpp">C++ (C++14)</option>
									<option value="py">Python (Python 2.7)</option>
								</select>
							</div>
						</div>
						<div class="form-group">
      						<div class="col-xs-10 col-xs-offset-2">
								<button type="submit" class="btn btn-raised btn-primary" name="prelim_submit">Submit</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
<?php } ?>