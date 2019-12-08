<?php
// ------------------- CONTROLLER -------------------
session_start();
require_once('system/data.php');

if(isset($_SESSION['userid']) && time() < strtotime('2019-12-11 08:00')){
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
      <?php if (does_tipp_exist($user_id)) { ?>
        <div class="alert alert-info msg" role="alert">
          Du hast deinen Tipp bereits abgegeben.
        </div>
        <div id="tipped">
          <h1>Dein Tipp</h1>
          <ul>
            <li>Tipp 1: <b><span id="tipp1"></span></b> mit <span id="tipp1stimmen"></span> Stimmen</li>
            <li>Tipp 2: <b><span id="tipp2"></span></b> mit <span id="tipp2stimmen"></span> Stimmen</li>
            <li>Tipp 3: <b><span id="tipp3"></span></b> mit <span id="tipp3stimmen"></span> Stimmen</li>
            <li>Tipp 4: <b><span id="tipp4"></span></b> mit <span id="tipp4stimmen"></span> Stimmen</li>
            <li>Tipp 5: <b><span id="tipp5"></span></b> mit <span id="tipp5stimmen"></span> Stimmen</li>
            <li>Tipp 6: <b><span id="tipp6"></span></b> mit <span id="tipp6stimmen"></span> Stimmen</li>
            <li>Tipp 7: <b><span id="tipp7"></span></b> mit <span id="tipp7stimmen"></span> Stimmen</li>
          </ul>
        </div>

      <?php } else { ?>
<<<<<<< HEAD
<<<<<<< HEAD

        <!-- START Exposition Bundesräte -->
=======
>>>>>>> 24a71152e4b55c9bd9e276c0cc0b05078b49a8f6
=======
>>>>>>> 24a71152e4b55c9bd9e276c0cc0b05078b49a8f6

        <h1>Tipp abgeben</h1>

        <p class="mb-3"> Folgende Kandidatinnen und Kandidaten stehen zur Wahl: </p>

        <div class="container">
          <div class="row mb-5">
            <div class="col-sm-3">

              <div class="card">
                <img src="img/amherd.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Viola Amherd</h5>
                  <p>Bundesrätin seit 2011, CVP</p>
                </div>
              </div>

            </div>
            <div class="col-sm-3">

              <div class="card">
                <img src="img/parmelin.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Guy Parmelin</h5>
                  <p>Bundesrat seit 2015, SVP</p>
                </div>
              </div>

            </div>
            <div class="col-sm-3">

              <div class="card">
                <img src="img/sommaruga.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Simonetta Sommaruga</h5>
                  <p>Bundesrätin seit 2010, SP</p>
                </div>
              </div>

            </div>

            <div class="col-sm-3">

              <div class="card">
                <img src="img/maurer.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Ueli Maurer</h5>
                  <p>Bundesrat seit 2009, SVP</p>
                </div>
              </div>

            </div>

          </div>


          <div class="row mb-5">
            <div class="col-sm-3">

              <div class="card">
                <img src="img/berset.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Alain Berset</h5>
                  <p>Bundesrat seit 2011, SP</p>
                </div>
              </div>

            </div>
            <div class="col-sm-3">

              <div class="card">
                <img src="img/cassis.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Ignazio Cassis</h5>
                  <p>Bundesrat seit 2017, FDP</p>
                </div>
              </div>

            </div>
            <div class="col-sm-3">

              <div class="card">
                <img src="img/kellersutter.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Karin Keller-Sutter</h5>
                  <p>Bundesrätin seit 2018, FDP</p>
                </div>
              </div>

            </div>

            <div class="col-sm-3">

              <div class="card">
                <img src="img/rytz.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Regula Rytz</h5>
                  <p>Nationalrätin und Präsidentin der Grünen</p>
                </div>
              </div>

            </div>

          </div>

        </div>

        <!-- ENDE Exposition Bundesräte -->


        <!-- START Gameinfo -->

        <div class="row">
          <div class="col-md-6">
            <div class="form-group mb-5">

              <div id="" class="alert alert-info msg" role="alert"> Trage hier deine Tipps ein. Es können ebenfalls Personen gewählt werden, die nicht kandidieren. </div>

            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group mb-5">

              <div id="" class="alert alert-info msg" role="alert"> Jede Person kann mit 0-246 Stimmen der National- und Ständeräte gewählt werden. </div>

            </div>
          </div>

        </div>

        <!-- ENDE Gameinfo -->

        <!-- START Tippformular -->

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

                  <div id="" class="alert alert-danger msg" role="alert">   <p>Du kannst nur <strong>1x</strong> deine Tipps abgeben. Wähle weise.</p></div>

                  <div id="show" class="alert alert-info msg" role="alert"></div>

                  <button type="submit" name="tipp_submit" class="btn btn-primary mb-5" value="einloggen">Tipps verbindlich abgeben!</button>
                </form>


          <!-- ENDE Tippformular -->

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        <?php endif; ?>
      </section>
    </div>
=======
=======
>>>>>>> 24a71152e4b55c9bd9e276c0cc0b05078b49a8f6
=======
>>>>>>> 24a71152e4b55c9bd9e276c0cc0b05078b49a8f6
      <?php }; ?>
    </section>
  </div>
>>>>>>> 24a71152e4b55c9bd9e276c0cc0b05078b49a8f6

  </body>
  </html>
