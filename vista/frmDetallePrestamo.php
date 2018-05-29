<?php
session_start();
include_once "../dao/ControlDetallePrestamo.php";
$daoDetalle=new ControlDetallePrestamo();

if (isset($_REQUEST["btnEliminarH"])) {
  if (isset($_REQUEST["txtIdDetalle"])) {
    $idPres=$_REQUEST["txtIdDetalle"];
    $daoDetalle->eliminar($idPres);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <link rel="stylesheet" type="text/css" href="../js/datetimepicker-master/jquery.datetimepicker.css"/>


  <title>Menu Herramienta disponible</title>
  <script>
    function llenarDetalle(a1,a2,a3,a4){
      document.frmDetalle.txtIdDetalle.value=a1;
      document.frmDetalle.txtFechaI.value=a2;
      document.frmDetalle.txtFechaF.value=a3;
      document.frmDetalle.txtFechaE.value=a4;
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
  <form name="frmDetalle">
    Id detalle prestamo<input type="text" name="txtIdDetalle"><br>
    <input type="hidden" name="txtPrestamo">
    <input type="hidden" name="txtHerramienta">
    Fecha del prestamo<input type="date" name="txtFechaI"><br>
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
