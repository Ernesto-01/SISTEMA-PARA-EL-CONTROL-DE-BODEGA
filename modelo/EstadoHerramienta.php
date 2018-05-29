<?php
/**
 * Nombre de la clase:EstadoHerramienta
 * Fecha de creacion: 21-5-2018
 * Fecha de modificacion: 28-5-2018
 * Version:1.0
 * copyrath:Futuro desarrollador de S.A de C.V.
 * author:William Ernesto Rosales Benitez
 */
class EstadoHerramienta
{
  private $idEstado;
  private $estado;
  private $activo;

  function EstadoHerramienta()
  {
    $this->idEstado=null;
    $this->estado=null;
    $this->activo=null;
  }


    /**
     * Get the value of Nombre de la clase:EstadoHerramienta
     *
     * @return mixed
     */
    public function getIdEstado()
    {
        return $this->idEstado;
    }

    /**
     * Set the value of Nombre de la clase:EstadoHerramienta
     *
     * @param mixed idEstado
     *
     * @return self
     */
    public function setIdEstado($idEstado)
    {
        $this->idEstado = $idEstado;

        return $this;
    }

    /**
     * Get the value of Estado
     *
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of Estado
     *
     * @param mixed estado
     *
     * @return self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of Activo
     *
     * @return mixed
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set the value of Activo
     *
     * @param mixed activo
     *
     * @return self
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

}

?>
