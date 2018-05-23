<?php
include "mpdf/mpdf.php";
include "../dao/ControlHerramienta.php";
$pdf   = new mPDF('c');
$daoCH   = new ControlHerramienta();

$html  = "<p align='center'><h1>Reporte herramientas según categoría.
</h1></p>";
$html .= "<hr>";

$html .= "".$daoCH->reporte()."";
$pdf->WriteHTML($html);//select nombre, salario from empleados;

$pdf->Output();
?>
