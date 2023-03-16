
<?php

include_once 'conexion.php';


if($_SERVER['REQUEST_METHOD']=='PUT'){

    
    
    $id=$_GET['id'];
    $nombre = $_GET['nombres'];
    $apellido = $_GET['apellidos'];
    $carrera = $_GET['carrera'];
    $anio = $_GET['anio'];

    $my_query = "UPDATE estudiante SET nombres='$nombres', apellidos='$apellidos', carrera='$carrera', anio='$anio' WHERE id='$id'";

    $result= $sqli-> query($my_query);

    if($sqli->affected_rows>0){

        echo "Registro actualizado";

    }

    else{

        echo "Error al actualizar";

    }

}
?>