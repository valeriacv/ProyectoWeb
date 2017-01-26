/**
 * Sends the request to add a new user
*/
function addUser() {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed when the document is ready:
            var response = this.responseText;
            if (response === '-1') {
                displayMessage("El usuario ingresado no está disponible", true);
            } else if(response != '0') {
                displayMessage("Usuario Agregado exitosamente!", false);
            } else {
                displayMessage("Ha ocurrido un error agregando el usuario", true);
            }
        }
    };

    var userObject = {
        userName : document.getElementById('userName').value,
        password : document.getElementById('password').value,
        name : document.getElementById('name').value,
        lastName_1 : document.getElementById('lastName_1').value,
        lastName_2 : document.getElementById('lastName_2').value,
        userGroups : getSelectedGroups()
    };

    var validationMsg = validateUser(userObject);
    // Required fields validation
    if(validationMsg === "") {

        var requestPath = "../../PHP/registro-usuario.php?userName="+userObject.userName+"&password="+userObject.password+"&name="+userObject.name+"&lastName_1="+userObject.lastName_1+"&lastName_2="+userObject.lastName_2+"&userGroups="+userObject.userGroups;

        xhttp.open("GET", requestPath, true);
        xhttp.send();
    } else {
        displayMessage(validationMsg, true);
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

    if(pUserObject.userGroups === "") {
        validationMsg += "Seleccione al menos un grupo relacionado <br>";
    }

    return validationMsg;
}

/**
 * Gets a commma separated string with the selected groups
 * @return {String} [The result selected groups]
 */
function getSelectedGroups() {

    var selectedGroups = "";
    var inputs = document.getElementsByName('input_group');

    for (var inputIndex = 0; inputIndex < inputs.length; inputIndex++) {

        var currentInput = inputs[inputIndex];

        if (currentInput.checked) {
            selectedGroups += "(%userId%," + currentInput.value + "),";
        }
    }
    if (selectedGroups != "") selectedGroups = selectedGroups.slice(0, -1);
    return selectedGroups;
}

/**
 * Toogles the group selection
 * @return {[type]} [void]
 */
function toggleSelectedGroups() {

    var inputAllGroups = document.getElementById('cbxAllGroups');
    var inputs = document.getElementsByName('input_group');

    for (var inputIndex = 0; inputIndex < inputs.length; inputIndex++) {

        var currentInput = inputs[inputIndex];

        currentInput.checked = inputAllGroups.checked;
    }
}

/**
 * Handles the user login request
 * @return {[type]} [description]
 */
function login () {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed when the document is ready:
            var response = this.responseText;
            if (response == '-1') {
                displayMessage("El usuario y la contraseña no corresponden", true);
            } else {
                setUserGroups(response);
            }
        }
    };

    var userName = document.getElementById('userName').value
    var password = document.getElementById('password').value

    var requestPath = "../../PHP/login-usuario.php?userName="+userName+"&password="+password;

    xhttp.open("GET", requestPath, true);
    xhttp.send();

}

/**
 * Sets the groups on session
 * @param {[type]} pGroupsString [description]
 */
function setUserGroups(pGroupsString) {
    setCookie('userGroups', pGroupsString,1);
    window.location = './home.html';
}

/**
 * Verifies if logged used has the specified group
 * @return {Boolean} [description]
 */
function verifyUserSession() {
    var userGroups = getCookie('userGroups');
    if(!(userGroups && userGroups != "")) {
        window.location = './login.html';
    }
}

function hasGroup(pGroup) {

    var strUserGroups = getCookie('userGroups');

    if (strUserGroups === 'admin') {
        return true;
    } else {
        var userGroups = strUserGroups.split(',');

        for(var groupIndex = 0; groupIndex < userGroups.length; groupIndex++) {

            var currentGroup = userGroups[groupIndex];
            if(currentGroup === pGroup.toString()) {
                return true;
            }
        }
        return false;
    }
}

function logOut() {
    setCookie('userGroups', "",1);
    window.location = './login.html';
}
