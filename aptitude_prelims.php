<?php
require 'header.php';
if(!isset($_SESSION['logged_in'])) {
	header("Location: login.php");
	exit();
}

if(isset($_POST['prelim_submit'])) {
	if(isset($_FILES['ans'])){
		//$file_name = $_FILES['ans']['name'];
		$file_name = "solution.txt";
		$file_size = $_FILES['ans']['size'];
		$file_tmp = $_FILES['ans']['tmp_name'];
		$file_type = $_FILES['ans']['type'];
		
		$finfo = finfo_open(FILEINFO_MIME_TYPE);
    	$mime = finfo_file($finfo, $file_tmp);
		
		if($mime != 'text/plain') {
			alert("<center><strong>Failure!</strong> extension not allowed, please choose a txt file.</center>", "danger");
		}

		else {
			if (!file_exists("uploads/aptitude_prelims/{$_SESSION['id']}/")) {
			    mkdir("uploads/aptitude_prelims/{$_SESSION['id']}/", 0777, true);
			}
			if(move_uploaded_file($file_tmp,"uploads/aptitude_prelims/{$_SESSION['id']}/".$file_name)){
				alert("<center><strong>Success!</strong> Your solution was uploaded successfully.</center>");
			}
			else {
				alert("<center><strong>Failure!</strong> Sorry there was an error while uploading. Please try again after some time.</center>", "danger");
			}
		}
	}	
}
?>

<div class="container-fluid">
	<div class="row" style="margin-top: 10vh;">
		<div class="col-sm-offset-1 col-sm-10 col-md-offset-3 col-md-6">
			<div class="jumbotron">
				<h2>Aptitude Test</h2>
				<ul style="font-size: 18px;">
					<li>These prelims are only for 1st sem students and are required for participating in code fiesta. Submittion from participants who doesn't meet the above crietria won't be entertained.</li>
					<li>Please upload your answers in .txt format only. No other file format is acceptable.</li>
					<li>Mention your name and encarta id in the file</li>
					<li>You can download the prelims from <a href="downloads/aptitude.pdf">here</a></li>
				</ul>
				<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype = "multipart/form-data">
					<div class="form-group">
						<label for="ans">Solution: </label><br />
						<input readonly="" class="form-control" placeholder="Browse..." type="text">
    					<input id="inputFile" type="file" name="ans">
						<button type="submit" class="btn btn-raised btn-primary pull-right" name="prelim_submit">Upload</button>
					</div>
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>
</div>
