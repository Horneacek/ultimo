<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href="../css/contactos.css">
</head>
<body>
<?php
session_start();
include("conexion.php");
if (!isset($_SESSION['correo'])) {
    header("location:sesion.php");
  
}  $_SESSION['correo'];
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

        /* Mostrar el menú al pasar el mouse */
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
                        <a class="nav-link" href="#">algo mas</a>
                    </li>
                </ul>
                

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
                 <a class="lejs" href="index2.php">Volver</a>
            </div>
            
     
        </nav>



<section id="contacto">
  <h2>Contacto</h2>
  <p><strong>Dirección:</strong> Av. Aeropuerto 123, Ciudad, País</p>
  <p><strong>Teléfono:</strong> +54 9 11 1234 5678</p>
  <p><strong>Email:</strong> contacto@vuelostop.com</p>
  <p><strong>Horario de atención:</strong> Lunes a Viernes, 9:00 a 18:00</p>
  <p><strong>Síguenos en redes:</strong> 
    <a href="https://facebook.com/vuelostop" target="_blank">Facebook</a> | 
    <a href="https://twitter.com/vuelostop" target="_blank">Twitter</a> | 
    <a href="https://instagram.com/vuelostop" target="_blank">Instagram</a>
  </p>
</section>

</body>
</html>