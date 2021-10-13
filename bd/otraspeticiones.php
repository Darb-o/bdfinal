<?php
    session_start();
    include('./conexion.php');
    $ob = new conexion();
    $link = $ob->conectar();
    $opcion=(isset($_POST['opcion']))?$_POST['opcion']:'';
     
    //CITAS
    $especialidad=(isset($_POST['especialidad']))?$_POST['especialidad']:'';
    $diasemana=(isset($_POST['diasemana']))?$_POST['diasemana']:'';
    $fechacita=(isset($_POST['fechacita']))?$_POST['fechacita']:'';
    $idMedico=(isset($_POST['idMedico']))?$_POST['idMedico']:'';
    $licenciaMedico=(isset($_POST['licenciaMedico']))?$_POST['licenciaMedico']:'';
    $data = null;
    //MEDICO
    $uNombre=(isset($_POST['uNombre']))?$_POST['uNombre']:'';
    $uDireccion=(isset($_POST['uDireccion']))?$_POST['uDireccion']:'';
    $uTelefono=(isset($_POST['uTelefono']))?$_POST['uTelefono']:'';
    $uPassword=(isset($_POST['uPassword']))?$_POST['uPassword']:'';
    $uMunicipio=(isset($_POST['uMunicipio']))?$_POST['uMunicipio']:'';
    $uId=(isset($_POST['uId']))?$_POST['uId']:'';
    $tipoEmpleado=(isset($_POST['tipoEmpleado']))?$_POST['tipoEmpleado']:'';
    $tipoMedico=(isset($_POST['tipoMedico']))?$_POST['tipoMedico']:'';
    $inicioVacaciones = (isset($_POST['inicioVacaciones']))?$_POST['inicioVacaciones']:'';
    $terminaVacaciones = (isset($_POST['terminaVacaciones']))?$_POST['terminaVacaciones']:'';
    $inicioContrato = (isset($_POST['inicioContrato']))?$_POST['inicioContrato']:'';
    $terminaContrato = (isset($_POST['terminaContrato']))?$_POST['terminaContrato']:'';
    $lunes = (isset($_POST['lunes']))?$_POST['lunes']:'';
    $martes = (isset($_POST['martes']))?$_POST['martes']:'';
    $miercoles = (isset($_POST['miercoles']))?$_POST['miercoles']:'';
    $jueves = (isset($_POST['jueves']))?$_POST['jueves']:'';
    $viernes = (isset($_POST['viernes']))?$_POST['viernes']:'';
    $sabado = (isset($_POST['sabado']))?$_POST['sabado']:'';
    $domingo = (isset($_POST['domingo']))?$_POST['domingo']:'';
    switch($opcion){
        case 1://listar empleados
            $sql = "select * from tipoempleado";
            $sentencia = $link->query($sql);
            $data=$sentencia->fetchAll(PDO::FETCH_OBJ);
            break;
        case 2://listar tipos medico
            $sql = "select * from tipomedico";
            $sentencia = $link->query($sql);
            $data=$sentencia->fetchAll(PDO::FETCH_OBJ);
            break;
        case 3://listar tipos de horario
            $sql = "select * from horario";
            $sentencia = $link->query($sql);
            $data=$sentencia->fetchAll(PDO::FETCH_OBJ);
            break;
        case 4://insertar medico no sustituto
            $sql = "select * from persona where idpersona = $uId";
            $sentencia = $link->query($sql);
            if($sentencia->rowCount()>=1){
                $data="Ya se encuentra registrado";
            }else{
                $rol = 3;
                $uEstado = (boolean)true;
                $sql = "insert into persona values($uId,'$uNombre','$uDireccion',$uMunicipio,'$uTelefono')";
                $sentencia = $link->query($sql); 
                $uPassword = password_hash($uPassword,PASSWORD_DEFAULT);
                $sql = "insert into usuario values($uId,$rol,'$uPassword','$uEstado')";
                $sentencia = $link->query($sql);
                $sql = "insert into empleado values($uId,$tipoEmpleado)";
                $sentencia = $link->query($sql);
                $sql = "insert into vacaciones (fechainicio,fechatermina) values('$inicioVacaciones','$terminaVacaciones')";
                $sentencia = $link->query($sql);
                $sql = "select v1.* from vacaciones v1 WHERE idvacaciones = (select max(v2.idvacaciones) from vacaciones v2)";
                $sentencia = $link->query($sql);
                $data=$sentencia->fetchAll(PDO::FETCH_OBJ);
                $idvacaciones = $data[0]->idvacaciones;
                $sql = "insert into tomar (idempleado,idvacaciones) values($uId,$idvacaciones)";
                $sentencia = $link->query($sql);
                $sql = "insert into medico (numlicencia,idmedico,tipomedico_fk) values($licenciaMedico,$uId,$tipoMedico)";
                $sentencia = $link->query($sql);
                $sql = "insert into especialidad values($especialidad,$licenciaMedico,$uId)";
                $sentencia = $link->query($sql);
                $sql = "insert into contrato (fechacontrato,fecharetiro) values('$inicioContrato','$terminaContrato')";
                $sentencia = $link->query($sql);
                $sql = "select c1.* from contrato c1 where idcontrato = (select max(c2.idcontrato) from contrato c2);";
                $sentencia = $link->query($sql);
                $data=$sentencia->fetchAll(PDO::FETCH_OBJ);
                $idcontrato = $data[0]->idcontrato;
                $tipocontrato = 2;
                $sql = "insert into tener values($uId,$licenciaMedico,$idcontrato,$tipocontrato)";
                $sentencia = $link->query($sql);
                if($lunes != 'no'){
                    $dia = 1;
                    $sql = "insert into cumplir values($licenciaMedico,$uId,$lunes,$dia)";
                    $sentencia = $link->query($sql);
                }
                if($martes != 'no'){
                    $dia = 2;
                    $sql = "insert into cumplir values($licenciaMedico,$uId,$martes,$dia)";
                    $sentencia = $link->query($sql);
                }
                if($miercoles != 'no'){
                    $dia = 3;
                    $sql = "insert into cumplir values($licenciaMedico,$uId,$miercoles,$dia)";
                    $sentencia = $link->query($sql);
                }
                if($jueves != 'no'){
                    $dia = 4;
                    $sql = "insert into cumplir values($licenciaMedico,$uId,$jueves,$dia)";
                    $sentencia = $link->query($sql);
                }
                if($viernes != 'no'){
                    $dia = 5;
                    $sql = "insert into cumplir values($licenciaMedico,$uId,$viernes,$dia)";
                    $sentencia = $link->query($sql);
                }
                if($sabado != 'no'){
                    $dia = 6;
                    $sql = "insert into cumplir values($licenciaMedico,$uId,$sabado,$dia)";
                    $sentencia = $link->query($sql);
                }
                if($domingo != 'no'){
                    $dia = 0;
                    $sql = "insert into cumplir values($licenciaMedico,$uId,$domingo,$dia)";
                    $sentencia = $link->query($sql);
                }
                $data = null;
            }      
            break;
        case 5: //insertar medico sustituto
            $sql = "select * from persona where idpersona = $uId";
            $sentencia = $link->query($sql);
            if($sentencia->rowCount()>=1){
                $data="Ya se encuentra registrado";
            }else{
                $rol = 3;
                $uEstado = (boolean)true;
                $sql = "insert into persona values($uId,'$uNombre','$uDireccion',$uMunicipio,'$uTelefono')";
                $sentencia = $link->query($sql); 
                $uPassword = password_hash($uPassword,PASSWORD_DEFAULT);
                $sql = "insert into usuario values($uId,$rol,'$uPassword','$uEstado')";
                $sentencia = $link->query($sql);
                $sql = "insert into empleado values($uId,$tipoEmpleado)";
                $sentencia = $link->query($sql);
                $sql = "insert into medico (numlicencia,idmedico,tipomedico_fk) values($licenciaMedico,$uId,$tipoMedico)";
                $sentencia = $link->query($sql);
                $sql = "insert into especialidad values($especialidad,$licenciaMedico,$uId)";
                $sentencia = $link->query($sql);
                $data = null;
            }      
            break;
        case 6: //insertar empleado
                $sql = "select * from persona where idpersona = $uId";
                $sentencia = $link->query($sql);
                if($sentencia->rowCount()>=1){
                    $data="Ya se encuentra registrado";
                }else{
                    $rol = 3;
                    $uEstado = (boolean)true;
                    $sql = "insert into persona values($uId,'$uNombre','$uDireccion',$uMunicipio,'$uTelefono')";
                    $sentencia = $link->query($sql); 
                    $uPassword = password_hash($uPassword,PASSWORD_DEFAULT);
                    $sql = "insert into usuario values($uId,$rol,'$uPassword','$uEstado')";
                    $sentencia = $link->query($sql);
                    $sql = "insert into empleado values($uId,$tipoEmpleado)";
                    $sentencia = $link->query($sql);
                    $sql = "insert into vacaciones (fechainicio,fechatermina) values('$inicioVacaciones','$terminaVacaciones')";
                    $sentencia = $link->query($sql);
                    $sql = "select v1.* from vacaciones v1 WHERE idvacaciones = (select max(v2.idvacaciones) from vacaciones v2)";
                    $sentencia = $link->query($sql);
                    $data=$sentencia->fetchAll(PDO::FETCH_OBJ);
                    $idvacaciones = $data[0]->idvacaciones;
                    $sql = "insert into tomar (idempleado,idvacaciones) values($uId,$idvacaciones)";
                    $sentencia = $link->query($sql);
                    $data = null;
                }      
                break;
    };
    print json_encode($data,JSON_UNESCAPED_UNICODE);
?>

