<?php
//tis working you swine.
//echo $_GET['book_id'];

$book_id = $_GET['book_id']; 


$servername = "localhost";
$username = "id6411290_adhikansh";
$password = "adhikansh";
$dbname = "id6411290_mydbpdo";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE books SET availability = '1', issued_by_id ='' WHERE id = '$book_id'";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo "1";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;


?>

?>