<?
require_once "../connect.php";

$title=$_POST["title"];
$task=$_POST["task"];
$table=$_POST["table_id"];
if ($task!='') {
	$new_task=R::dispense('task');
	$new_task->text=$task;
	$new_task->usertable_id=$table;
	R::store($new_task);
	$done="<input type='checkbox' class='status' id=".$new_task->id." value='".$new_task->id."' style='display:none' /><label for='".$new_task->id."'>";
	echo "<tr class='move thead-dark '>
<td class='col-xs-1'><input class='styled select' id='".$new_task->id."' style='margin:0' type='checkbox' /><input type='hidden' class='id' value='".$new_task->id."'/></td>
      <td class='col-xs-6 task'><input type='text' class='hided up_task' /><p style='margin:0;'>".htmlentities($task)."</p><input type='hidden' value='".$new_task->id."'/></td>
      <td class='col-xs-1 '><input type='date' data-date-format='DD MM YYYY' class='from' name='from' value='".$new_task->from."'/><input type='date' class='to' data-date-format='DD MM YYYY' name='to' value='".$new_task->to."'/></td><td class='col-xs-1'>$done</td>
      <td class='btn btn-link col-xs-1 '><i class='glyphicon glyphicon-collapse-up hide'></i><i class='glyphicon glyphicon-collapse-down hide'></i></td><td class='btn btn-link col-xs-1 pen-task'><i class='glyphicon glyphicon-pencil hide '></td><td class='btn btn-link col-xs-1 delete_task'><i class='glyphicon glyphicon-trash  hide'></td></tr>";
}
else{echo 0;}


?>