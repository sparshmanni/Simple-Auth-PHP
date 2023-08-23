<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$s = "CREATE DATABASE IF NOT EXISTS loginproject";
if ($conn->query($s) === TRUE);
else {
  echo "Error creating database: " . $conn->error;
}

// Create connection
$connn = mysqli_connect("localhost","root","", "loginproject");

$sqll ="create table auth(name varchar(80),email varchar(100),pass varchar(90))";
mysqli_query($connn, $sqll);

?>