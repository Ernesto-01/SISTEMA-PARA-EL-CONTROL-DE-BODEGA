<?php
session_start();

if (isset($_SESSION["user"]))
{

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <?php include("maquetacion/head.php");?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/custom.css">
  <link rel=icon href='img/icono1.png' sizes="32x32" type="image/png">

  <title>Index</title>
</head>
<body>

<nav class="navbar navbar-default ">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li>
        <br><?php echo "<b><p style=color:#FDFEFE>Bienvenido: </b>". $_SESSION["user"]["usuario"] ." "; ?>
      </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
<li class="<p align="right">
<a href="modelo/acceso.php?btnCerrarSession=true"><i class="glyphicon glyphicon-off"></i> Cerrar Sesion</a>
</p>
</a>
</li>
      </ul>
    </div>
  </div>
</nav>


<center>
 <h1>Menu Principal</h1>

<div class="container">

  <table class="table">
    <tbody>

    <?php
        if($_SESSION["user"]["nivel"]==1){
    ?>

      <tr>
        <td>
          <h3><a href="vista/vistaUsuarios.php"><i class="glyphicon glyphicon-eye-open"></i>    Gestionar Usuario</a>
        </td>
      </tr>

      <tr>
        <td>
        	<h3><a href="vista/frmGestionarEmpleado.php"><i class="glyphicon glyphicon-user"></i>    Gestionar Empleado</a>
        </td>
      </tr>

      <tr>
        <td>
          <h3><a href="vista/vistaCargo.php"><i class="glyphicon glyphicon-briefcase"></i>    Gestionar Cargo</a>
        </td>
      </tr>

      <tr>
        <td>
          <h3><a href="vista/vistaAreaTrabajo.php"><i class="glyphicon glyphicon-lock"></i>    Gestionar Area de Trabajo</a>
        </td>
      </tr>

      <tr>
        <td>
        	<h3><a href="vista/frmGestionarHerramienta.php"><i class="glyphicon glyphicon-wrench"></i>    Gestionar Herramienta</a>
        </td>
      </tr>

      <tr>
        <td>
          <h3><a href="vista/vistaCateHerra.php"><i class="glyphicon glyphicon-check"></i>    Gestionar Categoria de Herramienta</a>
        </td>
      </tr>

      <tr>
        <td>
          <h3><a href="vista/frmReportes.php"><i class="glyphicon glyphicon-list-alt"></i>    Gestionar Reportes</a>
        </td>
      </tr>

      <tr>
        <td>
          <h3><a href="vista/frmPrestamo.php"><i class="glyphicon glyphicon-list-alt"></i>    Gestionar Prestamo</a>
        </td>
      </tr>

      <?php } ?>

      <?php
        if($_SESSION["user"]["nivel"]==2){
      ?>

      <tr>
        <td>
          <h3><a href="vista/frmReportes.php"><i class="glyphicon glyphicon-list-alt"></i>    Gestionar Reportes</a>
        </td>
      </tr>

      <?php } ?>

   </tbody>
  </table>
 </div>
</body>
</html>

<?php

}
else
{
  header("location:vista/login.php?u=false");
}

?>
