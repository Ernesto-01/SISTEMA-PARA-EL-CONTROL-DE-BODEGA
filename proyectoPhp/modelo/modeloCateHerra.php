<?php
class Herramientacat{

   private $categoriaid;
   private $nombrecat;
   private $activo;


   public function Herramientacat(){
     $this->categoriaid=null;
     $this->nombrecat=null;
     $this->activo=null;
     
   }
   public function setActivo($val){
     $this->activo=$val;
   }
    public function setIdCategoria($val){
     $this->categoriaid=$val;
   }
  
   public function setCategoria($val){
     $this->nombrecat=$val;
   }

   public function getIdCategoria(){
     return $this->categoriaid;
   }
   public function getCategoria(){
     return $this->nombrecat;
   }
  
   public function getActivo(){
   return $this->activo;
   }
   
}
 ?>