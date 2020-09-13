<?php

$servername = 'localhost:3308';
$username='root';
$password='s@mrAt123';
$database= 'chatroom';

//Connectiong to database
$conn = mysqli_connect($servername, $username, $password, $database);

// Checking connection

if(!$conn)
{
	die("Failed to connect". mysqli_connect_error());
}


?>