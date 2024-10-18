<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Desafio Revvo - Fullstack PHP</title>
	
	<!-- styles -->
	<link rel="stylesheet" href="css/main.css" />

	<!-- favicon -->
	<link rel="icon" href="img/favicon-revvo-150-150.webp" sizes="32x32" />
	<link rel="icon" href="img/favicon-revvo-300-300.webp" sizes="192x192" />
	<link rel="apple-touch-icon" href="img/favicon-revvo-300-300.webp" />
</head>
<body>
	<!-- header -->
	<header class="pb-0">
		<div class="container">
			<div class="d-flex justify-content-between align-items-center">
				<!-- logo -->
				<div class="logo">
					<img src="img/logo-revvo.webp" alt="Logo Revvo" width="184" height="38" loading="lazy" />
				</div>
				
				<!-- search & welcome -->
				<div class="d-flex justify-content-end align-items-center">
					<!-- search -->
					<div class="search-wrapper">
						<div class="search d-flex align-items-center">
							<input type="search" class="search-input" placeholder="Pesquisar cursos..." />
							<!-- icon -->
							<i class="search-icon bi bi-search"></i>
						</div>						
					</div>

					<!-- separator -->
					<div class="separator"></div>
					
					<!-- profile -->
					<div class="dropdown">
						<div class="dropdown-toggle profile d-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
							<!-- profile picture -->
							<figure class="avatar">
								<img class="rounded" src="img/user-example.webp" alt="Imagem de Perfil" width="47" height="47" loading="lazy" />
								<!-- <figcaption>Fig.1 - Trulli, Puglia, Italy.</figcaption> -->
							</figure>

							<!-- user name -->
							<div class="welcome d-flex align-items-center">
								<p class="m-0">Seja bem-vindo <span class="name d-block">John Doe</span></p>
							</div>
						</div>
						<ul class="dropdown-menu w-100 mt-3">
							<li><a class="dropdown-item" href="#"><i class="bi bi-person-bounding-box"></i> Meu Perfil</a></li>
							<li><a class="dropdown-item" href="#"><i class="bi bi-card-checklist"></i> Meus Cursos</a></li>
							<li><a class="dropdown-item" href="#"><i class="bi bi-mortarboard"></i> Certificados</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Configurações</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>		
	
	<!-- slideshow -->
	<div class="slideshow">
		<div id="slides" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-inner">
				<!-- slide 1 -->
				<div class="carousel-item active">
					<div class="slideshow-image">
						<img src="img/cursos/slide-01.webp" class="d-block w-100" alt="Curso 01">
					</div>
				</div>
				
				<!-- slide 2 -->
				<div class="carousel-item">
					<div class="slideshow-image">
						<img src="img/cursos/slide-02.webp" class="d-block w-100" alt="Curso 02">
					</div>
				</div>

				<!-- slide 3 -->
				<div class="carousel-item">
					<div class="slideshow-image">
						<img src="img/cursos/slide-03.webp" class="d-block w-100" alt="Curso 03">
					</div>
				</div>
			</div>
			
			<!-- navigation -->
			<button class="carousel-control-prev" type="button" data-bs-target="#slides" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#slides" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>

			<!-- bullets -->
			<div class="d-flex align-items-center justify-content-center">
				<div class="carousel-indicators">
					<button type="button" data-bs-target="#slides" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
					<button type="button" data-bs-target="#slides" data-bs-slide-to="1" aria-label="Slide 2"></button>
					<button type="button" data-bs-target="#slides" data-bs-slide-to="2" aria-label="Slide 3"></button>
				</div>
			</div>
		</div>
	</div>
		
	<!-- courses -->
	<div class="courses mt-5">
		<div class="container">
			<!-- title -->
			<h2 class="h4 text-uppercase">Meus cursos</h2>
			<hr class="mt-0" />

			<!-- cards -->
			<div class="row justify-content-center align-items-stretch gy-4 pt-2">
				<?php include "includes/courses.php" ?>
			</div>
		</div>
	</div>
		

	<!-- footer -->
		<!-- logo & slogan -->
		<!-- contact -->
		<!-- social -->
		
	<!-- copyright -->

	<!-- modal -->
	 	<!-- image -->
		<!-- title -->
		<!-- text -->
		<!-- button -->

	<!-- scripts -->
	<script src="js/main.js"></script>
</body>
</html>