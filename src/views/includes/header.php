<!-- header -->
<header class="pb-0">
		<div class="container">
			<div class="header-wrapper d-flex justify-content-between align-items-center">
				<!-- logo -->
				<div class="logo">
					<a href="/">
						<img src="img/logo-revvo.webp" alt="Logo Revvo" width="184" height="38" loading="lazy" />
					</a>
				</div>
				
				<!-- search & welcome -->
				<div class="control-wrapper d-flex justify-content-end align-items-center">
					<!-- search -->
					<div class="search-wrapper">
						<form class="search d-flex align-items-center" action="/?action=search" method="POST">
							<input type="search" class="search-input" name="search" id="search" placeholder="Pesquisar cursos..." />
							<!-- icon -->
							<button type="submit" class="btn p-0"><i class="search-icon bi bi-search"></i></button>
						</form>
					</div>

					<!-- separator -->
					<div class="separator"></div>
					
					<!-- profile -->
					<div class="dropdown">
						<div class="dropdown-toggle profile d-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
							<!-- profile picture -->
							<figure class="avatar">
								<img class="rounded object-fit-cover" src="img/user-example.webp" alt="Imagem de Perfil" width="47" height="47" loading="lazy" />
								<!-- <figcaption>Fig.1 - Trulli, Puglia, Italy.</figcaption> -->
							</figure>

							<!-- user name -->
							<div class="welcome d-none d-sm-flex align-items-center">
								<p class="m-0">Seja bem-vindo <span class="name d-block">John Doe</span></p>
							</div>
						</div>
						<ul class="dropdown-menu w-100 mt-3">
							<li><h2 class="dropdown-header">Perfil</h2></li>
							<!-- <li><a class="dropdown-item" href=""><i class="bi bi-person-bounding-box"></i> Meu Perfil</a></li> -->
							<li><a class="dropdown-item" href="/"><i class="bi bi-card-checklist"></i> Meus Cursos</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><h2 class="dropdown-header">Adminstração</h2></li>
							<li><a class="dropdown-item" href="/?action=dashboard"><i class="bi bi-mortarboard"></i> Gerenciar Cursos</a></li>
							<li><a class="dropdown-item" href="/?action=new"><i class="bi bi-node-plus"></i> Novo Curso</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><h2 class="dropdown-header">Banco de Dados</h2></li>
							<li><a class="dropdown-item" href="http://localhost:8081" target="_blank"><i class="bi bi-database"></i> phpMyAdmin</i></a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="http://revvo.com.br" target="_blank"><i class="bi bi-escape"></i> Sair</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>