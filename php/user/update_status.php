<?php
require_once "../connect.php";

$task=(int)$_POST["id"];
$id=(int)$_POST["id"];
$user=R::load('task',$task);
if($user->status==0){$r=1;}else{$r=0;}
$user->status=$r;
R::store($user);
?>