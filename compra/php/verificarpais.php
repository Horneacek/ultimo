<?php
include("conexion.php"); // ajustá el path si es necesario

// Recibe los datos en formato JSON
$datos = json_decode(file_get_contents("php://input"));
$id_pais = $datos->pais;

// Consulta las provincias que pertenecen a ese país
$sql = "SELECT * FROM provincia WHERE id_pais = '$id_pais'";
$res = $con->query($sql);

// Enviamos las provincias como <option>
echo "<option value=''>Selecciona una provincia</option>";
while ($row = $res->fetch_assoc()) {
    echo "<option value='" . $row['id_provincia'] . "'>" . $row['nombre'] . "</option>";
}
?>
