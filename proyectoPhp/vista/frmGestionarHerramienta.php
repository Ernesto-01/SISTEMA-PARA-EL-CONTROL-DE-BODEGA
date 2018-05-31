<?php

session_start();

  if(isset($_SESSION["user"]))
  {

include "../dao/ControlHerramienta.php";

$daoH = new ControlHerramienta();
$h =new Herramienta();


?>

<!DOCTYPE html>
<html lang="en">
<head>

<?php include("../maquetacion/head.php");?>

  <meta charset="UTF-8 ">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Herramienta</title>
  <script>
    function llenar(a,s,d,f){
      document.frm.txtId.value=a;
      document.frm.txtNombre.value=s;
      document.frm.slCategoria.value=d;
      document.frm.slEstado.value=f;
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
      <h4></i><i class="glyphicon glyphicon-wrench"></i>     Gestionar Herramienta</h4>
    </div>
    <div class="panel-body">

  <center>
<form method="post" action="#" name="frm">
<table>
  <br>
  <tr><td>ID</td><td><input type="number"  min="1" max="100" name="txtId" placeholder="# ID"></td></tr>
  <tr><td>Nombre</td><td><input type="text" name="txtNombre" placeholder="Nombre"></td></tr>
  <tr><td>Categoria</td><td>

  <select name='slCategoria'>
    <?php
      echo $daoH->mostrarCategoria();
    ?>
  </select>
</td>
</tr>
<tr><td>Estado/Condicion</td>
<td>
  <select name='slEstado'>
  <?php
    echo $daoH->mostrarEstadoHerrmainta();
  ?>
   </select>
   <br>
</td></tr>
  <tr>
    <td colspan="2">
      <br>
      <input type="submit" name="btnAgregar" value="Agregar" class="btn btn-success btn-lg">
      <input type="submit" name="btnModificar" value="Modificar" class="btn btn-info btn-lg">
       <input type="submit" name="btnEliminar" value="Eliminar" onclick="return confirm('¿Estas seguro de eliminar este registro?');" class="btn btn-danger btn-lg">
      <a href="../reportes/Reporte1.php">
      <input type="button" name="btnReporte" value="Generar Reporte" class="btn btn-warning btn-lg">
    </a>
    </td>
  </tr>
</table>
</form>
<br><hr>  
</center>
</body>
</html>

<?php

if (isset($_REQUEST["btnAgregar"])) {
  $h->setIdHerramienta($_REQUEST["txtId"]);
  $h->setNombre($_REQUEST["txtNombre"]);
  $h->setIdCategoria($_REQUEST["slCategoria"]);
  $h->setIdEstado($_REQUEST["slEstado"]);
  $h->setDisponible(1);
  $h->setActivo(1);
  if($daoH->insertar($h)){
     echo "<script>alert('Exito');</script>";
  }else{
     echo "<script>alert('Error');</script>";
   }
}else if (isset($_REQUEST["btnModificar"])) {
  $h->setIdHerramienta($_REQUEST["txtId"]);
  $h->setNombre($_REQUEST["txtNombre"]);
  $h->setIdCategoria($_REQUEST["slCategoria"]);
  $h->setIdEstado($_REQUEST["slEstado"]);
  $h->setDisponible(1);
  $h->setActivo(1);
  if($daoH->modificar($h)){
     echo "<script>alert('Exito');</script>";
  }else{
     echo "<script>alert('Error');</script>";
   }
}else if (isset($_REQUEST["btnEliminar"])) {
  $idH=$_REQUEST["txtId"];
  if($daoH->eliminar($idH)){
     echo "<script>alert('Exito');</script>";
  }else{
     echo "<script>alert('Error');</script>";
   }
}
echo $daoH->mostrar();
}

else
{
  header("location:login.php");
}

?>
