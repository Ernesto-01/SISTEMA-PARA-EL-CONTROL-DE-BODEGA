<?php
/**
 * Nombre de la clase:AreaTrabajo
 * Fecha de creacion: 5-5-2018
 * Fecha de modificacion: 5-5-2018
 * Version:1.0
 * copyrath:Futuro desarrollador de S.A de C.V.
 * @author:William Ernesto Rosales Benitez
 */
class AreaTrabajo
{
  private $idArea;
  private $area;
  private $activo;

  public function AreaTrabajo()
  {
    $this->idArea=null;
    $this->area=null;
    $this->activo=null;
  }
//set
  public function setIdArea($v){
    $this->idArea=$v;
  }
  public function setArea($v){
    $this->area=$v;
  }
  public function setActivo($v){
    $this->activo=$v;
  }
//get
  public function getIdArea(){
    return $this->idArea;
  }
  public function getArea(){
    return $this->area;
  }
  public function getActivo(){
    return $this->activo;
  }

}

?>
