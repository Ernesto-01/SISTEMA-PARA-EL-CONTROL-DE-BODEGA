<?php

class Empleado
{
private $idEmpleado;
private $nombre;
private $apellido;
private $direccion;
private $dui;
private $nit;
private $tel;
private $idUsuario;
private $idCargo;
private $activo;

  public function Empleado()
  {

    $this->idEmpleado=null;
    $this->nombre=null;
    $this->apellido=null;
    $this->direccion=null;
    $this->dui=null;
    $this->nit=null;
    $this->tel=null;
    $this->idUsuario=null;
    $this->idCargo=null;
    $this->activo=null;
  }
  //set
  public function setIdEmpleado($v){
    $this->idEmpleado=$v;
  }
  public function setNombre($v){
    $this->nombre=$v;
  }
  public function setApellido($v){
    $this->apellido=$v;
  }
  public function setDireccion($v){
    $this->direccion=$v;
  }
  public function setDui($v){
    $this->dui=$v;
  }
  public function setNit($v){
    $this->nit=$v;
  }
  public function setTel($v){
    $this->tel=$v;
  }
  public function setIdUsuario($v){
    $this->idUsuario=$v;
  }
  public function setIdCargo($v){
    $this->idCargo=$v;
  }
  public function setActivo($v){
    $this->activo=$v;
  }

  //get
  public function getIdEmpleado(){
    return $this->idEmpleado;
  }
  public function getNombre(){
    return $this->nombre;
  }
  public function getApellido(){
    return $this->apellido;
  }
  public function getDireccion(){
    return $this->direccion;
  }
  public function getDui(){
    return $this->dui;
  }
  public function getNit(){
    return $this->nit;
  }
  public function getTel(){
    return $this->tel;
  }
  public function getIdUsuario(){
    return $this->idUsuario;
  }
  public function getIdCargo(){
    return $this->idCargo;
  }
  public function getActivo(){
    return $this->activo;
  }
}


 ?>
