<? session_start();
require_once 'connect.php';

$id= $_SESSION["id"];
$user=R::findAll('usertable','`users_id`=? ',[$id]);
if (count($user)==0){
  echo ("<span class='lead text-center vertical_al mark'>YOU HAVEN`T TODO LISTS!</span><br/>");
}
else
{
  foreach ($user as $users) {

    echo "<table class='table table-hover sorted_table tablesorter' >
    <thead class='thead-dark'>
    
    <tr  style='background:linear-gradient(#95BF00, #516800);'>
    <th class='col-xs-1'><i class='glyphicon glyphicon-list-alt' style='color:black;'><i/></th>
    <th class='col-md-9 value' colspan='4' style='color:white;'><input type='text' class='hide up_t' /><p style='margin:0;'> ".$users->title."</p><input type='hidden' class='tbl' name='table_id' value='".$users->id."'/></th>
    <th class='btn btn-link col-xs-1 update_table' style='border-radius:0 !important'><i class='glyphicon glyphicon-pencil  hide' ><i/></th>
    <th class='btn btn-link col-xs-1 delete'  id='show' style='border-radius:0 !important;'><i class='glyphicon glyphicon-trash  hide'></i></th>
    </tr>
    <tr >
    <td class='col-xs-1'><i class='glyphicon glyphicon-plus' style='color:#95BF00;vertical-align:middle;'></i></td>
    
    <td class='col-xs-11' colspan='6'><form class='add_task' method='post'><div class='input-group container-fluid'>
    <input type='hidden' name='title' class='title' value='".$user->title."' />
    <input type='hidden' name='table_id' value='".$users->id."'/>
    <input type='text' class='form-control task' autocomplete='off' name='task'  placeholder='Add your new task in this table'/>
    <div class='input-group-btn'><input type='button' class='btn btn-outline-secondary btn-success ' value='Add Task'/>
    </div> </form>
    </td>

    </tr>
    </thead>
    <tbody > ";
    
    echo("<tr class='move ui-state-default'>");$task=R::findAll('task','`usertable_id`=? ',[$users->id]);
    foreach ($task as $value) {
      if($value->status==1){$done="<input type='checkbox' class='status' id=".$value->id." value='".$value->id."' style='display:none' checked/><label for='".$value->id."'>";}
        else{$done="<input type='checkbox' class='status' id=".$value->id." value='".$value->id."' style='display:none' /><label for='".$value->id."'>";}
          echo "<tr class='thead-dark'>
          <td class='col-xs-1'><input class='styled select' id='".$value->id."' style='margin:0' type='checkbox' /><input type='hidden' class='id' value='".$value->id."'/></td>
          <td class='col-xs-6 task'><input type='text' class='hided up_task' /><p style='margin:0;'>".htmlentities($value->text)."</p><input type='hidden' value='".$value->id."'/></td>
          <td class='col-xs-1 '><input type='date' data-date-format='DD MM YYYY' class='from' name='from' value='".$value->from."'/><input type='date' class='to' data-date-format='DD MM YYYY' name='to' value='".$value->to."'/></td><td class='col-xs-1'>$done</td>
          <td class='btn btn-link col-xs-1 '><i class='glyphicon glyphicon-collapse-up hide'></i><i class='glyphicon glyphicon-collapse-down hide'></i></td><td class='btn btn-link col-xs-1 pen-task'><i class='glyphicon glyphicon-pencil  hide'></td><td class='btn btn-link col-xs-1 delete_task'><i class='glyphicon glyphicon-trash  hide'></td></tr>";
        }
        

        echo "</tbody><tfoot><tr><th><i class='btn btn-link glyphicon glyphicon-trash'></i><input type='hidden' value='".$users->id."'/></th><th data-sortBy='text'>Task</th><th>Date</th><th data-sortBy='numeric'>Status</th><th></th><th></th><th></th></tr>
        </tfoot></table>";




        

      }
    }
/*
$query ="SHOW TABLES FROM TestForRuby";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
$rows = mysqli_num_rows($result);//количество таблиц в базе

if($rows==0){

	echo ("<span class='lead text-center vertical_al mark'>YOU HAVEN`T TODO LISTS!</span><br/>");
 
}
else{
	$tablelist = array();

  
	 while($cRow = mysqli_fetch_array($result))
  {
   array_push($tablelist,$cRow[0]);
  }

 foreach($tablelist as $value) {
  $res=mysqli_query($link,"SELECT name,id FROM `".$value."`");
  echo "<table class='table table-hover' >
    <thead class='thead-dark'>
<tr  style='background:linear-gradient(#95BF00, #516800);'>
<th class='col-xs-1'><i class='glyphicon glyphicon-list-alt' style='color:black;'><i/></th>
<th class='col-md-9 value' colspan='2' style='color:white;'>$value</th>
<th class='btn col-xs-1' style='border-radius:0 !important'><i class='glyphicon glyphicon-pencil  hide' ><i/></th>
<th class='btn col-xs-1 delete'  id='show' style='border-radius:0 !important;'> <i class='glyphicon glyphicon-trash  hide ' ></i> </th>
</tr>
    </thead>
  <tbody> <tr >
     <td class='col-xs-1'><i class='glyphicon glyphicon-plus' style='color:#95BF00;vertical-align:middle;'></i></td>
    
      <td class='col-xs-11' colspan='4'><form class='add_task'><div class='input-group container-fluid'>
        <input type='hidden' name='title' class='title' value=$value />
        <input type='text' class='form-control task' autocomplete='off' name='task'  placeholder='Add your new task in this table'/>
        <div class='input-group-btn'><input type='submit' class='btn btn-outline-secondary btn-success 'value='Add Task'/>
    </div></div> </form>
      </td>
      
    </tr>";
  for ($row_no =0; $row_no <$res->num_rows; $row_no++) {$row = $res->fetch_row();
    echo "<tr class='thead-dark'><td class='col-xs-1'><label for='".$row[1]."'><span></span></label>
                        <input class='styled' id='".$row[1]."' style='margin:0' type='checkbox' /></td><td class='col-xs-8 task'>";
    
    echo htmlentities($row[0]);
    echo "<p class='id_t'>".$row[1]."</p></td><td class='btn col-xs-1 '><i class='glyphicon glyphicon-resize-vertical hide'></i></td><td class='btn col-xs-1 '><i class='glyphicon glyphicon-pencil hide'></td><td class='btn col-xs-1 delete_task'><i class='glyphicon glyphicon-trash  hide'></td></tr>";
}
echo "</tbody> </table>";
  //echo $res['name'];
}
	
}
mysqli_close($link); 
*/
?>