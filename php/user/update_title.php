<?
require_once "../connect.php";
$title=$_POST["text"];
$also=(int)$_POST["also"];
$id=(int)$_SESSION['id'];
if(!preg_match('/^[a-zA-Zа-яА-ЯюЮШшщЩЁёЦцґєії0-9_]{1,30}$/iu', $text)){
$t=R::dispense('usertable');

$table=R::load('usertable',$also);
$table->title=$title;
R::store($table);
echo "1";}
else{echo "0";}



?>