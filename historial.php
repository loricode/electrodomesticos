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
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>producto</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark  bg-dark pt-4">
       <div class="container">
            <a class="navbar-brand "  href="">
                    <i class="material-icons">ELECTRODOMESTICOS  brightness_7</i>
            </a>
            <button class="navbar-toggler"   type="button" data-toggle="collapse" data-target="#navegar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class=" collapse navbar-collapse" id="navegar">
                    <ul id="navegacion" class="navbar nav  ml-auto" >    
                            <li  class="nav-item"><a class="navbar-brand nav-link " href="principal.php"><I class="material-icons " > PRINCIPAL business</i>  </a></li>
                            <li id="producto" class="nav-item"><a class=" navbar-brand nav-link" href="producto.php"><i class="material-icons"> PRODUCTOS content_paste</i></a></li>
                            <li class="nav-item"><a class=" navbar-brand nav-link" href="historial.php"><i class="material-icons">HISTORIAL desktop_mac</i></a></li>
                            <li class="nav-item"><a class=" navbar-brand nav-link" href="php/finalizar.php"><i class="material-icons">SALIR exit_to_app</i></a></li>
                     </ul>
            </div>
       </div>
        </nav>

<div class="container pt-4" >

<div class="row">


<div class="col-12">
  <table class="table table-striped table-dark">

    <thead>

      <tr>
    
       <th scope="col">CODIGO</th>
       <th scope="col">NOMBRE</th>
       <th scope="col">PRECIO</th>
       <th scope="col">FECHA</th>
       <th scope="col">HORA</th>
    
  </tr>
<thead>

<tbody>

<?php


$sql=mysqli_query($db,"SELECT * FROM historial");

while($registro = mysqli_fetch_array($sql)){
?>

   <tr>
    <td><?php echo   $registro['codigo'] ;?></td>
    <td><?php echo   $registro['nombre'] ;?></td>
    <td><?php echo   $registro['precio'] ;?></td>
    <td><?php echo   $registro['fecha'] ;?></td>
    <td><?php echo   $registro['hora'] ;?></td>

    <td><a  href="php/elimina_registro_historial.php?id=<?php echo $registro['id'] ?>"><i style="color:white;" class="material-icons" >delete</i></a></td>

   </tr>
 
<?php  }

?>


</tbody>
</table>

</div>

</div>


</div>

</div>


</body>
</html>