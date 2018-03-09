<?php
include_once "connect.php";
$link = mysqli_connect( 
	$host,
	$user,
	$password,
	'TestForRuby');

if (!$link) { 
	printf("Could not connect: %s\n", mysqli_connect_error()); 
	exit; 
} 
$login=$_POST["text"];
$result= mysqli_query($link,"SELECT * FROM users WHERE login='".$login."'");

while($row=mysqli_fetch_array($result)){
	if($row[1]==$login){
		echo 1;exit();
	}
}
echo 0;

?>