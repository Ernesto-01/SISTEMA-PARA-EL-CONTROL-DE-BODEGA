<?php
include "mpdf/mpdf.php";
include "../dao/ControlHerramienta.php";
$pdf   = new mPDF('c');
$dao   = new ControlHerramienta();

$html  = "<p align='center'><h1>Reporte herramientas según categoría.
</h1></p>";
$html .= "<hr>";

$html .= "".$dao->reporte1()."";
$pdf->WriteHTML($html);

$pdf->Output();
?>
