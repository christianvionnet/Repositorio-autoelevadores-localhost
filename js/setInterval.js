window.setInterval(function () {
  //This will trigger every X miliseconds

  var date = new Date(); //Creates a date that is set to the actual date and time

  var hours = date.getHours(); //Get that date hours (from 0 to 23)
  console.log(hours);
  var minutes = date.getMinutes(); //Get that date minutes (from 0 to 59)

  if (hours >= 10 && minutes >= 50 && hours <= 10 && minutes <= 59) {
    window.location.assign(
      "http://SSA1014.global.scd.scania.com/avisos/activo.php"
    );
  } else if (hours >= 11 && minutes >= 00 && hours <= 11 && minutes <= 09) {
    window.location.assign(
      "http://SSA1014.global.scd.scania.com/avisos/activo.php"
    );
  } else if (hours >= 11 && minutes >= 10 && hours <= 11 && minutes <= 19) {
    window.location.assign(
      "http://SSA1014.global.scd.scania.com/avisos/activo.php"
    );
  }
}, 1000); //In that case 1000 miliseconds equals to 1 second
