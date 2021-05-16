<?php
//SESSION_start();

$servername = "192.168.55.107";
$username = "rohith";
$password = "8538";
$DBname="student";

// Create connection
$conn = new mysqli($servername, $username, $password,$DBname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

?>