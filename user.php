<? include_once "php/connect.php";
if(empty($_SESSION['log_user'])){header('Location:index.php');$_SESSION['add_task']=$_POST['add_task'];$_SESSION['trash_hash'] = $_POST['trash_hash'];}
	?><!DOCTYPE html>
	<html lang="en">
	<head>
		
		<title>Тестовое задание</title>
		<link rel="shortcut icon" href="img/viko_logo.png" type="image/png">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="robots" content="noindex, nofollow">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/user.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/general.js"></script>
		<script type="text/javascript" src="js/CRUD.js"></script>
		<script type="text/javascript" src="js/EditTable.js"></script>
		<script type="text/javascript" src="https://johnny.github.io/jquery-sortable/js/jquery-sortable.js"></script><!--dragAndDrop-->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.12.4.js"></script>
		<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<!--TABLESORT-->
		<noscript><?php require_once "php/n_script_user.php";?></noscript>
	</head>
	<body>

		<div class="container-fluid">

			<div class="row">

				<h3 class="col-md logo text-center">
					ImPLAN <small class="text-muted">- your personal assistant</small>
				</h3><form action="php/logout.php">
					<input type='submit' class='btn btn-success logout' value="LOGOUT">
				</form>
				<div class="container table_count">
					
					<?php include_once 'php/index.php' ?>
					<div class="text-c"></div>
				</div>
				
			</div>

			<div class="container">
				<div style="position: relative;">		

				</div>
				<div class='text-center'>

					<div class="btn-group  jump active" role="group">
						<label class="btn btn-warning center-block already">
							<a class="btn btn-link btn-xs"><i class="glyphicon glyphicon-plus" style="color: #acfb46; font-size: 18px;"></i>
							</a>ADD TODO LIST
						</label>
					</div>
				</div>
				<div class="space"></div>
			</div>

			
		</div>

		<div class="navbar navbar-fixed-bottom">
			<div class="container">
				<p class="navbar-text" id="copyright" style="font-size: 3vmin; margin-bottom: 5px;">© When we going to work, we work
				</p>

				
			</div>

		</div><div class="box-hide"></div>
	</body>
	</html>