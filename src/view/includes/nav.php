<!-- NAVBAR ----------------------------------------------- -->

<nav class="sb-topnav navbar navbar-expand-xl fixed-top navbar-dark nav-cima" id="nav-cima">
	<!-- BRAND -- LOGO-->
	<a class="navbar-brand ps-3" href="/index.php">
		<img id="logo" src="/assets/img/logo.png" alt="Logo Gadri Imóveis" class="navbar-brand ps-5 " />
	</a>

	<!-- Sidebar Toggle -- BOTÃO PARA COMPRIMIR MENU EM TELAS MENORES-->
	<button class="navbar-toggler btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" data-toggle="collapse" data-target="#navbarCollapse" href="#!">
		<i class="fa fa-bars" style="font-size:36px"></i>
	</button>
	<!-- ITENS/LINKS DO MENU -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-end">
		<div class="navbar-nav ml-auto">
			<a class="nav-item nav-link" href="/src/view/painel/painelBuscaImoveis.php">Imóveis</a>
			<a class="nav-item nav-link" href="/index.php#sobre">Quem somos</a>
			<a class="nav-item nav-link" href="/index.php#contato">Contato</a>
			<a class="nav-item nav-link" href="/index.php#faleconosco-Box">Fale Conosco</a>

			<!-- LOGIN ----------- -->
			<div class="nav-item dropdown">
				<?php if (isset($_SESSION['login']) && !empty($_SESSION['login'])) { ?>

					<a href="/src/view/Login/loginForm.php" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle user-action "><img src="/assets/img/usuario/<?= $_SESSION['foto'] ?>" class="avatar rounded-circle" alt="Avatar" />
						<?= $_SESSION['nome'] ?> <b class="caret"></b></a>
					<div class="dropdown-menu">

						<?php if ($_SESSION['perfil'] == 'a') { ?>
							<a href="/src/view/painel/painelADM.php" class="dropdown-item"><i class="fa fa-sliders"></i> Painel ADM </a>


						<?php
						}
						if ($_SESSION['perfil'] == 'u') { ?>
							<!-- TODO: colocar links certos -->
							<a href="/src/view/painel/painelUsuario.php" class="dropdown-item"><i class="fa fa-sliders"></i> Perfil </a>
							<!-- <a href="/src/view/painel/painelUsuario.php" class="dropdown-item"><i class="fa fa-sliders"></i> Favoritos </a>
							<a href="/src/view/painel/painelUsuario.php" class="dropdown-item"><i class="fa fa-sliders"></i> Agendamentos </a> -->
						<?php
						} ?>

						<div class="divider dropdown-divider"></div>
						<a href="/src/view/Login/fimsessao.php" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Logout</a>
					</div>
				<?php
				} else { ?>
					<a href="/src/view/painel/painelLogin.php" class="nav-item nav-link user-action"><img src="/assets/img/usuario/fotodefault.png" class="avatar rounded-circle" alt="Avatar" />
						Login <b class="caret"></b></a>


				<?php
				} ?>
			</div>
		</div>
	</div>
</nav>