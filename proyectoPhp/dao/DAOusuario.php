<?php
include "InterfazCrud.php";
include "../modelo/credenciales.php";
include "../modelo/modeloUsuarios.php";

class DAOUsuarios implements InterfazCrud
{
     private $con;

    public function DAOUsuarios(){
      $this->con= new mysqli(SERVIDOR,USUARIO,CLAVE,BD);
      if($this->con->connect_errno){
        echo "Error al conectar a la base de datos: " .
        $this->con->error;
        exit;
      }
    }
    
    public function insertar($emp){
        $sql ="insert into usuario(usuario,clave,idTipoUsuario,activo) values('".$emp->getUsuarios()."','".$emp->getClave()."',".$emp->getIdTipoUsuario().",1)";
       $this->con->query($sql);
       if($this->con->error){
         echo "Ocurrio un error (".$this->con->error.")";
         return false;
       }else{
         return true;
       }
    }
    public function eliminar($id){
      $sql ="update usuario set activo=0  where idUsuario=".$id;
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
       $sql = "select * from usuario where activo=1";
       $res = $this->con->query($sql);
       $dataTable .= "<table class=table>
                        <thead>
                          <tr class=info>
                          <th>Id Usuario</th>
                          <th>Usuario</th>
                          <th>Clave</th>
                          <th>Id Tipo Usuario</th>
                          <th>Opciones</th>
                        </tr>
                        </theas>";
       while($fila=$res->fetch_assoc()){
          $dataTable .= "
                        <tbody>
                        <tr>
                            <td>".$fila['idUsuario']."</td>
                            <td>".$fila['usuario']."</td>
                            <td>".$fila['clave']."</td>
                            <td>".$fila['idTipoUsuario']."</td> 
                            <td>
                            <a href=\"javascript:cargar('".$fila['idUsuario']."','".$fila['usuario']."','".$fila['clave']."','".$fila['idTipoUsuario']."');\">Seleccionar</a>

                            </td>
                        </tr>
                        </tbody>";
       }
         $dataTable .="</table>";
         return $dataTable;
    }
    public function modificar($emp){
      $sql ="update usuario set usuario='".$emp->getUsuarios()."',
            clave='".$emp->getClave()."',
            idTipoUsuario=".$emp->getIdTipoUsuario().
            " where idUsuario=". $emp->getIdUsuario();


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

public function mostrar(){

       }
public function reporte1(){
      
}

public function llenarTipoUsuario(){
   $data=null;
   $sql = "select idTipoUsaurio ,tipoUsuario from tipousuario where activo=1";
   $res = $this->con->query($sql);
     
   while($fila=$res->fetch_assoc())
     {
        $data .= "<option value=".$fila['idTipoUsaurio'].">".$fila['tipoUsuario']."</option>";
     }
   
   return $data;
}
}


 ?>
