<?php 
print ('<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Grupo BLB</title>
    <meta name="description" content="Grupo BLB, es un Grupo formado por gente altamente preparada, que por sus conocimientos y experiencia, logra realizar desarrollos íntegros.">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hamburgers/0.7.0/hamburgers.min.css">
	<link rel="stylesheet" href="./public/css/font-awesome.css">
	<link rel="stylesheet" href="./public/css/navigation.css">
    <link rel="stylesheet" href="./public/css/my_framework.css">
    <link rel="stylesheet" href="./public/css/style.css">
	<link rel="stylesheet" href="./public/css/panel.css">
</head>
<body>
    <header class="Header container-fluid">
  <!-- Menu de Navegación -->
		<section class="Header-container  xs-w100">
			<h1 class="Logo lg-w10">
				<a href="./" class="Logo-link">Logo</a>
			</h1> ');
if ($_SESSION['ok']) {
	print('
			<span class="Panel-button">
				<button class="hamburger  hamburger--emphatic" type="button">
			    <span class="hamburger-box">
				<span class="hamburger-inner"></span>
				</span>
				</button>
			</span>
		<article class="Panel xs-w100 lg-w85">
			<nav class="Menu lg-w90 xl-w100">
				<ul class="Menu-listItem">
					<li class="Menu-item">
						<a href="proyectos" class="Menu-link">Proyectos</a>
					</li>
					<li class="Menu-item">
						<a href="tipo" class="Menu-link">Tipo de Proyecto</a>
					</li>
					<li class="Menu-item">
						<a href="img" class="Menu-link">Imagenes</a>
					</li>
					<li class="Menu-item">
						<a href="status" class="Menu-link">Estatus</a>
					</li>
					<li class="Menu-item">
						<a href="colonias" class="Menu-link">Colonia</a>
					</li>
					<li class="Menu-item">
						<a href="users" class="Menu-link">Users</a>
					</li>
					<li class="Menu-item">
						<a href="logout" class="Menu-link">Salir</a>
					</li>
				</ul>
			</nav>
		</article>');

}

print('
		</header>
		<main class="container"> 
');