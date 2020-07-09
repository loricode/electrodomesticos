<?php 
include("php/conexion.php");
session_start();

if(isset($_SESSION['u_usuario'])){
  
  }else{
  header("location: index.html");
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>principal</title>
 <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
</head>
<body >

<nav class="navbar navbar-expand-lg navbar navbar-dark  bg-dark">
    <div class="container">                            
     <div>
        <ul class="navbar nav  ml-auto" >    
            <li class="nav-item">
              <a class="navbar-brand nav-link" href="principal.php">
                PRINCIPAL 
                </a> </li>
            <li class="nav-item">
              <a class="navbar-brand nav-link" href="producto.php">       PRODUCTOS 
              </a>
            </li>
           
            <li class="nav-item">
              <a class="navbar-brand nav-link" href="historial.php">HISTORIAL</a></li>
           
            <li class="nav-item">
              <a class="navbar-brand nav-link" href="php/finalizar.php">SALIR </a>
            </li>
            </ul>
            </div>
       </div>
        </nav>


<?php
$usuario= $_SESSION['u_usuario'];
$proceso=mysqli_query($db, "SELECT * FROM administrador WHERE correo='$usuario'  " );
$resultado=mysqli_fetch_array($proceso);
$administrador= $resultado['nombre']; 
?>
 
<div class="container">
   <div class="row">
    <div class="col-5 pt-3 ">
    <form  action="php/insertar_producto_venta.php"  method="POST">
<h6 style="font-weight:bold;"><?php echo "bienvenido:"." ". $administrador  ?></h3>

<div  class="form-group">
<input type="number"  class="form-control"  name="codigo"  placeholder="codigo del producto" autofocus="on" >
</div>
 <div class="form-group">
 <button type="submit"  class="btn btn-primary btn-block" >AGREGAR</button>
 </div>
 </form>
 </div>

 <?php
//Suponemos que ya la conexion a la BD esta realizada.

$select = ("SELECT SUM(precio) FROM venta");
$query = mysqli_query($db, $select);
$row = mysqli_fetch_assoc($query);
$suma = $row['SUM(precio)'];
?>

 <div class="col-6 pt-2">
    <div class="card border-success text-center">
      <div class="card-title text-success  ">
        <h4>Total a pagar: $<?php echo  $suma?></h4></div>
      <div class="card-body">
        <form action="php/pagar.php?cobro=<?php echo  $suma?>"
               method="post">
        <div class=form-group>
          <input type="number" class="form-control" name="pago">
        </div>
        <button type="submit" class="btn btn-success btn-block">
          REALIZAR VENTA 
          </button>   
         </form>
        </div>
  </div>
</div>

 <div class="col-12 pt-3">
   <table class="table table-striped table-dark">
     <thead>
      <tr>
          <th scope="col">CODIGO</th>
          <th scope="col">NOMBRE</th>
          <th scope="col">PRECIO</th>
          <th scope="col"></th>
    </tr>
<thead>
<tbody>
<?php

$mostrar=mysqli_query($db,"select * from venta");
while($registro = mysqli_fetch_array($mostrar)){
?>

   <tr>
    <td><?php echo   $registro['codigo'] ;?></td>
    <td><?php echo   $registro['nombre'] ;?></td>
    <td><?php echo   $registro['precio'] ;?></td>
    <td><a  href="php/elimina_producto_venta.php?id=<?php echo $registro['id'] ?>">delete</a></td>

   </tr>
 
<?php  }

?>
</tbody>
</table>
</div>
</div>    
</body>
</html>