<?php
// ------------------- CONTROLLER -------------------
$logged_in = false;
$log_in_out_text = "Anmelden";

require_once('system/data.php');

$msg = "";
$register_submit_valid = true;

// Prüfe, ob die Nutzereingaben gültig sind
if(!empty($_POST['email'])){
  $email = $_POST['email'];
}else{
  $msg .= "Bitte gib deine E-Mailadresse ein.<br>";
  $register_submit_valid = false;
}

$muster = "/.fhgr.ch$/"; //Überprüfen, ob ein Vokal
if(isset($email) && !preg_match($muster, $email)) {
  $msg .= "Bitte gib eine FHGR-Mailadresse ein.<br>";
  $register_submit_valid = false;
}

if(!empty($_POST['passwort'])){
  $passwort = $_POST['passwort'];
}else{
  $msg .= "Bitte gib dein Passwort ein.<br>";
  $register_submit_valid = false;
}

if(empty($_POST['passwort_confirm']) || $passwort != $_POST['passwort_confirm']){
  $msg .= "Passwort und Passwortbestätigung stimmen nicht überein.<br>";
  $register_submit_valid = false;
}

if(!empty($_POST['vorname'])){
  $vorname = $_POST['vorname'];
}else{
  $msg .= "Bitte gib deinen Vornamen ein.<br>";
  $register_submit_valid = false;
}

if(!empty($_POST['nachname'])){
  $nachname = $_POST['nachname'];
}else{
  $msg .= "Bitte gib deinen Nachnamen ein.<br>";
  $register_submit_valid = false;
}

if(!empty($_POST['jahr'])){
  $jahr = $_POST['jahr'];
}else{
  $msg .= "Bitte gib deinen Studienjahrgang ein.<br>";
  $register_submit_valid = false;
}

if(!empty($_POST['klasse'])){
  $klasse = $_POST['klasse'];
}else{
  $msg .= "Bitte gib deine Klasse ein.<br>";
  $register_submit_valid = false;
}
// Daten in die Datenbank schreiben ******************************************************

if($register_submit_valid){
  if(does_email_exist($email)){
    $msg = "Diese E-Mail-Adresse ist bereits vergeben.</br>";
  }else{
    $result = register(md5($passwort), $email, $vorname, $nachname, $jahr, $klasse);

    // Meldung für den User zusammenstellen
    if($result){
      unset($_POST);
      $msg = "Du hast dich erfolgreich registriert!</br>Weiter <a href='index.php'>zum Ratespiel</a>";
    }else{
      $msg .= "Es gibt ein Problem mit der Datenbankverbindung.</br>";
    }
  }
}

echo $msg;

// ---------------------- VIEW ----------------------
?>
