<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sistema de salud</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.2/datatables.min.css"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body >
   <header class="bg-primary text-white">
      
      <div class="col-sm-12 text-center">
          <a href="">------------------------</a>
      </div>
    </header>

    <section class="vh-100">
      <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="img/inicio.jpeg" class="img-fluid"
              alt="Sample image">
          </div>
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form id="formInicioSesion">
              <h1 style="font-weight: 900px; color: darkblue; text-align: center;">Bienvenido a su</h1>
              <h2  style="color: darkblue; font-weight:300px; text-align: center;">Sistema de salud</h2>
                <br><br>          
              <div class="form-outline form-white mb-4">
                  <input type="number" required id="inicioUsuario" class="form-control form-control-lg" placeholder="numero de identificacion" name="txt_correo" />
              </div>          

              <div class="form-outline form-white mb-4">
                  <input type="password" required id="inicioClave" class="form-control form-control-lg"placeholder="contraseña" name="txt_clave" />
             </div>          
              <br>

              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Ingresar</button>
              </div>  
              <br>
              <p class="small fw-bold mt-2 pt-1 mb-0">¿No tienes una cuenta? 
                <a href="registro.php" class="link-danger">Registrarse</a></p>
            </form> 
          </div>
        </div>
      </div>

      
        <!-- <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
          Copyright
          <div class="text-white mb-8 mb-md-5">
            Copyright © 2021. All rights reserved.
          </div>
         
       </div> -->
    </section>
   
    <footer class="bg-primary text-white">
      <div class="row">
        <div class="col-sm-12 text-center">
          <address>
            <p>&copy; copyright 2021. Todos los derechos reservados</p>            
          </address>
        </div>
      </div>
    </footer>

  <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>      
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.2/datatables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="./js/funciones.js" type="text/javascript"></script>
</body>
</html>
