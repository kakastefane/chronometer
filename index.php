<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">

		<title>Chronometer | Kaká Stefane</title>

		<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,300' rel='stylesheet' type='text/css'>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/jquery.countdown.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">

		<script src="js/jquery-2.1.4.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.plugin.min.js"></script>
		<script src="js/jquery.countdown.min.js"></script>
		<script src="js/funcoes.js"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>

		<div class="container">
			<div class="header clearfix">
				<nav>
					<ul class="nav nav-pills pull-right">
						<li role="presentation" class="active"><a href="index.php">Cronometro</a></li>
						<li role="presentation"><a href="relatorio.php">Relatório</a></li>
					</ul>
				</nav>
				<h3 class="text-muted">Chronometer</h3>
			</div>

			<div class="jumbotron">
				<h1>Cronômetro</h1>
				<p class="lead">Ao iniciar ou parar um job lembre-se de iniciar ou parar o cronômetro!</p>

				<div id="cronometro"></div>

				<input class="form-control" type="text" name="jobName" placeholder="Nome do Job">
				<button id="play" type="button" class="btn btn-labeled btn-success"><span class="btn-label"><i class="glyphicon glyphicon-play"></i></span>Iniciar</button>
		        <button id="stop" type="button" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="glyphicon glyphicon-stop"></i></span>Parar</button>


			</div>

			<footer class="footer">
				<p class="text-center">Desenvolvido por <a href="mailto:gabriel_chagas@live.com" target="_blank">Gabriel Chagas</a> e <a href="mailto:falecom@kakastefane.com.br">Kaká Stefane</a></p>
			</footer>

		</div> <!-- /container -->

	</body>
</html>
