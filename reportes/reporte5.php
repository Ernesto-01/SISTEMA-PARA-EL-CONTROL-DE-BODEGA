<?php
include "mpdf/mpdf.php";
include "../dao/ControlHerramienta.php";
$pdf   = new mPDF('c');
$dao   = new ControlHerramienta();

$html="<h1> Reporte de herramientas disponibles a la hora y fecha </h1>";
$html.= "<hr>";
$html.= $dao->reporte5();

$pdf->WriteHTML($html);
$pdf->Output();

exit;

  ?>
