<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pagina principal</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/ingreso.css">
</head>
	<body class="color">

	<nav class="navbar navbar-dark navbar-expand-md bg-dark fixed-top">
	    <a class="navbar-brand" href="#">Sistema de salud</a>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	    </button>

	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	        <ul class="navbar-nav mr-auto" >
	            
	            <li class="nav-item"><a class="nav-link" href="">Cerrar sesion</a></li>
	        </ul>
	    </div>
	</nav>
		
			<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			  <div class="container-fluid">
			    <a class="navbar-brand" href="#">Sistema de salud</a>
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
			      <ul class="navbar-nav ">
			        <li class="nav-item dropdown">
			          <a class="nav-link dropdown-toggle " href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			            Usuario
			          </a>
			          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
			            <li><a class="dropdown-item" href="#">Cerrar sesion</a></li>
			            
			          </ul>
			        </li>
			      </ul>
			    </div>
			  </div>
			</nav> -->
		
	

		<br><br><br><br>

		<div class="usu">
			<?php 
				session_start();
				$usuario = $_SESSION['nombre_usuario'];
				echo "<h2>Bienvenido $usuario </h2>";
			?>
		</div>		
		
		<div class="container ">   
	    	<div class="card-group  mt-3">

	    		<div class="card mb-3 card border-primary" style="max-width: 450px;">
			  <div class="row g-0">
			    <div class="col-md-4">
			      <img src="img/diagnostico.png" class="img-fluid rounded-start" alt="...">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title">Pacientes diagnosticados</h5>
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
			      <img src="img/pacientes.jpg" class="img-fluid rounded-start" alt="...">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title">Listado de pacientes</h5>
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


	 



	   <div class="container">   
	    <div class="card-group mt-3">

 			<div class="card mb-3 card border-primary" style="max-width: 450px;">
			  <div class="row g-0">
			    <div class="col-md-4">
			      <img src="img/vacaciones.jpg" class="img-fluid rounded-start" alt="..." >
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title">Médicos en vacaciones</h5>
			        <p class="card-text">Listado de los médicos que han disfrutado o tienen planeadas las vacaciones en un intervalo de tiempo dado.</p>

			        <div class="d-grid gap-2">
	                	<a href="#" class="btn btn-success">Listar</a>
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
			      <img src="img/medicos.jpg" class="img-fluid rounded-start" alt="..." >
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title">Médicos disponibles</h5>
			        <p class="card-text">Listado de médicos que el centro de salud tiene disponibles para alguna especialidad particular.</p>

			        <div class="d-grid gap-2">
	                	<a href="#" class="btn btn-success">Listar Médicos</a>
	              </div> 
			      </div>
			    </div>
			  </div>
			</div>


	    </div>
	  </div> 
		

		<script type="text/javascript" src="js/jquery-latest.js"></script>
	    <script type="text/javascript" src="js/bootstrap.js"></script>
	    <script type="text/javascript">
	        $(document).ready(function () {
	            $('.dropdown-toggle').dropdown();
	        });
	   </script>
	</body>



</html>

