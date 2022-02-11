const startButton = document.querySelector("button");

//Defino la funcion getData para leer la base de datos con la API
async function getData(url = "", data = {}) {
  const response = await fetch(url, {
    method: "GET",
    mode: "cors",
    cache: "no-cache",
    credentials: "same-origin",
    headers: {
      "Content-Type": "application/json",
    },
    redirect: "follow",
    referrerPolicy: "no-referrer",
  });
  return response.json();
}

//Defino que es lo que ejecutaré bien se cargue la página
//Pregunto primero si es que tengo parámetros enviados en la URL

getData("http://10.251.225.107/Autoelevadores/Autoelevadores/get").then(
  (data) => {
    let mensaje = data.Message;
    console.log(mensaje);
  },
  (error) => {
    console.log("No hay nada");
  }
);

startButton.addEventListener("click", () => {
  window.setInterval(function () {
    //This will trigger every X miliseconds

    console.log("hola");

    var date = new Date(); //Creates a date that is set to the actual date and time

    var hours = date.getHours(); //Get that date hours (from 0 to 23)
    console.log(hours);
    var minutes = date.getMinutes(); //Get that date minutes (from 0 to 59)

    if (hours >= 10 && minutes >= 50 && hours <= 10 && minutes <= 59) {
      getData("http://10.251.225.107/Autoelevadores/Autoelevadores/get").then(
        (data) => {
          let mensaje = data.Message;
          if (mensaje == 1) {
            window.location.assign(
              "http://SSA1014.global.scd.scania.com/avisos/activo.php"
            );
          } else {
            window.location.assign(
              "http://SSA1014.global.scd.scania.com/avisos/mpofinalizado.html"
            );
          }
        },
        (error) => {
          console.log("No hay nada");
        }
      );
    } else if (hours >= 11 && minutes >= 00 && hours <= 11 && minutes <= 09) {
      getData("http://10.251.225.107/Autoelevadores/Autoelevadores/get").then(
        (data) => {
          let mensaje = data.Message;
          if (mensaje == 1) {
            window.location.assign(
              "http://SSA1014.global.scd.scania.com/avisos/activo.php"
            );
          } else {
            window.location.assign(
              "http://SSA1014.global.scd.scania.com/avisos/mpofinalizado.html"
            );
          }
        },
        (error) => {
          console.log("No hay nada");
        }
      );
    } else if (hours >= 12 && minutes >= 00 && hours <= 12 && minutes <= 09) {
      getData("http://10.251.225.107/Autoelevadores/Autoelevadores/get").then(
        (data) => {
          let mensaje = data.Message;
          if (mensaje == 1) {
            window.location.assign(
              "http://SSA1014.global.scd.scania.com/avisos/activo.php"
            );
          } else {
            window.location.assign(
              "http://SSA1014.global.scd.scania.com/avisos/mpofinalizado.html"
            );
          }
        },
        (error) => {
          console.log("No hay nada");
        }
      );
    }
  }, 1000); //In that case 1000 miliseconds equals to 1 second
});
