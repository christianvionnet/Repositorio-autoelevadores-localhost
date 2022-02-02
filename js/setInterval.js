window.setInterval(function () {
  //This will trigger every X miliseconds

  var date = new Date(); //Creates a date that is set to the actual date and time

  var hours = date.getHours(); //Get that date hours (from 0 to 23)
  console.log(hours);
  var minutes = date.getMinutes(); //Get that date minutes (from 0 to 59)

  if (hours == 10 && minutes == 50) {
    window.location.assign("http://localhost/avisos/activo.php");
  } else if ((hour = 10 && minutes == 51)) {
    window.location.assign("http://localhost/avisos/activo.php");
  } else if ((hour = 10 && minutes == 52)) {
    window.location.assign("http://localhost/avisos/activo.php");
  }
}, 1000); //In that case 1000 miliseconds equals to 1 second
