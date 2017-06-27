<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Grupo BLB</title>
    <meta name="description" content="Grupo BLB, es un Grupo formado por gente altamente preparada, que por sus conocimientos y experiencia, logra realizar desarrollos íntegros.">
	<script <script src='https://www.google.com/recaptcha/api.js'></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
  	
    
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hamburgers/0.7.0/hamburgers.min.css">
	<link rel="stylesheet" href="./css/font-awesome.css">
	<link rel="stylesheet" href="./css/navigation.css">
    <link rel="stylesheet" href="./css/my_framework.css">
    <link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/style_tab.css">

	<link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/proyect.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	
<body>
    <header class="Header container-fluid">
<!-- Menu de Navegación -->
		<section class="Header-container  xs-w100">
			<h1 class="Logo lg-w10">
				<a href="index.html" class="Logo-link">Logo</a>
			</h1>
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
						<a href="index.php" class="Menu-link">Home</a>
					</li>
					<li class="Menu-item">
						<a href="proyectos.php" class="Menu-link">Proyectos</a>
					</li>
					<li class="Menu-item">
						<a href="construccion.php" class="Menu-link">En Construcción</a>
					</li>
					<li class="Menu-item">
						<a href="#" class="Menu-link">Promociones Inmobiliarias</a>
					</li>
					<li class="Menu-item">
						<a href="#contacto" class="Menu-link">Contacto</a>
					</li>
				</ul>
			</nav>
		</article>
<!-- Menu Redes Sociales -->
        	<span class="PanelRS-button">
				<button class="hamburgerRS" type="button"></button>
			</span>
		<article class="PanelRS">
			<nav class="MenuRS xs-w80 xs-flex xs-flex-wrap xs-flex-column">
				<ul class="Menu-listItem xs-w90">
					<li class="Menu-item">
						<a href="#" class="Menu-linkRS xs-w90 fa fa-facebook fa-2x"></a>
					</li>
					<li class="Menu-item">
						<a href="#" class="Menu-linkRS xs-w90 fa fa-twitter fa-2x"></a>
					</li>
					<li class="Menu-item">
						<a href="#" class="Menu-linkRS xs-w90 fa fa-instagram fa-2x"></a>
					</li>
					<li class="Menu-item">
						<a href="#" class="Menu-linkRS xs-w90 fa fa-youtube-play fa-2x"></a>
					</li>
					<li class="Menu-item">
						<a href="#" class="Menu-linkRS xs-w90 fa fa-whatsapp fa-2x"></a>
					</li>
				</ul>
			</nav>
		</article>
		</section>
	</header>
				
<!-- body -->    
<article class="OnConstruccion container xs-w90 md-flex md-flex-wrap md-ai-center">
<section class="Grup-title container u-margin-top xs-w100  xs-flex xs-flex-wrap xs-jc-flex-end">
			<h2 class="xs-flex xs-flex-wrap xs-flex-column xs-ai-flex-end">Proyectos
			<div class="u-line xs-w30"></div>
			</h2>
			<p class="u-number xs-20">01.</p>
</section>
 
    <?php
        include 'showDescription.php';
    ?>
 
  </article>
<!-- footer -->    	
	<footer class="Contact container-fluid u-margin-top" id="contacto">
		<div class="Contact-box container xs-w90">
			<section class="Contact-title container xs-w100  xs-flex xs-flex-wrap">
					<p class="u-number xs-20">02.</p>
					<h2 class="xs-w70 xs-flex xs-flex-wrap xs-flex-column">Contacto
					<div class="u-line-right xs-w30"></div>	
					</h2>
			</section>
				<div class="xs-flex xs-flex-wrap xs-jc-flex-start">	
			<section class="Footer-form xs-w90 md-w45">
					<h2 class="xs-w100">Escríbenos</h2>
					<div class="u-line"></div>
					<form method="POST">
						
						<input class="xs-w100" type="text" name="nombre" title="Tu nombre" placeholder="Escribe tu nombre" pattern="[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+" required>
						
						<input class="xs-w100" type="email" name="email" title="Tu email" placeholder="Escribe tu email" pattern="[\w-\.]+@([\w-]+\.)+[\w-]{2,4}" required>
						
						<textarea name="comentarios" title="Tus comentarios" placeholder="Escribe tu Mensaje" class="xs-w100" rows="7" required></textarea>

						 <div class="g-recaptcha xs-w50" data-sitekey="6LeqWxgUAAAAAJRFC50DybaAiEVoK1LbphtIJr5s"></div>

						<input  class="xs-w50" type="submit" value="Enviar">

						<div class="preload  u-hidden">
							<i class="fa  fa-refresh  fa-spin  fa-5x"></i>
						</div>
						<div class="message  u-hidden">
						<p>Muchas gracias por tus comentarios</p>
						</div>
					</form>
                 </section>
				 <section class="Footer-ubication xs-w100 md-w45 xs-flex xs-flex-wrap xs-jc-flex-end">
					<div class="Footer-map lg-w100" id="gmaps"></div>
				 
					<ul class="Footer-items xs-w100 xs-flex xs-flex-wrap">
						<li class="xs-w100 xs-flex xs-flex-wrap xs-jc-space-between">
							<div class="Footer-img direction xs-w20 lg-w5"></div>
							<div class="Footer-tex xs-w60 lg-w90">Ubicación</div>
						</li>
						<li class=" xs-w100 xs-flex xs-flex-wrap xs-jc-space-between">
							<div class="Footer-img phone xs-w20 lg-w10"></div>
							<div class="Footer-tex xs-w60 lg-w90">Teléfonos</div>
						</li>
						<li class="xs-w100 xs-flex xs-flex-wrap xs-jc-space-between">
							<div class="Footer-img mail xs-w20 md-w10 lg-w5"></div>
							<div class="Footer-tex xs-w60 lg-w90">Correos</div>
						</li>
					</ul>
        		</section>
				</div>
				<div class="Footer-copy "><p class="copy">Desarrollado por Creative Industry. &copy; BLB 2017</p></div>
			</div>
	</footer>

	<script src="./js/navigation.js"></script>
	<script src="./js/navigation_rs.js"></script>
	<script src="./js/map.js"></script>
	<script src="./js/form.js"></script>
	<script src="./js/ajax.js"></script>

	
</body>
</html>