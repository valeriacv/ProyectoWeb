<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body onload="verifyUserSession()">
	<header class="nombreOrg">
        <h1>Aldeas Infantiles SOS</h1>
    </header>
    <nav class="navBar">
        <ul class="navUl">
            <li class="currentLink"><a href="./home.php">Home</a></li>
            <li><a href="./quienesSomos.html">Quienes somos</a></li>
            <li><a href="./nuestroTrabajo.php">Nuestro trabajo</a></li>
            <li><a href="./trabajeConNosotros.html">Trabaje con nosotros</a></li>
            <li><a href="./actividades.php">Actividades</a></li>
            <li><a onclick="logOut()">Salir</a></li>
        </ul>
    </nav>
    <main>
    	<div class="imgContainer">
    		<img src="../../images/aldeasInfantiles4.jpg" class="homeImg"/>
    	</div>
        <?php
            if(isset($_COOKIE['userGroups'])) {
                if($_COOKIE['userGroups'] === 'admin') {
                    echo "<a href='./usuarios.php' class='btnAgregar user-admin-btn'>Administración Usuarios</a>";
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
    <script type="text/javascript" src="../../js/main.js"></script>
</body>
</html>
