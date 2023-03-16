<?php


require_once 'conexion.php';

switch($_SERVER["REQUEST_METHOD"]){

    case "GET":
        
    $my_query="SELECT * FROM estudiante ";

    $result = $sqli->query($my_query);

    if($sqli->affected_rows>0){
        $json="{ \"Datos\": [";
        while($row=$result->fetch_assoc()){
            $json=$json. json_encode($row);
            $json=$json.",";
        }
        $json=substr(trim($json),0,-1);
        $json.="]}";

    }
    echo $json;

    break;

    case "POST":



            if(!isset($_POST['id']) and !isset($_POST['nombreb'])){
                $nombre = $_POST['nombres'];
                $apellido = $_POST['apellidos'];
                $carrera = $_POST['carrera'];
                $anio = $_POST['anio'];

        
            
    
            
                    $my_query = "INSERT INTO estudiante (nombres, apellidos, carrera, anio) VALUES ('$nombres', '$apellidos', '$carrera', '$anio')";
        
                    $sqli->query($my_query);
        
                    if($sqli->affected_rows>0){
                        echo "Registro exitoso";
                    }
                    else{
                        echo "Error al registrar";
                    }

        
            }
            else{

                if(isset($_POST['id'])){
                    $id=$_POST['id'];
        
                $my_query = "Select *FROM estudiante WHERE id='$id'";
    
                $result=$sqli->query($my_query);
    
                if($result->num_rows>0){
                    $row=$result->fetch_assoc();
                    echo "Datos: ".$row['nombres']." ".$row['apellidos']." ".$row['carrera']." ".$row['anio'];
                }
                else{
                    echo "No se encontro el registro";
                }
                
                }
                else{
                    $nombreb=$_POST['nombreb'];
        
                    $my_query = "Select *FROM estudiante WHERE nombres='$nombreb'";
        
                    $result=$sqli->query($my_query);
        
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            echo "Datos: ".$row['nombres']." ".$row['apellidos']." ".$row['carrera']." ".$row['anio']."<br>";
                        }
                    }
                    else{
                        echo "No se encontro el registros";
                    }
                    break;
                }
            }
        }



?>