<?php
// ---------------------- CONTROLLER ----------------------
session_start();
require_once('system/data.php');

$class = mysqli_real_escape_string(get_db_connection(), $_GET['class']);
$year = mysqli_real_escape_string(get_db_connection(), $_GET['year']);

$tipps = get_all_tipps();
$resultate = get_the_resultate();

// Wandle die Resultate in einen Array im folgenden Format um:
// array( 'Guy Parmelin' => 135, 'Alain Berset' => 150)
$resultate_assoc = make_assoc_array($resultate, 0, 14);

// Bereite einen Array für die Rangliste vor
$ranking = array();

// Gehe alle Tipps durch und finde heraus, wie Gross der Unterschied
// zwischen den Tipps und den effektiven Resultaten ist
while ($tipp = mysqli_fetch_array($tipps)) {
  // Wandle die Tipps in einen Array im folgenden Format um:
  // array( 'Guy Parmelin' => 135, 'Alain Berset' => 150)
  $tipp_assoc = make_assoc_array($tipp, 2, 16);

  // Anfangs gehen wir von einem Unterschied von 0 aus
  $difference = 0;

  // Dann prüfen wir jeden Bundesrat im Resultat
  foreach($resultate_assoc as $bundesrat => $stimmen) {
    // Wieviele Stimmen sind getippt worden für den Bundesrat
    $tipp_stimmen = $tipp_assoc[$bundesrat];

    // Falls der Bundesrat falsch getippt wurde, wird automatisch von einem
    // Tipp von 0 Stimmen ausgegangen
    if (!$tipp_stimmen) {
      $tipp_stimmen = 0;
    }

    // Berechne den Unterschied zwischen den effektiven Stimmen
    // und den getippten Stimmen für den aktuellen Bundesrat
    // und wandle Werte mit einem Minus in positive Werte um
    // Bsp: Aus einem Unterschied von -24 wird 24
    $difference = $difference + abs($tipp_stimmen - $stimmen);
  }

  // Speichere den Unterschied im Tipp
  $tipp['difference'] = $difference;

  // Füge den Tipp, nachdem der Unterschied berechnet wurde,
  // in das Ranking ein
  $ranking[] = $tipp;
}

// Ordne die Rangliste Aufsteigende nach Unterschied
// Je kleiner der Unterschied, desto früher kommt der Eintrag
usort($ranking, function($a, $b) {
  return $a['difference'] - $b['difference'];
});

function make_assoc_array($original_array, $start_count, $end_count) {
  $assoc_array = array();

  for($i = $start_count; $i < $end_count; $i = $i + 2) {
    $key = $original_array[$i];
    $value = $original_array[$i + 1];

    $assoc_array[$key] = $value;
  }

  return $assoc_array;
}
// ---------------------- VIEW ----------------------
?>

<table>
  <thead>
    <th>Rank</th>
    <th>Differenz</th>
    <th>Name</th>
  </thead>
  <?php foreach($ranking as $rank => $student): ?>
  <tr>
    <td><?php echo $rank + 1; ?></td>
    <td><?php echo $student['difference']; ?></td>
    <td><?php echo $student['firstname'] . ' ' . $student['lastname']; ?></td>
  </tr>
  <? endforeach; ?>
</table>