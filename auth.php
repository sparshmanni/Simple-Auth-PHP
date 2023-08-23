<?php

include('connect.php');


// Create connection
$conn = mysqli_connect("localhost","root", "" ,"loginproject");

$txtEmail = $_POST['txtEmail'];
$txtpass = $_POST['txtpass'];


// to prevent from mysqli injection

$txtEmail = stripcslashes($txtEmail);
$txtEmail = mysqli_real_escape_string($conn , $txtEmail);

$txtpass = stripcslashes($txtpass);
$txtpass = mysqli_real_escape_string($conn , $txtpass);

$query = "SELECT * FROM auth WHERE email = '$txtEmail'";
$findUser = mysqli_query($conn, $query);
$resultantUser = mysqli_fetch_assoc($findUser);
      
if($resultantUser){

$pas = "SELECT name, email, pass FROM auth where email ='$txtEmail'";
$result = $conn->query($pas);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $existingHashFromDb=$row["pass"];
  }
} 

$isPasswordCorrect = password_verify($txtpass, $existingHashFromDb);
if($isPasswordCorrect=true){
    include('home.html');
}

}
else{
    include('signup.html');
}

?>