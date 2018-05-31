<?php
include_once "mpdf/mpdf.php";
include_once "../dao/ControlHerramienta.php";
$pdf   = new mPDF('c');
$dao   = new ControlHerramienta();

$html.= $dao->reporte5();
$html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
$pdf->WriteHTML($html);
$pdf->Output();

exit;

  ?>
