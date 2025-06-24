<?php 
include ("conexion.php");

$datos = json_decode(file_get_contents("php://input"));


$nombre = $datos->correo;

$sql = "SELECT * FROM usuario WHERE correo = '$nombre'";
$res = $con->query($sql);

if($res->num_rows == 0 ){
    echo "corrre valido";
}else{
    echo "Error: ya existe un correo con el mismo nombre";
}