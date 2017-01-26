<?php


  /**
   * Inserst an user on DB
   * @return [type] [description]
   */
  function registerUser() {

    include("conexion.php");

    if(isset($_GET['userName']) && isset($_GET['password']) && isset($_GET['name']) && isset($_GET['lastName_1']) && isset($_GET['userGroups'])) {

      if(!isValidUserName($_GET['userName'])) {
        echo -1;
        return;
      }

      // Get the user values
      $userName = $_GET['userName'];
      $password = $_GET['password'];
      $name = $_GET['name'];
      $lastName_1 = $_GET['lastName_1'];
      $lastName_2 = $_GET['lastName_2'];
      $userGroups = $_GET['userGroups'];

      // Insert the user
      $query = "INSERT INTO Usuarios(usuario,nombre,primer_apellido,segundo_apellido,contrasenia,esAdmin)
        VALUES ('$userName', '$name', '$lastName_1', '$lastName_2','$password',0)";

      $conn->query($query);
      $userId = $conn->insert_id;

      // Insert the user groups
      $sqlValues = str_replace("%userId%", $userId, $userGroups);
      $query = "INSERT INTO Usuarios_X_Grupo(Usuarios_id, GruposTrabajo_id) VALUES " . $sqlValues;
      $conn->query($query);

      echo $userId;

    } else {
      echo 0;
    }
  }


  /**
   * Verifies if username exist in DB
   * @param  [String] $pUserName [The username to be verified]
   * @return [type]            [description]
   */
  function isValidUserName($pUserName) {

    include("conexion.php");
    $query = "SELECT nombre FROM Usuarios WHERE usuario = '$pUserName'";
    $result = $conn->query($query);
    return (!($result->num_rows > 0));
  }

  registerUser();

?>
