<!DOCTYPE html>
<html>
<head>
	<title>Quienes Somos</title>
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
            <li class="currentLink"><a href="./quienesSomos.php">Quienes somos</a></li>
            <li><a href="./nuestroTrabajo.php">Nuestro trabajo</a></li>
            <li><a href="./trabajeConNosotros.html">Trabaje con nosotros</a></li>
        </ul>
    </nav>
    <main>
        <h2 class="tituloPagina">Quienes Somos</h2>
        <?php
            include("./../../PHP/conexion.php");
            $sql = "SELECT mision, vision, valores 
                    FROM Organizacion 
                    WHERE id = '1'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                        $mision = $row["mision"];
                        $vision = $row["vision"];
                        $valores = $row["valores"];
                    echo "
                            <div class='container'>
                                <div class='lineaVertical'></div>
                                <dl>
                                    <dt class='nombreDt'>Misión</dt>
                                    <dd class='especificacionDd'>
                                        <p>$mision</p>
                                    </dd>
                                </dl>
                            </div>
                            <div class='container'>
                                <div class='lineaVertical'></div>
                                <dl>
                                    <dt class='nombreDt'>Visión</dt>
                                    <dd class='especificacionDd'>
                                        <p>$vision</p>
                                    </dd>
                                </dl>
                            </div>
                            <div class='container'>
                                <div class='lineaVertical'></div>
                                <dl>
                                    <dt class='nombreDt'>Valores</dt>
                                    <dd class='especificacionDd'>
                                        <p>$valores </p>
                                    </dd>
                                </dl>
                            </div>";
                           

                }
            }

        ?>

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
