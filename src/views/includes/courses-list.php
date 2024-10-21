<?php
// mock
$coursesMock = [
	[
		"image" => "https://picsum.photos/300/150",
		"title" => "Mercado de TI",
		"desc" => "Fugiat ipsum nisi culpa est adipisicing nostrud exercitation ut est eu quis elit. Laboris voluptate ex veniam magna ullamco dolore nulla in. Irure aliquip exercitation sint laborum nulla nostrud mollit exercitation laborum Lorem mollit. Nulla minim culpa deserunt duis ipsum ipsum proident. Aute exercitation proident exercitation laboris laboris sit ex ut aute anim.",
		"slug" => "/courses/lorem-ipsum"
	],
	[
		"image" => "https://picsum.photos/300/150",
		"title" => "Moodle para iniciantes",
		"desc" => "Exercitation irure amet do mollit ex aliqua voluptate enim Lorem minim occaecat. Do consectetur minim esse sint mollit laboris elit et ut enim labore dolore quis. In in anim labore reprehenderit enim irure pariatur ex esse sit.",
		"slug" => "/courses/lorem-ipsum",
	],
	[
		"image" => "https://picsum.photos/300/150",
		"title" => "Python e Django",
		"desc" => "Ullamco aute anim sint elit dolore. Adipisicing officia cillum reprehenderit deserunt elit qui ut nostrud mollit fugiat enim ut sit sunt. Exercitation consectetur amet pariatur laborum id quis id esse mollit occaecat adipisicing. Sunt est qui elit nostrud elit consequat deserunt veniam consequat minim consequat fugiat culpa.",
		"slug" => "/courses/lorem-ipsum"
	],
	[
		"image" => "https://picsum.photos/300/150",
		"title" => "Criando aplicações com PHP e Laravel",
		"desc" => "Minim reprehenderit voluptate pariatur aliqua dolor aliquip consequat sint sunt consequat exercitation ea est ex. Mollit elit ipsum ut officia laboris cupidatat exercitation ut fugiat occaecat. Nisi quis laborum est esse dolore aliqua qui ea deserunt officia aliquip minim. Dolore sunt laborum magna est reprehenderit cillum veniam culpa eiusmod sunt aliquip est pariatur exercitation. Ut ea amet nisi tempor consequat aliquip elit aliquip eiusmod do id voluptate ut. Amet ut amet est officia proident Lorem ullamco. Nulla non reprehenderit sit ex cillum aliquip cillum Lorem ex.",
		"slug" => "/courses/lorem-ipsum"
	],
	[
		"image" => "https://picsum.photos/300/150",
		"title" => "Mercado de TI",
		"desc" => "Fugiat ipsum nisi culpa est adipisicing nostrud exercitation ut est eu quis elit. Laboris voluptate ex veniam magna ullamco dolore nulla in. Irure aliquip exercitation sint laborum nulla nostrud mollit exercitation laborum Lorem mollit. Nulla minim culpa deserunt duis ipsum ipsum proident. Aute exercitation proident exercitation laboris laboris sit ex ut aute anim.",
		"slug" => "/courses/lorem-ipsum"
	],
	[
		"image" => "https://picsum.photos/300/150",
		"title" => "Python e Django",
		"desc" => "Ullamco aute anim sint elit dolore. Adipisicing officia cillum reprehenderit deserunt elit qui ut nostrud mollit fugiat enim ut sit sunt. Exercitation consectetur amet pariatur laborum id quis id esse mollit occaecat adipisicing. Sunt est qui elit nostrud elit consequat deserunt veniam consequat minim consequat fugiat culpa.",
		"slug" => "/courses/lorem-ipsum"
	],
	[
		"image" => "https://picsum.photos/300/150",
		"title" => "Criando aplicações com PHP e Laravel",
		"desc" => "Minim reprehenderit voluptate pariatur aliqua dolor aliquip consequat sint sunt consequat exercitation ea est ex. Mollit elit ipsum ut officia laboris cupidatat exercitation ut fugiat occaecat. Nisi quis laborum est esse dolore aliqua qui ea deserunt officia aliquip minim. Dolore sunt laborum magna est reprehenderit cillum veniam culpa eiusmod sunt aliquip est pariatur exercitation. Ut ea amet nisi tempor consequat aliquip elit aliquip eiusmod do id voluptate ut. Amet ut amet est officia proident Lorem ullamco. Nulla non reprehenderit sit ex cillum aliquip cillum Lorem ex.",
		"slug" => "/courses/lorem-ipsum"
	],
	[
		"image" => "https://picsum.photos/300/150",
		"title" => "Moodle para iniciantes",
		"desc" => "Exercitation irure amet do mollit ex aliqua voluptate enim Lorem minim occaecat. Do consectetur minim esse sint mollit laboris elit et ut enim labore dolore quis. In in anim labore reprehenderit enim irure pariatur ex esse sit.",
		"slug" => "/courses/lorem-ipsum",
	],
];
?>

<!-- courses -->
<div class="courses mt-5">
	<div class="container">
		<!-- title -->
		<h2 class="h4 text-uppercase">Meus cursos</h2>
		<hr class="mt-0" />
			
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
							<a href="/?action=details&name=<?= $course['slug']; ?>" class="btn btn-green rounded-pill">Ver curso</a>
						</div>
					</div>
				</div>
			<?php } ?>

			<div class="col-12 col-sm-6 col-lg-4 col-xl-3">
				<div class="card card-add-course bg-transparent h-100 justify-content-center align-items-center p-0 m-0">
					<a href="/?action=new" class="d-flex flex-column w-100 h-100 justify-content-center align-items-center text-uppercase text-center gap-2">
						<i class="bi bi-folder-plus"></i>
						<span>Adicionar<span class="fw-bold br">Curso</span></span>
					</a>
				</div>
			</div>
			
		</div>
	</div>
</div>