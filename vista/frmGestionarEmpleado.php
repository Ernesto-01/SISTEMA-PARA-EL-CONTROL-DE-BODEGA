<?php
include "../dao/DaoEmpleados.php";

$daoE = new DaoEmpleados();
$emp =new Empleado();

if (isset($_REQUEST["btnAgregar"])) {
  $emp->setIdEmpleado($_REQUEST["txtId"]);
  $emp->setNombre($_REQUEST["txtNombre"]);
  $emp->setApellido($_REQUEST["txtApellido"]);
  $emp->setDireccion($_REQUEST["txtDireccion"]);
  $emp->setDui($_REQUEST["txtDui"]);
  $emp->setNit($_REQUEST["txtNit"]);
  $emp->setTel($_REQUEST["txtTel"]);
  $emp->setIdUsuario($_REQUEST["txtUsuario"]);
  $emp->setIdCargo($_REQUEST["txtCargo"]);



  if($daoH->insertar($emp)){
     echo "<script>alert('Exito');</script>";
  }else{
     echo "<script>alert('Error');</script>";
   }
}else if (isset($_REQUEST["btnModificar"])) {

$emp->setIdEmpleado($_REQUEST["txtId"]);
$emp->setNombre($_REQUEST["txtNombre"]);
$emp->setApellido($_REQUEST["txtApellido"]);
$emp->setDireccion($_REQUEST["txtDireccion"]);
$emp->setDui($_REQUEST["txtDui"]);
$emp->setNit($_REQUEST["txtNit"]);
$emp->setTel($_REQUEST["txtTel"]);
$emp->setIdCargo($_REQUEST["txtUsuario"]);
$emp->setActivo($_REQUEST["txtCargo"]);

  if($daoH->modificar($emp)){
     echo "<script>alert('Exito');</script>";
  }else{
     echo "<script>alert('Error');</script>";
   }
}else if (isset($_REQUEST["btnEliminar"])) {

  $idE=$_REQUEST["txtId"];
  if($daoH->eliminar($idE)){
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
    function llenar(vid,vnombre,vapellido,vdireccion,vdui,vnit,vtel,vusuario,vcargo){
      document.frm.txtId.value=vid;
      document.frm.txtNombre.value=vnombre;
      document.frm.txtApellido.value=vapellido;
      document.frm.txtDireccion.value=vdireccion;
      document.frm.txtDui.value=vdui;
      document.frm.txtNit.value=vnit;
      document.frm.txtTel.value=vtel;
      document.frm.txtUsuario.value=vusuario;
      document.frm.txtCargo.value=vcargo;
    }
  </script>
</head>
<body>
  <center>
    <form name="frm" method="post" action="#">
    <table><tr>
      <td>ID Empleado</td>
      <td><input type="text" name="txtId"></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><input type="text" name="txtNombre"></td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td><input type="text" name="txtApellido"></td>
    </tr>
    <tr>
      <td>Direccion</td>
      <td><input type="text" name="txtDireccion"></td>
    </tr>
    <tr>
      <td>DUI</td>
      <td><input type="text" name="txtDui"></td>
    </tr>
    <tr>
      <td>NIT</td>
      <td><input type="text" name="txtNit"></td>
    </tr>
    <tr>
      <td>Teléfono</td>
      <td><input type="text" name="txtTel"></td>
    </tr>
    <tr>
      <td>Id Usuario</td>
      <td><input type="text" name="txtUsuario"></td>
    </tr>
    <tr>
      <td>Id Cargo</td>
      <td><input type="text" name="txtCargo"></td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="submit" name="btnAgregar" value="Agregar">
        <input type="submit" name="btnModificar" value="Agregar">
        <input type="submit" name="btnEliminar" value="Agregar">
        <input type="reset" name="btnLimpiar" value="Limpiar">
      </td>

    </table>
    </form></tr>
  <?php

echo $daoE->mostrar();
   ?>
</center>
</body>
</html>
