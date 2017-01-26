<!DOCTYPE html>
<html>
<head>
    <title>Usuarios</title>
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
            <li class="currentLink"><a href="./nuestroTrabajo.html">Nuestro trabajo</a></li>
            <li><a href="./trabajeConNosotros.html">Trabaje con nosotros</a></li>
        </ul>
    </nav>
     <main>
        <h2 class="tituloPagina">Usuarios</h2>
        <section class="sectionOrganizacion user">
            <h3 class="sectionTitulos">Usuarios Registrado</h3>
            <table class="tablaGT" cellpadding="20" cellspacing="0">
                <tr>
                    <th>Usuaro</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                </tr>
                <?php
                    include("./../../PHP/conexion.php");
                    $sql = "SELECT usuario, nombre, CONCAT(primer_apellido, ' ', segundo_apellido) apellidos FROM Usuarios WHERE esAdmin = 0";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $usuario = $row["usuario"];
                            $nombre = $row["nombre"];
                            $apellidos = $row["apellidos"];
                            echo "
                                <tr>
                                    <td>$usuario</td>
                                    <td>$nombre</td>
                                    <td>$apellidos</td>
                                </tr>
                            ";
                        }
                    } 
                ?>
            </table>
        </section>
        <section class="sectionAgregarGrupo">
            <a class="btnAgregar" href="./registroUsuario.php">Agregar Usuario</a>
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
