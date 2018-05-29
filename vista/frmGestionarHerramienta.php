<?php
include "../dao/ControlHerramienta.php";

$daoH = new ControlHerramienta();
$h =new Herramienta();

if (isset($_REQUEST["btnAgregar"])) {
  
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

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8 ">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Gestionar Herramienta</title>
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
  <center>
<form method="post" action="#" name="frm">
<table>
  <tr><td>ID</td><td><input type="text" name="txtId" placeholder="# ID"></td></tr>
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
</td></tr>
  <tr>
    <td colspan="2">
      <input type="submit" name="btnAgregar" value="Agregar">
      <input type="submit" name="btnModificar" value="Modificar">
      <input type="submit" name="btnEliminar" value="Eliminar">
      <a href="../reportes/ReporteCategoriaHerramienta.php" >
      <input type="button" name="btnReporte" value="Generar Reporte">
    </a>
    </td>
  </tr>
</table>







</form><br><hr>

  <?php

echo $daoH->mostrar();
   ?>
</center>
</body>
</html>
