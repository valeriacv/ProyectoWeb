<!DOCTYPE html>
<html>
<head>
	<title>Nuestro Trabajo</title>
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
    <meta charset="utf-8">
</head>
<body>
	<header class="nombreOrg">
        <h1>Aldeas Infantiles SOS</h1>
    </header>
    <nav class="navBar">
        <ul class="navUl">
            <li><a href="./home.html">Home</a></li>
            <li><a href="./quienesSomos.php">Quienes somos</a></li>
            <li class="currentLink"><a href="./nuestroTrabajo.php">Nuestro trabajo</a></li>
            <li><a href="./trabajeConNosotros.html">Trabaje con nosotros</a></li>
        </ul>
    </nav>
     <main>
        <h2 class="tituloPagina">Nuestro Trabajo</h2>
        <aside class="menuGrupos">
            <h3 class="asideTitulo">Organizacion</h3>
            <ul class="listaGruposTrabajo">
                <?php
                    include("./../../PHP/conexion.php");
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
                        echo "No hay grupos";
                    }
                ?> 
            </ul>
        </aside>  
        <section class="sectionOrganizacion">
            <h3 class="sectionTitulos">Organizacion</h3>
            <?php
            include("./../../PHP/conexion.php");
            $sql = "SELECT descripcion
                    FROM Organizacion 
                    WHERE id = '1'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                        $descripcion = $row["descripcion"];
                        echo "<p class='parrafoOrganizacion'>$descripcion</p>";                
                }
            }

        ?>
            <h3 class="sectionTitulos">Grupos de trabajo</h3>
            <table class="tablaGT" cellpadding="20" cellspacing="0">
                <tr>
                    <th>Grupo de trabajo</th>
                    <th>Descripción</th>
                </tr>
                <?php
                    include("./../../PHP/conexion.php");
                    $sql = "SELECT id, nombre, descripcion FROM GruposTrabajo";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $id = $row["id"];
                            $nombre = $row["nombre"];
                            $descripcion = $row["descripcion"];
                            echo "  <tr>
                                        <td><a href='./grupoDeTrabajo.php?id=$id'>$nombre</a></td>
                                        <td>$descripcion</td>
                                    </tr>";
                        }
                    } else {
                        echo "No hay grupos";
                    }
                ?> 
            </table>
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
