// Wenn das Dokument geladen wurde, führe loadFunc() aus
document.addEventListener('DOMContentLoaded', loadFunc);
/*  Benötigt um herauszufinden, ob man nach Doppelclick auf Bildschirm
    klickt um die Handlers wieder zu zeigen */
var doppelclick = false;

// Lade und zeige alle Objekte
function loadFunc() {
  // Das Registrationsformular
  var register = document.querySelector('#register');
  if (register) {
    register.addEventListener('submit', insertUserFunc);
  }

  var tipp = document.querySelector('#tipp');
  if (tipp) {
    tipp.addEventListener('submit', insertTippFunc);
  }
} // Ende loadFunc

// Einen neuen User einfügen
function insertUserFunc(ereignis) {
  ereignis.preventDefault();

  // In DB speichern
  var url = 'insertUser.php';

  var form = document.querySelector('#register');
  // Daten aus dem Formular auslesen
  var data = new FormData(form);

  // Fetch: Sende die Daten per AJAX an den Server
  fetch(url, {
    method: 'POST',
    body: data
  })
    .then(function (response) {
      return response.text()
    })
    .then(function (data) {
      /*  Erhalte als Antwort alle Objekte
          und ersetze das aktuelle HTML mit dem neuen vom Server */

      console.log(data);
      document.querySelector('#show').innerHTML = data;
      document.querySelector('#show').style.visibility = 'visible';
    })
    .catch(function (error) {
      console.log('Request failed', error);
    }) // Ende fetch
}  // Ende insertFunc

// Einen neuen Tipp einfügen
function insertTippFunc(ereignis) {
  ereignis.preventDefault();

  // In DB speichern
  var url = 'insertTipp.php';

  var form = document.querySelector('#tipp');
  // Daten aus dem Formular auslesen
  var data = new FormData(form);

  // Fetch: Sende die Daten per AJAX an den Server
  fetch(url, {
    method: 'POST',
    body: data
  }).then(function (response) {
      return response.text()
    })
    .then(function (data) {
      /*  Erhalte als Antwort alle Objekte
          und ersetze das aktuelle HTML mit dem neuen vom Server */
      document.querySelector('#show').innerHTML = data;
      document.querySelector('#show').style.visibility = 'visible';
    })
    .catch(function (error) {
      console.log('Request failed', error);
    }) // Ende fetch
}  // Ende insertFunc
