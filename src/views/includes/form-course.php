<?php
	$pageTitle = $_GET['id'] ? 'Atualizar Curso' : 'Novo Curso';
	$formAction= $_GET['id'] ? 'update&id='.$_GET['id'] : 'create';
?>
<section class="new-course my-5">
	<div class="container">
		<h2><?= $pageTitle; ?></h2>
		<hr>

		<!-- session message -->
		<?php if (isset($_SESSION['msg'])) { ?>
			<div class="alert alert-<?= $_SESSION['msg']['class']; ?> alert-dismissible d-flex align-items-center" role="alert">
				<i class="bi bi-<?= $_SESSION['msg']['icon']; ?> me-2"></i>
				<?= $_SESSION['msg']['text']; ?>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php } ?>
		<!-- remove message after refresh -->
		<?php unset($_SESSION['msg']); ?>

		<div class="row justify-content-center mt-5">
			<div class="col-12 col-md-8 col-lg-6 my-3 my-lg-5">
				<form method="POST" action="/?action=<?= $formAction; ?>" enctype="multipart/form-data">
					<!-- title -->
					<div class="mb-3">
						<label for="title" class="form-label fw-bold">Título</label>
						<input type="text" name="title" required class="form-control" id="title" aria-describedby="courseTitle" value="<?= $course['title'] ;?>" onkeyup="generateSlug()">
						<div id="courseTitle" class="form-text">Recomendamos títulos de cursos simples e objetivos.</div>
					</div>
					
					<!-- slug -->
					<div class="mb-3">
						<label for="slug" class="form-label fw-bold">Slug <?= $course['slug'] ;?></label>
						<input type="text" name="slug" required class="form-control" id="slug" aria-describedby="courseSlug" value="<?= $course['slug'] ;?>">
						<div id="courseSlug" class="form-text">Caminho de URL criado automaticamente.</div>
					</div>

					<!-- info -->
					<div class="mb-3">
						<label for="title" class="form-label fw-bold">Descrição</label>
						<textarea name="info" required class="form-control" id="info" aria-describedby="courseInfo"><?= $course['info'] ;?></textarea>
						<div id="courseInfo" class="form-text">Tente descrever brevemente o curso (em até 150 caractéres).</div>
					</div>

					<!-- image -->
					<div class="mb-3">
						<label for="img" class="form-label fw-bold">Imagem (Capa)</label>
						<input class="form-control" type="file" id="img" name="img" required />
						<?php if ($course['img']) { ?>
							<img src="data:image/png;base64,<?= base64_encode($course['img']); ?>" width="120px" height="68px" loading="lazy" />
						<?php } ?>						
						<div id="courseImage" class="form-text">Formatos: jpg, jpeg e png. Tamanho máximo: <?= $controller->uploadMaxFilesize; ?></div>
					</div>

					<hr class="my-4" />

					<!-- create -->
					<div class="d-flex gap-2 justify-content-end align-items-center">
						<button type="submit" class="btn btn-green px-3 fw-bold rounded-pill text-uppercase">Salvar</button>
						<a href="/?action=dashboard" class="btn text-secondary btn-sm rounded-pill text-uppercase">Cancelar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>