<?php
//borra los datos de la tabla venta
include("conexion.php");
$db->query("DELETE from venta ");
header("Location:../principal.php");

?>