<?php
include_once "mpdf/mpdf.php";
include_once "../dao/ControlHerramienta.php";
$pdf   = new mPDF('c');
$dao   = new ControlHerramienta();

$html  = "<p align='center'><h1>Reporte de herramientas defectuosa o en reparcion </h1></p>";
$html .= "<hr>";

$html .= "".$dao->reporte2()."";
$pdf->WriteHTML($html);

$pdf->Output();
?>
