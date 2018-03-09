$(document).ready(function()
{
	$(window).load(function() {
		setTimeout(function() {
			$('.loader').fadeOut('slow', function() {});
		}, 2000);

	});
	var cache = $('.jump').html();
	$("body").on("keyup change focus", "#valid", function(){

		var text_on_focus=$(this).val();
		var reg_exp = /^[a-zA-Zа-яА-ЯюЮШшщЩЁёЦцґєії0-9_]{1,30}$/iu;
		if(!reg_exp.test(text_on_focus)){

			$("#valid_div").addClass("has-error");
			$(".send").attr('disabled','disabled');
			$(".xsa").addClass("glyphicon-font");
			$(".xsa").removeClass("glyphicon-list-alt");
			$(".xsa").removeClass("glyphicon-ok");
		}
		else
		{
			$(".send").removeAttr("disabled");
			$(".xsa").removeClass("glyphicon-font");
			$("#valid_div").removeClass('has-error');
			$("#valid_div").addClass("has-required");
			$(".xsa").addClass("glyphicon-ok");
		}
		
	});


	$(".jump").on("click", ".send", function(){

		$.ajax(
		{
			url:"php/user/create.php",
			type:"POST",
			data:{new_title:document.title.new_table.value},

			success:function(data){

				if(data===0){alert('Ooops!Technical problems');}
				else{


					Add_new_Table(data);$('.jump').html(cache);
					$ ( '.sorted_table tbody' ) .sortable ({
						containerSelector : 'table' ,
						itemPath : '>tbody ' ,
						itemSelector : 'tr' ,
						placeholder : ' <tr class = "placeholder" style="background-color:green"/> ',
						forceHelperSize: true,
						helper: fixWidthHelper
					}).disableSelection();
					$(".jump").css("animation","jumping 2s linear infinite");
				}
			}
		});


	});
	function Add_new_Table(before_data){
		$(".mark").css("display","none");
		$(".table_count").append(before_data);
	}
	$("body").on("click", ".already", function(){
		$(".jump").html("");
		$(".jump").css("animation","none");
		var s = "<form method='post' name='title' id='title'><div id='valid_div' class='form-group has-feedback'><input type='text' autocomplete='off' id='valid' class='form-control ' name='new_table' placeholder='name your new todo list'/><span class='glyphicon xsa form-control-feedback' ></span></div><input type='button' class='btn btn-success send' disabled value='SEND'/><i class=' btn gif glyphicon glyphicon-remove btn-danger ' style='position:inherit;'></i></form>";
		document.getElementsByClassName("jump")[0].insertAdjacentHTML('beforeend', s);

$(".jump").on("click", "i.gif", function()
{
	$('.jump').html(cache);
	$(".jump").css("animation","jumping 2s linear infinite");

});


});


	$("body").on("mouseenter", ".thead-dark", function(){
		$('.hide', $(this)).css("visibility","visible");	
	});
	$("body").on("mouseleave", ".thead-dark", function(){
		$('.hide', $(this)).css("visibility","hidden");
	});

//DELETE TABLE
$("body").on("click", ".delete", function(event){
	
	var name=$(this).closest('table').find(".value").text();
	var deleted=$(this).closest('thead');
	var id=$(this).parent().parent().find('.tbl').val();
	var thiss=this;
	$('.box-hide').html("<div id='box'><div id='box-inner'></div><table class='table modal-t'><tr><th colspan='2'>Do you really want to delete the '"+name+"' ?</th></tr><tr><td><button class='ok btn btn-md-6 btn-success' value='Delete'>Delete</button></td><td><button class='cancel btn btn-danger btn-md-6' style='width:80%;margin:auto' value='Cancel'>Cancel</button></td></tr></table></div>");
	$(".box-hide").on("click", ".cancel", function(){

		$('#box-inner').css('animation','modal-r 0.5s');
		$('.modal-t').css('animation','modal_t-r 0.5s');
		setTimeout(function() { $('.box-hide').html("") }, 500);
	});
//PRESS DELETE TABLE <OK>
$(".box-hide").on("click", ".ok", function(){
	$('#box-inner').css('animation','modal-r 0.5s');
	$('.modal-t').css('animation','modal_t-r 0.5s');
	setTimeout(function() { $('.box-hide').html(""); }, 500);

	$.ajax(
	{
		url:"php/user/delete_table.php",
		type:"POST",
		data:{title:id},

		success:function(data){

			$(deleted).parent().remove();
			if(data=="0"){
				$(".mark").css("display","block");} 
				return false;
			}
		});
});
});

	
///MOVE ROW
$('body').on('click','.glyphicon-collapse-up',function(){
	
	$(this).closest('tr').after($(this).closest('tr').prev());

});
$('body').on('click','.glyphicon-collapse-down',function(){
	$(this).closest('tr').before($(this).closest('tr').next());
});

///CHANGE DATE
$('body').on('change',"input[type='date']",function(){
	var day=$(this).val();
	var task=$(this).parent().parent().find('.id').val();
	var now = new Date();
	var other =new Date(day);
	y_other=other.getFullYear();y_now=now.getFullYear();
	m_other=other.getMonth()+1;m_now=now.getMonth()+1;
	d_other=other.getDate();d_now=now.getDate();
	if((y_other<y_now)||((y_other==y_now)&&(m_other<m_now))||((y_other==y_now)&&(m_other==m_now)&&(d_other<d_now)))
		{$(this).val(y_now+'-'+pad(m_now)+'-'+pad(d_now));day=$(this).val();}

	if (Date.parse(day)||day=='') {
		$.ajax({	
			url:"php/user/changeto.php",
			type:"POST",
			data:{day:day,task:task},
			success:function(data){}});
	} else {
  //Not a valid date
  $(this).val(now);
}
});
function pad(n) {
	return (n<10) ? '0'+n : n;
}


$ ( '.sorted_table tbody' ).sortable ({
	containerSelector : 'table' ,
	itemPath : '>tbody ' ,
	update: function(event, ui) {
		var changedList = this.id;
		var order = $(this).sortable('toArray');
		var positions = order.join(';');
	},
	itemSelector : 'tr' ,
	placeholder : 'ui-sortable-placeholder',
	forceHelperSize: true,
	helper: fixWidthHelper
}).disableSelection();

function fixWidthHelper(e, ui) {
	$('.ui-sortable-placeholder').css('height',$(this).height());
	ui.children().each(function() {
		$(this).width($(this).width());
		$(this).height($(this).height());
	});
	return ui;
}


////
$('body').on("change",".select",function(){

	if($(this).is( ":checked" )){
		$(this).parent().parent().addClass('sel_row');
	}
	else{$(this).parent().parent().removeClass('sel_row');}
});


});
