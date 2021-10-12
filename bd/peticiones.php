<?php
    session_start();
    include('./conexion.php');
    $ob = new conexion();
    $link = $ob->conectar();
    $opcion=(isset($_POST['opcion']))?$_POST['opcion']:'';
    $uId=(isset($_POST['uId']))?$_POST['uId']:'';
    $uNombre=(isset($_POST['uNombre']))?$_POST['uNombre']:'';
    $uDireccion=(isset($_POST['uDireccion']))?$_POST['uDireccion']:'';
    $uTelefono=(isset($_POST['uTelefono']))?$_POST['uTelefono']:'';
    $uPassword=(isset($_POST['uPassword']))?$_POST['uPassword']:'';
    $uMunicipio=(isset($_POST['uMunicipio']))?$_POST['uMunicipio']:'';
    $uAfiliacion=(isset($_POST['uAfiliacion']))?$_POST['uAfiliacion']:'';
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
    };
    print json_encode($data,JSON_UNESCAPED_UNICODE);
?>

