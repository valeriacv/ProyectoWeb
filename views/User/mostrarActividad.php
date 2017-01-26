<!DOCTYPE html>
<html>
<head>
    <title>Actividad</title>
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
            <li><a href="./quienesSomos.php">Quienes somos</a></li>
            <li><a href="./nuestroTrabajo.php">Nuestro trabajo</a></li>
            <li><a href="./trabajeConNosotros.html">Trabaje con nosotros</a></li>
        </ul>
    </nav>
    <main>
        <?php
            include("./../../PHP/conexion.php");
            if(isset($_GET["id"])){
                $sql = "SELECT act.nombre
                FROM Actividades act
                WHERE act.id ='".$_GET["id"]."'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()){
                        $nombreActividad = $row["nombre"];
                        echo "<h2 class='tituloPagina'>$nombreActividad</h2>";
                    }
                }
            }
        ?>
        <?php
            include("./../../PHP/conexion.php");
            $sql = "SELECT act.nombre as nombreAct, act.fecha, act.lugar, act.descripcion, gt.nombre as nombreGrupo, act.imagen
                    FROM Actividades act
                    INNER JOIN GruposTrabajo gt ON act.GruposTrabajo_id = gt.id
                    WHERE act.id ='".$_GET["id"]."'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                        $nombre = $row["nombreAct"];
                        $fecha = $row["fecha"];
                        $lugar = $row["lugar"];
                        $descripcion = $row["descripcion"];
                        $nombreGrupo = $row["nombreGrupo"];
                        $pathFoto = $row["imagen"];
                    echo "
                            <div class='container'>
                                <div class='lineaVertical'></div>
                                <dl>
                                    <dt class='nombreDt'>Fecha</dt>
                                    <dd class='especificacionDd'>
                                        <p>$fecha</p>
                                    </dd>
                                </dl>
                            </div>
                            <div class='container'>
                                <div class='lineaVertical'></div>
                                <dl>
                                    <dt class='nombreDt'>Lugar</dt>
                                    <dd class='especificacionDd'>
                                        <p>$lugar</p>
                                    </dd>
                                </dl>
                            </div>
                            <div class='container'>
                                <div class='lineaVertical'></div>
                                <dl>
                                    <dt class='nombreDt'>Descripcion</dt>
                                    <dd class='especificacionDd'>
                                        <p>$descripcion </p>
                                    </dd>
                                </dl>
                            </div>
                            <div class='container'>
                                <div class='lineaVertical'></div>
                                <dl>
                                    <dt class='nombreDt'>Grupo</dt>
                                    <dd class='especificacionDd'>
                                        <p>$nombreGrupo</p>
                                    </dd>
                                </dl>
                            </div>
                            <div class='container'>
                                <div class='lineaVertical'></div>
                                <dl>
                                    <dt class='nombreDt'>Foto</dt>
                                    <dd class='especificacionDd'>
                                        <img src=\"$pathFoto\">
                                    </dd>
                                </dl>
                            </div>";

                }
            }

        ?>

    </main>
</body>
</html>