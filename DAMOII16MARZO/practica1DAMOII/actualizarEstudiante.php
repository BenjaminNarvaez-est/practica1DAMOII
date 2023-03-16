<?php


include_once 'conexion.php';

if($_SERVER['REQUEST_METHOD']=='POST'){

    
    $nombre = $_GET['nombres'];
    $apellido = $_GET['apellidos'];
    $carrera = $_GET['carrera'];
    $anio = $_GET['anio'];
  

    $my_query = "INSERT INTO estudiante (nombres, apellidos, carrera, anio) VALUES ('$nombres', '$apellidos', '$carrera', '$anio')";

    $result= $sqli-> query($my_query);

    if($sqli->affected_rows>0){

        echo "Registro exitoso";

    }

    else{

        echo "Error al registrar";

    }


}
?>