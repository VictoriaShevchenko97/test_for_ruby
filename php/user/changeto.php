<?
require_once '../connect.php';
$day=$_POST["day"];
$task=(int)$_POST["task"];
if((date('Y-m-d', strtotime($day)) == $day)|$day=='') {
	if($day==''){$day=NULL;}
	$new_task=R::load('task',$task);
	$new_task->to=$day;
	R::store($new_task);
}
else{}
?>