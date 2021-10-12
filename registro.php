<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Crear cuenta</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.2/datatables.min.css"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
	<section class="vh-90" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-3">
            <div class="row justify-content-center">
              <div class="col-md-8 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold ps-3 mb-4 mt-2">Crear una cuenta</p>

                <form id="formRegistrarse" class="mx-1 mx-md-4">

                  <div class="d-flex flex-row align-items-center mb-3">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="number" id="uId" required maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" class="form-control" placeholder="Numero de identificacion">                       
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-3">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="uNombre" required class="form-control" placeholder="Nombre" /> </div>
                  </div>


                  <div class="d-flex flex-row align-items-center mb-3">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="uDireccion" required class="form-control" placeholder="Direccion" /> </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-3">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="number" id="uTelefono" required maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" class="form-control" placeholder="Numero de telefono">                       
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-3">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="uPassword" required class="form-control" placeholder="Contraseña" />
                      
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-3">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div id="selectMunicipio" class="form-floating flex-fill mb-0">                
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-3">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div id="selectAfiliacion" class="form-floating flex-fill mb-0">                
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-3">
                    <label>
                    ¿ya tienes una cuenta? <a href="index.php">Ingresa</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" id="enviarRegistro"class="btn btn-primary btn-md">Registrase</button>
                  </div>

                </form>

              </div>

              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-registration/draw1.png" class="img-fluid" alt="Sample image">
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section> 
  <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>      
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.2/datatables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="./js/funciones.js" type="text/javascript"></script>
</body>
</html>