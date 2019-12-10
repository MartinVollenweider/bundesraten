<?php
// ------------------- CONTROLLER -------------------
session_start();
require_once('system/data.php');

if(isset($_SESSION['userid'])){
  $user = mysqli_fetch_assoc(get_user_by_id($_SESSION['userid']));
  $user_id = $user['id'];
}else{
  header('Location: login.php');
}

$msg = "";

extract($_POST);


if (does_tipp_exist($user_id)) {
  $msg = 'Du hast deinen Tipp bereits abgegeben.';
} else {
  $result = tipp($user_id, $tipp1, $tipp1stimmen, $tipp2, $tipp2stimmen, $tipp3, $tipp3stimmen, $tipp4, $tipp4stimmen, $tipp5, $tipp5stimmen, $tipp6, $tipp6stimmen, $tipp7, $tipp7stimmen);

  if($result){
    unset($_POST);
    $msg = "Du hast deinen Tipp erfolgreich abgegeben!";
  }else{
    $msg = "Es gibt ein Problem mit der Datenbankverbindung.";
  }
}

echo $msg;

// ---------------------- VIEW ----------------------
?>