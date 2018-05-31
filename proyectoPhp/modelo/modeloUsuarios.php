<?php
class usuarios{

   private $idusuario;
   private $usuario;
   private $clave;
   private $idtipousuario;
   private $activo;
   private $pass_cifrado;

   public function cifrado()
   {
    $pass_cifrado=password_hash($clave, PASSWORD_DEFAULT); 
   }


   public function usuarios(){
     $this->idusuario=null;
     $this->usuarios=null;
     $this->clave=null;
     $this->idtipousuario=null;
     $this->activo=null;
     
   }
   public function setIdUsuario($val){
     $this->idusuario=$val;
   }
   public function setUsuarios($val){
     $this->usuarios=$val;
   }
   public function setClave($val){
     $this->clave=$val;
    }



    public function setPass_Cifrado($val)
    {
      $this->pass_cifrado=$val;
    }
    public function getPass_Cifrado(){
      return $this->pass_cifrado;
   }

  
   public function setIdTipoUsuario($val){
     $this->idtipousuario=$val;
   }public function setActivo($val){
     $this->activo=$val;
   }
   public function getIdUsuario(){
     return $this->idusuario;
   }
   public function getUsuarios(){
     return $this->usuarios;
   }
   public function getClave(){
      return $this->clave;
   }
   public function getIdTipoUsuario(){
      return $this->idtipousuario;
   }public function getActivo(){
   return $this->activo;
   }
}
 ?>