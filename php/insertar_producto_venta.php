<?php


include ("conexion.php");
$codigo=$_POST['codigo'];
$sql1 = mysqli_query($db, "SELECT * FROM producto WHERE codigo='$codigo' " );
$resultado = mysqli_fetch_array($sql1);
$codigo  =  $resultado['codigo']; 
$nombre  =  $resultado['nombre'];
$precio  =  $resultado['precio'];
$cantidad = $resultado['cantidad'];

$resultado = $cantidad-1;
//aqui utilizamos la fecha y la hora del computador
date_default_timezone_set("america/bogota");
$fecha = date("Y-m-d");
$hora  = date("H:i:s");


if($resultado > -1){
  $sql4="UPDATE producto SET cantidad = $resultado WHERE codigo = $codigo";
  $db->query($sql4);
  $sql2 = "INSERT INTO venta ( codigo, nombre, precio ) values ('$codigo', '$nombre', '$precio' )";
  $db->query($sql2);
  $sql3 = "INSERT INTO historial ( codigo, nombre, precio, fecha, hora ) values (  '$codigo', '$nombre', '$precio', '$fecha', '$hora' )";
  $db->query($sql3);
  header("location:../principal.php");  
}

if($resultado==-1){


  echo "<script>

  alert(' producto agotado '); 
  document.location='../principal.html';

</script>";

//$db->query("DELETE FROM  producto WHERE codigo='$codigo'");
 
header("Location:../principal.php");

}




  ?>