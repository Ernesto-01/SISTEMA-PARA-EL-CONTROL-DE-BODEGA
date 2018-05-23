<?php
/**
 * Nombre de la clase:EstadoHerramienta
 * Fecha de creacion: 21-5-2018
 * Fecha de modificacion: 21-5-2018
 * Version:1.0
 * copyrath:Futuro desarrollador de S.A de C.V.
 * author:William Ernesto Rosales Benitez
 */
class EstadoHerramienta extends AnotherClass
{
  private $idEstado;
  private $estado;
  private $activo;

  function __construct(argument)
  {
    $this->idEstado=null;
    $this->estado=null;
    $this->activo=null;
  }

  public function getIdEstado()
  {
    return $this->idEstado;
  }
  public function setIdEstado($v)
  {
    $this->idEstado=$v;
  }

  public function getEstado()
  {
    return $this->estado;
  }
  public function setEstado($v)
  {
    $this->estado=$v;
  }

  public function getActivo()
  {
    return $this->activo;
  }
  public function setActivo($v)
  {
    $this->activo=$v;
  }
}

?>
