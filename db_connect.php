
<?php
$servername = "localhost";
$username = "h518528_SmileFactory";
$password = "BAP4QMpT";
$dbname = "h518528_SmileFactory";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn -> set_charset("utf8");

?>