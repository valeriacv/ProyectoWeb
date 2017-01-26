<?php

  /**
   * Verifies if correct login
   * @return [type] [description]
   */
  function login() {

    include("conexion.php");

    if(isset($_GET['userName']) && isset($_GET['password'])) {

      // Get the user values
      $userName = $_GET['userName'];
      $password = $_GET['password'];

      if(!isValidLogin($userName ,$password)) {
        echo "-1";
        return;
      }

      return getUserGroups($userName);

    } else {
      echo "-1";
    }
  }


  /**
   * Verifeis is login is correct
   * @param  [type]  $pUserName [description]
   * @param  [type]  $pPassword [description]
   * @return boolean            [description]
   */
  function isValidLogin($pUserName, $pPassword) {

    include("conexion.php");

    $query = "SELECT nombre FROM Usuarios WHERE usuario = '$pUserName' AND contrasenia = '$pPassword'";
    $result = $conn->query($query);
    return (($result->num_rows > 0));

  }

  /**
   * Gets the user groups on a string
   * @param  [type] $pUserName [description]
   * @return [type]            [description]
   */
  function getUserGroups($pUserName) {

    include("conexion.php");

    $userGroups = "";
    $query = "SELECT GruposTrabajo_id groupId
      FROM Usuarios_X_Grupo uxg
      INNER JOIN Usuarios u ON u.id = uxg.Usuarios_id
      WHERE u.usuario = '$pUserName'";
    $result = $conn->query($query);


    if ($pUserName == 'admin') {
      $userGroups =  "admin";
    }
    else if ($result->num_rows > 0) {

      // output data of each row
      while($row = $result->fetch_assoc()) {

        $groupId = $row["groupId"];
        $userGroups .= $groupId . ',';
      }

      $userGroups = ($userGroups != "") ? rtrim($userGroups, ",") : $userGroups;
    }

    echo $userGroups;
  }

  login();

?>
