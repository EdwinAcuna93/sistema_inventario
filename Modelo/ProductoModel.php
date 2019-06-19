<?php
require ('../Modelo/bd/Conexion.php');

class ProductoModel extends Conexion {

    private $idProducto = null;
    private $nombre = null;
    private $marca = null;
    private $precio = null;
    private $stock = null;
    private $estado = null;
    private $proveedor = null;
    private $idCategoria = null;
    private $nombreCategoria = null;
    private $stockProducto=0;
    
    private $cantidadExtra=0;
    
    function getIdProducto() {
        return $this->idProducto;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getMarca() {
        return $this->marca;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getStock() {
        return $this->stock;
    }

    function getEstado() {
        return $this->estado;
    }

    function getProveedor() {
        return $this->proveedor;
    }

    function getIdCategoria() {
        return $this->idCategoria;
    }

    function getNombreCategoria() {
        return $this->nombreCategoria;
    }

    function getCantidadExtra() {
        return $this->cantidadExtra;
    }

    function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setMarca($marca) {
        $this->marca = $marca;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setStock($stock) {
        $this->stock = $stock;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setProveedor($proveedor) {
        $this->proveedor = $proveedor;
    }

    function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    function setNombreCategoria($nombreCategoria) {
        $this->nombreCategoria = $nombreCategoria;
    }

    function setCantidadExtra($cantidadExtra) {
        $this->cantidadExtra = $cantidadExtra;
    }
    

    
    public function listarProductos() { 
        $consulta = $this->db->query("SELECT producto.idProducto,producto.nombre,producto.marca,producto.precio,producto.stock,producto.estado,producto.proveedor,categoria.nombreCategoria,categoria.idCategoria FROM producto INNER JOIN categoria WHERE producto.idCategoria=categoria.idCategoria;");
        $this->producto = [['idProducto' => " ", 'nombre' => " ", 'marca' => " ", 'precio' => " ", 'stock' => " ", 'estado' => " ", 'proveedor' => " ", 'nombreCategoria' => " ", 'idCategoria' => " "]];
        while ($filas = $consulta->fetch_array(MYSQLI_ASSOC)) {
            $this->producto[] = $filas;
        }
        return $this->producto;
    }
    
    
    
    
    public function listarProductosPorNombre() { 
        $consulta = $this->db->query("SELECT idProducto,nombre FROM producto WHERE idProducto='.$this->getIdProducto().';");
      //  $this->categoria = [['idProducto' => " ", 'nombre' => " "]];  
        
        while ($filas = $consulta->fetch_array(MYSQLI_ASSOC)) {
            $this->producto[] = $filas;
        }
        return $this->producto;
    }
    
     public function listarCategoriaPorNombre() { 
        $consulta = $this->db->query("SELECT idCategoria,nombreCategoria FROM categoria WHERE nombreCategoria='$this->nombreCategoria';");
        $this->categoria = [['idCategoria' => " ", 'nombreCategoria' => " "]];  
        while ($filas = $consulta->fetch_array(MYSQLI_ASSOC)) {
            $this->producto[] = $filas;
        }
        return $this->producto;
    }
 
      public function getCategoria(){
                $consulta = $this->db->query("select * from categoria where estadoCategoria=1 ");
                $this->categoria = [['idCategoria'=>" ",'nombreCategoria'=>" ",'estadoCategoria'=>" "]];
             
                while( $filas = $consulta->fetch_array(MYSQLI_ASSOC)){
                        $this->categoria[] = $filas;
                }
                 return $this->categoria;    
            }
    
    
    public function insertarProducto() {       
        if ($this->stock > 0) {
            $this->setEstado(1);
        } else {
            $this->setEstado(0);
        }
 
        if ($this->getNombre() != null and $this->getPrecio() != null and $this->getStock() !="" and $this->getMarca() != null and $this->getProveedor() != null and $this->getIdCategoria() != null) {
            $insert = ' "' . $this->getNombre() . '", "' . $this->getMarca() . '", ' . $this->getPrecio() . ',' . $this->stock . ',' . $this->estado . ',"' . $this->proveedor . '",' . $this->idCategoria;
            $cadena = 'INSERT INTO producto' . ' (nombre,marca,precio,stock,estado,proveedor,idCategoria) VALUES(' . $insert . ')';


            if ($this->db->query($cadena) === TRUE and $this->db->affected_rows == true) {
                $mensaje = "Producto agregado" . "<br>";
            } else {
                $mensaje = "Error: " . $cadena . "<br>" . $this->db->error;
            }
        } else {
            $mensaje = "Error no ha enviado todos los datos necesarios para agregar el producto.";
        }
        return $mensaje;
    }

    
    
    
    
    public function deleteProducto() {
        if ($this->getIdProducto() != null) {
            $cadena = 'DELETE FROM producto where idProducto=' . $this->idProducto . ';';
            if ($this->db->query($cadena) === TRUE and $this->db->affected_rows == true) {
                $mensaje = "Producto eliminado" . "<br>";
            } else {
                $mensaje = "Error: " . $cadena . "<br>" . $this->db->error . "Producto no encontrado.<br>";
            }
        } else {
            $mensaje = "Por favor enviar el parametro para eliminar el producto";
        }
        return $mensaje;
    }

    
    
    public function obtnerStockPorId() {
       
        if ($this->getIdProducto()!=null) {
            $cadena= 'SELECT stock FROM producto where idProducto=' . $this->idProducto . ';';
            echo $cadena;
            $this->stockProducto= $this->db->query($cadena);
            echo $this->stockProducto;
        }
    }
    
    
    public function updateProducto() {
        
        
        if ($this->getNombre() != null and $this->getPrecio() != null and $this->getMarca() != null and $this->getStock() != null and $this->getProveedor() != null and $this->getIdCategoria() != null) {
           
            $this->stock = $this->stock + $this->cantidadExtra;
            
            if ($this->stock > 0) {
                $this->estado = 1;
            } else {
                $this->estado = 0;
            }
            
            $SET = ' SET nombre = "'.$this->getNombre().'",  marca = "'.$this->getMarca().'", precio = '.$this->getPrecio().',stock = '.$this->getStock().', estado = '.$this->getEstado().',proveedor = "'.$this->getProveedor().'", idCategoria = '.$this->getIdCategoria();
            
            $cadena = 'UPDATE producto ' . $SET . ' WHERE idProducto =' . $this->idProducto . ';';
            if ($this->db->query($cadena) === TRUE and $this->db->affected_rows == true) {
                $mensaje = "Dato Modificado" . "<br>";
            } else {
                $mensaje = "Error: x" . $cadena . "<br>" . $this->db->error;
            }
        } else {
            $mensaje = "Error no ha enviado todos los datos necesarios.";
        }
        
        return $mensaje;
    }
    
}
