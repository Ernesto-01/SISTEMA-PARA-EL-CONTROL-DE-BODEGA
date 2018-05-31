<?php
class AreaTrabajo{

   private $idarea;
   private $area;
   private $activo;


   public function AreaTrabajo(){
     $this->idarea=null;
     $this->area=null;
     
     $this->activo=null;
     
   }
   public function setIdArea($val){
     $this->idarea=$val;
   }
   public function setArea($val){
     $this->area=$val;
   }
  
   public function setActivoo($val){
     $this->activo=$val;
   }
   public function getIdArea(){
     return $this->idarea;
   }
   public function getArea(){
     return $this->area;
   }
  
   public function getActivoo(){
   return $this->activo;
   }
}
 ?>