<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Registrer</h2>
		<form class="signup-form" action="includes/signup.inc.php" method="POST">
			<input type="text" name="first" placeholder="Fornavn">
			<input type="text" name="last" placeholder="Etternavn">
			<input type="text" name="email" placeholder="E-post">
			<input type="text" name="uid" placeholder="Brukernavn">
			<input type="password" name="pwd" placeholder="Passord">
			<button type="submit" name="submit">Registrer</button>
		</form>
	</div>
</section>


<?php
	include_once 'footer.php';
?>