<!DOCTYPE html>
<html>
<head>
	<title>Nuestro Trabajo</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./../../css/style.css">
</head>
<body>
	<header class="nombreOrg">
        <h1>Aldeas Infantiles SOS</h1>
    </header>
    <nav class="navBar">
        <ul class="navUl">
            <li><a href="./home.html">Home</a></li>
            <li><a href="./quienesSomos.html">Quienes somos</a></li>
            <li class="currentLink"><a href="./nuestroTrabajo.php">Nuestro trabajo</a></li>
            <li><a href="./trabajeConNosotros.html">Trabaje con nosotros</a></li>
            <li><a href="./actividades.php">Actividades</a></li>
        </ul>
    </nav>
    <main>
        <h2 class="tituloPagina">Nuestro Trabajo</h2>
        <div id="messageContainer" class="display-message">
            <p id="message"></p>
            <span class="remove-message" onclick="removeMessage();">x</span>
        </div>
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
            <textarea name="mensaje">
                        vufejdiwoi9r48tuhgrbefjdnkwoeir394t8uhgybefhjdknsml vufejdiwoi9r48tuhgrbefjdnkwoeir394t8uhgybefhjdknsml vufejdiwoi9r48tuhgrbefjdnkwoeir394t8uhgybefhjdknsml vufejdiwoi9r48tuhgrbefjdnkwoeir394t8uhgybefhjdknsml vufejdiwoi9r48tuhgrbefjdnkwoeir394t8uhgybefhjdknsml vufejdiwoi9r48tuhgrbefjdnkwoeir394t8uhgybefhjdknsml vufejdiwoi9r48tuhgrbefjdnkwoeir394t8uhgybefhjdknsml vufejdiwoi9r48tuhgrbefjdnkwoeir394t8uhgybefhjdknsml vufejdiwoi9r48tuhgrbefjdnkwoeir394t8uhgybefhjdknsml vufejdiwoi9r48tuhgrbefjdnkwoeir394t8uhgybefhjdknsml
            </textarea>
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
        <section class="sectionAgregarGrupo">
            <button id="btnDisplayAgregarGrupo" class="btnAgregar" onclick="displayContAgregarGrupo()">
                Agregar Grupo
            </button>
        </section>
        <div id="contAgregarGrupo" class="containerAgregar" style="display: none;">
            <h3 class="titulos">Agregar Grupo</h3>

            <div class="inputContainer">
                <span class="label"> Nombre:</span>
                <input id="nombre" type="text">
            </div>
            <div class="inputContainer">
                <span class="label"> Descripcion:</span>
                <textarea id="descripcion" name="descripcion"></textarea>
            </div>
            <section class="sectionAgregarGrupo">
                <button class="btnAgregar" onclick="agregarGrupoTrabajo();">Agregar</button>
            </section>
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
