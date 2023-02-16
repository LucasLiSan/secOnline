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
