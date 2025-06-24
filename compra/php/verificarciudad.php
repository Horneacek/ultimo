<?php
include("conexion.php"); 

// Recibe los datos en formato JSON
$datos = json_decode(file_get_contents("php://input"));
$id_provincia = $datos->provincia;

// Consulta las provincias que pertenecen a ese país
$sql = "SELECT * FROM ciudad WHERE id_provincia = '$id_provincia'";
$res = $con->query($sql);

// Enviamos las provincias como <option>
echo "<option value=''>Selecciona una ciudad</option>";
while ($row = $res->fetch_assoc()) {
    echo "<option value='" . $row['id_ciudad'] . "'>" . $row['nombre'] . "</option>";
}
?>
