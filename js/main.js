/**
 * Sends the request to add a new user
*/
function addUser() {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed when the document is ready:
            var response = this.responseText;
            if(response != '0') {
                console.log('Proyecto Agregado');
            }
        }
    };

    var userObject = {
        userName : document.getElementById('userName').value,
        password : document.getElementById('password').value,
        name : document.getElementById('name').value,
        lastName_1 : document.getElementById('lastName_1').value,
        lastName_2 : document.getElementById('lastName_2').value,
        userGroups : ""
    };

    var validationMsg = validateUser(userObject);
    // Required fields validation
    if(validationMsg === "") {

        var requestPath = "../../server/registro-usuario.php?userName="+userObject.userName+"&password="+userObject.password+"&name="+userObject.name+"&lastName_1="+userObject.lastName_1+"&lastName_2="+userObject.lastName_2+"&userGroups="+userObject.userGroups;

        console.log(requestPath);

        xhttp.open("GET", requestPath, true);
        xhttp.send();
    } else {
        displayMessage(validationMsg, false);
    }
}

/**
 * Validates the user fields before sending the request
 * @param  {Object} pUserObject [The user object with the field values]
 * @return {String}             [The validation message with results]
 */
function validateUser(pUserObject) {

    var validationMsg = "";

    if (pUserObject.userName === "") {
        validationMsg += "El Nombre Usuario es requerido <br>";
    }
    if (pUserObject.password === "") {
        validationMsg += "La Contraseña es requerida <br>";
    }
    if (pUserObject.name === "") {
        validationMsg += "El Nombre es requerido <br>";
    }
    if (pUserObject.lastName_1 === "") {
        validationMsg += "El Primer Apellido es requerido <br>";
    }

    return validationMsg;
}

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
