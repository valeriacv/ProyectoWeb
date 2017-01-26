/*

        funciones de nuestroTrabajo.php

 */
function displayContAgregarGrupo(){
    var display = document.getElementById("contAgregarGrupo").style.display;
    var btnText = document.getElementById("btnDisplayAgregarGrupo").firstChild;
    if(display == 'none'){
        document.getElementById("contAgregarGrupo").style.display = 'inline';
        btnText.data = "Cancelar";
    }
    else{
        document.getElementById("contAgregarGrupo").style.display = 'none';
        btnText.data = "Agregar Grupo";
    }

}

function agregarGrupoTrabajo(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed when the document is ready:
            // document.getElementById("demo").innerHTML = xhttp.responseText;
            if(xhttp.responseText != 0){
                document.getElementById("divResultadoAgregarGT").style.display = 'inline';
                document.getElementById("spanResultadoAgregarGT").textContent = 'Grupo de trabajo agregado con exito';
                document.getElementById("spanResultadoAgregarGT").style.color = "#3E3A4B";
                document.getElementById("contAgregarGrupo").style.display = 'none';
                document.getElementById("nombre").value = '';
                document.getElementById("descripcion").value = '';
                var btnText = document.getElementById("btnDisplayAgregarGrupo").firstChild;
                btnText.data = "Agregar Grupo";
            }
            else{
                document.getElementById("spanResultadoAgregarGT").textContent = 'Error, no se pudo agregar el grupo';
                document.getElementById("spanResultadoAgregarGT").style.color = "red";
            }
        }
    };
    var nombreGrupo = (document.getElementById("nombre").value).split(' ').join('+');
    var descripcionGrupo = (document.getElementById("descripcion").value).split(' ').join('+');
    xhttp.open("GET", "./../../PHP/agregarGrupo.php?nombre=" + nombreGrupo + "&descripcion=" + descripcionGrupo, true);
    xhttp.send();
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

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function deleteCookie( name ) {
  document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}
