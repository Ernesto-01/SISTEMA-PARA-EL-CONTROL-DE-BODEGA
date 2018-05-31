<?php

session_start();

if(isset($_SESSION["user"]))
  {
include "../dao/DAOareatrabajo.php";

$dao = new DAOAreaTrabajo();
$e = new AreaTrabajo();

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

<?php include("../maquetacion/head.php");?>

    <meta charset="utf-8">
    <title>Area de Trabajo</title>
    <script>

     function cargar(idArea,Area){
         document.frm.txtidArea.value=idArea;
         document.frm.txtArea.value=Area;     
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
      <h4></i><i class="glyphicon glyphicon-lock"></i>     Area de trabajo</h4>
    </div>
    <div class="panel-body">    
    <center>
      <form action="#" method="POST" name="frm">
          <input type="number"  name="txtidArea" placeholder="# ID Area"><br>
          <input type="text" name="txtArea" placeholder="Area/Zona"><br>
          <br>
          <input type="submit" name="btnInsertar" value="Insertar" class="btn btn-success btn-lg">
         <input type="submit" name="btnEliminar" value="Eliminar" onclick="return confirm('¿Estas seguro de eliminar este registro?');" class="btn btn-danger btn-lg">
          <input type="submit" name="btnModificar" value="Modificar" class="btn btn-info btn-lg">
<form action="#" method="POST">
   <input type="submit" name="btnRe" value="Reiniciar" class="btn btn-warning btn-lg">
</form>
        </form>
<br>
</center>
</body>
</html>

<?php

if(isset($_REQUEST['btnInsertar'])){
   $e->setArea($_REQUEST["txtArea"]);
   if($dao->insertar($e)){
     echo "<script>alert('Exito');</script>";
    
   }else{
     echo "<script>alert('Error');</script>";
   }

}else if(isset($_REQUEST["btnEliminar"])){
    $id= $_REQUEST["txtidArea"];
    if($dao->eliminar($id)){
      echo "<script>alert('Exito');</script>";
      
    }else{
      echo "<script>alert('Error');</script>";
    }

}else if(isset($_REQUEST["btnModificar"])){
    $e->setIdArea($_REQUEST["txtidArea"]);
    $e->setArea($_REQUEST["txtArea"]);
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
  