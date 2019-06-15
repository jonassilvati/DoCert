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
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em>Sair</a></li>
			<!-- <li id="menu-validacao"><a href="#"><em class="fa fa-"></em>Verificação</a></li> -->
		</ul>
	</div><!--/.sidebar-->