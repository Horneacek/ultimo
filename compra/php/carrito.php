<?php
session_start();
include("conexion.php");
if (!isset($_SESSION['correo'])) {
    header("location:sesion.php");
    exit;
}
$correo = $_SESSION['correo']['correo']; 
$buscar = "SELECT * FROM usuario WHERE correo = '$correo'";
$res = $con->query($buscar);
$fila = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        /* (Tu CSS aquí, sin cambios) */
        .full-height {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center; 
        }
        /* ...resto de estilos... */
        .lejs {
            margin-left: 60px;
            text-decoration: none;
            color: black;
        }
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

        /* Mostrar el menú al pasar el mouse */
        .menu-container:hover .dropdown-menu {
            display: block;
        }

    </style>
</head>
<body class="bg-light">
  
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#"><img src="../descarga-removebg-preview.png" style="height: 60px; width: auto;"></a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      


            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="index2.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Ofertas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactos.php">Contacto</a>
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

<!------------------------------------------------------------------------------------------------------------->

<section class="h-100 gradient-custom">
 
<div class="container py-5">
    <h2 class="mb-4">Carrito de Compras</h2>

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header"><strong>Productos en tu carrito</strong></div>
                <div class="card-body">
                    <?php
                    $total = 0;
                    if (!empty($_SESSION['carrito'])) {
                        foreach ($_SESSION['carrito'] as $item) {
                            echo "<div class='mb-3 border-bottom pb-2'>";
                            echo "<h5>" . $item['nombre'] . "</h5>";
                            echo "<p>Precio: $" . number_format($item['precio'], 2) . "</p>";
                            echo "</div>";
                            $total += $item['precio'];
                        }
                    } else {
                        echo "<p class='fs-4 text-center'>Tu carrito está vacío.</p>";
                        echo "<div class='text-center'><i class='fas fa-shopping-cart fa-3x text-muted'></i></div>";
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header"><strong>Resumen</strong></div>
                <div class="card-body">
                    <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Productos
                            <span>$<?php echo number_format($total, 2); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Total</strong>
                            <strong>$<?php echo number_format($total, 2); ?></strong>
                        </li>
                    </ul>
                    <?php if (!empty($_SESSION['carrito'])): ?>
                        <a href="pago.php" class="btn btn-primary btn-block">Ir a pagar</a>
                    <?php else: ?>
                        <button class="btn btn-primary btn-block" disabled>Ir a pagar</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
