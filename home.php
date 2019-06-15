<?php include('valida_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DoCert - Gerador de certificado</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link rel="stylesheet" href="jqueryconfirm/jquery-confirm.min.css">
	<link rel="stylesheet" href="js/jquery-loading/loading.css">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
					<a class="navbar-brand" href="#"><span>Do</span>Cert</a>

				</div>
			</div><!-- /.container-fluid -->
		</nav>

		<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
			<div class="profile-sidebar">
				<div class="profile-userpic">
					<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpdX6tPX96Zk00S47LcCYAdoFK8INeCElPeJrVDrh8phAGqUZP_g" class="img-responsive" alt="">
				</div>
				<div class="profile-usertitle">
					<div class="profile-usertitle-name"><?php echo $_SESSION['nome']; ?></div>
					<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="divider"></div>
		<!--<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>-->
		<ul class="nav menu">
			<li id="menu-dashboard" class="active"><a href="#"><em class="fa fa-dashboard">&nbsp;</em> Gerar Certificados</a></li>
			<li id="menu-certificados"><a href="#"><em class="fa fa-certificate">&nbsp;</em>Certficados</a></li>
			<li id="menu-users"><a href="#"><em class="fa fa-users">&nbsp;</em>Usuários</a></li>
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em>Sair</a></li>
			<!-- <li id="menu-validacao"><a href="#"><em class="fa fa-"></em>Verificação</a></li> -->
		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Início</h1>
			</div>
		</div><!--/.row-->

		<span id="content-data">

		</span>

	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js?1"></script>
	<script src="js/jquery.form.js"></script>
	<script src="js/app.js?1"></script>
	<script src="js/tinymce/jquery.tinymce.min.js"></script>
	<script src="js/tinymce/tinymce.min.js"></script>
	<script src="js/jquery-loading/loading.js"></script>
	<script src="jqueryconfirm/jquery-confirm.min.js"></script>

	<script>
		// window.onload = function () {
		// 	var chart1 = document.getElementById("line-chart").getContext("2d");
		// 	window.myLine = new Chart(chart1).Line(lineChartData, {
		// 		responsive: true,
		// 		scaleLineColor: "rgba(0,0,0,.2)",
		// 		scaleGridLineColor: "rgba(0,0,0,.05)",
		// 		scaleFontColor: "#c5c7cc"
		// 	});
		// };
		// loadDash();
	</script>

</body>
</html>