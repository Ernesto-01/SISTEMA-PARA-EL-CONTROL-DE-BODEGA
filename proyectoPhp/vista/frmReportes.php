<?php

session_start();

  if(isset($_SESSION["user"]))
  {
include "../dao/DaoEmpleados.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>

<?php include("../maquetacion/head.php");?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

    <title>Reportes</title>
  </head>
  <body>

     <?php include("../maquetacion/nav.php");?>

<div class="container">
  <div class="panel panel-success">
    <div class="panel-heading">
      <div class="btn-group pull-right">    
      </div>
      <h4></i><i class="glyphicon glyphicon-list-alt"></i>     Generar Reporte</h4>
    </div>
    <div class="panel-body">

 
  <table class="table">
    <tbody>

    <?php
        if($_SESSION["user"]["nivel"]==1){
    ?>

  <tr>
    <td>   
      <h3><a href="../reportes/reporte1.php"><i class="glyphicon glyphicon-ok"></i>
      Reporte de Herramienta segun Categoria</a>
    </td>
  </tr> 

  <tr>
    <td>   
      <h3><a href="../reportes/ReporteHerramientasDefectuosas.php"><i class="glyphicon glyphicon-ok"></i>
      Reporte de Herramientas Defectuosas</a>
    </td>
  </tr> 

  <tr>
    <td>   
      <h3><a href="../reportes/reporte3.php"><i class="glyphicon glyphicon-ok"></i>
      Reporte de Herramientas Nuevas</a>
    </td>
  </tr> 

  <tr>
    <td>   
      <h3><a href="../reportes/reporte4.php"><i class="glyphicon glyphicon-ok"></i>
      Reporte de Herramientas en uso (Prestadas)</a>
    </td>
  </tr> 

  <?php } ?>

  <tr>
    <td>   
      <h3><a href="../reportes/reporte5.php"><i class="glyphicon glyphicon-ok"></i>
      Reporte de Herramientas Disponibles</a>
    </td>
  </tr> 

  <tr>
    <td>   
      <h3><a href="../reportes/reporte6.php"><i class="glyphicon glyphicon-ok"></i>
      Reporte de Herramientas Prestadas por Persona</a>
    </td>
  </tr> 


  <?php
       if($_SESSION["user"]["nivel"]==1){
  ?>

  <tr>
    <td>   
      <h3><a href="../reportes/reporte7.php"><i class="glyphicon glyphicon-ok"></i>
      Historial General de prestamos de Herramientas</a>
    </td>
  </tr> 

  <?php } ?>

    </tbody>
  </table>
</div>
</body>
</html>

<?php
}
?>
