<?php
  include("conexion.php");

  if(isset($_GET['userName']) && isset($_GET['password']) && isset($_GET['name']) && isset($_GET['lastName_1'])) {

    /*
    // Insert the project
    $query = "INSERT INTO project(name, summary, metodologyId, projectTypeId, courseId) VALUES ('".$_POST['name']."','".$_POST['summary']. "'," . $_POST['methodologyId'].",".$_POST['projectTypeId'].",".$_POST['courseId'].")";

    $conn->query($query);
    $projectId = $conn->insert_id;


    echo $projectId;*/

  } else {
    echo "0";
  }
?>
