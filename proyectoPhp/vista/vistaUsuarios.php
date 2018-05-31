<?php

session_start();

  if(isset($_SESSION["user"]))
  {
include "../dao/DAOusuario.php";

$dao = new DAOUsuarios();
$e = new usuarios();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <?php include("../maquetacion/head.php");?>

    <meta charset="utf-8">
    <title>Usuario</title>
    <script>

     function cargar(idUsuario,usuario,clave,idtipousuario){
         document.frm.txtidUsuario.value=idUsuario;
         document.frm.txtusuario.value=usuario;
         document.frm.txtclave.value=clave;
         document.frm.slTipo.value=idtipousuario;         
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
      <h4></i><i class="glyphicon glyphicon-eye-open"></i>     Gestionar Usuario</h4>
    </div>
    <div class="panel-body">

    <center>
      <form action="#" method="POST" name="frm">
          <input type="number"  name="txtidUsuario" placeholder="# ID Usuario"><br>
          <input type="text" name="txtusuario" placeholder="Usuario"><br>
          <input type="text" name="txtclave" placeholder="Clave"><br>
          <select name="slTipo">
            <?php
               echo $dao->llenarTipoUsuario();
              ?>
          </select>
          <br>
          <br>
          <input type="submit" name="btnInsertar" value="Insertar" class="btn btn-success btn-lg">
          <input type="submit" name="btnEliminar" value="Eliminar" onclick="return confirm('¿Estas seguro de eliminar este usuario?');" class="btn btn-danger btn-lg">
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

   $e->setIdUsuario($_REQUEST["txtidUsuario"]);
   $e->setUsuarios($_REQUEST["txtusuario"]);
   $e->setClave($_REQUEST["txtclave"]);
   $e->setIdTipoUsuario($_REQUEST["slTipo"]);
   if($dao->insertar($e)){
     echo "<script>alert('Exito');</script>";
     echo $dao->seleccionar();
   }else{
     echo "<script>alert('Error');</script>";
   }

}else if(isset($_REQUEST["btnEliminar"])){
    $id= $_REQUEST["txtidUsuario"];
    if($dao->eliminar($id)){
      echo "<script>alert('Exito');</script>";
      echo $dao->seleccionar();
    }else{
      echo "<script>alert('Error');</script>";
    }

}else if(isset($_REQUEST["btnModificar"])){
    $e->setIdUsuario($_REQUEST["txtidUsuario"]);
   $e->setUsuarios($_REQUEST["txtusuario"]);
   $e->setClave($_REQUEST["txtclave"]);
   $e->setIdTipoUsuario($_REQUEST["slTipo"]);

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
    
