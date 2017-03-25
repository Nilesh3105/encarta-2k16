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
				<h2>Question 5</h2>
				<br>
				<p>
					After years of study, scientists at <b>ISRO</b> have discovered an alien language transmitted from a faraway planet. The alien language is very unique in which every word consists of exactly L lowercase letters. Also, there are exactly <b>W</b> words in this language.</p>
				<p>Once the dictionary of all the words in the alien language was built, the next breakthrough was to discover that the aliens have been transmitting messages to Earth since the past decade. Unfortunately, these signals are weakened due to the distance between our two planets and some of the words may be misinterpreted. In order to help them decipher these messages, the scientists have asked you to devise an algorithm that will determine the number of possible interpretations for a given pattern.</p>
				<p>A pattern consists of exactly <b>L</b> tokens. Each token is either a single lowercase letter (the scientists are very sure that this is the letter) or a group of unique lowercase letters surrounded by parenthesis: ( and ). For example: (ab)d(dc) means the first letter is either a or b, the second letter is definitely d and the last letter is either d or c. Therefore, the pattern (ab)d(dc) can stand for either one of these 4 possibilities: add, adc, bdd, bdc.
				</p>
				<p>
					<strong>INPUT:</strong><br>
					The first line of input contains 3 integers, <b>L</b>, <b>D</b> and <b>N</b> separated by a space. <b>D</b> lines follow, each containing one word of length <b>L</b>. These are the words that are known to exist in the alien language. <b>N</b> test cases then follow, each on its own line and each consisting of a pattern as described above. You may assume that all known words provided are unique.
				</p>
				<p>   
					<strong>OUTPUT:</strong><br>
					For each test case, output<br>
					<pre>Case #X: K</pre><br>
					Where <b>X</b> is the test case number, starting from 1, and <b>K</b> indicates how many words in the alien language match the pattern.

				</p>
				<p>
					<strong>CONSTRAINTS:</strong><br>
					1 ≤ L≤ 15<br>
					1 ≤ D ≤ 5000<br>
					1 ≤ N ≤ 500<br>
					Time Limit: 2 sec<br>
				</p>	
				<p>
					<strong>SAMPLE INPUT:</strong><br>
				</p>
					<pre>
3 5 4
abc
bca
dac
dbc
cba
(ab)(bc)(ca)
abc
(abc)(abc)(abc)
(zyx)bc</pre>
				<p>
					<strong>SAMPLE OUTPUT:</strong><br>
				</p>
					<pre>
Case #1: 2
Case #2: 1
Case #3: 3
Case #4: 0</pre>
				<a class="btn btn-raised btn-success btn-lg pull-right" href="submit.php?ques=5" target="_blank">Submit solution</a>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>

