$(document).ready(function()
{

//add task
$("body").on("click", ".add_task input[type='button']", function(){
	var title=$(this).parent().parent().children("input[name='title']").val();
	var task=$(this).parent().parent().children("input[name='task']").val();
	var table_id=$(this).parent().parent().children("input[name='table_id']").val();
	var table_selector=$(this).closest('thead').next('tbody');
	
	$(this).parent().parent().children("input[name='task']").val('');
	if(task!==''){
		$.ajax(
		{
			url:"php/user/add_task.php",
			type:"POST",
			data:{title:title,task:task,table_id:table_id},

			success:function(data){

				if(data!==null){
					table_selector.append(data);

				}
				else{alert('error');}
			}
		});}

	});


//delete task
$("body").on("click", ".delete_task", function(){
	var task=$(this).parent().find('.id').val();
	var id=$(this).parent().find('.table_id').val();	
	var this_selector=$(this);
	$.ajax(
	{
		url:"php/user/delete_task.php",
		type:"POST",
		data:{task:task,id:id},

		success:function(data){

			if(data!==null){
				this_selector.parent('tr').animate({ 'fontSize': '1px' }, 70)
				.slideUp(1)
				.animate({ 'fontSize': '12px'}, 10);
				return false;
			}
			else{alert('error');}
		}
	});
});

//////////UPDATE TASK
$('body').on('click','.pen-task',function(){
	var task=$(this).parent().children('.task').find('p').text();
	$(this).parent().children('.task').find('p').css('display','none');
	$(this).parent().children('.task').find("input[type='text']").css('display','block');
	$(this).parent().children('.task').find("input[type='text']").removeClass('hided');
	$(this).parent().children('.task').find("input[type='text']").focus();
	
});
$('body').on("keyup",".up_task",function(){
	var text=$(this).val();
	var also=$(this).next('p').next("input[type='hidden']").val();
	var t=$(this);
	var reg_exp = /^\s$/iu;

	if(!reg_exp.test(text)){$(this).css('color','#368a5f');$(this).removeClass('pulse');}else{$(this).css('color','red');$(this).addClass('pulse');}
});


$('body').on("focusout",".up_task",function(){

	var text=$(this).val();
	var also=$(this).next('p').next("input[type='hidden']").val();
	var this_selector=$(this);
	var reg_exp = /^\s$/iu;
	this_selector.addClass('hided');
	if(!reg_exp.test(text)){
		$.ajax(
		{	
			url:"php/user/update_task.php",
			type:"POST",
			data:{text:text,also:also},
			success:function(data){
				if(data!=0){
					this_selector.parent().find('p').text(text);
					this_selector.parent().find('p').css('display','block');
				}
			}
		});
	}
	else{this_selector.parent().find('p').css('display','block');
}
});
//////delete rows
$('body').on("click","tfoot th i.glyphicon-trash",function(){
	var table=$(this).next("input[type='hidden']").val();
	
	$(this).closest('tbody').find(".select:checked").each(function(){
		var task=$(this).attr('id');
		var this_selector=$(this);
		$.ajax(
		{	
			url:"php/user/delete_task.php",
			type:"POST",
			data:{task:task},
			success:function(data){
				if(data!=0){
					this_selector.closest('tr').slideUp();
					this_selector.closest('tr').remove();
					return false;
				}
			}
		});
	});

});


});