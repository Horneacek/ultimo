<?php 
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  <link href="../css/form..css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="panel border bg-white">
          <div class="panel-heading">
            <h3 class="pt-3 font-weight-bold">Iniciar Sesion</h3>
          </div>
          <div class="panel-body p-3">
            <form action="" method="POST">
              <div class="form-group py-2">
                <div class="input-field"> 
                  <span class="far fa-user p-2"></span> 
                  <input type="text" name="correo" id="correo" placeholder="Ingrese su Email" required>
                  <label id="mensaje"></label> 
                </div>
              </div>
              <div class="form-group py-1 pb-2">
                <div class="input-field"> 
                  <span class="fas fa-lock px-2"></span> 
                  <input type="password" name="contrasena" placeholder="Ingrese su Contraseña" required> 
                  <button class="btn bg-white text-muted"> 
                    <span class="far fa-eye-slash"></span> 
                  </button> 
                </div>
              </div>
              <div class="form-inline"> 
                <input type="checkbox" name="remember" id="remember"> 
                <label for="remember" class="text-muted">olvidé mi</label> 
                <a href="#" id="forgot" class="font-weight-bold">contraseña?</a> 
              </div>
              <div class="btn btn-primary btn-block mt-3"> <input type="submit" value="registrar"></div>
              <div class="text-center pt-4 text-muted">No tienes una cuenta? <a href="registro.php">Registrarme</a> </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<script src="../js/correoiniciar.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
<?php 
   
session_start();
if (isset($_REQUEST['correo']) && isset($_POST['contrasena'])) {

$correo=$_REQUEST['correo'];
$contra=$_REQUEST['contrasena'];
//password_hash($_POST['contraseña'], PASSWORD_BCRYPT);


$consulta= "SELECT * FROM usuario where correo = '$correo' ";
$eje=$con->query($consulta); 

$datos=$eje->fetch_assoc();

 if ($contra == $datos['contrasena'] && $correo== $datos['correo']) {
    $_SESSION['correo'] = $datos;
    header("location:index2.php");
}else {
    echo "er";
 }
}



