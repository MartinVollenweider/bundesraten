<?php
// ------------------- CONTROLLER -------------------
session_start();

if(isset($_SESSION['userid'])) {
  unset($_SESSION['userid']);
  session_destroy();
}

$logged_in = false;
$log_in_out_text = "Anmelden";

// ---------------------- VIEW ----------------------
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Registrierung</title>

  <!-- Bootstrap Verlinkung -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/control.css">
  <script src="js/control.js"></script>
</head>
<body>
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
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="register.php">Registrieren</a>
          </li>
        </ul>
      </div>
    </nav>

    <section class="content">
      <h1>Registrieren</h1>
      <p>Bitte registriere dich, um einen Tipp abzugeben.</p>

      <form action="insertUser.php" method="post" id="register">
        <div class="form-group">
          <label for="id_email">Email: </label>
          <input type="email" name="email" class="form-control" id="id_email">
        </div>
        <!-- Passwort und Passwortbestätigung müssen jedesmal neu eingegeben werden -->
        <div class="form-group">
          <label for="id_password">Passwort: </label>
          <input type="password" name="password" class="form-control" id="id_password">
        </div>
        <div class="form-group">
          <label for="id_password_confirm">Passwortbestätigung: </label>
          <input type="password" name="password_confirm" class="form-control" id="id_password_confirm">
        </div>
        <div class="form-group">
          <label for="id_firstname">Vorname: </label>
          <input type="text" name="firstname" class="form-control" id="id_firstname">
        <div class="form-group">
          <label for="id_lastname">Nachname: </label>
          <input type="text" name="lastname" class="form-control" id="id_lastname">
        </div>
        <div class="form-group">
          <label for="id_year">Studienjahrgang: </label>
              <select class="form-control" id="id_year" name="year">
                <option>mmp17</option>
                <option>mmp18</option>
                <option>mmp19</option>
              </select>
        </div>
        <div class="form-group">
          <label for="id_class">Klasse: </label>
              <select class="form-control" id="id_class" name="class">
                <option>c1</option>
                <option>c2</option>
                <option>b</option>
              </select>
        </div>

        <div id="show" class="alert alert-info msg" role="alert">
        </div>

        <button type="submit" name="register_submit" class="btn btn-primary" value="einloggen">Registrieren</button>
      </form>

    </section>
  </div>

</body>
</html>
