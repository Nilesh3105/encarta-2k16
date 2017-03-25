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
				<h2>Question 4</h2>
				<br>
				<p>
					Kohli loves the concepts of numerology. He wants to find out those numbers (in a given particular range) whose sum of digit is equal to <b>K</b> where sum of digit is calculated until a single digit is formed.</p>
					<p>For example, for a number 999, the sum of digits calculated is 9+9+9=27. But 27 is not a single digit number, so the same process will be repeated until we get one, therefore 2+7=9. Since, 9 is single digit there no requirement to calculate further. Kohli wants to calculate such numbers in the given range such that their sum of digits is equal to <b>K</b>.
				</p>
				<p>
					<strong>INPUT:</strong><br>
					The first line contains <b>T</b> denoting the number of test cases.<br>
					Each test case contains integer <b>L</b>, <b>R</b> and <b>K</b> where L are R denotes range of numbers, both inclusive, in which Kohli needs to operate.
				</p>
				<p>   
					<strong>OUTPUT:</strong><br>
					For each test case output an integer denoting the total numbers in range(L-R) whose digit sum is equal to K. <br>
				</p>
				<p>
					<strong>CONSTRAINTS:</strong><br>
					1 <= T <= 100<br>
					1 <= L <= R <= 10<sup>5</sup><br>
					0 <= K <= 9<br>
					Time Limit: 2 sec<br>
				</p>	
				<p>
					<strong>SAMPLE INPUT:</strong><br>
				</p>
					<pre>
1
10 30 1</pre>
				<p>
					<strong>SAMPLE OUTPUT:</strong><br>
				</p>
					<pre>
3</pre>
				<p>
					<strong>Explanation:</strong><br>
					Test case 1:  L=10, R=30 and K=1 then total numbers in given range=10, 11,12.......,30 there is 10 whose digit sum is 1, 19 whose digit sum is 1, similarly 28 has digit sum as 1.<br>So total count=3 (10,19,28).
				</p>
				<a class="btn btn-raised btn-success btn-lg pull-right" href="submit.php?ques=4" target="_blank">Submit solution</a>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>

