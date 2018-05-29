<?php
include "InterfazCrud.php";
include "../modelo/credenciales.php";
include "../modelo/Empleado.php";

/**
 *
 */
class DaoEmpleados implements InterfazCrud
{

  function DaoEmpleados()
  {
      $this->con= new mysqli(SERVIDOR,USUARIO,CLAVE,BD);
      if($this->con->connect_errno){
        echo "Error al conectar a la base de datos: " .
        $this->con->error;
        exit;
      }
    }

  public function insertar($obj){
        $sql ="insert into empleado (nombre, apellido, direccion, dui, nit, tel, idUsuario, idCargo, activo)
                values ('".$obj->getNombre()."',
                 '".$obj->getApellido()."',
                 '".$obj->getDireccion()."',
                 '".$obj->getDui()."',
                 '".$obj->getNit()."',
                 '".$obj->getTel()."',
                  ".$obj->getIdUsuario().",
                  ".$obj->getIdCargo().",1)";

       $this->con->query($sql);
       if($this->con->error){
         echo "Ocurrio un error (".$this->con->error.")";
         return false;
       }else{
         return true;
       }
    }
    public function eliminar($id){
    $sql ="update empleado set activo=0  where idEmpleado=".$id;
    $this->con->query($sql);
     if($this->con->error){
       echo "Ocurrio un error (".$this->con->error.")";
       return false;
     }else{
       return true;
     }

    }

    public function modificar($obj){
      $sql ="update `empleado` set `nombre`='".$obj->getNombre()."',
            `apellido`='".$obj->getApellido()."',
            `direccion`='". $obj->getDireccion() ."',
            `dui`='".$obj->getDui()."',
            `nit`='".$obj->getNit()."',
            `tel`='".$obj->getTel()."',
            `idUsuario`=".$obj->getIdUsuario().",
            `idCargo`=".$obj->getIdCargo()." where `idEmpleado`=".$obj->getIdEmpleado()." and activo=1";

      $this->con->query($sql);
     if($this->con->error){
       echo "Ocurrio un error (".$this->con->error.")";
       return false;
     }else{
       return true;
     }

    }


    public function reporte(){

    }


    public function mostrar(){
    		$dataTable = null;
    		$sql= "select idEmpleado, nombre, apellido, direccion, dui, nit, tel, idUsuario, idCargo from empleado where activo=1;";
    		$res= $this->con->query($sql);
    		$dataTable.= "<table border=1 >
        		             <tr>
        		              <th>ID Empleado</th>
        		              <th>Nombre</th>
        		              <th>Apellido</th>
        		              <th>Direccion</th>
        		              <th>DUI</th>
                          <th>NIT</th>
                          <th>Teléfono</th>
                          <th>Id Usuario</th>
                          <th>Id Cargo</th>
                          <th>Opciones</th>
    		             </tr>";
    		while($fila=$res->fetch_assoc())
    		{
    			$dataTable.= "<tr>
      			               <td>".$fila['idEmpleado']."</td>
      			               <td>".$fila['nombre']."</td>
      			               <td>".$fila['apellido']."</td>
      			               <td>".$fila['direccion']."</td>
                           <td>".$fila['dui']."</td>
                           <td>".$fila['nit']."</td>
                           <td>".$fila['tel']."</td>
                           <td>".$fila['idUsuario']."</td>
                           <td>".$fila['idCargo']."</td>
      			               <td>
                             <a href=\"javascript:llenar(
                              ".$fila['idEmpleado'].",
                             '".$fila['nombre']."',
                             '".$fila['apellido']."',
                             '".$fila['direccion']."',
                             '".$fila['dui']."',
                             '".$fila['nit']."',
                             '".$fila['tel']."',
                             ".$fila['idUsuario'].",
                             ".$fila['idCargo'].");\">Seleccionar</a>
                           </td>
    			             </tr>";
    		}

    		$dataTable.= "</table>";
    		return $dataTable;

    }





    public function mostrarCargo(){
          $dataTable = null;
          $sql= "select idCategoria, nombreCategoria from categoriaherramienta where activo=1;";
          $res= $this->con->query($sql);
          while($fila=$res->fetch_assoc())
          {
            $dataTable.= "<option value=".$fila['idCategoria'].">
                            ".$fila['nombreCategoria']."
                          </option>";
          }
          return $dataTable;
    }
}

 ?>
