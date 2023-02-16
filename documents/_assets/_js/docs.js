/*Work in progress*/
var buttons = document.querySelectorAll('[role="tab"]');
var tabPanel = Array.from(document.querySelectorAll('[role="tabpanel"]'));
function hideTabContent(e) {
    tabPanel.forEach(function (panels) {
        panels.hidden = true;
    });
    buttons.forEach(function (tab) {
        tab.setAttribute("aria-selected", false);
    });
    e.currentTarget.setAttribute("aria-selected", true);
    var id = event.currentTarget.id;
    var tabPanels = tabPanel.find(function (tabContent) { return tabContent.getAttribute("aria-labelledby") === id; });
    tabPanels.hidden = false;
}
buttons.forEach(function (button) { return button.addEventListener("click", hideTabContent); });

// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementsByClassName('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

var showModal = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

for (var i = 0; i < img.length; i++) {
    img[i].addEventListener('click', showModal);
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
