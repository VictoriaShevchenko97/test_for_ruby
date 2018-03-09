<?php
include_once "connect.php";
$user = R::dispense( 'users' );

$password=$_POST['password'];
$login=$_POST['login'];

$needles = R::exec("SELECT * FROM `users` WHERE `login`=?",[$login)]);
if($arr['password']!=$arr['repeating_password'])
{
	$errors[]='Your repeated password is incorrect';
}
if($needles==1){
	$errors[]='This login is taken';}
	else if(empty($errors))
	{
		$user->login=$login;
		$user->password=password_hash($password,PASSWORD_DEFAULT);

		R::store($user);
		
		
		$_SESSION['log_user']=$user;
		$_SESSION['id']=$user->id;
		echo "<div class='err container' style='position:absolute;z-index:1;width:100%;bottom:0;color: white;
		opacity: .9;animation:error 5s ease-in-out;
		text-shadow: 0 0 1px #ccff99;
		background-color: rgba(15,191,34,.7);
		transition:opacity 2s;'>You registered</div>";				
	}



	?>