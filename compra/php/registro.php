<?php 
include ("conexion.php");
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
            <h3 class="pt-3 font-weight-bold">Registrarme</h3>
          </div>
          <div class="panel-body p-3">
            <form action="" method="POST">
              <div class="form-group py-2">
                <div class="input-field"> 
                  <span class="far fa-user p-2"></span> 
                  <input type="text" name="nombre" placeholder="Nombre" required> 
                </div>
              </div>
              <div class="form-group py-2">
                <div class="input-field"> 
                  <span class="far fa-user p-2"></span> 
                  <input type="text" name="apellido" placeholder="Apellido" required> 
                </div>
              </div>
              <div class="form-group py-2">
                <div class="input-field"> 
                  <span class="far fa-user p-2"></span> 
                  <input type="text" name="correo" placeholder="Correo Electronico"  id="correo" required> 
                       <label id="mensaje"></label>
                </div>
              </div>
              <div class="form-group py-2">
                <div class="input-field"> 
                  <span class="far fa-user p-2"></span> 
                  <input type="text" name="telefono" placeholder="Numero de Telefono" required> 
                </div>
              </div>
              <div class="form-group py-1 pb-2">
                <div class="input-field"> 
                  <span class="fas fa-lock px-2"></span> 
                  <input type="password" name="contrasena" placeholder="Contraseña" required> 
                  
                </div>
                <div class="btn btn-primary btn-block mt-3">
                     <input type="submit" value="registrar"></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<script src="../js/ajax.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
<?php 
   include("conexion.php");
    if (isset($_REQUEST['nombre']) && isset($_REQUEST['apellido']) && isset($_REQUEST['correo']) && isset($_REQUEST['contrasena']) && isset($_REQUEST['telefono'])) {

    
        $nombre = $_REQUEST['nombre'];
        $apellido = $_REQUEST['apellido'];
        $correo = $_REQUEST['correo'];
        $contra = $_REQUEST['contrasena'];
        $telefono = $_REQUEST['telefono'];

    

        
    $verificar="SELECT correo, telefono FROM usuario WHERE correo='$correo' OR telefono = '$telefono'";
        $verificar2=$con->query($verificar);

    if ($correo=="" or $nombre=="" or $apellido=="") {
        echo "llene los campos";
    }else {
        if ($verificar2->num_rows>0) {
            echo "Correo electronico en uso";
        }else {

        $ins = "INSERT INTO usuario (nombre, apellido, correo, telefono, contrasena) 
                VALUES ('$nombre', '$apellido', '$correo', '$telefono', '$contra')";
        

    
        $resultado = $con->query($ins);

    
    }
    }
    }





