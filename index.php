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
// ---------------------- VIEW ----------------------
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Bundesraten</title>

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
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Logout</a>
          </li>
        </ul>
      </div>
    </nav>

    <section class="content">
      <?php if (does_tipp_exist($user_id)): ?>
        <div class="alert alert-info msg" role="alert">
          Du hast deinen Tipp bereits abgegeben.
        </div>
      <?php else: ?>

        <h1>Tipp abgeben</h1>
        <p>Hinweis: Du kannst nur 1x deine Tipps abgeben. Wähle weise.</p>

        Folgende Bundesräte stehen zur Wahl:
        <ul>
          <li>Viola Amherd (bisher)</li>
          <li>Guy Parmelin (bisher)</li>
          <li>Simonetta Sommaruga (bisher)</li>
          <li>Ueli Maurer (bisher)</li>
          <li>Alain Berset (bisher)</li>
          <li>Ignazio Cassis (bisher)</li>
          <li>Karin Keller-Sutter (bisher)</li>
          <li>Regula Rytz (neu)</li>
        </ul>

        <form action="insertTipp.php" method="post" id="tipp">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="id_tipp1">Tipp #1: </label>
                <input type="text" name="tipp1" class="form-control" id="id_tipp1" required>
              </div>
              <div class="form-group">
                <label for="id_tipp2">Tipp #2: </label>
                <input type="text" name="tipp2" class="form-control" id="id_tipp2" required>
              </div>
              <div class="form-group">
                <label for="id_tipp3">Tipp #3: </label>
                <input type="text" name="tipp3" class="form-control" id="id_tipp3" required>
              </div>
              <div class="form-group">
                <label for="id_tipp4">Tipp #4: </label>
                <input type="text" name="tipp4" class="form-control" id="id_tipp4" required>
              </div>
              <div class="form-group">
                <label for="id_tipp5">Tipp #5: </label>
                <input type="text" name="tipp5" class="form-control" id="id_tipp5" required>
              </div>
              <div class="form-group">
                <label for="id_tipp6">Tipp #6: </label>
                <input type="text" name="tipp6" class="form-control" id="id_tipp6" required>
              </div>
              <div class="form-group">
                <label for="id_tipp7">Tipp #7: </label>
                <input type="text" name="tipp7" class="form-control" id="id_tipp7" required>
              </div>

            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="id_tipp1stimmen">Anzahl Stimmen für Tipp #1: </label>
                <input type="number" min="0" max="246" name="tipp1stimmen" class="form-control" id="id_tipp1stimmen" required>
              </div>
              <div class="form-group">
                <label for="id_tipp1stimmen">Anzahl Stimmen für Tipp #2: </label>
                <input type="number" min="0" max="246" name="tipp2stimmen" class="form-control" id="id_tipp2stimmen" required>
              </div>
              <div class="form-group">
                <label for="id_tipp1stimmen">Anzahl Stimmen für Tipp #3: </label>
                <input type="number" min="0" max="246" name="tipp3stimmen" class="form-control" id="id_tipp3stimmen" required>
              </div>
              <div class="form-group">
                <label for="id_tipp1stimmen">Anzahl Stimmen für Tipp #4: </label>
                <input type="number" min="0" max="246" name="tipp4stimmen" class="form-control" id="id_tipp4stimmen" required>
              </div>
              <div class="form-group">
                <label for="id_tipp1stimmen">Anzahl Stimmen für Tipp #5: </label>
                <input type="number" min="0" max="246" name="tipp5stimmen" class="form-control" id="id_tipp5stimmen" required>
              </div>
              <div class="form-group">
                <label for="id_tipp1stimmen">Anzahl Stimmen für Tipp #6: </label>
                <input type="number" min="0" max="246" name="tipp6stimmen" class="form-control" id="id_tipp6stimmen" required>
              </div>
              <div class="form-group">
                <label for="id_tipp1stimmen">Anzahl Stimmen für Tipp #7: </label>
                <input type="number" min="0" max="246" name="tipp7stimmen" class="form-control" id="id_tipp7stimmen" required>
              </div>
            </div>
          </div>
          
          <div id="show" class="alert alert-info msg" role="alert"></div>

          <button type="submit" name="tipp_submit" class="btn btn-primary" value="einloggen">Tipps verbindlich abgeben!</button>
        </form>

      <?php endif; ?>
    </section>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
