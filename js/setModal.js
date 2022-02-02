// Obtengo todos los modales de cada página
const modals = document.querySelectorAll(".modal");

// Obtengo todos los botones de apertura de cada modal
const buttons = document.querySelectorAll(".myBtn");

// Obtengo todos los botones de cierre en cada modal
const spans = document.querySelectorAll(".close");

// Declaro el modal actual para poder cerrarlo al final con la tecla Esc
let currentModal;

// Recorro cada boton de apertura de modal y asi poder abrir cualquiera
buttons.forEach((button, index) => {
  button.onclick = function () {
    currentModal = modals[index];
    modals[index].style.display = "flex";
  };
});

// Recorro cada boton de cierre de modal y asi poder abrir cualquiera
spans.forEach((span, index) => {
  span.onclick = function () {
    modals[index].style.display = "none";
  };
});

// Con la tecla Esc cierro tambien los modales
window.addEventListener("keydown", function (event) {
  if (event.keyCode == 27) {
    console.log("Se presionó Esc");
    currentModal.style.display = "none";
  }
});

const modal1 = document.querySelector(".modal-1");

const modal2 = document.querySelector(".modal-2");
modal2.style.display = "none";

const imageButton = document.querySelector(".image-button");
imageButton.addEventListener("click", () => {
  // modal1.style.display = "none";
  // modal2.style.display = "inherit";
  if (imageButton.innerText == "Siguiente") {
    console.log(imageButton.innerText);
    modal1.style.display = "none";
    modal2.style.display = "inherit";
    imageButton.textContent = "Atrás";
  } else if (imageButton.innerText == "Atrás") {
    console.log(imageButton.innerText);
    modal1.style.display = "inherit";
    modal2.style.display = "none";
    imageButton.textContent = "Siguiente";
  }
});

// const close = document
//   .querySelector("#botonResetCountdown")
//   .addEventListener("click", function () {
//     //alert("¡LISTO!");
//     currentModal.style.display = "none";
//   });

// const resetButton = document.querySelector("#cuenta");
// resetButton.style.fontSize = "1.7vw";
