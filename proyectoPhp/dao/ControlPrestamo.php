<?php
include_once "InterfazCrud.php";
include_once "../modelo/credenciales.php";
include_once "../modelo/Prestamo.php";

/**
 *
 */
class ControlPrestamo implements InterfazCrud
{

  function ControlPrestamo()
  {
      $this->con= new mysqli(SERVIDOR,USUARIO,CLAVE,BD);
      if($this->con->connect_errno){
        echo "Error al conectar a la base de datos: " .
        $this->con->error;
        exit;
      }
    }


    public function insertar($obj){
        $sql ="insert into prestamo(descripcion, idEmpleadoEntrega, idEmpleadoRecive, activo)
        values('".$obj->getDescripcion()."',".$obj->getIdEmpleadoEntrega().",".$obj->getIdEmpleadoRecive().",1);";
        $this->con->query($sql);
       if($this->con->error){
         echo "Ocurrio un error (".$this->con->error.")";
         return false;
       }else{
         return true;
       }
    }


    public function eliminar($id)
    {
        $sql ="update prestamo set activo=0  where idPrestamo=".$id;
        $this->con->query($sql);

       if($this->con->error)
       {
         echo "Ocurrio un error (".$this->con->error.")";
         return false;
       }
       else
       {
         return true;
       }
  }


    public function modificar($obj){
      $sql ="update prestamo set
      descripcion='".$obj->getDescripcion()."',
      idEmpleadoEntrega=".$obj->getIdEmpleadoEntrega().",
      idEmpleadoRecive=".$obj->getIdEmpleadoRecive()." where idPrestamo=".$obj->getIdPrestamo().";";

      $this->con->query($sql);
     if($this->con->error){
       echo "Ocurrio un error (".$this->con->error.")";
       return false;
     }else{
       return true;
     }

    }


public function cantidadHerramientasPrestadas($id){

  $data=null;
  $sql="select count(*) as cantiadad from empleado as emp inner join prestamo as pre on emp.idEmpleado=pre.idEmpleadoRecive inner join detalleprestamo as dp on dp.idPrestamo=pre.idPrestamo inner join herramienta as herra on herra.idHerramienta=dp.idHerramienta where pre.idEmpleadoRecive=".$id;
  $res= $this->con->query($sql);
  while($fila=$res->fetch_assoc())
  {

    $data.= $fila['cantiadad'];
  }
  return $data;

}

    public function mostrar(){
    $dataTable = null;

    		$sql= "select p.idPrestamo, p.descripcion, p.idEmpleadoEntrega, p.idEmpleadoRecive
              from prestamo as p where  p.activo=1;";
    		$res= $this->con->query($sql);

    		$dataTable.= "<table class=table>

        		             <tr class=info>
        		              <th>ID</th>
        		              <th>Descripcion</th>
        		              <th>Id EmpleadoEntrega</th>
        		              <th>Id EmpleadoRecive</th>
        		              <th>Herrameinta pendientes por persona</th>
                          <th>Opciones</th>
    		             </tr>";
                     try {
    		while($fila=$res->fetch_assoc())
    		{

    			$dataTable.= "<tr>
      			               <td>".$fila['idPrestamo']."</td>
      			               <td>".$fila['descripcion']."</td>
      			               <td>".$fila['idEmpleadoEntrega']."</td>
      			               <td>".$fila['idEmpleadoRecive']."</td>
                           <td>".$this->cantidadHerramientasPrestadas($fila['idEmpleadoRecive'])."</td>

      			               <td>
      			                  <a href=\"javascript:llenar(
                               ".$fila['idPrestamo'].",
                               '".$fila['descripcion']."',
                               ".$fila['idEmpleadoEntrega'].",
                               ".$fila['idEmpleadoRecive'].");\"><input type='button' name='btnSeleccionar' value='Seleccionar'></a>

      			               </td>
    			             </tr>";
    		}
        } catch (\Exception $e) {
          echo "<br>Error al mostar datos";
        }
    		$dataTable.= "</table>";
    		return $dataTable;
    }
}

 ?>
