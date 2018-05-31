<?php
include "InterfazCrud.php";
include "../modelo/credenciales.php";
include "../modelo/modeloAreaTrabajo.php";
class DAOAreaTrabajo implements InterfazCrud
{
     private $con;

    public function DAOAreaTrabajo(){
      $this->con= new mysqli(SERVIDOR,USUARIO,CLAVE,BD);
      if($this->con->connect_errno){
        echo "Error al conectar a la base de datos: " .
        $this->con->error;
        exit;
      }
    }
    public function insertar($emp){
        $sql ="insert into areatrabajo(area,activo) values('".$emp->getArea()."',1)";
       $this->con->query($sql);
       if($this->con->error){
         echo "Ocurrio un error (".$this->con->error.")";
         return false;
       }else{
         return true;
       }
    }
    public function eliminar($id){
      $sql ="update areatrabajo set activo=0  where idArea= $id";
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
       $sql = "select * from  areatrabajo where activo=1";
       $res = $this->con->query($sql);
       $dataTable .= "<table class=table>
                         <thead>
                          <tr class=info>
                          <th>Id Area</th>
                          <th>Area</th> 
                          <th>Opciones</th>
                        </tr>
                        </thead>";
       while($fila=$res->fetch_assoc()){
          $dataTable .= "
                        <tbody>
                        <tr>
                            <td>".$fila['idArea']."</td>
                            <td>".$fila['area']."</td>
                            <td>
                            <a href=\"javascript:cargar('".$fila['idArea']."','".$fila['area']."','".$fila['activo']."');\">Seleccionar</a>
                            </td>
                        </tr>
                        </tbody>";
                               }
         $dataTable .="</table>";
         return $dataTable;
    }
    public function modificar($emp){
      $sql ="update areatrabajo set area='".$emp->getArea()."' where idArea=". $emp->getIdArea();


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
       public function mostrar(){

       }

    public function filtrar($criterio,$campo){
       }

public function reporte1(){
      
}}




 ?>
