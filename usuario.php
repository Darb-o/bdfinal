<?php
session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
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
              <a class="nav-link" href="./usuario.php"><h5 class="navbar-brand" id="texto">Sistema de salud</h5></a>
            </li>
            <li class="nav-item dropdown" >
              <a class="nav-link dropdown-toggle" href="#" id="iconousuarioinicio" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			  	<ion-icon class="iconomenu" name="calendar-number-outline"></ion-icon>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
               <li><a class="dropdown-item" id="btnAgendarCita" href="#">Agendar cita</a></li>
               <li><a class="dropdown-item" id="btnprueba" href="#">Citas agendadas</a></li>
              </ul>
            </li>
			<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="iconousuarioinicio" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			  	<ion-icon class="iconomenu" name="person-circle-outline"></ion-icon>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
               <li><a class="dropdown-item" href="#">Mi perfil</a></li>
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

	<br><br><br><br>

	<div class="container">   
	    	<div class="card-group  mt-3">
	    		<div class="card mb-3 card border-primary" style="max-width: 450px;">
			  <div class="row g-0">
			    <div class="col-md-4">
			      <img src="img/citas.jpg" class="img-fluid rounded-start" alt="...">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title">agendar cita</h5>
			        <p class="card-text">Conocer los datos de los pacientes a los cuales se les ha diagnosticado una determinada enfermedad. </p>

			        <div class="d-grid gap-2">
	                	<a href="#" class="btn btn-success">ir</a>
	              </div> 
			      </div>
			    </div>
			  </div>
			</div>

			<div  class="col-md-1">
				
			</div>

			<div class="card mb-3 card border-primary" style="max-width: 450px;">
			  <div class="row g-0">
			    <div class="col-md-4">
			      <img src="img/agendar.jpg" class="img-fluid rounded-start" alt="...">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title">Citas agendadas</h5>
			        <p class="card-text">Listado de pacientes a cargo de un médico de acuerdo con su especialidad.</p>

			        <div class="d-grid gap-2">
	                	<a href="#" class="btn btn-success">ir</a>
	              </div> 
			      </div>
			    </div>
			  </div>
			</div>
	    </div>
	</div>
	
	<!-- modal citas -->
	<div class="modal fade"  id="modalCita" data-bs-focus="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">                             
          <div class="modal-body">             
            <div class="container-xl">
              <div class="row">
                <div class="col-11 mt-1 mb-3">
                  <h4>Agendar cita medica</h4>
                </div>
                <div class="col-1 mt-1 mb-3 d-flex justify-content-end">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                  </button>
                </div>
				<div class="form-floating col-6 mt-1 mb-3 d-flex justify-content-end " id="selectEspecialidad">
                  
                </div>
				<div class="form-floating col-6 mt-1 mb-3 d-flex justify-content-start">
                  <input class="form-control" type="date" id="fechaCita">
				  <label for="floatingInputValue">Seleccione la fecha de la cita</label>
                </div>       
                <div class="col-lg-12">
                  <div class="table-responsive">
                    <table id="tablaCita" class="table table-striped table-bordered table-condense" style="width: 100%">
                      <thead class="text-center">
                        <tr>
						  <th>Id</th>
						  <th>Licencia</th>           
                          <th>Medico</th>
                          <th>Especialidad</th>
						  <th>Accion</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>
            </div>                        
          </div>
        </div>
      </div>
    </div>
	<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
  	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  	<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>      
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.2/datatables.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<script src="./js/moment.min.js" type="text/javascript"></script>
	<script src="./js/funciones.js" type="text/javascript"></script>
</body>
</html>