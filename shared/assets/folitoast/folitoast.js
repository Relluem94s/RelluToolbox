function foliWarn(message){
    displayElement(message, "foliwarn");
}

function foliInfo(message){
    displayElement(message, "foliInfo");
}

function foliError(message){
    displayElement(message, "foliError");
}

function foliSuccess(message){
    displayElement(message, "foliSuccess");
}



function createElement(message){
    const elem = document.createElement("div");
    elem.innerText = message;

    return elem;
}

function append(elem){
    document.body.appendChild(elem);
}


function hideElement(){
    let element = document.getElementById("folitoast");
    if(element){
        element.remove();
    }
}


const escapeHtml = (unsafe) => {
    return unsafe.replaceAll('&', '&amp;').replaceAll('<', '&lt;').replaceAll('>', '&gt;').replaceAll('"', '&quot;').replaceAll("'", '&#039;');
}


function displayElement(message, type){
    hideElement();
    let elem = createElement(escapeHtml(message));
    elem.classList.add(type);
    elem.id ="folitoast";
    append(elem);

    setTimeout(hideElement, 7000);
}

