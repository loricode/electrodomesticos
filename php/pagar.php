<?php 

//tabla de ventas muestra el proceso de ventas
include ("conexion.php");
session_start();

if(isset($_SESSION['u_usuario'])){
  
  }else{
  header("location: ../index.html");
}
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <title>pago</title>
</head>
<body>

<header>
    <nav class="nabvar navbar-expand-lg navbar navbar-dark bg-dark"> 
                    
      <a href="/index.html" class="navbar-text text-light font-weight-bold" > 
        <i class="material-icons">ELECTRODOMESTICOS  brightness_7</i>
                    </a>
                  </nav>
            </header>
    



<?php

$cobro=$_REQUEST['cobro'];
$pago=$_POST['pago'];


    date_default_timezone_set("america/bogota");
    $fecha=date("Y-m-d");
    $hora=date("H:i:s");
    
    $vuelto= number_format($pago-$cobro);

?>

<div class="container p-4">

 <div style=" display: flex;
  align-items: center;
  justify-content: center;
  min-height: 60vh;">

 <div class="col-6 ">

<div class="card border-danger text-center">
       <div class="card-title text-danger  ">
         <h2 class="mt-3">Su Cambio es: $<?php echo   $vuelto?> </h2>
     </div>
       <div class="card-body ">
        
              <div class=form-group>
              <a href="siguiente_venta.php" class="btn btn-danger btn-block" >siguiente venta</a>   

       </div>
   <div class="form-group">
   <a href="javascript:ventana()"  class="btn btn-danger btn-block" >factura</a>   



<?php
/*

*/
?>



</div>
</div>
</div>

</div>
 </div>
 </div>

 <script>

  function ventana () {
    window.open('factura.php?cobro=<?php echo $cobro ?> && pago=<?php echo $pago ?> && vuelto=<?php echo $vuelto ?> && fecha=<?php echo $fecha ?>  && hora=<?php echo $hora ?>', '_blank');
};


</script>
</body>
</html>