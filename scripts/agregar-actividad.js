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