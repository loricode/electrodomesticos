<?php

include ("conexion.php");

$codigo  =  $_POST['codigo']; 
$nombre  =  $_POST['nombre'];
$precio  =  $_POST['precio'];
$cantidad = $_POST['cantidad'];
$foto=$_POST['foto'];

$sql1 = mysqli_query($db, "SELECT * FROM producto WHERE codigo='$codigo' " );
$resultado = mysqli_fetch_assoc($sql1);


if($codigo==$resultado['codigo']){
    echo "<script>

    alert('el codigo ya existe'); 
    document.location='../producto.php';
  
  </script>";
    
}else{
    $sql = "INSERT INTO producto ( codigo, nombre, precio, cantidad, foto )
    values ('$codigo', '$nombre', '$precio', '$cantidad', '$foto' )";

$mensaje = $db->query($sql);

header("Location:../producto.php");


?>