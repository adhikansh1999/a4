<?php
require 'connectToDb.php';
require 'core.php';


echo'	<h3>The Library Portal</h3>';
echo "<br><div class = 'form2' style = 'border-radius: 7px;border: solid 1px #43D1AF;' >Welcome ".$_SESSION['name']."!.<br><br>";  

	$acc_type = $_SESSION['acc_type'];
if($acc_type == 'a')
{
	echo "As an admin, you can add and delete books to this portal.";
}
else{
	echo "Click to issue/return the book of your choice";
}

echo "</div>";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>
		Logged in
	</title>
	<script type="text/javascript">
	function issueBook(currentID,isAvailable)
	{
		
		if(isAvailable == 0){
			alert('Book cannot be issued');
			return;
		}
		else if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}
		else{
			xmlhttp = new ActiveXObject('Microsoft.XMLHttp');
		}
		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById(String(currentID)).innerHTML = xmlhttp.responseText;
				
			}
		}
		var link_string = 'issueBook.php?book_id=' + currentID;

		xmlhttp.open('GET',link_string,false);
		xmlhttp.send();
		displayIssued();
		availableBooks();

	}

	function displayIssued(){

		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}
		else{
			xmlhttp = new ActiveXObject('Microsoft.XMLHttp');
		}
		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById('issued_books').innerHTML = xmlhttp.responseText;
				
			}
		}
		var link_string = 'displayIssued.php';
		//alert(link_string);
		xmlhttp.open('GET',link_string,false);
		xmlhttp.send();
		return;

	}

	function availableBooks(){
		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}
		else{
			xmlhttp = new ActiveXObject('Microsoft.XMLHttp');
		}
		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById('available_books').innerHTML = xmlhttp.responseText;
				
			}
		}
		var link_string = 'availableBooks.php';
		xmlhttp.open('GET',link_string,false);
		xmlhttp.send();
		return;

	}
	function returnBook(currentID){
		//remove the book from the displayIssued wala table and also
		
		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}
		else{
			xmlhttp = new ActiveXObject('Microsoft.XMLHttp');
		}
		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById(String(currentID)).innerHTML = xmlhttp.responseText;
			}
		}
		var link_string = 'returnBook.php?book_id=' + currentID;

		xmlhttp.open('GET',link_string,false);
		xmlhttp.send();

		displayIssued();
		availableBooks();
	}

	function removeBook(currentID){
		
		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}
		else{
			xmlhttp = new ActiveXObject('Microsoft.XMLHttp');
		}
		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById('demo').innerHTML = xmlhttp.responseText;
			}
		}
		var link_string = 'addOrRemoveBook.php?book_name=&author=&book_id=' + currentID;
		xmlhttp.open('GET',link_string,false);
		xmlhttp.send();

		availableBooks();
	}

	function addBook(){
		
		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}
		else{
			xmlhttp = new ActiveXObject('Microsoft.XMLHttp');
		}
		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById('demo').innerHTML = xmlhttp.responseText;
			}
		}

		
		var link_string = 'addOrRemoveBook.php?book_name=' + document.getElementById('book_name').value + '&author=' + 
		document.getElementById('author').value + '&book_id=' ;
		xmlhttp.open('GET',link_string,false);
		xmlhttp.send();

		availableBooks();

	}


</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideToggle("slow");
    });
});
</script>

<style type="text/css">
body{
	color : black;
	/*font-size: 20px;*/

			font-family: verdana;
			
			background: url('images/library.jpg');
			background-size: cover;


}
    .divTable
    {
    	margin: 0px auto;
        display:  table;
        width:auto;
        background-color: white;
        border:1px solid  #43D1AF;
        border-spacing:5px;
        border-radius: 15px;
    }

    .divRow
    {
       display:table-row;
       width:auto;
       height:30px; 
       border-bottom:1px solid #E3F1D5;
    }

    .divCell
    {
        float:left;
        display:table-column;
        width:250px;
        border-bottom:1px solid #E3F1D5;
        text-align: center;
        line-height: 30px;
    }
    .headRow{
		height:40px;
    	background:#43D1AF;
    	font: 95% Arial, Helvetica, sans-serif;
    	border-radius: 7px;

	}

	 
	#panel, #flip {
		width: 53%;
		margin: 0px auto;
	    padding: 5px;
	    text-align: center;
	    border-radius: 7px;
	    /*background-color: #e5eecc;*/
	    border: solid 1px #43D1AF;
	}
	#flip{
		background-color: #43D1AF;
	}

	#panel {
	    padding: 50px;
	    display: none;
	}




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
.form2 input[type="button"],button{
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
.form2 input[type="button"]:hover,button:hover,#flip:hover
{
    background: #2EBC99;
}


#logout{
	width: 200px;
	height: 50px;
	position: relative;
	left: 61.6%;

}
h3 
		{
			font-family: 'Bebas','Open Sans', sans-serif;
			letter-spacing: 5px;
			color: #111;
			font-size: 4.5em;
			text-align: center;
		  	margin-bottom: 40px;
		}
	
</style>


</head>
<body>
	<div id = 'logout'>
		<div id = "logout">
		<button onclick="location.href = 'index.php'">Log Out</button><br><br></div>
	</div>
	<div id = 'demo'></div>

<div id = 'available_books'>
<?php


		try 
	    {
		    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $sql = "SELECT id, book_name, author, availability FROM books";

			echo '<div class="divTable">';
				echo '<div class="headRow">
                		<div class="divCell">BOOK NAME</div>
                		<div  class="divCell">AUTHOR</div>
                		<div  class="divCell">AVAILABILITY</div>
                		<div  class="divCell">ISSUE</div>
             		  </div>';

			    foreach ($conn->query($sql) as $row)
			    {
			    	echo '<div class="divRow">';
			    		echo "<div class='divCell'>".$row['book_name']."</div>";
			        	echo "<div class='divCell'>".$row['author']."</div>";
			       		$currentID = $row['id'];
			       		$isAvailable = $row['availability'];
			       		echo "<div class='divCell' id = '$currentID'>".$row['availability']."</div>";
			       		if($acc_type == 'u')
			       		{
				       		if ($row['availability'] == 0) {
				       			echo "<div class='divCell'>Already Issued</div>";
				       		}
				       		else if ($row['availability'] == 1) {
				       			//add the function to issue the book here giving the id as parameter
				       			echo "<div class='divCell' onclick ='issueBook($currentID,$isAvailable)'><img src = 'images/add.png'></div>";	
				       		}
			       		}
			       		else if($acc_type == 'a'){
			       			echo "<div class='divCell' onclick ='removeBook($currentID)'><img src = 'images/delete.png'></div>";	
			       		} 
			       	echo '</div>';
		    	}
		    echo '</div>';
		}
		catch(PDOException $e) 
		{
		    echo "Error: ".$e->getMessage();
		}
		$conn = null;
?>
</div>
<br><br><br>
<?php
if ($acc_type == 'u') {
	echo '<div id = "issued_books"></div>';
	echo '<script type="text/javascript">displayIssued();</script>';
		 
}

?>
<?php
if($acc_type == 'a'){
	echo '<div id="flip">Click to Add New Books</div>
		<div id="panel" class = "form2">
			Name:<br><input type="text" id ="book_name"><br>
			Author:<br><input type="text" id = "author"><br><br>
			<button name="Submit" id = "submit" onclick="addBook()" value = "Submit">Submit</button>
		</div>';
}
?>
</body>
</html>