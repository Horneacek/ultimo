<?php
session_start();
include("conexion.php");
if (!isset($_SESSION['correo'])) {
    header("location:sesion.php");
}  
$correo = $_SESSION['correo']['correo']; 
$buscar = "SELECT * FROM usuario WHERE correo = '$correo'";
$res = $con->query($buscar);
$fila = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Viajes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .full-height {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center; 
        }

        .navbar {
            margin-bottom: 0;
        }

        .navbar-nav {
            width: 100%;
            display: flex;
            justify-content: space-evenly; 
        }

        .nav-link {
            text-align: center;
        }

        .search-form {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search-form input {
            width: 250px; 
        }

        .container {
            max-width: 1200px; 
        }

        .main-content {
            margin-top: 50px;
        }

        .profile-icon {
            margin-left: auto;
            font-size: 17px;
            cursor: pointer;
        }

        .menu-container {
            position: relative;
            display: inline-block;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: white;
            border: 1px solid #ccc;
            min-width: 140px;
            z-index: 1000;
        }

        .dropdown-menu a {
            display: block;
            padding: 10px;
            color: black;
            text-decoration: none;
        }

        .dropdown-menu a:hover {
            background-color: #f1f1f1;
        }

        .menu-container:hover .dropdown-menu {
            display: block;
        }

        .cart-icon {
            font-size: 10px;
            margin-right: 20px;
            margin-left: 20px;
            cursor: pointer;
        }

        .lejs{
            margin-left: 60px;
            text-decoration: none;
            color: black;
        }

        /* Estilo para el formulario */
        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-light">
    <div class="full-height">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Agencia de Viajes</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Ofertas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>

                <div class="menu-container">
                    <a class="profile-icon ms-3">
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="cerrar_sesion.php">Cerrar sesión</a>
                    </div>
                </div>
                <?php echo "<a class='a'>" . $fila['nombre'] . " " . $fila['apellido'] . "</a>"; ?>
                <a class="lejs" href="index2.php">Volver</a>
            </div>
        </nav>

        <!-- -------------------------------------------------------------------------------------------------------------- -->
        <div class="container mt-5">
            <form action="" method="GET">
                <h3 class="text-center mb-4">Buscar Viaje</h3>

                <div class="row">
                    <div class="col-md-6">
                        <label for="pais" class="form-label">País:</label>
                        <select name="pais" id="pais" class="form-select" required>
                            <option value="">Selecciona un país</option>
                            <?php
                            $sql = "SELECT * FROM pais";  
                            $result = $con->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['id_pais'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="provincia" class="form-label">Provincia:</label>
                        <select name="provincia" id="provincia" disabled class="form-select" required >
                            <option value="">Selecciona una provincia</option>
                            <?php
                            $sql2 = "SELECT * FROM provincia";  
                            $result2 = $con->query($sql2);
                            while ($row2 = $result2->fetch_assoc()) {
                                echo "<option value='" . $row2['id_provincia'] . "'>" . $row2['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="ciudad" class="form-label">Ciudad:</label>
                        <select name="ciudad" id="ciudad" disabled class="form-select" required>
                            <option value="">Selecciona una ciudad</option>
                            <?php
                            $sql3 = "SELECT * FROM ciudad";  
                            $result3 = $con->query($sql3);
                            while ($row3 = $result3->fetch_assoc()) {
                                echo "<option value='" . $row3['id_ciudad'] . "'>" . $row3['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="hotel" class="form-label">Hotel:</label>
                        <select name="hotel" id="hotel" class="form-select" required>
                            <option value="">Selecciona un hotel</option>
                            <?php
                            $sql4 = "SELECT * FROM hotel";  
                            $result4 = $con->query($sql4);
                            while ($row4 = $result4->fetch_assoc()) {
                                echo "<option value='" . $row4['id_hotel'] . "'>" . $row4['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="fecha_inicio" class="form-label">Fecha de Inicio:</label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="fecha_fin" class="form-label">Fecha de Fin:</label>
                        <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" required>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Buscar Viaje</button>
                </div>
  <h3>Clientes que viajan</h3>
<div id="clientes">
  <div class="cliente">
    <label>Nombre:</label>
    <input type="text" name="nombre[]" required>

    <label>Apellido:</label>
    <input type="text" name="apellido[]" required>

    <label>Fecha de nacimiento:</label>
    <input type="date" name="fecha_nacimiento[]" required>

    <label>DNI:</label>
    <input type="text" name="dni[]" required>
  </div>
</div>

<button type="button" onclick="agregarCliente()">Agregar otro cliente</button>

            </form>
        </div>
 <script>
  function agregarCliente() {
    //Buscamos el contenedor donde están todos los pasajeros
    const contenedor = document.getElementById('clientes');
// Creamos un nuevo bloque <div> para el nuevo pasajero
    const nuevo = document.createElement('div');
    nuevo.classList.add('cliente');
//Definimos el HTML que se va a insertar dentro del nuevo bloque
    nuevo.innerHTML = `
      <hr>
      <label>Nombre:</label>
      <input type="text" name="nombre[]" required>

      <label>Apellido:</label>
      <input type="text" name="apellido[]" required>

      <label>Fecha de nacimiento:</label>
      <input type="date" name="fecha_nacimiento[]" required>

      <label>DNI:</label>
      <input type="text" name="dni[]" required>
    `;
//agregamos este nuevo bloque al final del contenedor
    contenedor.appendChild(nuevo);
  }
</script>
        <script src="../js/hotel.js"></script>
<script src="../js/pais.js"></script>
<script src="../js/provincia.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rm
