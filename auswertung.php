<?php
// ---------------------- CONTROLLER ----------------------
session_start();
require_once('system/data.php');
error_reporting(E_WARNING);

// Hole alle Tipps aus der Datenbank
$tipps = get_all_tipps();

// Lese die Resultate aus der Datenbank
$resultate = get_resultate();

// Wandle die Resultate in einen Array im folgenden Format um:
// array( 'Guy Parmelin' => 135, 'Alain Berset' => 150)
$resultate_assoc = make_assoc_array($resultate, 1);

// Bereite einen Array für die Rangliste vor
$rangliste = array();

// Gehe alle Tipps durch und finde heraus, wie gross der Unterschied
// zwischen den Tipps und den effektiven Resultaten ist
while ($tipp = mysqli_fetch_row($tipps)) {
  // Wandle die Tipps in einen Array im folgenden Format um:
  // array( 'Guy Parmelin' => 135, 'Alain Berset' => 150)
  $tipp_assoc = make_assoc_array($tipp, 2);

  // Anfangs gehen wir von einem Unterschied von 0
  // zwischen dem effektiven Resultat und dem aktuellen Tipp aus
  $difference = 0;

  // Dann prüfen wir jeden Bundesrat im Resultat
  foreach($resultate_assoc as $bundesrat => $resultat_stimmen) {
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
    $difference = $difference + abs($tipp_stimmen - $resultat_stimmen);
  }

  // Speichere den Unterschied im Tipp
  $tipp['difference'] = $difference;

  // Füge den Tipp, nachdem der Unterschied berechnet wurde,
  // in das rangliste ein
  $rangliste[] = $tipp;
}

// Ordne die Rangliste Aufsteigende nach Unterschied
// Je kleiner der Unterschied, desto früher kommt der Eintrag
// und desto höher ist der Rang
usort($rangliste, function($a, $b) {
  return $a['difference'] - $b['difference'];
});

// Wandle das Ergebnis aus der Datenbank in einen assoziativen Array um
// array( 'Guy Parmelin' => 135, 'Alain Berset' => 150)
// Diese Funktion ist schon gegeben
function make_assoc_array($original_array, $start_count) {
  $assoc_array = array();

  for($i = $start_count; $i < count($original_array); $i = $i + 2) {
    $key = $original_array[$i];
    $value = $original_array[$i + 1];

    $assoc_array[$key] = $value;
  }

  return $assoc_array;
}
// ---------------------- VIEW ----------------------

// Der Gewinner hat den kleinsten Unterschied
// zwischen Tipp und Resultat
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Auswertung</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/control.css">
  <script src="js/control.js"></script>
</head>
<body>
  <table class="table">
    <thead>
      <th scope="col">Rank</th>
      <th scope="col">Differenz</th>
      <th scope="col">Name</th>
      <th scope="col">Jahrgang</th>
      <th scope="col">Klasse</th>
    </thead>
    <?php foreach($rangliste as $rank => $tipp) {
      $user_id = $tipp[1];
      $student = mysqli_fetch_assoc(get_user_by_id($user_id));
    ?>
    <tr>
      <td><?php echo $rank + 1; ?></td>
      <td><?php echo $tipp['difference']; ?></td>
      <td><?php echo $student['vorname'] . ' ' . $student['nachname']; ?></td>
      <td><?php echo $student['jahr']; ?></td>
      <td><?php echo $student['klasse']; ?></td>
    </tr>
    <? } ?>
  </table>
</body>
</html>