<?php
$title = "";

		if (isset($title))
		{
?>

<nav class="navbar navbar-default ">
  <div class="container-fluid">
    <div class="navbar-header">
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

<li class="<p align="right">
<a href="../index.php"><i class="glyphicon glyphicon-home"></i> Menu</a>
</p>
</a>
</li>

  <?php
    if($_SESSION["user"]["nivel"]==1){
  ?>
      <li class=""><a href="vistaUsuarios.php"><i class='glyphicon glyphicon-eye-open'></i> Usuario</a></li>
      <li class=""><a href="frmGestionarEmpleado.php"><i class='glyphicon glyphicon-user'></i> Empleado</a></li>
      <li class=""><a href="vistaCargo.php"><i class='glyphicon glyphicon-briefcase'></i> Cargo</a></li>
      <li class=""><a href="vistaAreaTrabajo.php"><i class='glyphicon glyphicon-lock'></i> Area de Trabajo</a></li>
      <li class=""><a href="frmGestionarHerramienta.php"><i class='glyphicon glyphicon-wrench'></i> Herramienta</a></li>
      <li class=""><a href="vistaCateHerra.php"><i class='glyphicon glyphicon-check'></i> Categoria Herramienta</a></li>
      <li class=""><a href="frmPrestamo.php"><i class='glyphicon glyphicon-check'></i> Prestamo</a></li>
      <li class=""><a href="frmDetallePrestamo.php"><i class='glyphicon glyphicon-check'></i> Detalle Prestamo</a></li>

  <?php
    }
  ?>

      <li class=""><a href="frmReportes.php"><i class='glyphicon glyphicon-list-alt'></i> Reportes</a></li>

      <?php
       }
      ?>

      </ul>
      <ul class="nav navbar-nav navbar-right">

<li class="<p align="right">
<a href="../modelo/acceso.php?btnCerrarSession=true"><i class="glyphicon glyphicon-off"></i> Cerrar Sesion</a>
</p>
</a>
</li>
      </ul>
    </div>
  </div>
</nav>
