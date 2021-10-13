<?php
    session_start();
    include('./conexion.php');
    $ob = new conexion();
    $link = $ob->conectar();
    $opcion=(isset($_POST['opcion']))?$_POST['opcion']:'';
    //PACIENTE
    $uId=(isset($_POST['uId']))?$_POST['uId']:'';
    $uNombre=(isset($_POST['uNombre']))?$_POST['uNombre']:'';
    $uDireccion=(isset($_POST['uDireccion']))?$_POST['uDireccion']:'';
    $uTelefono=(isset($_POST['uTelefono']))?$_POST['uTelefono']:'';
    $uPassword=(isset($_POST['uPassword']))?$_POST['uPassword']:'';
    $uMunicipio=(isset($_POST['uMunicipio']))?$_POST['uMunicipio']:'';
    $uAfiliacion=(isset($_POST['uAfiliacion']))?$_POST['uAfiliacion']:'';
    //CITAS
    $especialidad=(isset($_POST['especialidad']))?$_POST['especialidad']:'';
    $diasemana=(isset($_POST['diasemana']))?$_POST['diasemana']:'';
    $fechacita=(isset($_POST['fechacita']))?$_POST['fechacita']:'';
    $idMedico=(isset($_POST['idMedico']))?$_POST['idMedico']:'';
    $licenciaMedico=(isset($_POST['licenciaMedico']))?$_POST['licenciaMedico']:'';
    $data = null;
    switch($opcion){
        case 1://listar municipios
            $sql = "select * from municipio";
            $sentencia = $link->query($sql);
            $data=$sentencia->fetchAll(PDO::FETCH_OBJ);
            break;
        case 2://listar tipos de afiliacion
            $sql = "select * from tipoafiliacion";
            $sentencia = $link->query($sql);
            $data=$sentencia->fetchAll(PDO::FETCH_OBJ);
            break;
        case 3://Registrar usuario
            $sql = "select * from paciente where idpaciente = $uId";
            $sentencia = $link->query($sql);          
            if($sentencia->rowCount()>=1){
                $data=$sentencia->fetchAll(PDO::FETCH_OBJ);
            }else{
                $uRol = 2;
                $uEstado = (boolean)true;
                $sql = "insert into persona values($uId,'$uNombre','$uDireccion',$uMunicipio,'$uTelefono')";
                $sentencia = $link->query($sql);     
                $uPassword = password_hash($uPassword,PASSWORD_DEFAULT);
                $sql = "insert into usuario values($uId,$uRol,'$uPassword','$uEstado')";
                $sentencia = $link->query($sql);
                $sql = "insert into paciente values($uId,$uAfiliacion)";
                $sentencia = $link->query($sql); 
                $data = null;    
            }
            break;
        case 4://Login
            $sql="select verificarcontratomedico()";
            $sentencia = $link->query($sql);
            $sql="select verificarestadomedico()";
            $sentencia = $link->query($sql);

            $sql = "select u.idusuario, u.rol_fk, u.clave, p.nombre from usuario u join persona p on (u.idusuario = p.idpersona) where u.idusuario = $uId";
            $sentencia = $link->query($sql);
            if($sentencia->rowCount()>=1){
                $data=$sentencia->fetchAll(PDO::FETCH_OBJ);              
                if(password_verify($uPassword,$data[0]->clave)){
                    $_SESSION['usuario'] = $uId;
                    $_SESSION['clave'] = $uPassword;
                    $_SESSION['nombre'] = $data[0]->nombre;
                    $_SESSION['rol'] = $data[0]->rol_fk;
                }else{
                    $data = null;
                }
            }
            break;
        case 5://logout
            unset($_SESSION['usuario']);
            unset($_SESSION['clave']);
            unset($_SESSION['nombre']);
            unset($_SESSION['rol']);
            session_destroy();
            break;
        case 6://listar especialidades
            $sql = "select * from tipoespecialidad";
            $sentencia = $link->query($sql);
            $data=$sentencia->fetchAll(PDO::FETCH_OBJ);
            break;
        case 7://listar medicos disponibles:          
            $sql ="select m.numlicencia, m.idmedico , p.nombre, ti.especialidad
            from persona p join usuario u on (p.idpersona = u.idusuario) 
            join empleado em on (em.idempleado = u.idusuario)
            join medico m on (m.idmedico = em.idempleado)
            join especialidad es on (es.idmedico = m.idmedico)
            join tipoespecialidad ti on (ti.idespecialidad = es.idespecialidad)
            join cumplir c on (m.idmedico = c.idmedico)
            where m.estado = true and c.iddia = $diasemana and es.idespecialidad=$especialidad";
            $sentencia = $link->query($sql);
            $data=$sentencia->fetchAll(PDO::FETCH_OBJ);
            break;
        case 8://horarios de cita que tiene un medico una fecha especifico
            $sql = "select fechaconsulta from cita where idmedico = $idMedico and fechaconsulta >= '$fechacita 00:00:00' and fechaconsulta <= '$fechacita 23:59:00'";
            $sentencia = $link->query($sql);
            $data=$sentencia->fetchAll(PDO::FETCH_OBJ);
            break;
        case 9://horario que tiene de consulta un medico un dia especifico
            $sql = "select h.horainicio,h.horafinal
            from medico m join cumplir c on (c.idmedico = m.idmedico) 
            join horario h on (c.idhorario = h.idhorario)
            where m.idmedico = $idMedico and c.iddia = $diasemana";
            $sentencia = $link->query($sql);
            $data=$sentencia->fetchAll(PDO::FETCH_OBJ);
            break;
        case 10://Insertar cita en la body
            $paciente = $_SESSION['usuario'];
            $sql = "insert into cita (idmedico,numlicencia,idpaciente,fechaconsulta) values($idMedico,$licenciaMedico,$paciente,'$fechacita')";
            $sentencia = $link->query($sql);
            break;
        case 11://llenar tabla de citas agendadas
            $paciente = $_SESSION['usuario'];
            $sql = "select ci.idpaciente, p.nombre, pe.nombre as nombre_medico,ti.especialidad, ci.diagnostico, ci.fechaconsulta
            from cita ci join persona p on (ci.idpaciente = p.idpersona)
            join medico m on (ci.idmedico = m.idmedico)
            join especialidad es on (es.idmedico = m.idmedico)
            join tipoespecialidad ti on (ti.idespecialidad = es.idespecialidad) 
            join empleado em on (m.idmedico = em.idempleado) 
            join persona pe on (em.idempleado = pe.idpersona)
            where ci.idpaciente = $paciente ";
            $sentencia = $link->query($sql);
            $data=$sentencia->fetchAll(PDO::FETCH_OBJ);
            break;
    };
    print json_encode($data,JSON_UNESCAPED_UNICODE);
?>

