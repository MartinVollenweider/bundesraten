<?php
// ------------------- CONTROLLER -------------------
session_start();
require_once('system/data.php');
if(isset($_SESSION['userid'])) {
  unset($_SESSION['userid']);
  session_destroy();
}
$logged_in = false;
$log_in_out_text = "Anmelden";
if(isset($_POST['login_submit'])){

  $login_submit_valid = true;
  $msg = "";

  if(!empty($_POST['email'])){
    $email = $_POST['email'];
  }else{
    $msg .= "Bitte gib deine E-Mailadresse  ein.<br>";
    $login_submit_valid = false;
  }

  if(!empty($_POST['password'])){
    $password = $_POST['password'];
  }else{
    $msg .= "Bitte gib dein Passwort ein.<br>";
    $login_submit_valid = false;
  }

  if($login_submit_valid){

    $result = login($email , $password);
    if($result){
      $user = mysqli_fetch_assoc($result);
      $_SESSION['userid'] = $user['id'];
      header('Location: index.php');
      exit;
    }else{
      $msg = "Die Benutzerdaten sind nicht in unserer Datenbank vorhanden.";
    }
  }
}
// ---------------------- VIEW ----------------------
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>

  <!-- Bootstrap Verlinkung -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <!-- Inhalt mit Navigation -->
  <div class="container">

    <!-- einfaches Bootstrap-Menü -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <a class="navbar-brand" href="index.php">Bundesraten</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Registrieren</a>
          </li>
        </ul>
      </div>
    </nav>

    <section class="content">
      <h1>Anmelden</h1>
      <p>Bitte melde dich an.</p>


      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
          <label for="id_email">E-Mail: </label>
          <input type="email" name="email" class="form-control" id="id_email">
        </div>
        <div class="form-group">
          <label for="id_password">Passwort: </label>
          <input type="password" name="password" class="form-control" id="id_password">
        </div>
        <button type="submit" name="login_submit" class="btn btn-primary" value="einloggen">Anmelden</button>
      </form>

      <!-- optionale Nachricht -->
<?php if(!empty($msg)){ ?>
      <div class="alert alert-info msg" role="alert">
        <p><?php echo $msg ?></p>
      </div>
<?php } ?>

    </section>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
