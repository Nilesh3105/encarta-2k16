<?php

function status_icon($type) {
	switch ($type) {
		case "not_attempted":
			echo '<i title="not attempted" class="material-icons" style="font-size: 32px; color: #03a9f4;">info_outline</i>';
			break;

		case 'not_solved':
		case 'WA':
			echo '<i title="not solved" class="material-icons" style="font-size: 32px; color: #f44336;">clear</i>';
			break;

		case 'solved':
		case 'CA':
			echo '<i title="solved" class="material-icons" style="font-size: 32px; color: #4caf50;">done</i>';
			break;
			

		case 'CE':
			echo '<i title="solved" class="material-icons" style="font-size: 32px; color: #ffeb3b;">warning</i>';
			break;
		
		case 'TLE':
			echo '<i title="solved" class="material-icons" style="font-size: 32px; color: #ffeb3b;">alarm</i>';
			break;

		default:
			echo "";
			break;
	}
}

function judgeCPP($source, $ques)
{
	$in="OJ/input{$ques}.txt";
	$out="OJ/out{$ques}.txt";
	$arr;
	//-static-libstdc++
	$process = proc_open('g++ -w -std=c++0x -O2 -fomit-frame-pointer -o prog '.$source,
    array(
        1 => array("pipe", "w"),  //stdout
        2 => array("pipe", "w")   // stderr
    ), $pipes);
    $cerror = stream_get_contents($pipes[2]);
	proc_close($process);

	if(trim($cerror) == "") { //compilation successfull

		$process=proc_open('timeout 2s ./prog < '.$in.' > output.txt', 
		array(
	        	1 => array("pipe", "w"),  //stdout
	        	2 => array("pipe", "w")   // stderr
	    	), $pipes);
		sleep(4);
		$return_value = proc_get_status($process);
		proc_close($process);

		//var_dump($return_value);
		if($return_value["exitcode"] == 124)
		{
			$arr[0]="TLE";
		}
		else {
			$process=proc_open("diff $out output.txt -qb", 
			array(
		        	1 => array("pipe", "w"),  //stdout
		        	2 => array("pipe", "w")   // stderr
		    	), $pipes);

			if(stream_get_contents($pipes[1])=="") 
				$arr[0] = "CA";
			else 
				$arr[0] = "WA";
			proc_close($process);		
		}
		unlink('output.txt');
	}
	else {
		$arr[0] = "CE";
		$arr[1] = $cerror;
	}
	unlink('prog');
	return $arr;
}

function judgeC($source, $ques)
{
	$in="OJ/input{$ques}.txt";
	$out="OJ/out{$ques}.txt";
	$arr;

	$process = proc_open('gcc -std=c99 -w -O2 -fomit-frame-pointer -o prog '.$source,
    array(
        1 => array("pipe", "w"),  //stdout
        2 => array("pipe", "w")   // stderr
    ), $pipes);
    $cerror = stream_get_contents($pipes[2]);
	proc_close($process);

	if(trim($cerror) == "") { //compilation successfull

		$process=proc_open('timeout 2s ./prog < '.$in.' > output.txt', 
		array(
	        	1 => array("pipe", "w"),  //stdout
	        	2 => array("pipe", "w")   // stderr
	    	), $pipes);
		sleep(4);
		$return_value = proc_get_status($process);
		proc_close($process);

		//var_dump($return_value);
		if($return_value["exitcode"] == 124)
		{
			$arr[0]="TLE";
		}
		else {
			$process=proc_open("diff $out output.txt -qb", 
			array(
		        	1 => array("pipe", "w"),  //stdout
		        	2 => array("pipe", "w")   // stderr
		    	), $pipes);

			if(stream_get_contents($pipes[1])=="") 
				$arr[0] = "CA";
			else 
				$arr[0] = "WA";
			proc_close($process);		
		}
		unlink('output.txt');
	}
	else {
		$arr[0] = "CE";
		$arr[1] = $cerror;
	}
	unlink('prog');
	return $arr;
}

function judgePY($source, $ques)
{
	$in="OJ/input{$ques}.txt";
	$out="OJ/out{$ques}.txt";
	$arr;

	$process=proc_open("timeout 2s python $source < $in > output.txt", 
	array(
        	1 => array("pipe", "w"),  //stdout
        	2 => array("pipe", "w")   // stderr
    	), $pipes);
	$error = stream_get_contents($pipes[2]);
	sleep(4);
	$return_value = proc_get_status($process);
	proc_close($process);

	if($return_value["exitcode"] == 124)
		$arr[0] = "TLE";
	else {
		if ( 0 == filesize( "output.txt" ) ) {
			$arr[0]="CE";
			$arr[1] = $error;
		}
		else {

			$process=proc_open("diff $out output.txt -qb", 
			array(
		        	1 => array("pipe", "w"),  //stdout
		        	2 => array("pipe", "w")   // stderr
		    	), $pipes);

			if(stream_get_contents($pipes[1])=="") 
				$arr[0] = "CA";
			else 
				$arr[0] = "WA";
			proc_close($process);	
		}
	}
	unlink('output.txt');
	return $arr;
}	
?>
