<!DOCTYPE html>
<html>
<head>
    <title>Regritro Usuario</title>
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <meta charset="utf-8">
</head>
<body onload="verifyUserSession()">
    <header class="nombreOrg">
        <h1>Aldeas Infantiles SOS</h1>
    </header>
    <nav class="navBar">
        <ul class="navUl">
            <li><a href="./home.php">Home</a></li>
            <li><a href="./quienesSomos.html">Quienes somos</a></li>
            <li><a href="./nuestroTrabajo.html">Nuestro trabajo</a></li>
            <li><a href="./trabajeConNosotros.html">Trabaje con nosotros</a></li>
            <li><a href="./actividades.php">Actividades</a></li>
            <li><a onclick="logOut()">Salir</a></li>
        </ul>
    </nav>
    <main>
        <h2 class="tituloPagina">Registro Usuario</h2>
        <div id="messageContainer" class="display-message">
            <p id="message"></p>
            <span class="remove-message" onclick="removeMessage();">x</span>
        </div>
        <form>
            <div class="inputContainer">
                <span class="label">Nombre de Usuario: </span>
                <input id="userName" type="text" name="userName">
            </div>
            <div class="inputContainer">
                <span class="label">Contraseña: </span>
                <input id="password" type="password" name="password">
            </div>
            <div class="inputContainer">
                <span class="label">Nombre: </span>
                <input id="name" type="text" name="name">
            </div>
            <div class="inputContainer">
                <span class="label">Primer Apellido: </span>
                <input id="lastName_1" type="text" name="lastName_1">
            </div>
            <div class="inputContainer">
                <span class="label">Segundo Apellido: </span>
                <input id="lastName_2" type="text" name="lastName_2">
            </div>
            <div class="inputContainer">
                <span class="label">Grupos Asociados: </span></br>

                <?php
                    include("./../../PHP/conexion.php");
                    $sql = "SELECT nombre, descripcion, id FROM GruposTrabajo";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $nombre = $row["nombre"];
                            $descripcion = $row["descripcion"];
                            $id = $row["id"];
                            echo "
                                <input type='checkbox' name='input_group' value='$id'><span>$nombre</span></br>
                            ";
                        }
                    } else {
                        echo "No hay grupos";
                    }
                ?>
                <input id="cbxAllGroups" type='checkbox' name='input_group_all' value='-1' onchange="toggleSelectedGroups()"><span>Todos los grupos</span></br>
            </div>
            <section class="sectionBtn">
                <div class="btnAgregar" onclick="addUser();">Agregar</div>
            </section>
        </section>
    </form>
    <footer class="footer">
        <a href="" class="footerLink primerLink">link 1</a>
        <a href="" class="footerLink">link 2</a>
        <a href="" class="footerLink ultimoLink">link 3</a>
        <div>
            <span class="spanCurso">Introduccion al desarrollo de aplicaciones Web</span>
            <span class="spanEstudiantes">Valeria Calderón ~ Luis Carlos Cruz ~ Lucia Zamora</span>
        </div>
    </footer>
    <script type="text/javascript" src="../../js/main.js"></script>
</body>
</html>
