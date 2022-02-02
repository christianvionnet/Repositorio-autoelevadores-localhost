const elementos = document.querySelectorAll(".myBtn");

elementos.forEach((elemento, index) => {
  elemento.onclick = function () {
    currentModal = modals[index];
    modals[index].style.display = "flex";
  };
});
