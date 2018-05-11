<?php
session_start();

if (isset($_SESSION["user"])) {




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Index</title>

</head>
<body>

  <p align=right>Bienvenido: <?php  echo $_SESSION["user"]["usuario"];?>|<a  href="modelo/acceso.php?btnCerrarSession=true"> Cerrar Sesion</a></p>

<?php
if ($_SESSION["user"]["nivel"]==1) {
  include "vista\indexAdmin.php";
}
if ($_SESSION["user"]["nivel"]==2) {
  include "vista\indexEmpleado.php";
}
?>
</body>
</html>
<?php
}else {
  header("location:vista/login.php?u=false");
}
?>
