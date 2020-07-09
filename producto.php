<?php
include ("php/conexion.php");
session_start();

if(isset($_SESSION['u_usuario'])){
  
  }else{
  header("location: index.html");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <title>producto</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark  bg-dark ">
       <div class="container">
         <div class=" collapse navbar-collapse" id="navegar">
            <ul class="navbar nav  ml-auto" >    
                <li class="nav-item">
                 <a class="navbar-brand nav-link " href="principal.php">
                </a>
                </li>
       <li class="nav-item">
        <a class=" navbar-brand nav-link" href="producto.php">
           PRODUCTOS
            </a>
         </li>
                            <li class="nav-item"><a class=" navbar-brand nav-link" href="historial.php"><i class="material-icons">HISTORIAL desktop_mac</i></a></li>
                            <li class="nav-item"><a class=" navbar-brand nav-link" href="php/finalizar.php"><i class="material-icons">SALIR exit_to_app</i></a></li>
                     </ul>
            </div>
       </div>
        </nav>

<div class="container pt-4" >

<div class="row">


<div class="col-4 ">
    <div class="card border-secondary">
        <div class="card-body">

        <form  action="php/insertar_producto.php"  method="POST" autocomplete="off">


<div  class="form-group">
<input type="number"  class="form-control"  name="codigo"  placeholder="codigo " autofocus="on" >
</div>
<div  class="form-group">
<input type="text"  class="form-control"  name="nombre"  placeholder="nombre"  >
</div>
<div  class="form-group">
<input type="number"  class="form-control"  name="precio"  placeholder="precio" >
</div>
<div  class="form-group">
<input type="number"  class="form-control"  name="cantidad"  placeholder="cantidad" >
</div>
<div  class="form-group">
<input type="file" class="form-control"   name="foto"  >
</div>
 <div class="form-group">
 <button type="submit"  class="btn btn-secondary btn-block" ><i class="material-icons">AGREGAR add_circle</i></button>
 </div>
 </form>
        </div>
 
    </div>
 
    
<div class="col-12 pt-2">
<div class="card border-info ">
        <div class="card-body">

<form  action="mostrar_un_producto.php"  method="POST">
<div  class="form-group">
<input type="text"  class="form-control"  name="nombre"  placeholder="nombre"  >
</div>
<div class="form-group">
<button type="submit"  class="btn btn-info btn-block" ><i class="material-icons">BUSCAR search</i></button>
</div>
</form>

</div>
</div>
</div>

 </div>

<div class="col-8">
  <table class="table table-striped table-dark">

    <thead>

      <tr>
    
       <th scope="col">CODIGO</th>
       <th scope="col">NOMBRE</th>
       <th scope="col">PRECIO</th>
       <th scope="col">CANTIDAD</th>
       <th scope="col">FOTO</th>
       <th scope="col"></th>
    
  </tr>
<thead>

<tbody>

<?php

$mostrar=mysqli_query($db,"select * from producto");

while($registro = mysqli_fetch_array($mostrar)){
?>

   <tr>
    <td><?php echo   $registro['codigo'] ;?></td>
    <td><?php echo   $registro['nombre'] ;?></td>
    <td><?php echo   $registro['precio'] ;?></td>
    <td><?php echo   $registro['cantidad'] ;?></td>
    <td><img height="50px" src="img/<?php echo $registro['foto'] ?> "></td>
    <td><a  href="php/eliminar_producto.php?id=<?php echo $registro['id'] ?>"><i style="color:white;" class="material-icons" >delete</i></a></td>

   </tr>
 
<?php  }

?>

<style>
img{

}

img:hover{
        height:130px;    
        border-radius: 70px;
}

</style>

</tbody>
</table>

</div>

</div>



</div>


</body>
</html>