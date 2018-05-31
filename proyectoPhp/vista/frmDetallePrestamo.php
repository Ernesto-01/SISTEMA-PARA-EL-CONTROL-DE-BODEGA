<?php
session_start();

if(isset($_SESSION["user"]))
{

include_once "../modelo/DetallePrestamo.php";
include_once "../dao/ControlDetallePrestamo.php";
$daoDetalle=new ControlDetallePrestamo();
$daoMDetalle=new DetallePrestamo();

if (isset($_REQUEST["btnEliminarH"])) {
  if (isset($_REQUEST["txtIdDetalle"])) {
    $idPres=$_REQUEST["txtIdDetalle"];
    $daoDetalle->eliminar($idPres);
  }
}
if (isset($_REQUEST["btnInsertarH"])) {
  if (isset($_REQUEST["txtIdDetalle"])) {

//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    $daoMDetalle->setIdDetallePrestamo($_REQUEST["txtIdDetalle"]);
    $daoMDetalle->setFechaInicioPrestamo($_REQUEST["txtFechaI"]);
    $daoMDetalle->setFechaFinPrestamo($_REQUEST["txtFechaF"]);
    $daoMDetalle->setFechaEntrega($_REQUEST["txtFechaE"]);
    $daoMDetalle->setIdHerramienta($_REQUEST["txtIdHerramienta"]);
    $daoMDetalle->setIdPrestamo($_REQUEST["txtIdPrestamo"]);


    if($daoDetalle->insertar($daoMDetalle)){
       echo "<script>alert('Exito');</script>";
    }else{
       echo "<script>alert('Error');</script>";
     }
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("../maquetacion/head.php");?>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <link rel="stylesheet" type="text/css" href="../js/datetimepicker-master/jquery.datetimepicker.css"/>

  <title>Menu Herramienta disponible</title>
  <script>
    function llenarDetalle(a1,a2,a3,a4,a5,a6){
      document.frmDetalle.txtIdDetalle.value=a1;
      document.frmDetalle.txtFechaI.value=a2;
      document.frmDetalle.txtFechaF.value=a3;
      document.frmDetalle.txtFechaE.value=a4;

      document.frmDetalle.txtIdHerramienta.value=a5;
      document.frmDetalle.txtIdPrestamo.value=a6;

    }
    function msj() {
    if(confirm("Esta seguro")){
      <?php $a="Es pere un nos segundos"; ?>
    	alert('<?php echo $a; ?>');

    }
}

  </script>
</head>
<body>

  <?php include("../maquetacion/nav.php");?>

 <div class="container">
   <div class="panel panel-success">
     <div class="panel-heading">
       <div class="btn-group pull-right">
       </div>
       <h4></i><i class="glyphicon glyphicon-user"></i>     Gestionar Detalle Prestamo</h4>
     </div>
     <div class="panel-body">
  <form name="frmDetalle">
    Id detalle prestamo<input type="text" name="txtIdDetalle"><br>
    <input type="hidden" name="txtIdPrestamo">

    id herramienta<input type="text" name="txtIdHerramienta">

    Fecha inicio prestamo<input type="text" name="txtFechaI"><br>
    Fecha fin prestamo<input type="text" name="txtFechaF" id ="datetimepicker"/><br>
    Fecha de entrega<input type="text" name="txtFechaE"><br>

  <?php
  if (isset($_SESSION["smaestro"]["code"]) && isset($_SESSION["smaestro"]["codp"])) {
    $a=$_SESSION["smaestro"]["codp"];
    $b=$_SESSION["smaestro"]["code"];
  echo $daoDetalle->herramientasPrestadasPorUnaPersona($a,$b);

  unset($a);
  unset($b);
}else{
  echo "No existe la session 1";
}
  echo $daoDetalle->mostrar();
   ?>
</form>
</body>
</html>
<?php } ?>
