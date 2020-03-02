<?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';
$sql = "SELECT * FROM serie WHERE title='" . $_GET["title"] . "' AND uid='" . $_SESSION["u_id"] . "';";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Rediger en serie</h2>
		<form class="add_series-form" action="includes/edit_series.inc.php" method="POST">
			<input type="text" name="title"  value="<?php echo $row['title'] ?>" placeholder="Navn på serien" required>
      <input list="service" name="service" placeholder="Hvilken tjesneste" value="<?php echo $row['service'] ?>" required>
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
			<select name="dice" id="terningkast" selected='<?php echo $row["dice"]?>' required>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
      </select>
			<input type="number" name="season_count" placeholder="Hvor mange sesonger totalt?" value="<?php echo $row['season_count'] ?>" required>
      <input type="number" name="season_seen" placeholder="Hvor mange sesonger har du sett?" value="<?php echo $row['season_seen'] ?>" required>
			Ser du på serien nå fortiden?
			<select name="active_series" id="active_series" selected='<?php echo $row["active_series"] ?>'>
					<option value="Ja">Ja</option>
					<option value="Nei">Nei</option>
			</select>
      <input type="text" name="season_next" placeholder="Når kommer neste sesong?" value="<?php echo $row['season_next'] ?>">
			<input type="url" name="series_link" placeholder="Link til seriens imdb side" value="<?php echo $row['series_link'] ?>">
			<button type="submit" name="submit">Rediger</button>
      <button type="reset" name="reset">Nullstill</button>
		</form>
	</div>
</section>


<?php
	include_once 'footer.php';
?>
