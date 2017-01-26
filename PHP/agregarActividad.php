<?php
    include("conexion.php");
    if(isset($_POST["nombre"])&& isset($_POST["fecha"])&& isset($_POST["hora"])&& isset($_POST["lugar"])&& isset($_POST["descripcion"])&& isset($_POST["grupo"])){
        $fecha = $_POST["fecha"]." ".$_POST["hora"];
        $fechaConjunto = $_POST["fecha"]."-".$_POST["hora"];
        if(count($_FILES) > 0) {
            $targetDir = "../images/uploads/";
            $imgName = $fechaConjunto."_".$_FILES["img"]["name"];
            $imgPath = $targetDir . $imgName;
            echo $imgPath;
        }
        else{
            echo 'What';
        }
        





        // $sql = "INSERT INTO Actividades (nombre, fecha, lugar, descripcion, imagen, GruposTrabajo_id)
        //         VALUES ('".$_POST["nombre"]."', '". $fecha."', '".$_POST["lugar"]."', '".$_POST["descripcion"]."', '".$_POST["img"]."', '".$_POST["grupo"]."')";
        // if ($conn->query($sql) === TRUE) {
        //     $last_id = $conn->insert_id;
        //     echo $last_id;
        // } else {
        //     echo 0;
        // } 
    }
    else{
        echo 'error';
    }
?>