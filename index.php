<?php 
include_once "php/session.php";?>
<noscript><?php include_once "php/noscript.php";unset($_POST);?></noscript>
<?php if(isset($_SESSION['log_user'])):?>
	<noscript>
		<div class='container ' style='position: fixed;z-index:999;height: 100%;width: 100%;background-color: rgba(20,160,100,.5);'>
			<a class="btn btn-info" href="../log-in/user.php" style='margin-top:40%;'>
				You are authorized.Please, click this button!
			</a>
		</div>
	</noscript>
	<script type="text/javascript">
		window.location.href = "user.php";
	</script>
<?php endif;?>
<!DOCTYPE html>
<html>
<head>
	<title>j</title>
	<link rel="shortcut icon" href="img/viko_logo.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="css/index.css">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/form.js"></script>
</head>
<body >
	<div class="container " >
		<input type="radio" name="send" class='send_class' id='send' />

		<!--AUTORIZ-->
		<form class='autorization'  autocomplete="off" method='POST'>
			<input type="hidden" name="type" value='autorization'/>
			<div class="form-group">
				<label for="inputlogin">Login</label>
				<div id='lvalid_div' class='form-group has-feedback'>
					<input type="text" class="form-control" id="inputlogin" name="login" autocomplete="off"  placeholder="login">
					<span class='glyphicon xsa form-control-feedback' ></span></div>
				</div>
				<div class="form-group" id='pvalid_div'>
					<label  for="inputPassword1">Password</label>
					
					<div id='lvalid_div' class='form-group has-feedback'>
						<input type="password" name='password' autocomplete="off" class="form-control" id="inputPassword1" placeholder="Password">
						<span class='glyphicon xsa form-control-feedback' ></span>
					</div>

				</div> <div class="form-group">

					<input type="submit" class="btn-success form-control btn send_auto" value='Send'/>
				</div>
			</form>

			<input type="radio" name="send" class='send_class' id='reg'/>

			<!--REGISTR-->
			<form class='registration' method='POST' >
				<input type="hidden" name="type" value='registration'/>
				<div class="form-group">
					<label for="inputlogin">Login</label> <div id='valid_div' class='form-group has-feedback'>
						<input type="text" class="form-control" autocomplete="off"  id="inputlogin" name='login' placeholder="Login"> 
						<span class='glyphicon xsa form-control-feedback' ></span></div>
					</div>
					<div class="form-group">
						<label for="inputPassword">Password</label>
						<div id='valid_div' class='form-group has-feedback'>
							<input type="password" autocomplete="off" class="form-control" name='password' id="inputPassword" placeholder="Password" ><span class='glyphicon xsa form-control-feedback' ></span>
						</div>
					</div> <div class="form-group">
						<label for="inputrPassword">Repeat Password</label> <div id='valid_div' class='form-group has-feedback'>
							<input type="password" autocomplete="off" name='repeating_password' class="form-control" id="inputrPassword" placeholder="Password" >
							<span class='glyphicon xsa form-control-feedback' ></span>
						</div>
					</div> 
					<div class="form-group">

						<input type="submit" class="btn-success form-control btn send_reg" value='Send'  />
					</div>     
				</form>

				<div class='btn-group gr'>

					<label for='send' id='s' style="font-size: inherit;" class="btn  ">Login</label>
					<label for='reg' id='r' style="font-size: inherit;" class="btn ">Registration</label>
				</div>
				
			</div>
		</body>
		</html>