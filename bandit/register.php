	<?php
	  error_reporting(0);
	  mysql_connect('localhost','root','');
	  mysql_select_db('bandit');
      if(isset($_POST['usave']))
      {
		    $sel_1="select * from registration where reg_encarta_id='".$_POST['user1']."' and reg_encarta_password='".$_POST['pass1']."' ";
		    
            $exe_1=mysql_query($sel_1);
			$fetch_1=mysql_fetch_array($exe_1);
            $total_1=mysql_num_rows($exe_1);
			if($total_1==1)
			  {
					if($fetch_1['status']==0)
					  {
					   $user1=1;		
					  }
					else
					  {
						echo "User 1 is already register<br>";
					  }
					
			  }
			else
			  {
				echo "Invalid User 1 credential<br>";
			  }
			    
				$sel_2="select * from registration where reg_encarta_id='".$_POST['user2']."' and reg_encarta_password='".$_POST['pass2']."' ";
            $exe_2=mysql_query($sel_2);
			$fetch_2=mysql_fetch_array($exe_2);
            $total_2=mysql_num_rows($exe_2);
			if($total_2==1)
			  {
					if($fetch_2['status']==0)
					  {
					   $user2=1;		
					  }
					else
					 {
						echo "User 2 is already register<br >";
				     }
					
			  }
			else
			  {
				echo "Invalid User 2 credential<br>";
			  }
			if($user1+$user2==2)
			{
				if($_POST['user1']==$_POST['user2'])
				{
					echo "Don't Repeat Your ID<br>";	
				}
                  else
				  {
					  $x=" insert into userx set userx1_id='".$_POST['user1']."', userx2_id='".$_POST['user2']."',passwordx='".$_POST['password']."' " ;
          mysql_query($x);
		  			 $update1="update registration set status=1 where reg_encarta_id='".$_POST['user1']."'";
			mysql_query($update1);
			         $update2="update registration set status=1 where reg_encarta_id='".$_POST['user2']."'";
			mysql_query($update2);
			
				 	echo "Registration Succesful. Redirecting...";
				 	echo '<meta http-equiv="refresh" content="0.0;login.php">';
				   }
				
			}
			else
			{
				echo "Registration failed!!";	
			}
      }
        
?>
<html>
	<head>
    <title>Registration</title>
		<style>
			.wrapper {    
				margin-top: 80px;
				margin-bottom: 20px;
			}

			.form-signin {
			  max-width: 420px;
			  padding: 30px 38px 66px;
			  margin: 0 auto;
			  background-color: #eee;
			  border: 3px dotted rgba(0,0,0,0.1);  
			  }

			.form-signin-heading {
			  text-align:center;
			}

			.form-signin-heading1 {
			  text-align:center;
			  margin-bottom: 30px;
			  margin-top:-20px;
			  font-family: Courier;
			}

			.form-control {
			  position: relative;
			  font-size: 16px;
			  height: auto;
			  padding: 10px;
			  margin:10px;
			}

			input[type="text"] {
			  margin-bottom: 0px;
			  border-bottom-left-radius: 0;
			  border-bottom-right-radius: 0;
			}

			input[type="password"] {
			  margin-bottom: 20px;
			  border-top-left-radius: 0;
			  border-top-right-radius: 0;
			}

			.colorgraph {
			  height: 7px;
			  border-top: 0;
			  background: #c4e17f;
			  border-radius: 5px;
			  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
			  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
			  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
			  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
			}

			.{
				
			}
		</style>
	</head>
	<body>
		<div class = "container">
			<div class="wrapper">
				<form action="" method="post" name="Login_Form" class="form-signin">       
				    <h3 class="form-signin-heading">Welcome to BANDIT<br></h3>
				    <h5 class="form-signin-heading1">Don't panic! Don't give up!</h5>	
					<hr class="colorgraph"><br>
			        <input type="text" class="form-control" name="user1" placeholder="Encarta ID 1" required autofocus />
                    <input type="password" class="form-control" name="pass1" placeholder="Password ID 1" required/>
					<input type="text" class="form-control" name="user2" placeholder="Encarta ID 2" required autofocus />
                    <input type="password" class="form-control" name="pass2" placeholder="Password ID 2" required/>
					<input type="password" class="form-control" name="password" placeholder="Your Team Password" required/><br>    	
					<button class="btn btn-lg btn-primary btn-block"  name="usave" value="Login" type="Submit" style=" margin-left: 10px">Register</button>  			
				</form>			
			</div>
		</div>
	</body>
</html>