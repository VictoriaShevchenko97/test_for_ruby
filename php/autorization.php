<?php
include_once "connect.php";
include_once'noscript.php';

$user = R::dispense( 'users' );
$password=$_POST['password'];
$login=$_POST['login'];
$needles = R::findOne('users',"`login`=?",[$login]);

if($needles===null){$errors[]='This user isn`t exist';}
else {
	$hash=$needles->password;
	echo $hash;
	if(!password_verify($password, $hash)){
		$errors[]='This user isn`t exist';
	}
	else{echo '1';}
}
if(empty($errors))
{		
	$_SESSION['log_user']=$user;	

	$_SESSION['id']=$needles['id'];	

}


?>