<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Crear cuenta empleado</title>
    <link rel="stylesheet" type="text/css" href="./css/estilo.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.2/datatables.min.css"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head> 
<body>

    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
         <div class="container-fluid">     
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <li class="nav-item ">
              <a class="nav-link" href="./ingreso.php"><h5 class="navbar-brand" id="texto">Sistema de salud</h5></a>
            </li>
            <li class="nav-item dropdown" >
              <a class="nav-link dropdown-toggle" href="#" id="iconousuarioinicio" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			  	<ion-icon class="iconomenu"name="medkit-outline"></ion-icon>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
               <li><a class="dropdown-item" id="" href="#">Pacientes diagnosticados</a></li>
               <li><a class="dropdown-item" id="" href="#">Listado de pacientes</a></li>
			   <li><a class="dropdown-item" id="" href="#">Medicos en vacaciones</a></li>
			   <li><a class="dropdown-item" id="" href="#">Medicos disponibles</a></li>
              </ul>
            </li>
			<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="iconousuarioinicio" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			  	<ion-icon class="iconomenu" name="person-circle-outline"></ion-icon>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
               <li><a class="dropdown-item" href="./registroempleado.php">Registrar empleado</a></li>
               <li><a id="btnCerrarSesion" class="dropdown-item" href="#">Cerrar sesion</a></li>
              </ul>
            </li>

            </ul>

            <ul class="nav justify-content-end">
				<li class="nav-item ">
				<h5 class="navbar-brand" id="texto"> 
					<?php           
					if(isset( $_SESSION['usuario'])){
					if($_SESSION['usuario']!=null){
						echo "Bienvenido ".$_SESSION['nombre'];
					}               
					}          
					?></h5>
				</li>
            </ul>

           </div>
         </div>
  </nav>

    <section class="vh-90" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-3">
                    <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5 order-2 order-lg-1">

                        <p class="text-center h1 fw-bold ps-3 mb-4 mt-2">Crear cuenta empleado</p>

                        <form id="formRegistrarEmpleado" class="mx-1 mx-md-4">

                        <div class="d-flex flex-row align-items-center mb-1">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div id="selectEmpleado" class="form-floating flex-fill mb-0">                
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-2">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                            <input type="hidden" id="medicoLicencia" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" class="form-control" placeholder="Numero de licencia">                       
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-1">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                            <input type="number" id="empleadoId" required maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" class="form-control" placeholder="Numero de identificacion">                       
                            </div>
                        </div>                       

                        <div class="d-flex flex-row align-items-center mb-2">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div id="selectTipoMedico" class="form-floating flex-fill mb-0">                
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-2">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div id="selectEspecialidad" class="form-floating flex-fill mb-0">                
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-1">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div id="inicioContrato" class="form-floating form-outline flex-fill mb-0">
                                <input class="form-control" type="date" id="fechaIniciaContrato">
				                <label for="floatingInputValue">Fecha inicio contrato</label>                       
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-1">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div id="terminaContrato" class="form-floating form-outline flex-fill mb-0">
                                <input class="form-control" type="date" id="fechaTerminaContrato">
				                <label for="floatingInputValue">Fecha termina contrato</label>                       
                            </div>
                        </div>
                        
                        <div class="d-flex flex-row align-items-center mb-2">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                            <input type="text" id="empNombre" required class="form-control" placeholder="Nombre" /> </div>
                        </div>


                        <div class="d-flex flex-row align-items-center mb-2">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                            <input type="text" id="empDireccion" required class="form-control" placeholder="Direccion" /> </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-2">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                            <input type="number" id="empTelefono" required maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" class="form-control" placeholder="Numero de telefono">                       
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-2">
                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                            <input type="password" id="empPassword" required class="form-control" placeholder="Contraseña" />
                            
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-2">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div id="selectMunicipio" class="form-floating flex-fill mb-0">                
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-1">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div id="inicioVacaciones" class="form-floating form-outline flex-fill mb-0">
                                <input class="form-control" type="date" id="fechaIniciaVacaciones">
				                <label for="floatingInputValue">Fecha inicio vacaciones</label>                       
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-1">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div id="terminaVacaciones" class="form-floating form-outline flex-fill mb-0">
                                <input class="form-control" type="date" id="fechaTerminaVacaciones">
				                <label for="floatingInputValue">Fecha termina vacaciones</label>                       
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <button type="submit" id="enviarRegistro"class="btn btn-primary btn-md">Registrar</button>
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
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<script src="./js/moment.min.js" type="text/javascript"></script>
	<script src="./js/registroempleado.js" type="text/javascript"></script>
</body>
</html>