<?php
	if(isset($_POST['login'])){
	
		if(!isset($_POST['password']) || !isset($_POST['username']) || trim($_POST['username'])=='' || trim($_POST['password'])==''){
		
			echo"Both Fields Are Required<br/>";
		
		}else{
			
			$username = trim($_POST['username']);
			$password = trim($_POST['password']);
			$connection = mysql_connect('localhost','root','');
			$db = mysql_select_db('id_cards',$connection);
			
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$result = mysql_query($query,$connection);
			if($result){
				//echo "Result Exists";
				$num = mysql_num_rows($result);
				if($num>0){
				
					session_start();
					
					while($row = mysql_fetch_array($result)){
					
						$user_id = $row['user_id'];
					}
					$_SESSION['user_id'] = $user_id;
					
					header('location:index.php');
 				
				}else{
					echo"INVALID USERNAME OR PASSWORD";
				}
			
			}else echo"INVALID USERNAME OR PASSWORD<br/>";
			
			
		}
	
	}

?>

<form action='login.php' method='post'>
<label for='username'>Username</label>
<input type='text' name='username'/><br/>
<label for='password'>Password</label>
<input type='password' name='password'/><br/>
<input type='submit' value='SUBMIT' name='login'/>
</form>