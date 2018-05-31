<?php
class Cargo{

   private $activo;
   private $cargo;
   private $idarea;
   private $idcargo;


   public function Cargo(){
     $this->activo=null;
     $this->cargo=null;
     $this->idarea=null;
     $this->idcargo=null;     
   }
   public function setActivo($val){
     $this->activo=$val;
   }
    public function setidCargo($val){
     $this->idcargo=$val;
   }
  
   public function setCargo($val){
     $this->cargo=$val;
   }
  
   public function setIdArea($val){
     $this->idarea=$val;
   }
   public function getIdArea(){
     return $this->idarea;
   }
   public function getIdCargo(){
     return $this->idcargo;
   }
  
   public function getActivo(){
   return $this->activo;
   }
   public function getCargo(){
   return $this->cargo;
   }
}
 ?>