<section class="new-course my-5">
	<div class="container">
		<h2>Novo Curso</h2>
		<hr>
		<div class="row justify-content-center mt-5">
			<div class="col-12 col-md-8 col-lg-6 my-3 my-lg-5">
				<form method="POST" action="index.php?action=create">
					<!-- title -->
					<div class="mb-3">
						<label for="title" class="form-label fw-bold">Título do Curso</label>
						<input type="text" name="title" required class="form-control" id="title" aria-describedby="courseTitle">
						<div id="courseTitle" class="form-text">Recomendamos títulos de cursos simples e objetivos.</div>
					</div>

					<!-- info -->
					<div class="mb-3">
						<label for="title" class="form-label fw-bold">Descrição</label>
						<textarea name="info" required class="form-control" id="info" aria-describedby="courseInfo"></textarea>
						<div id="courseInfo" class="form-text">Tente descrever brevemente o curso (em até 150 caractéres).</div>
					</div>

					<!-- image -->
					<div class="mb-3">
						<label for="img_url" class="form-label fw-bold">Imagem (Capa)</label>
						<input type="text" name="img_url" required class="form-control" id="img_url" aria-describedby="courseImage">
						<div id="courseImage" class="form-text">Formatos: jpeg, png, bmp, webp. Limite: 1MB.</div>
					</div>

					<!-- slug -->
					<div class="mb-3">
						<label for="slug" class="form-label fw-bold">Slug</label>
						<input type="text" name="slug" required class="form-control" id="slug" aria-describedby="courseSlug">
						<div id="courseSlug" class="form-text">Caminho de URL criado automaticamente.</div>
					</div>
					
					<!-- create -->
					<button type="submit" class="btn btn-green px-4 fw-bold rounded-pill text-uppercase">Criar curso</button>
				</form>
			</div>
		</div>
	</div>
</section>