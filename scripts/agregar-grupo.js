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