<?php

session_start();

  if(isset($_SESSION["user"]))
  {
include "../dao/DAOcategoriaHerramienta.php";

$dao = new DAOCateHerra();
$e = new Herramientacat();

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <?php include("../maquetacion/head.php");?>

    <meta charset="utf-8">
    <title>Categoria Herramienta</title>
    <script>

     function cargar(idCategoria,nomcatego){
         document.frm.txtidCategoria.value=idCategoria;
         document.frm.txtnomcatego.value=nomcatego;   
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
      <h4></i><i class="glyphicon glyphicon-check"></i>     Gestionar Categoria Herramienta</h4>
    </div>
    <div class="panel-body">

    <center>
      <form action="#" method="POST" name="frm">
        <input type="number"  name="txtidCategoria" placeholder="# ID Categoria"><br>
          <input type="text" name="txtnomcatego" placeholder="Nombre Categoria" ><br>
         
          <br>
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


if(isset($_REQUEST['btnInsertar'])){
   $e->setCategoria($_REQUEST["txtnomcatego"]);
   
  
   if($dao->insertar($e)){
     echo "<script>alert('Exito');</script>";
     echo $dao->seleccionar();
   }else{
     echo "<script>alert('Error');</script>";
   }

}else if(isset($_REQUEST["btnEliminar"])){
    $id= $_REQUEST["txtidCategoria"];
    if($dao->eliminar($id)){
      echo "<script>alert('Exito');</script>";
      echo $dao->seleccionar();
    }else{
      echo "<script>alert('Error');</script>";
    }


}else if(isset($_REQUEST["btnModificar"])){
    $e->setIdCategoria($_REQUEST["txtidCategoria"]);
   $e->setCategoria($_REQUEST["txtnomcatego"]);

  

    if($dao->modificar($e)){
      echo "<script>alert('Exito');</script>";
      echo $dao->seleccionar();
    }else{
      echo "<script>alert('Error');</script>";
    }

}else{
  echo $dao->seleccionar();
}
}
else
{
  header("location:login.php");
}

 ?>


