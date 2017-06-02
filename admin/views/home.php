<?php 
$html = '
	<div class=App-home container xs-flex xs-flex-wrap>
	<article>
		<section class="App-title container xs-w100  xs-flex xs-flex-wrap xs-jc-flex-end">
			<h2 class="xs-w70 xs-flex xs-flex-wrap xs-flex-column xs-ai-flex-end">Bienvenidos al Panel de Control de BLB		
			
			<div class="u-line xs-w30"></div>
			</h2>
			<p class="u-number xs-20">01.</p>
		</section>
		
		<section class="App-icons container xs-flex xs-flex-wrap xs-jc-space-between">
				<a href="proyectos" class="iconsItem xs-w45 md-w30 xs-flex xs-flex-wrap xs-ai-flex-end xs-jc-space-around">
					<i class="fa fa-building fa-4x xs-w100"></i>
					<figcaption>
						<h4>Proyectos</h4>
						<p>Ingresar / Editar / Borrar </p>
					</figcaption>
				</a>
			    <a href="tipo" class="iconsItem xs-w45 md-w30 xs-flex xs-flex-wrap xs-ai-flex-end xs-jc-space-around">
					<i class="fa fa-list-ul fa-4x xs-w100" ></i>
					<figcaption>
						<h4>Tipo de Obra</h4>
						<p>Ingresar / Editar / Borrar </p>
					</figcaption>
				</a>
				 <a href="status" class="iconsItem xs-w45 md-w30 xs-flex xs-flex-wrap  xs-flex-wrap xs-ai-flex-end xs-jc-space-around">
					<i class="fa fa-list-ul fa-4x xs-w100" ></i>
					<figcaption>
						<h4>Status</h4>
						<p>Ingresar / Editar / Borrar </p>
					</figcaption>
				</a>
				<a href="colonias" class="iconsItem xs-w45 md-w30 xs-flex xs-flex-wrap xs-ac-center xs-ai-flex-end xs-jc-space-around">
					<i class="fa fa-map fa-4x xs-w100" aria-hidden="true"></i>
					<figcaption>
						<h4>Colonias</h4>
						<p>Ingresar / Editar / Borrar </p>
					</figcaption>
				</a>

				<a href="img" class="iconsItem xs-w45 md-w30 xs-flex xs-flex-wrap xs-ac-center xs-ai-flex-end xs-jc-space-around">
					<i class="fa fa-file-image-o fa-4x xs-w100" aria-hidden="true"></i>
					<figcaption>
						<h4>Imagenes</h4>
						<p>Ingresar / Editar / Borrar </p>
					</figcaption>
				</a>
			    
				 <a href="users"class="iconsItem xs-w45 md-w30 xs-flex xs-flex-wrap xs-ac-center xs-ai-flex-end xs-jc-space-around">
					<i class="xs-w100 fa fa-users fa-4x" ></i>

					<figcaption>
						<h4>Usuarios</h4>
						<p>Ingresar / Editar / Borrar </p>
					</figcaption>
				</a>
			</section>
	</article>
	
</div>
';

printf(
	$html
);