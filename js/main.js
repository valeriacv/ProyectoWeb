function displayContAgregarActividad() {
    var display = document.getElementById("contAgregarActividad").style.display;
    var btnText = document.getElementById("btnDisplayAgregarActividad").firstChild;
    if(display == 'none'){
        document.getElementById("contAgregarActividad").style.display = 'inline';
        btnText.data = "Cancelar";
    }
    else{
        document.getElementById("contAgregarActividad").style.display = 'none';
        btnText.data = "Agregar Actividad";
    }
}

function agregarActividad(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed when the document is ready:
            // document.getElementById("demo").innerHTML = xhttp.responseText;
            if(xhttp.responseText != '0'){
                document.getElementById("contAgregarActividad").style.display = 'none';
                document.getElementById("nombre").value = '';
                document.getElementById("fecha").value = '';
                document.getElementById("hora").value = '';
                document.getElementById("descripcion").value = '';
                document.getElementById("lugar").value = '';
                document.getElementById("grupo").value = '-';
                var btnText = document.getElementById("btnDisplayAgregarActividad").firstChild;
                btnText.data = "Agregar Actividad";
            }
        }
    };

    var actividadObject = {
        nombre : (document.getElementById("nombre").value).split(' ').join('+'),
        fecha : (document.getElementById("fecha").value),
        hora : (document.getElementById("hora").value),
        descripcion : (document.getElementById("descripcion").value).split(' ').join('+'),
        lugar: (document.getElementById("lugar").value).split(' ').join('+'),
        grupo: document.getElementById("grupo").value,
    };

    console.log(actividadObject);

    var validationMsg = validateActivity(actividadObject);

    if(validationMsg === "") {
        var requestPath = "./../../PHP/agregarActividad.php?nombre="+actividadObject.nombre+"&fecha="+actividadObject.fecha+"&hora="+actividadObject.hora+"&lugar="+actividadObject.lugar+"&descripcion="+actividadObject.descripcion+"&grupo="+actividadObject.grupo;

        console.log(requestPath);

        validationMsg = "Actividad agregada con exito";
        displayMessage(validationMsg, false);

        xhttp.open("GET", requestPath, true);
        xhttp.send();
    } else {
        displayMessage(validationMsg, true);
    }
}


function validateActivity(pActividadObject) {

    var validationMsg = "";

    if (pActividadObject.nombre === "") {
        validationMsg += "El nombre es requerido <br>";
    }
    if (pActividadObject.fecha === "") {
        validationMsg += "La fecha es requerida <br>";
    }
    if (pActividadObject.hora === "") {
        validationMsg += "La hora es requerida <br>";
    }
    if (pActividadObject.descripcion === "") {
        validationMsg += "La descripción es requerida <br>";
    }
    if (pActividadObject.lugar === "") {
        validationMsg += "El lugar es requerido <br>";
    }
    if (pActividadObject.grupo === "-") {
        validationMsg += "El grupo es requerido <br>";
    }
    return validationMsg;
}
/*
    Despliega el div que contiene los inputs para crear un nuevo grupo
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
            if(xhttp.responseText != '0'){
                document.getElementById("contAgregarGrupo").style.display = 'none';
                document.getElementById("nombre").value = '';
                document.getElementById("descripcion").value = '';
                var btnText = document.getElementById("btnDisplayAgregarGrupo").firstChild;
                btnText.data = "Agregar Grupo";
            }
        }
    };

    var groupObject = {
        nombreGrupo : (document.getElementById("nombre").value).split(' ').join('+'),
        descripcionGrupo : (document.getElementById("descripcion").value).split(' ').join('+')
    };

    var validationMsg = validateGroup(groupObject);

    if(validationMsg === "") {
        var requestPath = "./../../PHP/agregarGrupo.php?nombre="+groupObject.nombreGrupo+"&descripcion="+groupObject.descripcionGrupo;

        console.log(requestPath);

        validationMsg = "Grupo agregado con exito";
        displayMessage(validationMsg, false);

        xhttp.open("GET", requestPath, true);
        xhttp.send();
    } else {
        displayMessage(validationMsg, true);
    }
}


function validateGroup(pGroupObject) {

    var validationMsg = "";

    if (pGroupObject.nombreGrupo === "") {
        validationMsg += "El nombre de grupo es requerido <br>";
    }
    if (pGroupObject.descripcionGrupo === "") {
        validationMsg += "La descripción es requerida <br>";
    }
    return validationMsg;
}
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
