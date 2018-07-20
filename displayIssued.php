<?php

session_start();

$user_id =  $_SESSION['user_id'];
$acc_type = $_SESSION['acc_type'];


$servername = "localhost";
$username = "id6411290_adhikansh";
$password = "adhikansh";
$dbname = "id6411290_mydbpdo";


try 
	    {
		    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $sql = "SELECT id, book_name, author FROM books WHERE issued_by_id = '$user_id'";

			echo '<div class="divTable">';
				echo '<div class="headRow">
                		<div class="divCell">ID</div>
                		<div  class="divCell">BOOK NAME</div>
                		<div  class="divCell">AUTHOR</div>
                		<div  class="divCell">RETURN</div>
             		  </div>';

			    foreach ($conn->query($sql) as $row)
			    {
			    	echo '<div class="divRow">';
			    		$id = $row['id'];
			    		echo "<div class='divCell'>".$row['id']."</div>";
			        	echo "<div class='divCell'>".$row['book_name']."</div>";
			       		echo "<div class='divCell'>".$row['author']."</div>";
			       		//add a function to return books right about here
			       		echo "<div class='divCell' onclick ='returnBook($id)'>Click to Return</div>";
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