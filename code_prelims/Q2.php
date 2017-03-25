<?php
require 'header.php';
if(!isset($_SESSION['logged_in'])) {
	header("Location: ../login.php");
	exit();
}
?>

<div class="container-fluid">
	<div class="row" style="margin-top: 20vh;">
		<div class="col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8">
			<div class="jumbotron">
				<h2>Question 2</h2>
				<br>
				<p>
					At a railway station, we have time-table of trains arrival and departure. We need to find the minimum number of platforms so that all the trains can be accommodated as per their schedule.
				</p>
				<p>
					<strong>INPUT:</strong><br>
					First line contains no. of testcases <b>T</b>.<br>
					For each test case, first line contains integer <b>N</b> denoting the no. of trains.<br>
					Second line contains the arrival time of train <b>A<sub>i</sub></b>, where train number is denoted by i (space separated).<br>
					Third line contains the departure time of trains <b>B<sub>i</sub></b> (space separated).<br>
					NOTE:- Consider the time to be 24 hours format. Also if a train arrives at the depature time of another train they would require two seprate stations.

				</p>
				<p>   
					<strong>OUTPUT:</strong><br>
					For each test case output the minimum number of platforms so that all the trains can be accommodated.<br>
				</p>
				<p>
					<strong>CONSTRAINTS:</strong><br>
					1<=T<=100<br>
					1<=N<=10<sup>3</sup><br>
					0<=A<sub>i</sub><=B<sub>i</sub><=2400<br>
					Time Limit: 2 sec<br>
				</p>	
				<p>
					<strong>SAMPLE INPUT:</strong><br>
				</p>
					<pre>
1
4
0100  0300  0005  0050
0200  0400  0100  0055</pre>
				<p>
					<strong>SAMPLE OUTPUT:</strong><br>
				</p>
					<pre>
2</pre>
				<a class="btn btn-raised btn-success btn-lg pull-right" href="submit.php?ques=2" target="_blank">Submit solution</a>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>

