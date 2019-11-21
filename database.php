<?php 
session_start();
include_once('class.php');
$conn = new Sing();


$name = $_SESSION['name'] ;
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];
$pas = $_SESSION['pas'];

$servername = "localhost";
$username = "root";
$password = "safarmal4ik";
$dbname = "test";

$conn = mysqli_connect($servername,$username, $password,$dbname  );
$pas1 = password_hash($pas, PASSWORD_DEFAULT);
$insert = "INSERT INTO registor (name, lname, email, pas) VALUES ('$name', '$lname','$email', '$pas1' )";
if (mysqli_query($conn, $insert)) {

    echo "New record created successfully";
} 

else {
    echo "Error: " . $insert . "<br>" . mysqli_error($conn);

}

?>