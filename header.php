<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
	<nav>
		<div class="main-wrapper">
			<ul>
				<li><a href="index.php">Hjem</a></li>
			</ul>
			<div class="nav-login">
				<?php
					if (isset($_SESSION['u_id'])){
						echo '<form action="includes/logout.inc.php" method="POST">
							<button type="submit" name="submit">Logg ut</button>
							</form>';
					} else {
						echo '<form action="includes/login.inc.php" method="POST">
								<input type="text" name="uid" placeholder="Brukernavn">
								<input type="password" name="pwd" placeholder="Passord">
								<button type="submit" name="submit">Logg inn</button>
							</form>
							<a href="signup.php">Registrer</a>
							<a href="http://folk.ntnu.no/xxx/forgotPw.php">Glemt passord</a>
							';
					}
				?>


			</div>
		</div>
	</nav>
</header>
