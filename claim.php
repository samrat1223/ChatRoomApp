<?php

// getting the value of post parameters into room variable
$room = $_POST['room'];

//Checking for valid database name
if(strlen($room)>20 or strlen($room)<2)
{
	$message = "Please choose a name between 2 to 20 characters" ;
	echo '<script language = "javascript">';
	echo 'alert("'.$message.'");';
	echo 'window.location="http://localhost/chatroom";';
	echo  '</script>';
}

// Checking if the room name is alphanumeric or not
else if(!ctype_alnum($room))
{
	$message = "Please choose a alphanumeric room name" ;
	echo '<script language = "javascript">';
	echo 'alert("'.$message.'");';
	echo 'window.location="http://localhost/chatroom";';
	echo  '</script>';
}

else
{
	// Connect to the database
	include 'db_connect.php' ;
}

// Checking if room exists

$sql = "SELECT * FROM `rooms` WHERE roomname = '$room'";
$result = mysqli_query($conn,$sql);
if($result)
{
	if(mysqli_num_rows($result) > 0)
	{
		$message = "OOPS: Roomname exists already . Please choose another room name" ;
		echo '<script language = "javascript">';
		echo 'alert("'.$message.'");';
		echo 'window.location="http://localhost/chatroom";';
		echo  '</script>';
	}

	else
	{
		$sql = "INSERT INTO `rooms` ( `roomname`, `stime`) VALUES ('$room', CURRENT_TIMESTAMP);";
		if(mysqli_query($conn,$sql))
		{
			$message = "HURRAY : Your room is ready . Go and chat now " ;
			echo '<script language = "javascript">';
			echo 'alert("'.$message.'");';
			echo 'window.location="http://localhost/chatroom/rooms.php?roomname=' .$room. '";';
			echo  '</script>';
		}

	}
} 

else
{
	echo "Error: ". mysqli_error($conn);
}


?>