<?php
  session_start();
  include "credenciales.php";
  if (isset($_REQUEST["btnIngresar"])) {
    $user=$_REQUEST["txtUser"];
    $pass=$_REQUEST["txtPassword"];
    try {
      $con=new mysqli(SERVIDOR,USUARIO,CLAVE,BD);
      $sql="select usuario, idTipoUsuario from usuario where usuario='$user' and  clave='$pass' and activo=1";
      $rs=$con->query($sql);
      $can=mysqli_num_rows($rs);
      if ($can==1) {
        while ($fila=$rs->fetch_assoc()) {
          $nombre = $fila['usuario'];
          $nivel = $fila['idTipoUsuario'];
        }
        $_SESSION["user"]["usuario"]=$nombre;
        $_SESSION["user"]["nivel"]=$nivel;
        header("location:../index.php");
      }else{

        header("location:../vista/login.php?u=false");
      }

    } catch (\Exception $e) {

    }

  }else{
    header("location:../vista/login.php");
  }
  if (isset($_REQUEST["btnCerrarSession"])) {
      session_destroy();
      header("location:../vista/login.php");
  }
?>
