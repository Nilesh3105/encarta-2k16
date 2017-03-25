<?php
require 'header.php';
require 'OnlineJudge.php';
if(!isset($_SESSION['logged_in'])) {
	header("Location: ../login.php");
	exit();
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
	}
}

alert("<center><strong>Online Judge is live. You can submit your code now.</strong></center>", "info");
?>

<div class="container-fluid">
	<div class="row" style="margin-top: 10vh;">
		<div class="col-sm-offset-1 col-sm-10 col-md-offset-3 col-md-6">
			<div class="jumbotron">
				<h2><center>Code Fiesta Prelims</center></h2>
				<table class="table table-striped table-hover" style="margin-top: 10vh;">
					<colgroup>
						<col span="1" style="width: 5%;">
						<col span="1" style="width: 80%;">
						<col span="1" style="width: 15%;">
				    </colgroup>
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><a href="Q1.php" target="_blank">Question 1</a></td>
							<td><?php status_icon($row['q1']); ?></td>
						</tr>
						<tr>
							<td>2</td>
							<td><a href="Q2.php" target="_blank">Question 2</a></td>
							<td><?php status_icon($row['q2']); ?></td>
						</tr>
						<tr>
							<td>3</td>
							<td><a href="Q3.php" target="_blank">Question 3</a></td>
							<td><?php status_icon($row['q3']); ?></td>
						</tr>
						<tr>
							<td>4</td>
							<td><a href="Q4.php" target="_blank">Question 4</a></td>
							<td><?php status_icon($row['q4']); ?></td>
						</tr>
						<tr>
							<td>5</td>
							<td><a href="Q5.php" target="_blank">Question 5</a></td>
							<td><?php status_icon($row['q5']); ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
