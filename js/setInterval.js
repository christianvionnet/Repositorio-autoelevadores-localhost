window.setInterval(function () {
  //This will trigger every X miliseconds

  var date = new Date(); //Creates a date that is set to the actual date and time

  var hours = date.getHours(); //Get that date hours (from 0 to 23)
  console.log(hours);
  var minutes = date.getMinutes(); //Get that date minutes (from 0 to 59)

  if (hours >= 7 && minutes >= 00 && hours <= 14 && minutes <= 59) {
    window.location.assign(
      "http://SSA1014.global.scd.scania.com/avisos/activo.php"
    );
  } else if (hours >= 15 && minutes >= 00 && hours <= 22 && minutes <= 59) {
    window.location.assign(
      "http://SSA1014.global.scd.scania.com/avisos/activo.php"
    );
  } else if (hours >= 23 && minutes >= 00 && hours <= 6 && minutes <= 59) {
    window.location.assign(
      "http://SSA1014.global.scd.scania.com/avisos/activo.php"
    );
  }
}, 5000); //In that case 1000 miliseconds equals to 1 second
