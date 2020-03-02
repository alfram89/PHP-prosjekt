<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Glemt passord</h2>
		<form class="signup-form" action="includes/forgotPw.inc.php" method="POST">
			<input type="text" name="uid" placeholder="Brukernavn">
			<button type="submit" name="submit">Send passord</button>
		</form>
	</div>
</section>


<?php
	include_once 'footer.php';
?>
