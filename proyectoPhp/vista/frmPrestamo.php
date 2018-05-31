<?php
session_start();

if(isset($_SESSION["user"]))
{
include_once "../dao/ControlPrestamo.php";

$dao = new ControlPrestamo();
$p = new Prestamo();

 ?>
<!DOCTYPE html>
<html lang="en">
<head>

  <?php include("../maquetacion/head.php");?>

  <meta charset="UTF-8 ">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Gestionar Herramienta</title>
  <script>
    function llenar(vid,vDescripcion,vEncargado,vRecibe){
      document.frm.txtId.value=vid;
      document.frm.txtDescripcion.value=vDescripcion;
      document.frm.txtEncargado.value=vEncargado;
      document.frm.txtRecibe.value=vRecibe;
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
      <h4></i><i class="glyphicon glyphicon-user"></i>     Gestionar Prestamo</h4>
    </div>
    <div class="panel-body">


  <center>
    <form name="frm" method="post" action="#">
    <table><tr>
      <td>ID</td>
      <td><input type="text" name="txtId" required>

      </td>
    </tr>
    <tr>
      <td>Descripcion del prestamo</td>
      <td><input type="text" name="txtDescripcion" required></td>
    </tr>
    <tr>
      <td>Emplrado encargado</td>
      <td><input type="text" name="txtEncargado" required></td>
    </tr>
    <tr>
      <td>Empleado Recibe</td>
      <td><input type="text" name="txtRecibe" required></td>
    </tr>
    <tr>
      <td colspan="2"><br>
        <input type="submit" name="btnNuevoPrestamo" value="Nuevo Prestamo">
        <input type="submit" name="btnAgregarH" value="Activar" onclick=" llenard()" class="btn btn-success btn-lg">
        <input type="submit" name="btnModificar" value="Modificar" class="btn btn-info btn-lg">
        <input type="submit" name="btnEliminar" value="Eliminar" class="btn btn-danger btn-lg">
        <input type="reset" name="btnLimpiar" value="Limpiar" class="btn btn-warning btn-lg">
      </td>
      <br>
    </table>
    </form></tr>
    </center>
    </body>
    </html>

<?php

if (isset($_REQUEST["btnAgregarH"])) {
  $ide=$_REQUEST["txtId"];
  $idrecibe=$_REQUEST["txtRecibe"];

if (isset($_SESSION["smaestro"]["code"]))
{
  if (isset($_SESSION["smaestro"]["codp"]))
  {
    unset( $_SESSION["smaestro"]["code"] );
    unset( $_SESSION["smaestro"]["codp"] );
    $_SESSION["smaestro"]["code"]=$ide;
    echo "Exito ya puede comenzar a agregar Herramienta al prestamo:".$_SESSION["smaestro"]["code"]."<hr>";
    $_SESSION["smaestro"]["codp"]=$idrecibe;

  }
}else {
  $_SESSION["smaestro"]["code"]=$ide;
  echo "Exito ya puede comenzar a agregar Herramienta al prestamo:".$_SESSION["smaestro"]["code"]=$ide."<hr>";
  $_SESSION["smaestro"]["codp"]=$idrecibe;

}
}
if (isset($_REQUEST["btnNuevoPrestamo"])) {

  $p->setDescripcion($_REQUEST["txtDescripcion"]);
  $p->setIdEmpleadoEntrega($_REQUEST["txtEncargado"]);
  $p->setIdEmpleadoRecive($_REQUEST["txtRecibe"]);
  if($dao->insertar($p)){
     echo "<script>alert('Exito');</script>";
  }else{
     echo "<script>alert('Error');</script>";
   }

}else if(isset($_REQUEST["btnModificar"])) {

$p->setIdPrestamo($_REQUEST["txtId"]);
$p->setDescripcion($_REQUEST["txtDescripcion"]);
$p->setIdEmpleadoEntrega($_REQUEST["txtEncargado"]);
$p->setIdEmpleadoRecive($_REQUEST["txtRecibe"]);

  if($dao->modificar($p)){
     echo "<script>alert('Exito');</script>";
  }else{
     echo "<script>alert('Error');</script>";
   }
}else if (isset($_REQUEST["btnEliminar"])) {
  $cantida=$_REQUEST["txtRecibe"];
  $idp=$_REQUEST["txtId"];
  if ($dao->cantidadHerramientasPrestadas($cantida)==0) {

    if($dao->eliminar($idp)){
       echo "<script>alert('Exito');</script>";
    }else{
       echo "<script>alert('Error');</script>";
     }
  }else{
    echo "<script>alert('Aun tiene prestamos pendientes');</script>";
  }
}
echo $dao->mostrar();
}
else
{
  header("location:login.php");
}

   ?>
