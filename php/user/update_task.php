<?
require_once "../connect.php";
$title=$_POST["text"];
$also=(int)$_POST["also"];
$id=(int)$_SESSION['id'];
if(!preg_match('/^\s$/iu', $text)){
$t=R::dispense('task');

$table=R::load('task',$also);
$table->text=$title;
R::store($table);
echo "1";}
else{echo "0";}



?>