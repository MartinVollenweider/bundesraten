<?php
session_start();
require_once('system/data.php');

if(isset($_SESSION['userid'])){
  $user = mysqli_fetch_assoc(get_user_by_id($_SESSION['userid']));
  $user_id = $user['id'];
}else{
  header('Location: login.php');
}

if (does_tipp_exist($user_id)) {
  $result = get_tipp($user_id);
  $result_array = mysqli_fetch_array($result);
  if($result){
    unset($_POST);
    echo json_encode($result_array);
  }else{
    echo "Es gibt ein Problem mit der Datenbankverbindung.";
  }
} else {
  echo "Dein Tipp wurde noch nicht abgegeben.";
}

// ---------------------- VIEW ----------------------
?>