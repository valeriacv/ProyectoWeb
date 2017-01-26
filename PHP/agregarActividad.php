<!DOCTYPE html>
<html>
<<head>
    <title>Exito</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <header class="nombreOrg">
        <h1>Aldeas Infantiles SOS</h1>
    </header>
    <nav class="navBar">
        <ul class="navUl">
            <li><a href="./../views/Admin/home.html">Home</a></li>
            <li><a href="./../views/Admin/quienesSomos.html">Quienes somos</a></li>
            <li><a href="./../views/Admin/nuestroTrabajo.php">Nuestro trabajo</a></li>
            <li><a href="./../views/Admin/trabajeConNosotros.html">Trabaje con nosotros</a></li>
            <li><a href="./../views/Admin/actividades.php">Actividades</a></li>
        </ul>
    </nav>
<main>
        <h2 class="tituloPagina">Actividades</h2>
        <aside class="menuGrupos">
            <h3 class="asideTitulo">Organizacion</h3>
            <?php
                include("./conexion.php");
                $sql = "SELECT id, nombre FROM GruposTrabajo";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<ul class='listaGruposTrabajo'>";
                    while($row = $result->fetch_assoc()) {
                        $id = $row["id"];
                        $nombre = $row["nombre"];
                        echo "<li><a href='./../views/Admin/grupoDeTrabajo.php?id=$id'>$nombre</a></li>";
                    }
                    echo "</ul>";
                } else {
                    echo "No hay grupos";
                }
            ?> 
        </aside>
        <section class="sectionOrganizacion">
            <?php
                include("./conexion.php");
                if(isset($_POST["nombre"])&& isset($_POST["fecha"])&& isset($_POST["hora"])&& isset($_POST["lugar"])&& isset($_POST["descripcion"])&& isset($_POST["grupo"])){
                    $fecha = $_POST["fecha"]." ".$_POST["hora"];
                    $fechaConjunto = $_POST["fecha"]."-".$_POST["hora"];
                    if(count($_FILES) > 0) {
                        $targetDir = "../images/uploads/";
                        $imgName = $fechaConjunto."_".$_FILES["img"]["name"];
                        $imgPath = $targetDir . $imgName;
                        move_uploaded_file($_FILES["img"]["tmp_name"], $imgPath);
                        $sql = "INSERT INTO Actividades (nombre, fecha, lugar, descripcion, imagen, GruposTrabajo_id)
                                VALUES ('".$_POST["nombre"]."', '". $fecha."', '".$_POST["lugar"]."', '".$_POST["descripcion"]."', '".$imgPath ."', '".$_POST["grupo"]."')";
                        if ($conn->query($sql) === TRUE) {
                            $last_id = $conn->insert_id;
                            echo "Actividad creada con Exito";
                        } else {
                            echo 'Ocurrio un error, la actividad no se pudo crear';
                        } 
                    }
                }
                else{
                    echo 'Ocurrio un error, la actividad no se pudo crear';
                }
            ?>
            
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

</body>
</html>