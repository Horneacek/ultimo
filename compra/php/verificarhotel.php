<?php
include("conexion.php"); 

// Recibe los datos en formato JSON
$datos = json_decode(file_get_contents("php://input"));
$id_ciudad = $datos->ciudad;

// Consulta las provincias que pertenecen a ese país
$sql = "SELECT * FROM hotel WHERE id_ciudad= '$id_ciudad'";
$res = $con->query($sql);

// Enviamos las provincias como <option>
echo "<option value=''>Selecciona un Hotel</option>";
while ($row = $res->fetch_assoc()) {
    echo "<option value='" . $row['id_hotel'] . "'>" . $row['nombre'] . "</option>";
}
?>
