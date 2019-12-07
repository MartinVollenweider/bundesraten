<?php
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

if(!empty($_POST['password'])){
  $password = $_POST['password'];
}else{
  $msg .= "Bitte gib dein Passwort ein.<br>";
  $register_submit_valid = false;
}

if(empty($_POST['password_confirm']) || $password != $_POST['password_confirm']){
  $msg .= "Passwort und Passwortbestätigung stimmen nicht überein.<br>";
  $register_submit_valid = false;
}

if(!empty($_POST['firstname'])){
  $firstname = $_POST['firstname'];
}else{
  $msg .= "Bitte gib deinen Vornamen ein.<br>";
  $register_submit_valid = false;
}

if(!empty($_POST['lastname'])){
  $lastname = $_POST['lastname'];
}else{
  $msg .= "Bitte gib deinen Nachnamen ein.<br>";
  $register_submit_valid = false;
}

if(!empty($_POST['year'])){
  $year = $_POST['year'];
}else{
  $msg .= "Bitte gib deinen Studienjahrgang ein.<br>";
  $register_submit_valid = false;
}

if(!empty($_POST['class'])){
  $class = $_POST['class'];
}else{
  $msg .= "Bitte gib deine Klasse ein.<br>";
  $register_submit_valid = false;
}
// Daten in die Datenbank schreiben ******************************************************

if($register_submit_valid){
  if(does_email_exist($email)){
    $msg = "Diese E-Mail-Adresse ist bereits vergeben.</br>";
  }else{
    $result = register($password, $email, $firstname, $lastname, $year, $class);

    // Meldung für den User zusammenstellen
    if($result){
      unset($_POST);
      $msg = "Du hast dich erfolgreich registriert!</br>";
    }else{
      $msg .= "Es gibt ein Problem mit der Datenbankverbindung.</br>";
    }
  }
}

echo $msg;

// ---------------------- VIEW ----------------------
?>
