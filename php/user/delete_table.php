<?php
require_once "../connect.php";
$id= $_SESSION["id"];
$id_table=(int)$_POST['title'];
$task=R::dispense('task');
//$delete=R::findAll('task',' `usertable_id`=?',array([$id_table]));
R::exec('DELETE FROM task WHERE `usertable_id`=?',array($id_table));
R::exec('DELETE FROM usertable WHERE `id`=?',array($id_table));

$user=R::findOne('usertable','users_id=?',array($id));

if (count($user)==0){
  echo 0;
}

?>