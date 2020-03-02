<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Legg til en serie</h2>
		<form class="add_series-form" action="includes/add_series.inc.php" method="POST">
			<input type="text" name="title" placeholder="Navn på serien" required>
      <input list="service" name="service" placeholder="Hvilken tjesneste" required>
        <datalist id="service">
          <option value="Netflix">
          <option value="Viapaly">
          <option value="Dplay">
          <option value="TV2Sumo">
          <option value="NRK">
          <option value="HBO">
          <option value="PrimeVideo">
        </datalist>
				Terningkast:
			<select name="dice" id="terningkast" required>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
      </select>
			<input type="number" name="season_count" placeholder="Hvor mange sesonger totalt?" required>
      <input type="number" name="season_seen" placeholder="Hvor mange sesonger har du sett?" required>
			Ser du på serien nå fortiden?
			<select name="active_series" id="active_series">
					<option value="Ja" selected>Ja</option>
					<option value="Nei">Nei</option>
			</select>
      <input type="text" name="season_next" placeholder="Når kommer neste sesong?">
			<input type="url" name="series_link" placeholder="Link til seriens imdb side">
			<button type="submit" name="submit">Legg til</button>
      <button type="reset" name="reset">Nullstill</button>
		</form>
	</div>
</section>


<?php
	include_once 'footer.php';
?>
