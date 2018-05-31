<?php
include "InterfazCrud.php";
include "../modelo/credenciales.php";
include "../modelo/modeloCargo.php";

class DAOCargo implements InterfazCrud
{
     private $con;

    public function DAOCargo(){
      $this->con= new mysqli(SERVIDOR,USUARIO,CLAVE,BD);
      if($this->con->connect_errno){
        echo "Error al conectar a la base de datos: " .
        $this->con->error;
        exit;
      }
    }


    public function insertar($obj){
        $sql ="insert into cargo(cargo,idArea,activo) values('".$obj->getCargo()."',".$obj->getIdArea().",1)";
       $this->con->query($sql);
       if($this->con->error){
         echo "Ocurrio un error (".$this->con->error.")";
         return false;
       }else{
         return true;
       }
    }


    public function eliminar($id){
      $sql ="update cargo set activo=0 where idCargo=".$id;
     $this->con->query($sql);
     if($this->con->error){
       echo "Ocurrio un error (".$this->con->error.")";
       return false;
     }else{
       return true;
     }
    }


    public function seleccionar(){
       $dataTable=null;
       $sql = "select idCargo,cargo,idArea from cargo  where activo=1";
       $res = $this->con->query($sql);
       $dataTable .= "<table class=table>
                        <thead>
                          <tr class=info>
                          <th>Id Cargo</th>
                          <th>Cargo </th>
                          <th>Id Area</th>                          
                          <th>Opciones</th>
                        </tr>
                        </thead>";
       while($fila=$res->fetch_assoc()){
          $dataTable .= "<tbody>
                          <tr>
                            <td>".$fila['idCargo']."</td>
                            <td>".$fila['cargo']."</td>
                            <td>".$fila['idArea']."</td>                            
                            <td>
                            <a href=\"javascript:cargar('".$fila['idCargo']."',
                                                        '".$fila['cargo']."',
                                                        '".$fila['idArea']."');\">Seleccionar</a>
                            </td>
                        </tr>
                        </tbody>";
       }
         $dataTable .="</table>";
         return $dataTable;
    }


    public function modificar($emp){
      $sql ="update cargo set cargo='".$emp->getCargo(). "',
         idArea=".$emp->getIdArea()." where idCargo=". $emp->getIdCargo();


     $this->con->query($sql);
     if($this->con->error){
       echo "Ocurrio un error (".$this->con->error.")";
       return false;
     }else{
       return true;
     }

    }
    public function liberar(){
      $this->con->close();
    }

    public function filtrar($criterio,$campo){
       }

public function reporte1(){
      
}


public function mostrar(){
   $data=null;
   $sql = "select idArea, area from areatrabajo where activo=1;";
   $res = $this->con->query($sql);
     
   while($fila=$res->fetch_assoc())
     {
        $data .= "<option value=".$fila['idArea'].">".$fila['area']."</option>";
     }
   
   return $data;
}


}

 ?>
