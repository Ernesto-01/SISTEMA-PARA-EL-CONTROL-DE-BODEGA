<?php
include "InterfazCrud.php";
include "../modelo/credenciales.php";
include "../modelo/modeloCateHerra.php";

class DAOCateHerra implements InterfazCrud
{
     private $con;

    public function DAOCateHerra(){
      $this->con= new mysqli(SERVIDOR,USUARIO,CLAVE,BD);
      if($this->con->connect_errno){
        echo "Error al conectar a la base de datos: " .
        $this->con->error;
        exit;
      }
    }
    public function insertar($emp){
        $sql ="insert into categoriaherramienta(nombreCategoria, activo) values(
               '".$emp->getCategoria()."',1)";
       $this->con->query($sql);
       if($this->con->error){
         echo "Ocurrio un error (".$this->con->error.")";
         return false;
       }else{
         return true;
       }
    }
    public function eliminar($id){
      $sql ="update categoriaherramienta set activo=0 where idCategoria= $id";
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
       $sql = "select * from categoriaherramienta where activo=1";
       $res = $this->con->query($sql);
       $dataTable .= "<table class=table>
                        <thead>
                          <tr class=info>
                          <th>Id Categoria</th>
                          <th>Nombre Categoria</th>
                          <th>Opciones</th>
                        </tr>
                        </thead>";
       while($fila=$res->fetch_assoc()){
          $dataTable .= "<tbody>
                          <tr>
                            <td>".$fila['idCategoria']."</td>
                            <td>".$fila['nombreCategoria']."</td>
                            <td>
                            <a href=\"javascript:cargar('".$fila['idCategoria']."','".$fila['nombreCategoria']."');\">Seleccionar</a>
                            </td>
                        </tr>
                        </tbody>";
       }
         $dataTable .="</table>";
         return $dataTable;
    }
    public function modificar($emp){
      $sql ="update categoriaherramienta set nombreCategoria='".$emp->getCategoria().
            "' where idCategoria=". $emp->getIdCategoria();


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
