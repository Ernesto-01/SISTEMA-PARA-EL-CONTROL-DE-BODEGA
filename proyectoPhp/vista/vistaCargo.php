<?php

session_start();

  if(isset($_SESSION["user"]))
  {
include "../dao/DAOcargo.php";

$dao = new DAOCargo();
$e = new Cargo();

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <?php include("../maquetacion/head.php");?>

    <meta charset="utf-8">
    <title></title>
    <script>

     function cargar(idCargo,cargo,idArea,activo){
         document.frm.txtidCargo.value=idCargo;
         document.frm.txtcargo.value=cargo;
         document.frm.slArea.value=idArea;
           document.frm.txtactivo.value=activo; 
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
      <h4></i><i class="glyphicon glyphicon-briefcase"></i>     Gestionar Cargo</h4>
    </div>
    <div class="panel-body">

    <center>
      <form action="#" method="POST" name="frm">
    <input type="number"  name="txtidCargo" placeholder="# ID cargo"><br>
          <input type="text" name="txtcargo" placeholder="Cargo"><br>
          <select name="slArea">
          <?php 
          echo $dao->mostrar();
          ?>
          </select>
          <br><br>
          <input type="submit" name="btnInsertar" value="Insertar" class="btn btn-success btn-lg">
          <input type="submit" name="btnEliminar" value="Eliminar" onclick="return confirm('¿Estas seguro de eliminar este registro?');" class="btn btn-danger btn-lg">
          <input type="submit" name="btnModificar" value="Modificar" class="btn btn-info btn-lg">
          <form action="#" method="POST">
           <input type="submit" name="btnRe" value="Reiniciar" class="btn btn-warning btn-lg">
          </form>
        </form>
<hr>
<br>
</center>
</body>
</html>

<?php

if(isset($_REQUEST['btnInsertar']))
{
   $e->setIdCargo($_REQUEST["txtidCargo"]);
   $e->setCargo($_REQUEST["txtcargo"]);
   $e->setIdArea($_REQUEST["slArea"]);
  
   if($dao->insertar($e))
   {
     echo "<script>alert('Exito');</script>";
     
   }
   else
   {
     echo "<script>alert('Error');</script>";
   }

}else if(isset($_REQUEST["btnEliminar"]))
{
    $id= $_REQUEST["txtidCargo"];

    if($dao->eliminar($id)){
      echo "<script>alert('Exito');</script>";
      
    }else
    {
      echo "<script>alert('Error');</script>";
    }


}else if(isset($_REQUEST["btnModificar"]))
{
    $e->setIdCargo($_REQUEST["txtidCargo"]);
   $e->setCargo($_REQUEST["txtcargo"]);
   $e->setIdArea($_REQUEST["slArea"]);

    if($dao->modificar($e))
    {
      echo "<script>alert('Exito');</script>";
      
    }else{
      echo "<script>alert('Error');</script>";
    }
}
  echo $dao->seleccionar();
}
else
{
  header("location:login.php");
}

?>
  
