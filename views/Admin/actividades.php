<!DOCTYPE html>
<html>
<head>
    <title>Actividades</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body>
    <header class="nombreOrg">
        <h1>Aldeas Infantiles SOS</h1>
    </header>
    <nav class="navBar">
        <ul class="navUl">
            <li><a href="./home.html">Home</a></li>
            <li><a href="./quienesSomos.html">Quienes somos</a></li>
            <li><a href="./nuestroTrabajo.php">Nuestro trabajo</a></li>
            <li><a href="./trabajeConNosotros.html">Trabaje con nosotros</a></li>
            <li class="currentLink"><a href="./actividades.php">Actividades</a></li>
        </ul>
    </nav>
    <main>
        <h2 class="tituloPagina">Actividades</h2>
        <aside class="menuGrupos">
            <h3 class="asideTitulo">Organizacion</h3>
            <?php
                include("./../../PHP/conexion.php");
                $sql = "SELECT id, nombre FROM GruposTrabajo";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<ul class='listaGruposTrabajo'>";
                    while($row = $result->fetch_assoc()) {
                        $id = $row["id"];
                        $nombre = $row["nombre"];
                        echo "<li><a href='./grupoDeTrabajo.php?id=$id'>$nombre</a></li>";
                    }
                    echo "</ul>";
                } else {
                    echo "No hay grupos";
                }
            ?> 
        </aside>
        <section class="sectionOrganizacion">
            <?php
                include("./../../PHP/conexion.php");
                $sql = "SELECT act.nombre as nombreAct, act.fecha, act.lugar, act.descripcion, gt.nombre as nombreGrupo
                        FROM Actividades act
                        INNER JOIN GruposTrabajo gt ON act.GruposTrabajo_id = gt.id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo " <table class='tablaGT' cellpadding='20' cellspacing='0'>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Fecha</th>
                                    <th>Lugar</th>
                                    <th>Descripción</th>
                                    <th>Grupo</th>
                                </tr>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $nombre = $row["nombreAct"];
                        $fecha = $row["fecha"];
                        $lugar = $row["lugar"];
                        $descripcion = $row["descripcion"];
                        $nombreGrupo = $row["nombreGrupo"];
                        echo "  <tr>
                                    <td>$nombre</td>
                                    <td>$fecha</td>
                                    <td>$lugar</td>
                                    <td>$descripcion</td>
                                    <td>$nombreGrupo</td>
                                </tr>";
                    }
                    echo "</table>";
                }else {
                    echo "No hay Actividades";
                }
            ?> 
        </section>
        <section class="sectionAgregarGrupo">
            <button id="btnDisplayAgregarActividad" class="btnAgregar" onclick="displayContAgregarActividad()">
                Agregar Actividad
            </button>
        </section>
        <div id="contAgregarActividad" class="containerAgregar" style="display: none;">
            <h3 class="titulos">Agregar Actividad</h3>
            <form method="post" action="../../PHP/agregarActividad.php" enctype="multipart/form-data">
                <div class="inputContainer">
                    <span class="label"> Nombre:</span>
                    <input id="nombre" name="nombre" type="text">
                </div>
                <div class="inputContainer">
                    <span class="label"> Fecha:</span>
                    <input id="fecha" name="fecha" type="date">
                </div>
                 <div class="inputContainer">
                    <span class="label"> Hora:</span>
                    <input id="hora" name="hora" type="time">
                </div>
                <div class="inputContainer">
                    <span class="label"> Lugar:</span>
                    <textarea id="lugar" name="lugar"></textarea>
                </div>
                <div class="inputContainer">
                    <span class="label"> Descripcion:</span>
                    <textarea id="descripcion" name="descripcion"></textarea>
                </div>
                <div class="inputContainer">
                    <span class="label"> Imagen:</span>
                    <input id="img" name="img" type="file">
                </div>
                <div class="inputContainer">
                    <span class="label"> Grupo:</span>
                    <select id="grupo" name="grupo">
                        <option value="-">Seleccionar grupo</option>
                    <?php
                        include("./../../PHP/conexion.php");
                        $sql = "SELECT id, nombre FROM GruposTrabajo";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            echo "<ul class='listaGruposTrabajo'>";
                            while($row = $result->fetch_assoc()) {
                                $id = $row["id"];
                                $nombre = $row["nombre"];
                                echo "<option value=\"$id\">$nombre</option>\n";
                            }
                            echo "</ul>";
                        } else {
                            echo "No hay grupos";
                        }
                    ?>
                    </select>
                
                </div>
                <section class="sectionAgregarGrupo">
                    <input type="submit" name="btnSubmit" value="Agregar" class="btnAgregar">
                </section>
            </form>
        </div>
        <div id="messageContainer" class="display-message">
            <p id="message"></p>
            <span class="remove-message" onclick="removeMessage();">x</span>
        </div>

    </main>
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