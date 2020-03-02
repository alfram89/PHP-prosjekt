<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">


			<?php
				if (isset($_SESSION['u_id'])){
					echo "<p id='overskriftstart'>Oversikt</p>";
					echo "Velkommen, " . $_SESSION['u_first'] . " " . $_SESSION['u_last'] . "<br><br>";
					echo "<a id='add_series_link' href='add_series.php'>Legg til ny serie</a><br><br>";

					include 'includes/print_inc.php';
				}
				else {
					echo "<p id='overskriftstart'>Velkommen</p>";
				}
			?>

	</div>
</section>


<?php
	include_once 'footer.php';
?>
