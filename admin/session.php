<?php
session_start();
include '../database.php';
$user = null;
if ( !empty($_GET['user'])) {
	$user = $_REQUEST['id'];
}

if ( null==$id ) {
	header("Location: login.php");
}

// Create connection
$conn = Database::connect();
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql="SELECT user.id, user.username, user.fullName, user.password, role.name, role.key FROM user INNER JOIN role ON user.role=role.id WHERE user.username='$user'";
$results = $conn->query($sql);

if ($results->num_rows > 0) {
    // output data of each row
    $data = $results->fetch_assoc();
    $_SESSION['login']=$data;
    header('Location: index.php');

} else {
    echo "0 results";
}
Database::disconnet();
?>