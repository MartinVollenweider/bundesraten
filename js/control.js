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

  var tipped = document.querySelector('#tipped');
  if (tipped) {
    showTippFunc()
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

// Einen Tipp holen
function showTippFunc() {
  // In DB speichern
  var url = 'getTipp.php';

  // Fetch: Sende die Daten per AJAX an den Server
  fetch(url, {
    method: 'GET'
  }).then(function (response) {
      console.log(response);

      return response.text()
    })
    .then(function (data) {
      /*  Erhalte als Antwort alle Objekte
          und ersetze das aktuelle HTML mit dem neuen vom Server */
      let tipp = JSON.parse(data)

      document.querySelector('#tipp1').innerHTML = tipp.tipp1;
      document.querySelector('#tipp1stimmen').innerHTML = tipp.tipp1stimmen;
      document.querySelector('#tipp2').innerHTML = tipp.tipp2;
      document.querySelector('#tipp2stimmen').innerHTML = tipp.tipp2stimmen;
      document.querySelector('#tipp3').innerHTML = tipp.tipp3;
      document.querySelector('#tipp3stimmen').innerHTML = tipp.tipp3stimmen;
      document.querySelector('#tipp4').innerHTML = tipp.tipp4;
      document.querySelector('#tipp4stimmen').innerHTML = tipp.tipp4stimmen;
      document.querySelector('#tipp5').innerHTML = tipp.tipp5;
      document.querySelector('#tipp5stimmen').innerHTML = tipp.tipp5stimmen;
      document.querySelector('#tipp6').innerHTML = tipp.tipp6;
      document.querySelector('#tipp6stimmen').innerHTML = tipp.tipp6stimmen;
      document.querySelector('#tipp7').innerHTML = tipp.tipp7;
      document.querySelector('#tipp7stimmen').innerHTML = tipp.tipp7stimmen;

    })
    .catch(function (error) {
      console.log('Request failed', error);
    }) // Ende fetch
}  // Ende insertFunc
