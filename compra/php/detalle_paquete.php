<?php
session_start();
include("conexion.php");
if (!isset($_SESSION['correo'])) {
    header("location:sesion.php");
  
}  
$_SESSION['correo'];
$correo = $_SESSION['correo']['correo']; 
$buscar = "SELECT * FROM usuario WHERE correo = '$correo'";
$res = $con->query($buscar);
$fila = $res->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <!-- FontAwesome para los íconos -->
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

        /* Estilo para el perfil en la esquina derecha */
        .profile-icon {
            margin-left: auto; /* Empuja el ícono hacia la derecha */
            font-size: 17px; /* Tamaño del ícono */
            cursor: pointer; /* Cambia el cursor cuando pasas sobre el ícono */
        }

        .cart-icon {
            font-size: 20px;
            margin-right: 20px;
            margin-left: 20px;
            cursor: pointer;
        }

        /* Estilo de los paquetes */
        .package-card {
            cursor: pointer;
            margin-bottom: 20px;
        }

        .package-card img {
            max-height: 200px;
            object-fit: cover;
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

        /* Mostrar el menú al pasar el mouse */
        .menu-container:hover .dropdown-menu {
            display: block;
        }

    </style>
</head>
<body class="bg-light">
    
    <div class="full-height">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Viajar</a>
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
                <form class="search-form my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
                <!-- Ícono de carrito antes del perfil -->
                <a href="carrito.php" class="cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                </a>
                <!-- Ícono de perfil alineado a la derecha -->
                <div class="menu-container">
                    <a class="profile-icon ms-3">
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="cerrar_sesion.php">Cerrar sesión</a>
                    </div>
                </div>
                <?php echo "<a class='a'>"  .$fila['nombre'], $fila['apellido']. "</a>"; ?>
            </div>
        </nav>
<?php
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $paquete = "SELECT * FROM paquetes WHERE id = $id";
$paque = $con->query($paquete);
 if ($paque -> num_rows > 0) {
            $res = $paque->fetch_assoc();
?>
<form method="post" action="agregar_carrito.php">
    <input type="hidden" name="id" value="<?php echo $res['id']; ?>">
    <input type="hidden" name="nombre" value="<?php echo $res['nombre_paquete']; ?>">
    <input type="hidden" name="precio" value="<?php echo $res['precio']; ?>">
    <button type="submit" class="btn btn-primary">Agregar al carrito</button>
</form>
<?php
 }
}

        ?>
        </table>






