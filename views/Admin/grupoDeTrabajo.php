<!DOCTYPE html>
<html>
<head>
	<title>Grupo de Trabajo</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body onload="verifyUserSession()">
	<header class="nombreOrg">
        <h1>Aldeas Infantiles SOS</h1>
    </header>
    <nav class="navBar">
        <ul class="navUl">
            <li><a href="./home.php">Home</a></li>
            <li><a href="./quienesSomos.html">Quienes somos</a></li>
            <li><a href="./nuestroTrabajo.php">Nuestro trabajo</a></li>
            <li><a href="./trabajeConNosotros.html">Trabaje con nosotros</a></li>
            <li><a href="./actividades.php">Actividades</a></li>
            <li><a onclick="logOut()">Salir</a></li>
        </ul>
    </nav>
    <main>
        <?php
            include("./../../PHP/conexion.php");
            if(isset($_GET["id"])){
                $sql = "SELECT gt.nombre
                FROM GruposTrabajo gt
                WHERE gt.id ='".$_GET["id"]."'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()){
                        $nombreGrupo = $row["nombre"];
                        echo "<h2 class='tituloPagina'>$nombreGrupo</h2>";
                    }
                }
            }
        ?>

        <aside class="menuGrupos">
            <h3 class="asideTitulo">Organizacion</h3>
            <ul class="listaGruposTrabajo">
                <?php
                    include("./../../PHP/conexion.php");
                    if(isset($_GET["id"])){
                        $sql = "SELECT id, nombre FROM GruposTrabajo";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $id = $row["id"];
                                $nombre = $row["nombre"];
                                echo "<li><a href='./grupoDeTrabajo.php?id=$id'>$nombre</a></li>";
                            }
                        } else {
                            echo "El grupo seleccionado no existe";
                        }
                    }
                    else{
                        echo "error";
                    }
                ?>
            </ul>
        </aside>
        <section class="sectionOrganizacion">
            <div class="container">
                <div class="lineaVertical"></div>
                <dl>
                    <dt class="nombreDt">Descripción</dt>
                    <dd class="especificacionDd">
                        <?php
                            include("./../../PHP/conexion.php");
                            if(isset($_GET["id"])){
                                $sql = "SELECT gt.id, gt.descripcion
                                        FROM GruposTrabajo gt
                                        WHERE gt.id ='".$_GET["id"]."'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()){
                                        $descripcionGrupo = $row["descripcion"];
                                        echo "<textarea class='parrafoOrganizacion' name='mensaje'>$descripcionGrupo</textarea>";
                                    }
                                }
                            }
                        ?>
                    </dd>
                </dl>
            </div>
            <div class="container">
                <div class="lineaVertical"></div>
                <dl>
                    <dt class="nombreDt">
                        <span>Objetivos </span>
                        <button class="btnPlus" type="button" onclick="agregarObjetivoGT()">+</button>
                    </dt>
                    <dd id="listaObj" class="especificacionDd">
                        <?php
                            include("./../../PHP/conexion.php");
                            if(isset($_GET["id"])){
                                $sql = "SELECT obj.descripcion
                                        FROM GruposTrabajo gt
                                        INNER JOIN Objetivos obj ON gt.id = obj.GruposTrabajo_id
                                        WHERE gt.id ='".$_GET["id"]."'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    echo "<ul>";
                                    while($row = $result->fetch_assoc()){
                                        $obj = $row["descripcion"];
                                        echo "<li>$obj</li>";
                                    }
                                    echo "</ul>";
                                }
                                else{
                                    echo "No hay objetivos";
                                }
                            }
                        ?>
                    </dd>
                </dl>
            </div>
            <div class="container">
                <div class="lineaVertical"></div>
                <dl>
                    <dt class="nombreDt">Actividades</dt>
                    <dd class="especificacionDd">
                        <?php
                            include("./../../PHP/conexion.php");
                            $sql = "SELECT act.nombre, act.fecha, act.lugar, act.descripcion
                                    FROM GruposTrabajo gt
                                    INNER JOIN Actividades act ON gt.id = act.GruposTrabajo_id
                                    WHERE gt.id ='".$_GET["id"]."'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo " <table class='tablaGT' cellpadding='20' cellspacing='0'>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Fecha</th>
                                                <th>Lugar</th>
                                                <th>Descripción</th>
                                            </tr>";
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $nombre = $row["nombre"];
                                    $fecha = $row["fecha"];
                                    $lugar = $row["lugar"];
                                    $descripcion = $row["descripcion"];
                                    echo "  <tr>
                                                <td>$nombre</td>
                                                <td>$fecha</td>
                                                <td>$lugar</td>
                                                <td>$descripcion</td>
                                            </tr>";
                                }
                                echo "</table>";
                            } else {
                                echo "No hay Actividades";
                            }
                        ?>

                    </dd>
                </dl>
            </div>
        </section>
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
