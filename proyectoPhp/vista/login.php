<?php

if (isset($_REQUEST["u"])) 
{
echo "<script>
  alert('Verifique el usuario y contraseña');
</script>";
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>

    <link href="../css/login.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  </head>

<body background="portada.jpg">

 <div class="container">
  <br><br><br>
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="../img/login.png"/>
            <p id="profile-name" class="profile-name-card"></p>

            <form action="../modelo/acceso.php" method="POST">     
                <input class="form-control" type="text" name="txtUser" placeholder="Usuario" value="" autofocus="" required=""><br>
                <input class="form-control" type="password" name="txtPassword" placeholder="Contraseña" value="" autofocus="" required=""><br>
                <input type="submit" name="btnIngresar" value="Ingresar" class="btn btn-lg btn-success btn-block btn-signin">

            </form>
            
        </div>
    </div>
  </body>
</html>
