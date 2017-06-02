<?php 	

print('
	<section class="App-titleLogin container xs-w100  xs-flex xs-flex-wrap xs-jc-flex-end u-margin-top">
				<h2 class="xs-w70 xs-flex xs-flex-wrap xs-flex-column xs-ai-flex-end">Panel de Control de BLB		
				<div class="u-line xs-w30"></div>
				</h2>
				<p class="u-number xs-20">01.</p>
			</section>  
			
	<div class="Login xs-w70">
	<form class="App-form  container xs-w90" method="POST">
		<input class="xs-w100" type="text" name="user" placeholder="usuario" required>
		<input class="xs-w100" type="password" name="pass" placeholder="password" required>
		<input type="submit" class="u-button u-add xs-w100" value="Enviar">
	</form>
	</div>
');

if ( isset( $_GET['error'] ) ) {
	print('<p class="u-error">' . $_GET['error'] .'</p>');
}