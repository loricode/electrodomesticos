<?php
session_start();
include("conexion.php");

if(!empty($_POST['correo']) && !empty($_POST['clave'])){
$correo = $_POST['correo'];
$clave = $_POST['clave'];
$sql ="SELECT * FROM administrador WHERE correo='$correo' AND clave='$clave'";
$query=mysqli_query($db, $sql);
if($resultado=mysqli_fetch_array($query)){
	//si usuario y contraseña son correctos manten la sesion iniciada
	$_SESSION['u_usuario'] = $correo;
	header("location: ../principal.php");
}
else{

echo "<script>
  alert('usuario o contraseña equivocado '); 
  document.location='../index.html';
</script>";
}	
}else{
	
echo "<script>
  alert('te falto un campo por rellenar '); 
  document.location='../index.html';
</script>";	
}

?>