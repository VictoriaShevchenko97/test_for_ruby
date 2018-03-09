<?
require_once "../connect.php";
$id=$_SESSION['id'];
$title=$_POST["new_title"];
if(preg_match('/^[a-zA-Zа-яА-ЯюЮШшЩщЁёЦцґєії0-9_]{1,}$/iu', $title)){
  $new=R::dispense('usertable');
  $new->title=$title;
  $new->users_id=$id;
  R::store($new);

    echo "<table class='table table-hover sorted_table tablesorter' >
    <thead class='thead-dark'>
    <tr  style='background:linear-gradient(#95BF00, #516800);'>
    <th class='col-xs-1'><i class='glyphicon glyphicon-list-alt' style='color:black;'><i/></th>
    <th class='col-md-9 value' colspan='4' style='color:white;'><input type='text' class='hide up_t' /><p style='margin:0;'> ".$new->title."</p><input type='hidden' class='tbl' name='table_id' value='".$new->id."'/></th>
    <th class='btn btn-link col-xs-1 update_table' style='border-radius:0 !important'><i class='glyphicon glyphicon-pencil  hide' ><i/></th>
    <th class='btn btn-link col-xs-1 delete'  id='show' style='border-radius:0 !important;'><i class='glyphicon glyphicon-trash  hide'></i></th>
    </tr>
    <tr >
    <td class='col-xs-1'><i class='glyphicon glyphicon-plus' style='color:#95BF00;vertical-align:middle;'></i></td>
    
    <td class='col-xs-11' colspan='6'><form class='add_task' method='post'><div class='input-group container-fluid'>
    <input type='hidden' name='title' class='title' value='".$new->title."' />
    <input type='hidden' name='table_id' value='".$new->id."'/>
    <input type='text' class='form-control task' autocomplete='off' name='task'  placeholder='Add your new task in this table'/>
    <div class='input-group-btn'><input type='button' class='btn btn-outline-secondary btn-success ' value='Add Task'/>
    </div> </form>
    </td>

    </tr>
    </thead>
    <tbody > </tbody><tfoot><tr><th><i class='btn btn-link glyphicon glyphicon-trash'></i><input type='hidden' value='".$new->id."'/></th><th data-sortBy='text'>Task</th><th>Date</th><th data-sortBy='numeric'>Status</th><th></th><th></th><th></th></tr>
</tfoot>
  </table>"; 
}
else{   
   
     echo 0;
       
}  
?>