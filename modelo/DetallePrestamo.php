<?php

class DetallePrestamo
{
  private $idDetallePrestamo;
  private $fechaInicioPrestamo;
  private $fechaFinPrestamo;
  private $fechaEntrega;
  private $idHerramienta;
  private $idPrestamo;
  private $activo;

  function DetallePrestamo()
  {
      $this->idDetallePrestamo=null;
      $this->fechaInicioPrestamo=null;
      $this->fechaFinPrestamo=null;
      $this->fechaEntrega=null;
      $this->idHerramienta=null;
      $this->idPrestamo=null;
      $this->activo=null;
  }


    /**
     * Get the value of Id Detalle Prestamo
     *
     * @return mixed
     */
    public function getIdDetallePrestamo()
    {
        return $this->idDetallePrestamo;
    }

    /**
     * Set the value of Id Detalle Prestamo
     *
     * @param mixed idDetallePrestamo
     *
     * @return self
     */
    public function setIdDetallePrestamo($idDetallePrestamo)
    {
        $this->idDetallePrestamo = $idDetallePrestamo;

        return $this;
    }

    /**
     * Get the value of Fecha Inicio Prestamo
     *
     * @return mixed
     */
    public function getFechaInicioPrestamo()
    {
        return $this->fechaInicioPrestamo;
    }

    /**
     * Set the value of Fecha Inicio Prestamo
     *
     * @param mixed fechaInicioPrestamo
     *
     * @return self
     */
    public function setFechaInicioPrestamo($fechaInicioPrestamo)
    {
        $this->fechaInicioPrestamo = $fechaInicioPrestamo;

        return $this;
    }

    /**
     * Get the value of Fecha Fin Prestamo
     *
     * @return mixed
     */
    public function getFechaFinPrestamo()
    {
        return $this->fechaFinPrestamo;
    }

    /**
     * Set the value of Fecha Fin Prestamo
     *
     * @param mixed fechaFinPrestamo
     *
     * @return self
     */
    public function setFechaFinPrestamo($fechaFinPrestamo)
    {
        $this->fechaFinPrestamo = $fechaFinPrestamo;

        return $this;
    }

    /**
     * Get the value of Fecha Entrega
     *
     * @return mixed
     */
    public function getFechaEntrega()
    {
        return $this->fechaEntrega;
    }

    /**
     * Set the value of Fecha Entrega
     *
     * @param mixed fechaEntrega
     *
     * @return self
     */
    public function setFechaEntrega($fechaEntrega)
    {
        $this->fechaEntrega = $fechaEntrega;

        return $this;
    }

    /**
     * Get the value of Id Herramienta
     *
     * @return mixed
     */
    public function getIdHerramienta()
    {
        return $this->idHerramienta;
    }

    /**
     * Set the value of Id Herramienta
     *
     * @param mixed idHerramienta
     *
     * @return self
     */
    public function setIdHerramienta($idHerramienta)
    {
        $this->idHerramienta = $idHerramienta;

        return $this;
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
