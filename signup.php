<?php

include('connect.php');


// Create connection
$conn = mysqli_connect("localhost","root", "" ,"loginproject");

$txtName = $_POST['txtName'];
$txtEmail = $_POST['txtEmail'];
$txtpass = $_POST['txtpass'];


// to prevent from mysqli injection
$txtName = stripcslashes($txtName);
$txtEmail = stripcslashes($txtEmail);
$username = mysqli_real_escape_string($conn , $username);
$txtEmail = mysqli_real_escape_string($conn , $txtEmail);

$txtpass = stripcslashes($txtpass);
$txtpass = mysqli_real_escape_string($conn , $txtpass);

  
$query = "SELECT * FROM auth WHERE email = '$txtEmail'";
$findUser = mysqli_query($conn, $query);
$resultantUser = mysqli_fetch_assoc($findUser);
      
if($resultantUser){
    echo "<script>alert ('email already exist')</script>";
include('login.html');
}

else{

//hashing pass
$pwd = password_hash($txtpass, PASSWORD_DEFAULT);


// database insert SQL code
$sql = "insert into auth values('$txtName', '$txtEmail',' $pwd')";

// insert in database 
mysqli_query($conn, $sql);
include('home.html');
}


?>