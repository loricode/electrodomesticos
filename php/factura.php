<?php

//genera la factura en pdf
session_start();

if(isset($_SESSION['u_usuario'])){
  }

else{
  header("location: index.php");
}
include("conexion.php");

$cobro  = $_REQUEST['cobro'];
$pago   = $_REQUEST['pago'];
$vuelto = $_REQUEST['vuelto'];
$fecha  = $_REQUEST['fecha'];
$hora   = $_REQUEST['hora'];
$usuario = $_SESSION['u_usuario'];
$sql = mysqli_query($db, "SELECT * FROM administrador WHERE correo='$usuario' " );
$resultado = mysqli_fetch_array($sql);
$administrador = $resultado['nombre']; 

include('../fpdf/fpdf.php');


//nuevo pdf
$pdf=new FPDF();

$pdf->SetAutoPageBreak(false);

$pdf->AddPage();

//set initial y axis position per page
$y_axis = 30;
$pdf->SetTitle('factura');
//print column titles
$pdf->SetMargins(000,000,000);
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','B',10);
$pdf->SetY(15);
$pdf->SetX(18);
$pdf->Cell(40,4,utf8_decode('factura J y L'),0,0,'R');
$pdf->SetY(19);
$pdf->SetX(40);
$pdf->Cell(22,6," vendedor: $administrador",2,0,'R',1);
$pdf->SetY(24);
$pdf->SetX(36);
$pdf->Cell(21,5," Fecha: $fecha",2,0,'R',1);
$pdf->SetX(67);
$pdf->Cell(21,5," Hora $hora",2,0,'R',1);
$pdf->SetY(30);
$pdf->SetX(20);


$pdf->Cell(21,5,'nombre',1,0,'L',1);
$pdf->Cell(21,5,'precio',1,0,'L',1);
$pdf->Cell(26,5,"total:  $cobro",1,0,'R',1);


$tamano= 5;
$y_axis = $y_axis + $tamano;

//Select the Products you want to show in your PDF file
$sql2=mysqli_query($db, "SELECT * FROM venta " );

$i = 0;

//Set maximum rows per page
$max = 40;

while($row = mysqli_fetch_array($sql2))
{
    //If the current row is the last one, create new page and print column title
    if ($i == $max)
    {
        $pdf->AddPage();
       
        //print column titles for the current page
        $pdf->SetY(60);
        $pdf->SetX(30);
        $pdf->Cell(21,6,'NOMBRE',1,0,'L',1);
        $pdf->Cell(21,6,'PRECIO',1,0,'L',1);
    
        $y_axis = $y_axis + $tamano;
        
        $i = 0;
    }

    $nombre = $row['nombre'];
    $precio = $row['precio'];
    

    $pdf->SetY($y_axis);
    $pdf->SetX(19);
   
    $pdf->Cell(22,5," $nombre ",2,0,'L',2);
    $pdf->Cell(22,5," $precio ",2,0,'L',1);
    

    //Go to next row
    $y_axis = $y_axis + $tamano;
    $i = $i + 1;
}
$pdf->SetY(38);
    $pdf->SetX(62);
$pdf->Cell(28,5,"pago:  $pago",2,0,'R',1);
$pdf->SetY(43);
    $pdf->SetX(62);
$pdf->Cell(29,5,"cambio:  $vuelto",2,0,'R',1);
$pdf->SetY(43);

$pdf->SetX(62);


 $pdf->Output();
  




//'nueva_venta.pdf','D'  es para descargar el pdf



?>