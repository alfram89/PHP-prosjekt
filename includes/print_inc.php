<?php

session_start();
include_once 'dbh.inc.php';


$uid = $_SESSION['u_id'];

if(isset($_GET['order'])) {
  $order = $_GET['order'];
}
else {
  $order = 'title';
}

if(isset($_GET['sort'])){
  $sort = $_GET['sort'];
}
else {
  $sort = 'ASC';
}

$sql = "SELECT * FROM serie WHERE uid='$uid' ORDER BY $order $sort";
$result = $conn->query($sql);


if ($result->num_rows > 0) {


$sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';

echo "<table id='restable'>";

echo "<tr>
<th><a id='sortlink' href='index.php?order=title&&sort=$sort'>Tittel</a></th>
<th><a id='sortlink' href='index.php?order=service&&sort=$sort'>Service</a></th>
<th><a id='sortlink' href='index.php?order=dice&&sort=$sort'>Terningkast</a></th>
<th>Antall sesonger</th><th>Sesonger sett</th>
<th><a id='sortlink' href='index.php?order=active_series&&sort=$sort'>Aktiv serie</a></th>
<th>Neste sesong</th><th>Link</th><th>Rediger</th>
</tr>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['title'] . "</td><td>" . $row['service'] . "</td><td>" . $row['dice'] . "</td><td>" . $row['season_count'] . "</td><td>" . $row['season_seen'] . "</td><td>" . $row['active_series'] . "</td><td>" . $row['season_next'] . "</td><td><a href='" . $row['series_link'] . "'>". $row['series_link'] . "</a></td><td><a href='edit_series.php?title=" . $row['title'] . "'>Rediger</a></td></tr>";
    }

echo "</table>";
} else {
    echo "<p id='nodata'>Ingen data lagt inn</p>";
}
$conn->close();

?>
