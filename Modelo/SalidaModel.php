<?php

 require ('../Modelo/bd/Conexion.php');

 class SalidaModel extends Conexion{
     
    
     public $idSalida=null;
     public $cantidad=null;
     public $fecha=null;
     public $idProducto=null;
     public $idEncargado=null;
     
     public $nombreProducto=null;
     public $nombreEncargado=null;
     public $stock=null;
     public $stockProducto=0;

     function getIdSalida() {
         return $this->idSalida;
     }

     function getCantidad() {
         return $this->cantidad;
     }

     function getFecha() {
         return $this->fecha;
     }

     function getIdProducto() {
         return $this->idProducto;
     }

     function getIdEncargado() {
         return $this->idEncargado;
     }

     function getNombreProducto() {
         return $this->nombreProducto;
     }

     function getNombreEncargado() {
         return $this->nombreEncargado;
     }

     function getStock() {
         return $this->stock;
     }

     function setIdSalida($idSalida) {
         $this->idSalida = $idSalida;
     }

     function setCantidad($cantidad) {
         $this->cantidad = $cantidad;
     }

     function setFecha($fecha) {
         $this->fecha = $fecha;
     }

     function setIdProducto($idProducto) {
         $this->idProducto = $idProducto;
     }

     function setIdEncargado($idEncargado) {
         $this->idEncargado = $idEncargado;
     }

     function setNombreProducto($nombreProducto) {
         $this->nombreProducto = $nombreProducto;
     }

     function setNombreEncargado($nombreEncargado) {
         $this->nombreEncargado = $nombreEncargado;
     }

     function setStock($stock) {
         $this->stock = $stock;
     }


     public function getSalida(){
                $consulta = $this->db->query("SELECT s.idSalida, p.idProducto,p.nombre as p, s.cantidad, e.nombre,s.fecha FROM salida AS s LEFT JOIN producto as p ON s.idProducto=p.idProducto LEFT JOIN encargado AS e ON s.idEncargado=e.idEncargado;");
                $this->salida = [['idSalida'=>" ",'idProducto'=>" ",'nombreProducto'=>" ",'cantidad'=>" ",'nombreEncargado'=>" ",'fecha'=>" "]];
                while( $filas = $consulta->fetch_array(MYSQLI_ASSOC)){
                        $this->salida[] = $filas;
                }
                 return $this->salida;    
            } 
                
    public function obtenerStock($id) {


        $consulta = "SELECT stock FROM producto Where idProducto = '$id'";
        $resultado = $this->db->query($consulta);

        //Guardamos el registro en la variable $fila
        $fila = $resultado->fetch_assoc();

        $resulStock = $fila['stock'];
        return $resulStock;
    }
    
    
    public function setSalida() {       
      
 
       if ($this->getIdProducto() != null and $this->getCantidad() != null and $this->getIdEncargado() != null and $this->getFecha() != null) {
           
           $stockActual= $this->obtenerStock($this->getIdProducto());
           
           if ($stockActual>1 && $stockActual > $this->getCantidad()) {
   
               $insert =  $this->getIdProducto().',' . $this->cantidad . ',' . $this->getIdEncargado() . ',' ."'". $this->getFecha() ."'";
               $cadena = 'INSERT INTO salida' . ' (idProducto,cantidad,idEncargado,fecha) VALUES(' . $insert . ')';

               //AQUI ES DONDE APLICO LO DE ACTUALIZAR EL STOCK
                 $SET = ' SET stock = stock -' . $this->cantidad ;
                $actualizacion = 'UPDATE producto ' . $SET . ' WHERE idProducto =' . $this->idProducto . ';';
                
                
                $this->db->query($actualizacion);
                if ($this->db->query($cadena) === TRUE and $this->db->affected_rows == true) {
                $mensaje = "Salida registrada con exito" . "<br>";
            } else {
                $mensaje = "Error: " . $cadena . "<br>" . $this->db->error;
            }
           }
           elseif ($stockActual<1) {
               
               $mensaje="No hay suficiente producto para relizar la salida";
       }
           
        } else {
            $mensaje = "Error no ha enviado todos los datos necesarios para agregar el producto.";
        }
        return $mensaje;
    }

    
    
    
    
    public function getEncargado(){
                
                $consulta = $this->db->query("select * from encargado where estadoEncargado=1;");
                $this->encargado = [['idCategoria'=>" ",'nombre'=>" "]];
                while( $filas = $consulta->fetch_array(MYSQLI_ASSOC)){                    
                        $this->encargado[] = $filas;
                }                 
                 return $this->encargado;    
            } 
    
}
 