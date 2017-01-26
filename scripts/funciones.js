function displayContAgregarGrupo(){
    var display = document.getElementById("contAgregarGrupo").style.display;
    var btnText = document.getElementById("btnDisplayAgregarGrupo").firstChild;
    if(display == 'none'){
        document.getElementById("contAgregarGrupo").style.display = 'inline';
        btnText.data = "Cancelar";
    }
    else{
        document.getElementById("contAgregarGrupo").style.display = 'none';
        btnText.data = "Agregar Curso";
    }

}

var objCount = 0;
function agregarObjetivoInput(){
    var objContainer = document.getElementById('objetivosContainer');
    var inputCont = document.createElement("DIV");
    var inputText = document.createElement("INPUT");
    inputText.type = 'text';
    inputText.name = 'objetivo_' + objCount;

    // Crear Button
    var button = document.createElement('BUTTON');
    button.innerHTML = "X";
    button.className = 'btnPlus';
    button.addEventListener("click", removerObjetivo, false);
    inputCont.appendChild(inputText);
    inputCont.appendChild(button);
    objContainer.appendChild(inputCont);
    objCount++;
}

function removerObjetivo(pEvent) {
    var element = pEvent.currentTarget;
    var node = element.parentNode;
    var list = node.parentNode;
    list.removeChild(node);
}

function agregarObjetivoGT(){
    var objContainer = document.getElementById('listaObj');
    var inputCont = document.createElement("DIV");
    var inputText = document.createElement("INPUT");
    inputText.type = 'text';
    inputText.name = 'objetivo_' + objCount;
    inputText.className = 'objInput';

    // Crear Button
    var button = document.createElement('BUTTON');
    button.innerHTML = "X";
    button.className = 'btnPlus';
    button.addEventListener("click", removerObjetivo, false);
    inputCont.appendChild(inputText);
    inputCont.appendChild(button);
    objContainer.appendChild(inputCont);
    objCount++;
}

/**
 * Removes the message on the message container
 * @return {[type]} [void]
 */
function removeMessage() {

    // Hide the message container
    var messageContainer = document.getElementById('messageContainer');
    messageContainer.className = 'display-message';

    // Remove the message Text
    var message = document.getElementById('message');
    message.innerHTML = "";
}

/**
 * Displays a message on the container
 * @param  {String} pMessage [The message to be displayed]
 * @param  {Bool} pIsError [Bool value to know if error or not]
 * @return {[type]}          [void]
 */
function displayMessage(pMessage, pIsError) {

    // Set the container class
    var messageContainer = document.getElementById('messageContainer');
    var containerClass = (pIsError) ? 'error' : 'success';
    messageContainer.className = 'display-message ' + containerClass;

    // Set the error message
    var message = document.getElementById('message');
    message.innerHTML = pMessage;
}
