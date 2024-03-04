<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Marjorie Marcos">
    <meta name=”description” content=”Pokedex”>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/style.css">
	<title>Pokedex</title>
</head>

	<div class="container-fluid title_container px-4 py-3 d-flex justify-content-center justify-content-sm-between">
		<a href="<?= $router->generate('home') ?>">
			<h1 class="title_container">Pokedex</h1>
		</a>

		<div class="d-flex align-items-start">
			<a class="h-100" href="">
				<span>Liste</span>
			</a>
			<a class="h-100" href="">
				<span>Types</span>
			</a>
		</div>

	</div>