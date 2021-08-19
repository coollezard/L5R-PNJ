
<?php 

//pour la prod
$host="db747915768.db.1and1.com"; 
$user="dbo747915768"; 
$dbname="db747915768"; 
$pass="pnjs-L5R";
//$mainURL="ltaconcept.com";


// Create connection
$mysqli = new mysqli($host, $user, $pass, $dbname);
$mysqli->set_charset("utf8");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/*session_start();
if(!isset($_SESSION['user'])){
     header('Location: http://'.$mainURL.'/login.php');
}*/
?>