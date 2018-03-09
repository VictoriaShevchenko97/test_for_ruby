<?
require_once "../connect.php";
$id=(int)$_SESSION['id'];
$title=$_POST["new_title"];
$table_list = R::findOne('usertable','users_id=? AND title=?',array($id,$title));
$c=1;  
if (count($table_list)==0) {
 
    $c=0;
    break;
}
echo $c;
?>