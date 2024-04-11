document.getElementById("desplegableBtn").onclick = function() {mostrarOcultarMenu()};

function mostrarOcultarMenu() {
  var menu = document.getElementById("menuDesplegable");
  if (menu.style.display === "block") {
    menu.style.display = "none";
  } else {
    menu.style.display = "block";
  }
}

window.onclick = function(event) {
  if (!event.target.matches('#desplegableBtn')) {
    var desplegables = document.getElementsByClassName("menu-desplegable");
    var i;
    for (i = 0; i < desplegables.length; i++) {
      var abiertoDesplegable = desplegables[i];
      if (abiertoDesplegable.style.display === "block") {
        abiertoDesplegable.style.display = "none";
      }
    }
  }
}
