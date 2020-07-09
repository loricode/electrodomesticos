<?php
//eliminar un registro de la tabla venta
include ("conexion.php");

$id=$_GET['id'];
$db->query("DELETE FROM  producto WHERE id='$id'");
 
header("Location:../producto.php");


?>