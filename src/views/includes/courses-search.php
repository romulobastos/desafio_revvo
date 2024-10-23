<!-- courses -->
<div class="courses mt-5">
	<div class="container">
		<!-- title -->
		<h2 class="h4 text-uppercase">Pesquisa de cursos</h2>
		<hr class="mt-0" />

    <p>Termo pesquisado: "<?= $term; ?>"</p>

		<!-- cards -->
		<div class="row justify-content-center align-items-stretch gy-4 pt-2">
		
			<?php foreach($courses as $course){ ?>
				<div class="col-12 col-sm-6 col-lg-4 col-xl-3">
					<div class="card h-100">
						<img src="data:image/png;base64,<?= base64_encode($course['img']); ?>" class="card-img-top" alt="<?= $course['title']; ?>" width="300" height="169" loading="lazy" />
						<div class="card-body d-flex flex-column justify-content-between gap-3">
							<div>
								<h3 class="card-title h6"><?= $course['title']; ?></h3>
								<p class="card-text"><?= $course['info']; ?></p>
							</div>
							<a href="?action=details&name=<?= $course['slug']; ?>" class="btn btn-green rounded-pill">Ver curso</a>
						</div>
					</div>
				</div>
			<?php } ?>
      
		</div>
	</div>
</div>