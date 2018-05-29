<?php

interface InterfazCrud
{
    public function insertar($obj);
    public function eliminar($id);
    public function modificar($obj);
    public function mostrar();
}

 ?>
