<?php
require 'connectToDb.php';
require 'core.php'; 
?>



<?php
if(isset($_POST['username']) && isset($_POST['password'])  ){
	$username_entered = $_POST['username'];
	$password_entered= $_POST['password'];

	if (!empty($username_entered) && !empty($password_entered) )
	{
	    try 
	    {
		    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $sql = "SELECT * FROM users WHERE username = '$username_entered' AND password = '$password_entered'";
		    $flag = false;
		    foreach ($conn->query($sql) as $row)
		    {
		    	$flag = true;
		        $_SESSION['user_id'] =  $row['id']."\t";
		        $_SESSION['user'] = $row['username']."\t";
		        $_SESSION['name'] = $row['name']."\t";
		        $_SESSION['books'] = $row['books_issued'];
		        $_SESSION['acc_type'] = $row['acc_type'];
		        //$_SESSION[''] = $row['password']."\t\n";
	    	}
	    	if ($flag == false) {
	    		echo "\nusername and password combination do not match.";
	    	}
		}
		catch(PDOException $e) 
		{
		    echo "Error: " . $e->getMessage();
		}
		$conn = null;
	}
	else{
		echo 'enter username and password';
	}
	if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) ) 
	{
		echo "ok";
		header('Location:loggedin.php');
	}
}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
	<title>
		Welcome & Login
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body>
	<br><br><br><br><br><br>
	<div id ="navigation bar" top = "170px" ></div>
	<div id="contact">
		<ul>
			<li><a href="registration.php">Sign Up</a></li>
		</ul>



		<h3>Login Page</h3>
		<center>

		<form action="<?php echo  $current_file?>" method = "post" class = "form2">
			<div class="login">
				<span>Username :</span><br><input type="text" name="username" maxlength="30"  autocomplete="on" autofocus><br>
			</div>
			<br>
			<div class="login">
				<span>Enter Password:</span><br><input type="password" name="password" maxlength="30">
			</div><br><br>
			<div class="login">
				<input type="submit" value="Login">
			</div><br><br>
		</form>

		</center>
		
	</div>	
</body>

</html>
