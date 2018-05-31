<?php

include "mpdf/mpdf.php";
include "../dao/ControlHerramienta.php";

$pdf   = new mPDF('c');
$daoCH   = new ControlHerramienta();

$res = $daoCH->mostrarCategoria();
$html .= $res;
$html = utf8_encode($html);
$pdf->WriteHTML($html);

$pdf->Output();
?>
