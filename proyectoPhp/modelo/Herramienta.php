<?php

/**
 * Nombre de la clase:Herramienta
 * Fecha de creacion: 21-5-2018
 * Fecha de modificacion: 21-5-2018
 * Version:1.0
 * copyrath:Futuro desarrollador de S.A de C.V.
 * author:William Ernesto Rosales Benitez
 */
class Herramienta
  {
    private $idHerramienta;
    private $nombre;
    private $idCategoria;
    private $idEstado;
    private $disponible;
    private $activo;

  public function Herramienta()
  {
          $this->idHerramienta=null;
          $this->nombre=null;
          $this->idCategoria=null;
          $this->idEstado=null;
          $this->disponible=null;
          $this->activo=null;
   }

  public function getIdHerramienta(){
     return $this->idHerramienta;
   }
    public function setIdHerramienta($v){
       $this->idHerramienta=$v;
   }
  public function getNombre(){
     return $this->nombre;
   }
    public function setNombre($v){
       $this->nombre=$v;
   }
  public function getIdCategoria(){
     return $this->idCategoria;
   }
    public function setIdCategoria($v){
       $this->idCategoria=$v;
   }
  public function getIdEstado(){
     return $this->idEstado;
   }
    public function setIdEstado($v){
       $this->idEstado=$v;
   }
  public function getDisponible(){
     return $this->disponible;
   }
    public function setDisponible($v){
       $this->disponible=$v;
   }
  public function getActivo(){
     return $this->activo;
   }
    public function setActivo($v){
       $this->activo=$v;
   }

}

?>
