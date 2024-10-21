<section class="new-course my-5">
	<div class="container">
		<h2>Gerenciar Cursos</h2>
		<hr>
		<div class="row justify-content-center mt-5">
			<div class="col-12">
				
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

				<div class="table-responsive">
					<table class="table caption-top table-bordered table-hover">
						<caption>Lista de Cursos</caption>
						<thead>
							<tr>
								<th scope="col">Imagem</th>
								<th scope="col">Título</th>
								<th scope="col">Descrição</th>
								<th scope="col">Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($courses as $course){ ?>
							<tr>
								<td><img src="<?= $course['img_url']; ?>" class="rounded" alt="<?= $course['title']; ?>" width="60px" height="34px" loading="lazy" /></td>
								<td><?= $course['title']; ?></td>
								<td><?= $course['info']; ?></td>
								<td>
									<div class="d-flex gap-2 justify-content-center">
										<a href="/?action=find&id=<?=$course['id']?>" class="btn btn-sm btn-outline-primary rounded-pill px-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Editar Curso">
											<i class="bi bi-pen"></i>
										</a>
										<a href="/?action=delete&id=<?=$course['id']?>" class="btn btn-sm btn-outline-secondary rounded-pill px-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Remover Curso">
											<i class="bi bi-x-lg"></i>
										</a>
									</div>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>

				<!-- create new -->
				<div class="d-flex gap-2 justify-content-end align-items-center">
					<a href="/?action=new" class="btn btn-green px-3 pe-4 fw-bold rounded-pill text-uppercase"><i class="bi bi-plus-lg"></i> Novo Curso</a>
				</div>

			</div>
		</div>
	</div>
</section>