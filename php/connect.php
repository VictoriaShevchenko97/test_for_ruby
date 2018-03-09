<?php 
require_once "session.php";
require_once "lib/rb.php";
$host = 'localhost'; // адрес сервера 
$user = 'root'; // имя пользователя
$password = ''; // пароль
$salt='pineapple_for_ruby';



////CONNECTION///////////////
R::setup('mysql:host=localhost;dbname=TestForRuby','root', '');
if(!R::testConnection())
	{
		exit("<div class='err container' style='color: white;
			opacity: .9;
			text-shadow: 0 0 1px #ccff99;
			background-color: rgba(255,91,34,.7);
			transition:opacity 2s;'>NO CONNECTION WITH DB</div>");
	}
//////////////////////////////////////require_once failed to open stream. no such
	?>