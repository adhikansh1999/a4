<!doctype html>
<html>
<head>
	<title>
		Sign Up
	</title>
	<!--
	<style type="text/css">
		#blur {
			background :white;
			background-size: 100%;
			border-radius: 70px;
			height: 850px;
			width: 30%;
			position: absolute;
			top:190px;
			left:25%;
			filter: blur(5px);
			-webkit-filter:blur;
			border:3px solid white;
			z-index: -1;
		}
		#text {
			z-index: 2;
			height:850px;
			width: 40%;
			position: absolute;
			top:190px;
			left:30%;
		}
		p {
			color : black;
			font-family: verdana;
			font-size: 20px;
			text-indent: 20px;
		}
		p:first-letter{
			font-weight: bold;
			font-size: 60px;
			color:black;
			font-family:'Courgette';
		}
		h1 {
			font-family: 'Courgette';
			text-shadow: 4px 4px 4px #aaa;
			font-size: 45px;
			color : white; 
			text-align: center;
			font-weight:bold;
			width: 100%;
			padding-top: 0px;
			padding-bottom: 0px;
			border-bottom: 3px solid white ;
		}
		body {
			/*padding:0px;*/
			color : color;
			font-family: verdana;
			font-size: 20px;
			text-indent: 25px;
			background: url('scenery.png');
			background-size: cover;

		}

		div {
			position: absolute;
			left: 75px;
		}
		a:link{
			color:blue;
			text-decoration: none;
		}
		a:visited{
			color: red;
		}
		a:active{
			color: green;
		}
		a:hover{
			color:white;
			background-color: orange;
			text-decoration: underline;
			font-weight: bold;		}
		
		.error {color: #FF0000;}
	</style>-->
	



	<style type="text/css">
	p{
		color: white;
	}
	body {
			color : black;
			font-family: verdana;
			font-size: 20px;
			text-indent: 25px;
			background: url('scenery.jpg');
			background-size: cover;

		}

	h1 {
			font-family: 'Courgette';
			text-shadow: 4px 4px 4px #aaa;
			font-size: 45px;
			color : white; 
			text-align: center;
			font-weight:bold;
			width: 100%;
			padding-top: 0px;
			padding-bottom: 0px;
			border-bottom: 3px solid white ;
		}

span {
	font-weight: bold;
			color:brown;
}

.error {color: #FF0000;}
.form2{
    font: 95% Arial, Helvetica, sans-serif;
    max-width: 400px;
    margin: 10px auto;
    padding: 16px;
    background: #F7F7F7;
}
.form2 h1{
    background: #43D1AF;
    padding: 20px 0;
    font-size: 140%;
    font-weight: 300;
    text-align: center;
    color: #fff;
    margin: -16px -16px 16px -16px;
}
.form2 input[type="text"],
.form2 input[type="date"],
.form2 input[type="datetime"],
.form2 input[type="email"],
.form2 input[type="number"],
.form2 input[type="search"],
.form2 input[type="time"],
.form2 input[type="password"],
.form2 textarea,
.form2 select 
{
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
    outline: none;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    background: #fff;
    margin-bottom: 4%;
    border: 1px solid #ccc;
    padding: 3%;
    color: #555;
    font: 95% Arial, Helvetica, sans-serif;
}
.form2 input[type="text"]:focus,
.form2 input[type="date"]:focus,
.form2 input[type="datetime"]:focus,
.form2 input[type="email"]:focus,
.form2 input[type="number"]:focus,
.form2 input[type="search"]:focus,
.form2 input[type="time"]:focus,
.form2 input[type="password"]:focus,
.form2 textarea:focus,
.form2 select:focus
{
    box-shadow: 0 0 5px #43D1AF;
    padding: 3%;
    border: 1px solid #43D1AF;
}

.form2 input[type="submit"],
.form2 input[type="button"]{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    padding: 3%;
    background: #43D1AF;
    border-bottom: 2px solid #30C29E;
    border-top-style: none;
    border-right-style: none;
    border-left-style: none;    
    color: #fff;
}
.form2 input[type="submit"]:hover,
.form2 input[type="button"]:hover{
    background: #2EBC99;
}
</style>






</head>

<body>

	<?php
	// define variables and set to empty values
	$nameErr = $emailErr = $genderErr = $passErr = $usernameErr = "";
	$name = $email = $gender = $accType = $pword = $username = "";


	if(!empty($_POST['accType'])){
		$accType = $_POST['accType'];
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		//for the username
	  if (empty($_POST["username"])) {
	    $usernameErr = "Username is required";
	  } else {
	    $username = test_input($_POST["username"]);
	  }



		//for the name
	  if (empty($_POST["name"])) {
	    $nameErr = "Name is required";
	  } else {
	    $name = test_input($_POST["name"]);
	    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
	      $nameErr = "Only letters and white space allowed"; 
	    }
	  }

	  	//for the password
	  if (empty($_POST["pword"])) {
	    $passErr = "Please choose a password";
	  } else {
	    $pword = test_input($_POST["pword"]);
	    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
	      $passErr = "Only letters and white space allowed"; 
	    }
	  }



	  	//email
	  if (empty($_POST["email"])) {
	    $emailErr = "Email is required";
	  } else {
	    $email = test_input($_POST["email"]);
	    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	      $emailErr = "Invalid email format"; 
	    }
	  }
	  	//gender
	  if (empty($_POST["gender"])) {
	    $genderErr = "Gender is required";
	  } else {
	    $gender = test_input($_POST["gender"]);
	  }
	}

	//checking the database for username

