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
				<h2>Question 1</h2>
				<br>
				<p>
					Chayan and Shubham are best friends . They love to play with strings. One day , Chayan challenged Shubham to find out minimum no. of characters to be removed from strings to make it palindrome(shuffling of characters can be done) . Shubham tried to solve the problem but he was unable to solve the problem. Can you help him out in solving this problem.
				</p>
				<p>
					<strong>INPUT:</strong><br>
					First line contains no. of testcases <b>T</b>.<br>
					For each test case you are given a string <b>S</b> (can be of different length <b>N</b>).<br>
					NOTE :-  String contains only lowercase letters.<br>
				</p>
				<p>   
					<strong>OUTPUT:</strong><br>
					For each test case output an integer which resembles the no. of removed characters.<br>
				</p>
				<p>
					<strong>CONSTRAINTS:</strong><br>
					1<=T<=100<br>
					1<=N<=10<sup>6</sup><br>
					Time Limit: 2 sec<br>
				</p>	
				<p>
					<strong>SAMPLE INPUT:</strong><br>
				</p>
					<pre>
3
aabbcd
abcd
aaabb</pre>
				<p>
					<strong>SAMPLE OUTPUT:</strong><br>
				</p>
					<pre>
1
3
0</pre>
				<p>
					<strong>Explanation:</strong><br>
					test case 1:  input string : aabbcd<br>
					Either c or d can be removed to make it palindrome.
				</p>

				<a class="btn btn-raised btn-success btn-lg pull-right" href="submit.php?ques=1" target="_blank">Submit solution</a>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
