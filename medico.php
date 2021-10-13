<?php
//esta comentado porque toca hacer la parte de registrarse medico porque la contraseña esta cifrada
session_start();
/*if(isset($_SESSION['usuario'])){
  if($_SESSION['rol'] == 2){
    header('Location: usuario.php');
  }
}else{
  header('Location: index.php');
}*/
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Medico</title>
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
               <li><a class="dropdown-item" id="" href="#">Citas Agendadas</a></li>
               <li><a class="dropdown-item" id="" href="#">Cambiar horario</a></li>
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

	<div class="container ">   
	    	<div class="card-group  mt-3">

	    		<div class="card mb-3 card border-primary" style="max-width: 450px;">
			  <div class="row g-0">
			    <div class="col-md-4">
			      <img src="img/reserva.jpg" class="img-fluid rounded-start" alt="...">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title">citas</h5>
			        <p class="card-text">Conocer las citas que tengo agendadas. </p>

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
			      <img src="img/ver.jpg" class="img-fluid rounded-start" alt="...">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title">Cambiar mi horario</h5>
			        <p class="card-text">Opcion de cambiar mi horario.</p>

			        <div class="d-grid gap-2">
	                	<a href="#" class="btn btn-success">ir</a>
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