<?php

	function diferenca_horas_stamp($diferenca){

		if($diferenca > 59){
			$horas      = floor($diferenca / 60);

			$diferenca  = ($diferenca - ($horas * 60));
		} else {
			$horas      = 0;
		}

		if($horas == 0){
			$strHoras = '00';
		} else if($horas < 10){
			$strHoras = '0' . $horas;
		} else {
			$strHoras = $horas;
		}

		if($diferenca < 10){
			$r = $strHoras . ':0' . $diferenca;
		}

		if($diferenca > 9 && $diferenca < 60){
			$r = $strHoras . ':' . $diferenca;
		}

		if(!isset($r)){$r = 'n/a';}

		return $r;
	}

	function diferenca_horas($inicial,$final){
		$stamp_inicial = strtotime($inicial);
		$stamp_final   = strtotime($final);

		$diferenca     = floor(($stamp_final - $stamp_inicial) / 60);

		if($diferenca > 59){
			$horas      = floor($diferenca / 60);

			$diferenca  = ($diferenca - ($horas * 60));
		} else {
			$horas      = 0;
		}

		if($horas == 0){
			$strHoras = '00';
		} else if($horas < 10){
			$strHoras = '0' . $horas;
		} else {
			$strHoras = $horas;
		}

		if($diferenca < 10){
			$r = $strHoras . ':0' . $diferenca;
		}

		if($diferenca > 9 && $diferenca < 60){
			$r = $strHoras . ':' . $diferenca;
		}

		if(!isset($r)){$r = 'n/a';}

		return $r;
	}

	function pegaDiferenca($inicial,$final){
		$stamp_inicial = strtotime($inicial);
		$stamp_final   = strtotime($final);

		$diferenca     = floor(($stamp_final - $stamp_inicial) / 60);

		return $diferenca;
	}

    date_default_timezone_set('America/Sao_Paulo');

    $con = mysqli_connect("localhost","root","","cronometro");

    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $where = 0;

    $sql = "SELECT * FROM `tarefas`";

    if(array_key_exists('palavra-chave', $_GET)){

	    $palavrachave = $_GET['palavra-chave'];
	    $mes = $_GET['mes'];
	    $ano = $_GET['ano'];

	    if($where == 0){
    		$clausula = 'WHERE';
    	}else {
    		$clausula = 'AND';
    	}

	    if(strlen($palavrachave) > 3){
	    	$where = 1;
	    	$sql .= " $clausula nome LIKE '%$palavrachave%'";
	    }

	    if($where == 0){
    		$clausula = 'WHERE';
    	}else {
    		$clausula = 'AND';
    	}

	    if($mes > 0 && $ano > 0){
	    	$ultimodia = date('t',mktime(0,0,0,$mes,1,date('Y')));
	    	$where = 1;
	    	$sql .= " $clausula inicial >= '01-".$mes."-".$ano."' $clausula inicial <= '".$ultimodia."-".$mes."-".$ano."' ";
	    }

	}

	$sql .= " ORDER BY id DESC";

    $consulta = mysqli_query($con, $sql);
?>

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
						<li role="presentation"><a href="index.php">Cronometro</a></li>
						<li role="presentation" class="active"><a href="relatorio.php">Relatório</a></li>
					</ul>
				</nav>
				<h3 class="text-muted">Chronometer</h3>
			</div>

			<div class="jumbotron">
				<h1>Relatório</h1>
				<p class="lead">Selecione o mês que deseja ver o relatório</p>

				<form class="form-horizontal" action="" method="get">
					<fieldset>

						<input class="form-control" type="text" name="palavra-chave" placeholder="Nome do Job">

						<select id="selectbasic" name="mes" class="form-control">
						    <option value="0">Selecione o Mês</option>
						    <option value="01">Janeiro</option>
						    <option value="02">Fevereiro</option>
						    <option value="03">Março</option>
						    <option value="04">Abril</option>
						    <option value="05">Maio</option>
						    <option value="06">Junho</option>
						    <option value="07">Julho</option>
						    <option value="08">Agosto</option>
						    <option value="09">Setembro</option>
						    <option value="10">Outubro</option>
						    <option value="11">Novembro</option>
						    <option value="12">Dezembro</option>
						</select>

						<select id="selectbasic" name="ano" class="form-control">
						    <option value="0">Selecione o Ano</option>
						    <option>2014</option>
						    <option>2015</option>
						</select>

						<button type="submit" class="btn btn-labeled btn-primary"><span class="btn-label"><i class="glyphicon glyphicon-calendar"></i></span>Ver relatório</button>

					</fieldset>
				</form>


			</div>

			<table class="table">
				<thead>
					<tr>
						<th>TRABALHO</th>
						<th class="text-center">INÍCIO</th>
						<th class="text-center">FIM</th>
						<th class="text-right">HORAS</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$diferenca = 0;
					while ($linha=mysqli_fetch_row($consulta)){
						?>
						<tr>
							<td><?= $linha[1]; ?></td>
							<td class="text-center"><?= date('d/m/Y - H:i',(strtotime($linha[2]))); ?></td>
							<td class="text-center"><?= date('d/m/Y - H:i',(strtotime($linha[3]))); ?></td>
							<td class="text-right"><?= diferenca_horas($linha[2],$linha[3]); ?></td>
						</tr>
						<?php
						$diferenca += pegaDiferenca($linha[2],$linha[3]);
					}
					?>
				</tbody>
				<tbody>
					<tr>
						<td colspan="3"><strong>TOTAL DE HORAS</strong></td>
						<td class="text-right"><strong><?= diferenca_horas_stamp($diferenca); ?></strong></td>
					</tr>
				</tbody>
			</table>

			<!-- <div class="row marketing">
				<div class="col-lg-6">
					<h4>Subheading</h4>
					<p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

					<h4>Subheading</h4>
					<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

					<h4>Subheading</h4>
					<p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
				</div>

				<div class="col-lg-6">
					<h4>Subheading</h4>
					<p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

					<h4>Subheading</h4>
					<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

					<h4>Subheading</h4>
					<p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
				</div>
			</div> -->

			<footer class="footer">
				<p class="text-center">Desenvolvido por <a href="mailto:gabriel_chagas@live.com" target="_blank">Gabriel Chagas</a> e <a href="mailto:falecom@kakastefane.com.br">Kaká Stefane</a></p>
			</footer>

		</div> <!-- /container -->

	</body>
</html>
