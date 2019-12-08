<?php
// ---------------------- CONTROLLER ----------------------
session_start();
require_once('system/data.php');

$class = mysqli_real_escape_string(get_db_connection(), $_GET['class']);

$tipps = get_all_tipps();
$resultate = get_the_resultate($class);

// Die Gesamtsumme aller Tipps addieren
$summe_resultate = array_sum($resultate);

$ranking = array();

while ($tipp = mysqli_fetch_assoc($tipps)) {
  $summe_tipp = array_sum($tipp);

  $difference = abs($summe_tipp - $summe_resultate);

  $tipp['difference'] = $difference;
  $ranking[] = $tipp;
}

usort($ranking, function($a, $b) {
  return $a['difference'] - $b['difference'];
});

print_r($ranking);
// ---------------------- VIEW ----------------------
?>