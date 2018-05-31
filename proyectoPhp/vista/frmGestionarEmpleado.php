<?php

session_start();

  if(isset($_SESSION["user"]))
  {
include "../dao/DaoEmpleados.php";

$daoE = new DaoEmpleados();
$emp =new Empleado();

?>

<!DOCTYPE html>
<html lang="en">
<head>

<?php include("../maquetacion/head.php");?>

  <meta charset="UTF-8 ">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Empleado</title>
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
      <link rel=icon href='../img/icono1.png' sizes="32x32" type="image/png">
  </script>
</head>
<body>

 <?php include("../maquetacion/nav.php");?>

<div class="container">
  <div class="panel panel-success">
    <div class="panel-heading">
      <div class="btn-group pull-right">
      </div>
      <h4></i><i class="glyphicon glyphicon-user"></i>     Gestionar Empleado</h4>
    </div>
    <div class="panel-body">

  <center>
    <form action="#" method="POST" name="frm">
    <table><tr>
      <td>ID Empleado</td>
    <td><input type="number"  name="txtId" placeholder="# ID"></td>
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
      <td><input type="number"  name="txtUsuario" placeholder="# ID Usuario"></td>
    </tr>
    <tr>
      <td>Id Cargo</td>
        <td><input type="number"  name="txtCargo" placeholder="# ID Cargo"></td>
    </tr>
    <tr><br>
      <td colspan="2"><br>
        <input type="submit" name="btnAgregar" value="Agregar" class="btn btn-success btn-lg">
        <input type="submit" name="btnModificar" value="Modificar" class="btn btn-info btn-lg">
        <input type="submit" name="btnEliminar" value="Eliminar" class="btn btn-danger btn-lg">
        <input type="reset" name="btnLimpiar" value="Limpiar" class="btn btn-warning btn-lg">
      </td>
    </table>
    </form></tr><br><hr>
</center>
</body>
</html>

<?php

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

  if($daoE->insertar($emp)){
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
$emp->setIdUsuario($_REQUEST["txtUsuario"]);
$emp->setIdCargo($_REQUEST["txtCargo"]);


  if($daoE->modificar($emp)){
     echo "<script>alert('Exito');</script>";
  }else{
     echo "<script>alert('Error');</script>";
   }
}else if (isset($_REQUEST["btnEliminar"])) {

  $idE=$_REQUEST["txtId"];
  if($daoE->eliminar($idE)){
     echo "<script>alert('Exito');</script>";
  }else{
     echo "<script>alert('Error');</script>";
   }
}
echo $daoE->mostrar();
}

else
{
  header("location:login.php");
}

?>
