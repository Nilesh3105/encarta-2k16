<?php include'connect.php' ;
	  	$sel="select * from userx where teamx_id='".$_SESSION['session_id']."' ";
            		$exe=mysql_query($sel);
					$fetch=mysql_fetch_array($exe);
                if($fetch['challenge_no']==6)
                {
				//nothing;	
				}
				else
				{
					
					$x="challenge".$fetch['challenge_no'].".php";
					echo "<script>window.location='logout.php'</script>" ;
				}
?>
<html>
	<head>
    <meta charset="utf-8">
 	   	<title>Challenge6</title>
        <link rel="stylesheet" type="text/css" href="challenge.css">
    </head>
    <body>
    	  <div class="header">
          	  <div class="headertop">
                <div class="bitcoin">
                  <div class="toph1">
                  		 <?php include 'user.php' ?> 
                  </div>
                  <div class="toph2">Bitcoins left in your account.<br />
				   				 <?php 
				  				$sel_bc="select bitcoin from userx where teamx_id='".$_SESSION['session_id']."' ";
            					$exe_bc=mysql_query($sel_bc);
								$fetch_bc=mysql_fetch_array($exe_bc);
								echo $fetch_bc['bitcoin'];
								?>฿</div>
                  <div class="toph3">
                  		 <?php 
						 		
				  				$sel_u="select * from userx where teamx_id='".$_SESSION['session_id']."' ";
            					$exe_u=mysql_query($sel_u);
								$fetch_u=mysql_fetch_array($exe_u);
								echo "Challenge ".$fetch_u['challenge_no'];
						 ?>  
                  </div>
                  <div class="toph4"><a href="logout.php">logout</a></div>
                </div>
                </div>
            <div class="leftheader"><img src="BANDIT.jpg" style="height: 100px;width: 160px;position: absolute;"/></div>
            <div class="midheader">
            	<p >Find the correct details and proceed to the next level.</p>
                <p>If you get stuck, check out the hint.</p>    
            </div>
            <div class="rightheader">
              <div>To Unlocked Hint<br />Cost  <?php
              					$sel_h="select * from hint where hint_id='".$fetch_u['challenge_no']."' ";
            					$exe_h=mysql_query($sel_h);
								$fetch_h=mysql_fetch_array($exe_h);
								echo $fetch_h['cost'];
						 ?> ฿</div>
                      <div style="color:Red;"><form action="" method="post"><input type="submit" name="uhint" value="click here" id="uhint"></form></div> 
            </div>
            <div class="rightheader" style="width: 6%;">
              <div>Reward<br /><?php
                        $sel_h="select * from hint where hint_id='".$fetch_u['challenge_no']."' ";
                      $exe_h=mysql_query($sel_h);
                $fetch_h=mysql_fetch_array($exe_h);
                echo $fetch_h['reward'];
             ?> ฿</div>
            </div> 
           </div> 
           <div class="main" style="padding:70px; text-align:center; font-size:20px;" >
           		             
            
           <div class="hint" ><?php if($fetch_bc['bitcoin']>=$fetch_h['cost'] || $fetch_u['hint_status']==1)
									 {
		   							if(isset($_POST['uhint']) && $fetch_u['hint_status']==0)
									{
											$fetch_h['hint_description'];
											$a=$fetch_bc['bitcoin']-$fetch_h['cost'];
											$update1="update userx set hint_status=1,bitcoin='$a' where teamx_id='".$_SESSION['session_id']."' ";
											mysql_query($update1);		
									}
									if($fetch_u['hint_status']!=0)
									{
											echo $fetch_h['hint_description'];
									}}
		   ?></div>
           </div>
           <div class="footer"><form action="" method="post" style="text-align: center;">
        <input type="password" name="password" placeholder="Password for this level" style="background-color: black;text-align: center;color:lime;height:29px"><br><br>
        <input type="submit" name="submit" value="submit" style="background-color: black;color:lime;">
      </form>
      <?php if(isset($_POST['submit']))
				 {
					if($fetch_h['Password_description']==$_POST['password'])
					{
						    $temp1=$fetch_u['challenge_no']+1;
							$temp2=$fetch_u['bitcoin']+$fetch_h['reward'];
						 	$update1="update userx set challenge_no=$temp1,bitcoin=$temp2,hint_status=0 where teamx_id='".$_SESSION['session_id']."' ";
							mysql_query($update1);
							$x1=$fetch_u['challenge_no']+1;
							$x2="challenge".$x1.".php";
						    echo "<script>window.location='$x2'</script>" ;
					}
				 }
	 ?><div style="display:none;">
      <pre>  

Finally, I'm moving out. Can't
shake the feeling that I forgot to
do something important though...
               `OO
           _n_ .||.
     ____ |___| bb __________________


      Oh well. Taxi!
               `OO/
           _n_ .||
__________ |___| bb ____________________________________________



         I'm sure it'll                ____
        come back to me.           .--'.---\---.
                   `OO         ___/___/____|____\___
                 __,//       o'-o-' _ |    |    |_  |
   ___ *draaag* /__/ b _____ '::'--(o)'----'----(o)-' _______




    So.. Where           That's it, deciding a
     to, pal?    ____    ,  destination! Crap.
            `.--'.---\---.      _   _____
         ___/___/____|_OO_\___   - __ -
       o'-o-' _ |    |    |_  | - _- - _
jg________ '::'--(o)'----'----(o)-' ____________________
		  </pre>
     </div>
      <script style="">                                                                   
          function myFunction() {
              document.getElementById("hint").innerHTML = "";
          }
          function submitfunc(){
            var temp=document.getElementById('pass').value;
            if(temp=="hell"){return true;}                                                            
            else{alert("enter the correct password");return false;}
          } 
        </script>
      </div>

    </body>
</html>