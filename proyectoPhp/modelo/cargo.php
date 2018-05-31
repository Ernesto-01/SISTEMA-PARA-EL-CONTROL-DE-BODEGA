<?php
/**
 * Nombre de la clase:Cargo
 * Fecha de creacion: 5-5-2018
 * Fecha de modificacion: 5-5-2018
 * Version:1.0
 * copyrath:Futuro desarrollador de S.A de C.V.
 * @author:William Ernesto Rosales Benitez
 */
class Cargo
{
  private $idCargo;
  private $cargo;
  private $idArea;
  private $activo;

  function Cargo()
  {
  $this->idCargo=null;
  $this->cargo=null;
  $this->idArea=null;
  $this->activo=null;
  }
public function setIdCargo($v){
  $this->idCargo=$v;
}
public function setCargo($v){
  $this->cargo=$v;
}
public function setIdArea($v){
  $this->idArea=$v;
}
public function setActivo($v){
  $this->activo=$v;
}
//get
  public function getIdCargo(){
    return $this->idCargo;
  }
  public function getCargo(){
    return $this->cargo;
  }
  public function getIdArea(){
    return $this->idArea;
  }
  public function getActivo(){
    return $this->activo;
  }
}

?>
