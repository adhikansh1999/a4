<?php
session_start();

$book_name = $_GET['book_name'];
$author = $_GET['author'];
$book_id = $_GET['book_id'];

echo $book_name."\t".$author."\t".$book_id;

$servername = "localhost";
$username = "id6411290_adhikansh";
$password = "adhikansh";
$dbname = "id6411290_mydbpdo";


if(empty($book_name) && empty($author)){

	try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to delete a record
    $sql = "DELETE FROM books WHERE id = '$book_id'";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Record deleted successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;


}
else{


	try {
	    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	    $sql = "INSERT INTO `books` (`id`, `book_name`, `author`, `availability`, `issued_by_id`) VALUES (NULL, '$book_name', '$author', '1', '0')";
	    // use exec() because no results are returned
	    $conn->exec($sql);
	    $last_id = $conn->lastInsertId();
	    echo "New record created successfully. Last inserted ID is: " . $last_id;
	    }
	catch(PDOException $e)
	    {
	    echo $sql . "<br>" . $e->getMessage();
	    }

	$conn = null;
}


?>