<?php
    include("conexion.php");
    if(isset($_GET["nombre"])&& isset($_GET["descripcion"])){
        $sql = "INSERT INTO GruposTrabajo (nombre, descripcion, Organizacion_id)
        VALUES ('".$_GET["nombre"]."', '".$_GET["descripcion"]."', 1)";
        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id;
            echo $last_id;
        } else {
            echo 0;
        } 
    }
?>