///CHANGE STATUS
 $('body').on("change",".status",function(){

 	var id=$(this).attr('id');
 	id=id.replace("st", "");
 	$.ajax(
 	{	
 		url:"php/user/update_status.php",
 		type:"POST",
 		data:{id:id},
 		success:function(data){}
 	});


 })

///////update title table

$('body').on("click",".update_table",function(){
	var text=$(this).parent().children().find('p').html();
	$(this).parent().children().find('p').css('display','none');
	$(this).parent().children().find("input[type='text']").removeClass('hide');
	$(this).parent().children().find("input[type='text']").focus();
});


$('body').on("keyup",".up_t",function(){
	var text=$(this).val();
	var also=$(this).next('p').next("input[type='hidden']").val();
	var reg_exp = /^[a-zA-Zа-яА-ЯюЮШшщЩЁёЦцґєії0-9_]{1,30}$/iu;
	if(reg_exp.test(text)){$(this).css('color','#99ffcc');$(this).removeClass('pulse');}else{$(this).css('color','red');$(this).addClass('pulse');}
});


$('body').on("focusout",".up_t",function(){
	var text=$(this).val();
	var also=$(this).next('p').next("input[type='hidden']").val();
	var this_selector=$(this);
	var reg_exp = /^[a-zA-Zа-яА-ЯюЮШшщЩЁёЦцґєії0-9_]{1,30}$/iu;
	$(this).addClass('hide');
	if(reg_exp.test(text)){
		$.ajax(
		{	
			url:"php/user/update_title.php",
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
	else{
		$(this).parent().find('p').css('display','block');}
////////
});
	