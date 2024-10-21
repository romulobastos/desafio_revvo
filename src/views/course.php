<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Curso X / Desafio Revvo - Fullstack PHP</title>
	
	<!-- styles -->
	<link rel="stylesheet" href="css/main.css" />
	
	<!-- favicon -->
	<link rel="icon" href="img/favicon-revvo-150-150.webp" sizes="32x32" />
	<link rel="icon" href="img/favicon-revvo-300-300.webp" sizes="192x192" />
	<link rel="apple-touch-icon" href="img/favicon-revvo-300-300.webp" />
</head>
<body>
	
	<?php include "includes/header.php" ?>
	
  <!-- details -->
	<section class="course-details my-5">
		<div class="container py-5">
			<!-- back -->
			<div class="row mb-4">
				<a href="/" class="text-decoration-none text-secondary"><i class="bi bi-arrow-left me-2"></i>Voltar para lista de cursos</a>
			</div>
			
			<div class="row flex-column flex-sm-row gap-3">
				<!-- img -->
				<div class="col">
					<img class="img-fluid" src="data:image/png;base64,<?= base64_encode($course['img']); ?>" width="800px" height="450px" loading="lazy" />
				</div>
				
				<!-- info -->
				<div class="col">
					<h2><?= $course['title']; ?></h2>
					<hr>
					<p><?= $course['info']; ?></p>
				</div>
			</div>
		</div>
	</section>
	
  <?php include "includes/footer.php" ?>
	<?php include "includes/copyright.php" ?>
	
	<!-- scripts -->
	<script src="js/main.js"></script>
</body>
</html>