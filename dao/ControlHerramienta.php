<?php
include "InterfazCrud.php";
include "../modelo/credenciales.php";
include "../modelo/Herramienta.php";

/**
 *
 */
class ControlHerramienta implements InterfazCrud
{

  function ControlHerramienta()
  {
      $this->con= new mysqli(SERVIDOR,USUARIO,CLAVE,BD);
      if($this->con->connect_errno){
        echo "Error al conectar a la base de datos: " .
        $this->con->error;
        exit;
      }
    }

    public function insertar($obj){

        $sql ="insert into `herramienta` (`idHerramienta`, `nombre`, `idCategoria`, `idEstado`, `disponible`, `activo`)
                values (".$obj->getIdHerramienta().",
                 '".$obj->getNombre()."',
                 ".$obj->getIdCategoria().",
                 ".$obj->getIdEstado().",
                 ".$obj->getDisponible().",
                 ".$obj->getActivo().")";

       $this->con->query($sql);
       if($this->con->error){
         echo "Ocurrio un error (".$this->con->error.")";
         return false;
       }else{
         return true;
       }
    }
    public function eliminar($id){


    $sql ="update herramienta set activo=0  where idHerramienta=".$id;
    $this->con->query($sql);
     if($this->con->error){
       echo "Ocurrio un error (".$this->con->error.")";
       return false;
     }else{
       return true;
     }

    }
    public function modificar($obj){
      $sql ="update herramienta set
            nombre='".$obj->getNombre()."',
            idCategoria=".$obj->getIdCategoria().",
            idEstado=". $obj->getIdEstado() .",
            disponible=1,
            activo=1 where idHerramienta=". $obj->getIdHerramienta();

      $this->con->query($sql);
     if($this->con->error){
       echo "Ocurrio un error (".$this->con->error.")";
       return false;
     }else{
       return true;
     }

    }


    public function reporte(){
      $dataTable = null;
      $sql= "select count(*) as Cantidad,categoriaherramienta.nombreCategoria from herramienta inner join categoriaherramienta on herramienta.idCategoria = categoriaherramienta.idCategoria and  herramienta.activo=1 group by herramienta.idCategoria;";
      $res= $this->con->query($sql);
      $dataTable.= "<table >
                       <tr>
                        <th>Cantidad</th>
                        <th>Categoria</th>
                       </tr>";
      while($fila=$res->fetch_assoc())
      {
        $dataTable.= "<tr>
                         <td>".$fila['Cantidad']."</td>
                         <td>".$fila['nombreCategoria']."</td>

                     </tr>";
      }

      $dataTable.= "</table>";
      return $dataTable;


    }


    public function mostrar(){
    		$dataTable = null;
    		$sql= "select idHerramienta, nombre, idCategoria, idEstado, disponible from herramienta where activo=1";
    		$res= $this->con->query($sql);
    		$dataTable.= "<table border=1 >
        		             <tr>
        		              <th>ID</th>
        		              <th>Name</th>
        		              <th>idCategoria</th>
        		              <th>idEstado</th>
        		              <th>disponible</th>
                          <th>Opciones</th>
    		             </tr>";
    		while($fila=$res->fetch_assoc())
    		{
    			$dataTable.= "<tr>
      			               <td>".$fila['idHerramienta']."</td>
      			               <td>".$fila['nombre']."</td>
      			               <td>".$fila['idCategoria']."</td>
      			               <td>".$fila['idEstado']."</td>
                           <td>".$fila['disponible']."</td>
      			               <td>
      			                  <a href=\"javascript:llenar(
                               ".$fila['idHerramienta'].",
                               '".$fila['nombre']."',
                               ".$fila['idCategoria'].",
                               ".$fila['idEstado'].");\">Seleccionar</a>
      			               </td>
    			             </tr>";
    		}

    		$dataTable.= "</table>";
    		return $dataTable;

    }


    public function mostrarEstadoHerrmainta(){
    $dataTable = null;
    $sql= "select idEstado, estado from estadoherramienta where activo=1;";
    $res= $this->con->query($sql);
    while($fila=$res->fetch_assoc())
    {
      $dataTable.= "<option value=".$fila['idEstado'].">
                      ".$fila['estado']."
                    </option>"
                       ;
    }

    return $dataTable;

    }


    public function mostrarCategoria(){
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
