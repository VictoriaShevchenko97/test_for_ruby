$(document).ready(function()
{
	$('.send_auto').attr('disabled',true);
	$('.send_reg').attr('disabled',true);

	$("input[type='submit']").parent().css('text-align','center');
	$(".btn-group").center();
	var count=0;

	$('input:radio[name="send"]').change(

		function(){
			if(count==0)
			{
				$(".gr").addClass('to-top');
				$(".gr").css('font-size','3vmax');
				count=1;
			}

			if ($(this).is(':checked')) {
				$(this).next('form').css('display','block');
				$(this).next('form').addClass('undef');
			}
		});

	///
	$('form').on('focusout focus keyup','#inputlogin',function(){
		
		var text=$(this).val();
		var reg_exp = /^[a-zA-Z0-9_]{6,30}$/i;

		if(reg_exp.test(text))
		{
			$(this).next().removeClass('glyphicon-font');
			$(this).parent().removeClass('has-error');
			$(this).next().addClass("glyphicon-ok");
			$(this).parent().addClass("has-required");
			if($(this).parent().parent().parent().find('#inputrPassword').parent().hasClass('has-error')|$(this).parent().parent().parent().find('#inputPassword').parent().hasClass('has-error')){}
				else{$(this).parent().parent().parent().find("input[type='submit']").attr("disabled", false);}
		}
		else
		{
			$(this).parent().addClass('has-error');
			$(this).next().removeClass("glyphicon-ok");
			$(this).next().addClass('glyphicon-font');
			$(this).parent().parent().parent().find('.send_reg').attr("disabled", true);
		}

	});

//
$('form').on('focusout focus keyup','input',function(){
	if($(this).val()===''||$(this).parent().hasClass('has-error')){

		$(this).parent().parent().parent().find("input[type='submit']").attr("disabled", true);
	}
});
$('form').on('focusout focus keyup','#inputrPassword',function()
{
	var password1=$(this).closest('form').find('#inputPassword').val();
	var password2=$(this).val();
	
	if(password2===password1 & password1!=='')
	{
		$(this).next().removeClass('glyphicon-remove');
		$(this).parent().removeClass('has-error');
		$(this).parent().addClass("has-required");
		$(this).next().addClass("glyphicon-ok");
		if($(this).closest('form').find('#inputlogin').parent().hasClass('has-error')|$(this).closest('form').find('#inputlogin').val()===''){
			$(this).closest('form').find('.send_reg').attr("disabled", true);
		}
		else
		{
			$(this).closest('form').find('.send_reg').removeAttr("disabled");
		}
	}
	else
	{
		$(this).parent().addClass('has-error');
		$(this).next().removeClass("glyphicon-ok");
		$(this).next().addClass('glyphicon-remove');
		$(this).closest('form').find('.send_reg').attr("disabled", true);

	}
});
////
$('form').on('focusout focus keyup','#inputPassword',function()
{
	var password1=$(this).closest('form').find('#inputrPassword').val();
	var password2=$(this).val();
	var repeat=$(this).closest('form').find('#inputrPassword');
	
	var reg_exp = /^[a-zA-Z0-9_]{6,30}$/i;

	if(reg_exp.test(password2))
	{
		$(this).next().removeClass('glyphicon-font');
		$(this).parent().removeClass('has-error');
		$(this).parent().addClass("has-required");
		$(this).next().addClass("glyphicon-ok");
		if($(this).closest('form').find('#inputlogin').parent().hasClass('has-error')|$(this).closest('form').find('#inputlogin').val()===''|password2!=password1 |password1===''|password2===''){
			$(this).closest('form').find('.send_reg').attr("disabled", true);
		}
		else
		{
			$(this).closest('form').find('.send_reg').removeAttr("disabled");
		}
	}
	else
	{
		$(this).parent().addClass('has-error');

		$(this).next().removeClass("glyphicon-ok");
		$(this).next().addClass('glyphicon-font');
		$(this).parent().parent().parent().find("input[type='submit']").attr("disabled", true);
	}
	if(password2===password1 & password1!=='')
	{
		repeat.next().removeClass('glyphicon-remove');
		repeat.parent().removeClass('has-error');
		repeat.parent().addClass("has-required");
		repeat.next().addClass("glyphicon-ok");
	}
	else
	{
		repeat.parent().addClass('has-error');
		repeat.next().removeClass("glyphicon-ok");
		repeat.next().addClass('glyphicon-remove');
		repeat.parent().parent().parent('form').find('.send_reg').attr("disabled", true);

	}
});

////password_in_autorization
$('#inputPassword1').keyup(function()
{
	var text=$(this).val();
	var reg_exp = /^[a-zA-Z0-9_]{6,30}$/i;

	if(reg_exp.test(text))
	{
		$(this).next().removeClass('glyphicon-font');
		$(this).parent().removeClass('has-error');
		$(this).parent().addClass("has-required");
		$(this).next().addClass("glyphicon-ok");
		if($(this).closest('form').find('#inputlogin').parent().hasClass('has-error')|$(this).closest('form').find('#inputlogin').val()===''){
			$(this).closest('form').find('.send_auto').attr("disabled", true);
		}
		else
		{
			$(this).closest('form').find('.send_auto').removeAttr("disabled");
		}
	}
	else
	{
		$(this).parent().addClass('has-error');

		$(this).next().removeClass("glyphicon-ok");
		$(this).next().addClass('glyphicon-font');
		$(this).closest('form').find("input[type='submit']").attr("disabled", true);
	}
});
////
$('#inputloginauto').keyup(function(){
	var text=$(this).val();
	var reg_exp = /^[a-zA-Z0-9_]{6,30}$/i;

	if(reg_exp.test(text)){
		$(this).next().removeClass('glyphicon-font');
		var this_element=$(this);	
		$(this).parent().removeClass('has-error');
		$(this).next().addClass("glyphicon-ok");$(this).parent().addClass("has-required");
	}
	else
	{
		$(this).parent().addClass('has-error');
		$(this).next().removeClass("glyphicon-ok");
		$(this).next().addClass('glyphicon-font');					
		$(this).closest('form').find('.send_auto').attr("disabled", true);
	}

});

///SEND_AUTO
$('.send_auto').click(function(){
	var login=$(this).closest('form').find("#inputlogin").val();
	var password=$(this).closest('form').find("#inputPassword1").val();
	$.ajax({

		url:"php/autorization.php",
		type:"POST",
		data:{login:login,password:password},

		success:function(data)
		{
			if(data==null){alert('User isn`t exist');}
			return false;
		}
	});
});
//SEND_REG

$('.send_reg').click(function(){
	var login=$(this).closest('form').find("#inputlogin").val();
	var password=$(this).closest('form').find("#inputPassword").val();

	$.ajax({

		url:"php/registration.php",
		type:"POST",
		data:{login:login,password:password},

		success:function(data)
		{
			if(data==1){alert('User already exists');}
			return false;
		}
	});

});
//
});
$(window).resize(function(){$(".gr").center();});
jQuery.fn.center = function () {
	this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) + 
		$(window).scrollTop()) + "px");
	return this;
}
