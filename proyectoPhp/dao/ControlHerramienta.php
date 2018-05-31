<?php
include "InterfazCrud.php";
include "../modelo/credenciales.php";
include "../modelo/Herramienta.php";



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
        $sql ="insert into `herramienta` (`nombre`, `idCategoria`, `idEstado`, `disponible`, `activo`)
                values('".$obj->getNombre()."',
                 ".$obj->getIdCategoria().",
                 ".$obj->getIdEstado().",
                 ".$obj->getDisponible().",1)";

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


    public function mostrar(){
    		$dataTable = null;
    		$sql= "select idHerramienta, nombre, idCategoria, idEstado, disponible from herramienta where activo=1";
    		$res= $this->con->query($sql);
    		$dataTable.= "<table class=table>
        		            <thead>
                        <tr class=info>
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
                    </option>";
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


public function reporte1(){
$dataTable = null;
$sql= "select count(*) as Cantidad,categoriaherramienta.nombreCategoria from herramienta inner join categoriaherramienta on herramienta.idCategoria = categoriaherramienta.idCategoria and  herramienta.activo=1 group by herramienta.idCategoria;";
$res= $this->con->query($sql);

$dataTable .= "<hr color='#A6ACAF'>";

      $dataTable .= "<table align='center'>
                        <tr>
                          <th><img src='../img/inventario33.png' width='100' height='100' align='middle'></th>
                          <th font color='red'><h1>Reporte de Herramienta segun Categoria</th>
                        </tr>";
      $dataTable .="</table>";

      $dataTable .= "<hr color='#A6ACAF'>";

$dataTable.= "<table align=center>
                 <tr>
                  <th bgcolor='#454545' font color='white'><br>Cantidad</th>
                  <th bgcolor='#454545' font color='white'><br>Categoria</th>
                 </tr>";
while($fila=$res->fetch_assoc())
{
  $dataTable.= "<tr>
                   <td bgcolor='#FBEFFB'><br>".$fila['Cantidad']."</td>
                   <td bgcolor='#FBEFFB'><br>".$fila['nombreCategoria']."</td>
               </tr>";
}

$dataTable.= "</table>";
return $dataTable;
}


public function reporte2(){
$dataTable = null;
$sql= "select herramienta.nombre, estadoherramienta.estado from estadoherramienta inner join herramienta on estadoherramienta.idEstado=herramienta.idEstado where herramienta.idEstado=4 or herramienta.idEstado=5;";
$res= $this->con->query($sql);

$dataTable .= "<hr color='#A6ACAF'>";

      $dataTable .= "<table align='center'>
                        <tr>
                          <th><img src='../img/inventario33.png' width='100' height='100' align='middle'></th>
                          <th font color='red'><h1>Reporte de Herramientas Defectuosas o en Reparacion</th>
                        </tr>";
      $dataTable .="</table>";

      $dataTable .= "<hr color='#A6ACAF'>";

$dataTable.= "<table align=center>
                 <tr>
                  <th bgcolor='#454545' font color='white'><br>Nombre de la herramienta</th>
                  <th bgcolor='#454545' font color='white'><br>Estado</th>
                 </tr>";
while($fila=$res->fetch_assoc())
{
  $dataTable.= "<tr>
                   <td bgcolor='#FBEFFB'><br>".$fila['nombre']."</td>
                   <td bgcolor='#FBEFFB'><br>".$fila['estado']."</td>
               </tr>";
             }
$dataTable.= "</table>";
return $dataTable;
}



public function reporte3(){
$dataTable = null;
$sql= "select herramienta.nombre, estadoherramienta.estado from estadoherramienta inner join herramienta on estadoherramienta.idEstado=herramienta.idEstado where herramienta.idEstado=1";
$res= $this->con->query($sql);

$dataTable .= "<hr color='#A6ACAF'>";

      $dataTable .= "<table align='center'>
                        <tr>
                          <th><img src='../img/inventario33.png' width='100' height='100' align='middle'></th>
                          <th font color='red'><h1>Reporte de Herramientas Nuevas</th>
                        </tr>";
      $dataTable .="</table>";

      $dataTable .= "<hr color='#A6ACAF'>";

$dataTable.= "<table align=center>
                 <tr>
                  <th bgcolor='#454545' font color='white'><br>Nombre de la herramienta</th>
                  <th bgcolor='#454545' font color='white'><br>Estado</th>
                 </tr>";
while($fila=$res->fetch_assoc())
{
  $dataTable.= "<tr>
                   <td bgcolor='#FBEFFB'><br>".$fila['nombre']."</td>
                   <td bgcolor='#FBEFFB'><br>".$fila['estado']."</td>
               </tr>";
             }
$dataTable.= "</table>";
return $dataTable;
}
public function reporte4(){
$dataTable = null;
$sql= "select idHerramienta,nombre from herramienta where disponible=0 and activo=1;";
$res= $this->con->query($sql);

$dataTable .= "<hr color='#A6ACAF'>";

      $dataTable .= "<table align='center'>
                        <tr>
                          <th><img src='../img/inventario33.png' width='100' height='100' align='middle'></th>
                          <th font color='red'><h1>Reporte de Herramientas Prestadas</th>
                        </tr>";
      $dataTable .="</table>";

      $dataTable .= "<hr color='#A6ACAF'>";

$dataTable.= "<table align='center'>
                 <tr>
                 <th bgcolor='#454545' font color='white'><br>Id herramienta</th>
                  <th bgcolor='#454545' font color='white'><br>Nombre de la herramienta</th>
                 </tr>";
while($fila=$res->fetch_assoc())
{
  $dataTable.= "<tr>
                   <td bgcolor='#FBEFFB'><br>".$fila['idHerramienta']."</td>
                   <td bgcolor='#FBEFFB'><br>".$fila['nombre']."</td>
                  
               </tr>";
             }
$dataTable.= "</table>";
return $dataTable;
}


public function reporte5(){
       $dataTable=null;
       $sql ="select dp.fechaEntrega, h.nombre from detalleprestamo as dp inner join herramienta as h on dp.activo=1 where h.activo=1;";
       $res = $this->con->query($sql);

      $dataTable .= "<hr color='#A6ACAF'>";

      $dataTable .= "<table align='center'>
                        <tr>
                          <th><img src='../img/inventario33.png' width='100' height='100' align='middle'></th>
                          <th font color='red'><h1>Reporte de Herramientas Disponibles</th>
                        </tr>";
      $dataTable .="</table>";

      $dataTable .= "<hr color='#A6ACAF'>";

       $dataTable .= "<table align='center'>
                        <tr>
                          <th bgcolor='#454545' font color='white'><br>Fecha Entrega y Hora</th>
                          <th bgcolor='#454545' font color='white'><br>Nombre herramienta</th>
                        </tr>";
       while($fila=$res->fetch_assoc()){
          $dataTable .= "<tr>
                            <td bgcolor='#FBEFFB'><br>".$fila['fechaEntrega']."</td>
                            <td bgcolor='#FBEFFB'><br>".$fila['nombre']."</td>
                            </td>
                        </tr>";
       }
         $dataTable .="</table>";
         return $dataTable;
  }
  public function reporte6(){
       $dataTable=null;
      $sql ="select h.nombre,e.nombre as 'Empleado que hace el prestamo' from empleado as e inner join prestamo as p on p.idEmpleadoRecive=e.idEmpleado inner join detalleprestamo as dp on p.idprestamo=dp.idprestamo inner join herramienta as h on dp.idherramienta=h.idherramienta;";
       $res = $this->con->query($sql);

       $dataTable .= "<hr color='#A6ACAF'>";

      $dataTable .= "<table align='center'>
                        <tr>
                          <th><img src='../img/inventario33.png' width='100' height='100' align='middle'></th>
                          <th font color='red'><h1>Reporte de herramientas prestadas por Persona</th>
                        </tr>";
      $dataTable .="</table>";

      $dataTable .= "<hr color='#A6ACAF'>";

       $dataTable .= "<table align='center'>
                        <tr>
                          <th bgcolor='#454545' font color='white'><br>Nombre herramienta</th>
                          <th bgcolor='#454545' font color='white'><br>Nombre Empleado</th>
                        
                        </tr>";
       while($fila=$res->fetch_assoc()){
          $dataTable .= "<tr>
                            <td bgcolor='#FBEFFB'><br>".$fila['nombre']."</td>
                            <td bgcolor='#FBEFFB'><br>".$fila['Empleado que hace el prestamo']."</td>
                            </td>
                        </tr>";
       }
         $dataTable .="</table>";
         return $dataTable;
  }
  public function reporte7(){
       $dataTable=null;
       $sql ="select h.nombre,e.nombre as 'Empleado que hace el prestamo', dp.fechaInicioPrestamo from empleado as e inner join prestamo as p on p.idEmpleadoRecive=e.idEmpleado inner join detalleprestamo as dp on p.idprestamo=dp.idprestamo inner join herramienta as h on dp.idherramienta=h.idherramienta where h.activo=1 and fechaInicioPrestamo between date_sub(curdate(), interval 1 month) and curdate();"
       ;
       //select dp.fechaInicioPrestamo, h.nombre from detalleprestamo as dp inner join herramienta as h where h.activo=1 and fechaInicioPrestamo between date_sub(curdate(), interval 1 month) and curdate();
       $res = $this->con->query($sql);

       $dataTable .= "<hr color='#A6ACAF'>";

      $dataTable .= "<table align='center'>
                        <tr>
                          <th><img src='../img/inventario33.png' width='100' height='100' align='middle'></th>
                          <th font color='red'><h1>Historial General de prestamos de Herramientas</th>
                        </tr>";
      $dataTable .="</table>";

      $dataTable .= "<hr color='#A6ACAF'>";

       $dataTable .= "<table align='center'>
                        <tr>
                          <th bgcolor='#454545' font color='white'><br>Nombre herramienta</th>
                          <th bgcolor='#454545' font color='white'><br>Nombre Empleado</th>
                          <th bgcolor='#454545' font color='white'><br>fecha de prestamo</th>
                        </tr>";
       while($fila=$res->fetch_assoc()){
          $dataTable .= "<tr>
                            <td bgcolor='#FBEFFB'><br>".$fila['nombre']."</td>
                            <td bgcolor='#FBEFFB'><br>".$fila['Empleado que hace el prestamo']."</td>
                            <td bgcolor='#FBEFFB'><br>".$fila['fechaInicioPrestamo']."</td>

                            
                            </td>
                        </tr>";
       }
         $dataTable .="</table>";
         return $dataTable;
  }
}
?>
