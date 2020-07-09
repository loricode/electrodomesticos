<?php
//elimina un registro de la tabla historial
include ("conexion.php");

$id=$_GET['id'];
$db->query("DELETE FROM  historial WHERE id='$id'");
 
header("Location:../historial.php");


?>