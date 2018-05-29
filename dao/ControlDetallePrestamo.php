<?php
//session_start();
include_once "InterfazCrud.php";
include_once "../modelo/credenciales.php";
include_once "../modelo/DetallePrestamo.php";

/**
 *
 */
class ControlDetallePrestamo implements InterfazCrud
{

  function ControlDetallePrestamo()
  {
    $this->con= new mysqli(SERVIDOR,USUARIO,CLAVE,BD);
    if($this->con->connect_errno){
      echo "Error al conectar a la base de datos: " .
      $this->con->error;
      exit;
    }
  }

  public function insertar($obj){
/*
insert into detalleprestamo(fechaInicioPrestamo, fechaFinPrestamo, fechaEntrega, idHerramienta, idPrestamo, activo)
values('2018-05-22 13:39:06','2018-05-23 13:39:06','2018-05-22 20:39:06',6,1,1) ;
*/
$sql ="insert into detalleprestamo(fechaInicioPrestamo, fechaFinPrestamo, fechaEntrega, idHerramienta, idPrestamo, activo)
values('".$obj->getFechaInicioPrestamo()."','".$obj->getFechaFinPrestamo()."','".$obj->getFechaEntrega()."',".$obj->getIdHerramienta().",".$obj->getIdPrestamo().",1)";
$this->con->query($sql);
if($this->con->error){
 echo "Ocurrio un error (".$this->con->error.")";
 return false;
}else{
 return true;
}
  }
  public function eliminar($idDetalle){
$sql="update detalleprestamo set activo=0 where idDetallePrestamo=$idDetalle;";
$this->con->query($sql);
 if($this->con->error){
   echo "Ocurrio un error (".$this->con->error.")";
   return false;
 }else{
   //$this->herramientaDisponible($id);
   return true;
  }
}


public function herramientaDisponible(){
  $sql ="update herramienta set
        activo=1 where idHerramienta=". $obj->getIdHerramienta();

  $this->con->query($sql);
 if($this->con->error){
   echo "Ocurrio un error (".$this->con->error.")";
   return false;
 }else{
   return true;
 }
}


  public function modificar($obj){

  }



  public function mostrar(){

    		$dataTable = null;
    		$sql= "select h.idHerramienta, h.nombre, c.nombreCategoria, estado.estado from herramienta as h inner join categoriaherramienta as c on h.idCategoria=c.idCategoria inner join estadoherramienta as estado on h.idEstado=estado.idEstado where  h.disponible=1 and h.activo=1 and estado.idEstado!=4 and estado.idEstado!=5;";
    		$res= $this->con->query($sql);
    		$dataTable.= "<table border=1 >
                        <tr>
                          <th colspan='9'>
                            <center>
                                <h3>
                                  Menu de herramientas disponibles
                                </h3>
                            </center>
                          <th>
                        </tr>
        		             <tr>
          		              <th>Id herramienta</th>
          		              <th>Nombre</th>
          		              <th>Categoria</th>
          		              <th>Condiciones</th>
                            <th>Opciones</th>
    		                  </tr>";
    		while($fila=$res->fetch_assoc())
    		{
    			$dataTable.= "<tr>
      			               <td>".$fila['idHerramienta']."</td>
      			               <td>".$fila['nombre']."</td>
      			               <td>".$fila['nombreCategoria']."</td>
      			               <td>".$fila['estado']."</td>
      			               <td>
                                <input type='submit' name='btnAgregarH' value='Agregar'>



      			               </td>
    			             </tr>";
    		}
    		$dataTable.= "</table>";
    		return $dataTable;
  }


  public function herramientasPrestadasPorUnaPersona($IdEmpedoPresta,$idPres){

  $dataTable = null;

      $sql= "select herra.idHerramienta, herra.nombre, c.nombreCategoria, estado.estado,dp.idDetallePrestamo, dp.fechaInicioPrestamo, dp.fechaFinPrestamo, dp.fechaEntrega
      from empleado as emp inner join prestamo as pre on emp.idEmpleado=pre.idEmpleadoRecive
      inner join detalleprestamo as dp on dp.idPrestamo=pre.idPrestamo
      inner join herramienta as herra on herra.idHerramienta=dp.idHerramienta
      inner join categoriaherramienta as c on herra.idCategoria=c.idCategoria
      inner join estadoherramienta as estado on herra.idEstado=estado.idEstado  where dp.activo=1 and pre.idEmpleadoRecive=".$IdEmpedoPresta." and pre.idPrestamo=".$idPres.";";
      $res= $this->con->query($sql);

      $dataTable.= "<table border=1 >
                        <form method='post' action='#'>
                        <tr>
                          <th colspan='5'>
                            <center>
                                <h3>
                                  Menu de herramientas Prestadas
                                </h3>
                            </center>
                          <th>
                        </tr>
                       <tr>
                        <th>Id Herrameinta</th>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Condiciones</th>
                        <th>Opciones</th>
                   </tr>";
$teracion=0;
      while($fila=$res->fetch_assoc())
      {

        $dataTable.= "<tr>
                         <td>". $fila['idHerramienta']."</td>
                         <td>".$fila['nombre']."</td>
                         <td>".$fila['nombreCategoria']."</td>
                         <td>".$fila['estado']."</td>
                         <td>

                         <a href=\"javascript:llenarDetalle(
                          ".$fila['idDetallePrestamo'].",
                          '".$fila['fechaInicioPrestamo']."',
                          '".$fila['fechaFinPrestamo']."',
                          '".$fila['fechaEntrega']."');\"> Seleccionar</a>
                         <input type='submit' name='btnEliminarH' value='Eliminar'>

                          </td>
                     </tr>";
      } //<input type='submit' name='btnEliminarH' value='Eliminar'onclick='return msj()'>

      $dataTable.= "</form></table>";
      return $dataTable;

  }
}

 ?>
