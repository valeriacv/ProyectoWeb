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
