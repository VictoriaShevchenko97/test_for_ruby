<?php 
require_once "connect.php";
$user = R::dispense( 'users' );
if($_POST){
	$arr = array();
	$arr=$_POST;
	$errors[]=array();
	unset($errors[0]);

	$password=$arr['password'];
	$login=$arr['login'];
	if(!preg_match("/^[a-zA-Z0-9_]{0,30}$/i", $login)) { $errors[]="Login is incorrect. It must be from 1-20 characters long";}
	if(!preg_match("/^[a-zA-Z0-9_]{6,30}$/i", $password)){ $errors[]="Password is incorrect. It must be from 6-30 characters long";}
	if(!empty($arr))
	{
		foreach ($arr as $key => $value) 
		{
			if($value=='')
			{
				$errors[]=$key." - field is empty!";
			}
		}
	}


/////////////REGISTRATION//////////////////////////
	if(isset($_POST['type'])&&$_POST['type']=='registration')
	{
		require_once('registration.php');

	}

/////////////AUTORIZATION//////////////////////////
	else if(isset($_POST['type'])&&$_POST['type']=='autorization')
	{
		require_once('autorization.php');

	}
	
	if(!empty($errors))
	{
		echo "<div class='err container' style='position:absolute;z-index:1;bottom:0;width:100%;color: white;
		opacity: .9;animation:error 5s ease-in-out;
		text-shadow: 0 0 1px #ccff99;
		background-color: rgba(155,91,34,.7);
		'>";
		for($i=0;$i<count($errors)+1;$i++) 
		{
			if(!empty($errors[$i]))
			{
				echo $errors[$i]."<br>";
			}

		}
		echo "</div>";
	}

	for($i=0;$i<count($errors);$i++) 
	{

		unset($errors[$i]);
	}
	
	R::close();}
	echo "<div class='container btn-success'> WE ARE ALREADY ".R::count('users')."</div>";
	?>