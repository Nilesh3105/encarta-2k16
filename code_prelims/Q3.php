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
				<h2>Question 3</h2>
				<br>
				<p>
					Write an efficient program to find the largest sum of contiguous sub-array within a one-dimensional array of integers. A contiguous sub-array of an array is defined as the sequence of elements that are in any continuous set of indices that are valid within an array.
				</p>
				<p>
					<strong>INPUT:</strong><br>
					First line contains no. of testcases <b>T</b>.<br>
					First line of each test case contains <b>N</b> which is total number of elements in array.<br>
					Second line of each test case contains N space separated integers, <b>A[i]</b>.<br>
				</p>
				<p>   
					<strong>OUTPUT:</strong><br>
					Single integer SUM which is the largest sum of all possible contiguous sub-arrays.<br>
				</p>
				<p>
					<strong>CONSTRAINTS:</strong><br>
					1<=T<=100<br>
					1<=N<=10<sup>4</sup><br>
					-10000 <= A[i] <= 10000<br>
					Time Limit: 2 sec<br>
				</p>	
				<p>
					<strong>SAMPLE INPUT:</strong><br>
				</p>
					<pre>
1
3
6 -4 5</pre>
				<p>
					<strong>SAMPLE OUTPUT:</strong><br>
				</p>
					<pre>
7</pre>
				<p>
					<strong>Explanation:</strong><br>
					 For array A[]=6,-4, 5, possible contiguous sub-array combinations are {6}, {-4}, {5}, {6,-4}, {-4,5} and {6,-4,5}. Note that {6,5} is not a valid subarray as the indices of 5 and 4 are not continuous.<br>
					The contiguous sub-array {6,-4,5} has the largest sum 7. 

				</p>
				<a class="btn btn-raised btn-success btn-lg pull-right" href="submit.php?ques=3" target="_blank">Submit solution</a>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
