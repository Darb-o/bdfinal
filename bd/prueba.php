<?php
include('./conexion.php');
$ob = new conexion();
$link = $ob->conectar();
$opcion=(isset($_POST['opcion']))?$_POST['opcion']:'';
$sql = "select v1.* from vacaciones v1 WHERE idvacaciones = (select max(v2.idvacaciones) from vacaciones v2)";
$sentencia = $link->query($sql);
$data=$sentencia->fetchAll(PDO::FETCH_OBJ);
echo $data[0]->idvacaciones;
?>