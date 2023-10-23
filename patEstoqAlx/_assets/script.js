function changeDiv() {
    var elemento1 = document.getElementById("center-1");
    var elemento2 = document.getElementById("center-2");
    if (elemento2) {
      elemento2.style.display = "block";
      elemento1.style.display = "none";
    }
}