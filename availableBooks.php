<?php
		session_start();

$servername = "localhost";
$username = "id6411290_adhikansh";
$password = "adhikansh";
$dbname = "id6411290_mydbpdo";

		$acc_type = $_SESSION['acc_type'];

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