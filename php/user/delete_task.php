<?
require_once "../connect.php";

$task=(int)$_POST["task"];
$id=(int)$_POST["id"];
R::trash(R::findOne('task','id=?',array($task)));
echo "string";

?>