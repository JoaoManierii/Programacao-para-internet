window.onload = function () {
    buttons = document.querySelectorAll("nav button");
    for (let button of buttons) {
        button.onclick = () => openTab(button.dataset.tabname);
    }
    openTab("BCC");
}

function openTab(tabName) {
    const lastTabActive = document.querySelector(".tabActive");
    if (lastTabActive !== null)
    lastTabActive.className = "";

    const query1 = ".tabs > section[data-tabname = '" + tabName + "']"; 
    const query2 = "nav button[data-tabname='" + tabName + "']";

    document.querySelector(query1).className="tabActive";
    document.querySelector(query2).className="buttonActive";
}