$servername = "localhost";
$usernameServer = "id6411290_adhikansh";
$password = "adhikansh";
$dbname = "id6411290_mydbpdo";


	try 
	    {
		    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $usernameServer, $password);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $sql = "SELECT username FROM users WHERE username = '$username'";
		    $flag = false;

			    foreach ($conn->query($sql) as $row)
			    {
			    	$flag = true;
			    	$usernameErr = 'Username '.$username.' already exists';
		    	}
		}
		catch(PDOException $e) 
		{
		    echo "Error: ".$e->getMessage();
		}
		$conn = null;





	//adding to the database
	if(empty($nameErr) && empty($emailErr) && empty($genderErr) && empty($passErr) && empty($usernameErr) )
	{	
		if(!empty($name) && !empty($email) && !empty($gender) && !empty($accType) && !empty($pword) && !empty($username))
		{
			//add this to the
			if(!empty($_POST['accType'])){
				$accType = $_POST['accType'];
			}



$servername = "localhost";
$usernameServer = "id6411290_adhikansh";
$password = "adhikansh";
$dbname = "id6411290_mydbpdo";


			try {
			    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $usernameServer, $password);
			    // set the PDO error mode to exception
			    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    $sql = "INSERT INTO users (username, password, name,acc_type)
			    VALUES ('$username', '$pword', '$name', '$accType')";
			    $conn->exec($sql);
			    echo "New record created successfully";
			    }
			catch(PDOException $e)
			    {
			    echo $sql . "<br>" . $e->getMessage();
			    }

			$conn = null;
		}
	}
	else{
		//echo 'cannot add rn.';
		//echo $nameErr.$emailErr.$genderErr.$passErr.$usernameErr;
	}


	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	  return $data;
	}
	?>

	<h1>Sign Up</h1>
	<p>Please fill up the form below to sucessfully register. <span>Categories marked star are important.</p>
	<!--
	<div id= "blur"></div>
	<div id="text">-->
	<div class="form2">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		Username: <input type="text" name="username" value="<?php echo $username;?>" placeholder ="Pick a Username">
		<span class="error">* <?php echo $usernameErr;?></span>
		<br>

		Name: <input type="text" name="name" value="<?php echo $name;?>" placeholder ="Your Name">
		<span class="error">* <?php echo $nameErr;?></span>
		<br>

		Password: <input type="password" name="pword" value="<?php echo $pword;?>" placeholder ="Password">
		<span class="error">* <?php echo $passErr;?></span>
		<br>

		E-mail: <input type="text" name="email" value="<?php echo $email;?>" placeholder ="E-mail Address">
		<span class="error">* <?php echo $emailErr;?></span>
		<br><br>


		Gender:
		<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
		<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
		<input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
		<span class="error">* <?php echo $genderErr;?></span>
		<br><br>

		<br><br>Select the type of account<br>
		<select name="accType">
			<option value="u">User</option>
			<option value="a">Admin</option>
		</select>
		<input type="Submit" name="Submit" >
		<br><br>
		<input type="button" name="Cancel" value="Cancel" onclick="location.href = 'index.php'">
	</form>
	
	</center>
	</div>

</body>
<html>




































































































































































































































































