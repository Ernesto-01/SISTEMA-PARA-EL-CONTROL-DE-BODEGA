<?php

class Prestamo
{
  private $idPrestamo;
  private $descripcion;
  private $idEmpleadoEntrega;
  private $idEmpleadoRecive;
  private $activo;

  function Prestamo()
  {
    $this->idPrestamo=null;
    $this->descripcion=null;
    $this->idEmpleadoEntrega=null;
    $this->idEmpleadoRecive=null;
    $this->activo=null;

  }

    /**
     * Get the value of Id Prestamo
     *
     * @return mixed
     */
    public function getIdPrestamo()
    {
        return $this->idPrestamo;
    }

    /**
     * Set the value of Id Prestamo
     *
     * @param mixed idPrestamo
     *
     * @return self
     */
    public function setIdPrestamo($idPrestamo)
    {
        $this->idPrestamo = $idPrestamo;

        return $this;
    }

    /**
     * Get the value of Descripcion
     *
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of Descripcion
     *
     * @param mixed descripcion
     *
     * @return self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of Id Empleado Entrega
     *
     * @return mixed
     */
    public function getIdEmpleadoEntrega()
    {
        return $this->idEmpleadoEntrega;
    }

    /**
     * Set the value of Id Empleado Entrega
     *
     * @param mixed idEmpleadoEntrega
     *
     * @return self
     */
    public function setIdEmpleadoEntrega($idEmpleadoEntrega)
    {
        $this->idEmpleadoEntrega = $idEmpleadoEntrega;

        return $this;
    }

    /**
     * Get the value of Id Empleado Recive
     *
     * @return mixed
     */
    public function getIdEmpleadoRecive()
    {
        return $this->idEmpleadoRecive;
    }

    /**
     * Set the value of Id Empleado Recive
     *
     * @param mixed idEmpleadoRecive
     *
     * @return self
     */
    public function setIdEmpleadoRecive($idEmpleadoRecive)
    {
        $this->idEmpleadoRecive = $idEmpleadoRecive;

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
