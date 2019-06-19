<?php

require_once '../Modelo/ProductoModel.php';

class ProductoController {
    
    
     public function listarProducto(){
           $objProducto = new ProductoModel();
           $objProducto->listarProductos();
           return $objProducto;    
      }
      
      public function listarProductosPorNombre(){
           $objProducto = new ProductoModel();
           $objProducto->listarProductosPorNombre();
           return $objProducto;    
      }
      
      public function listarCategoriaPorNombre($nombre) {
          $objProducto = new ProductoModel();
          $objProducto->setNombreCategoria($nombre);
          $objProducto->listarCategoriaPorNombre();
          return $objProducto;
      }
      
       public function listarCategoria(){
           $objCategoria = new ProductoModel();
           $objCategoria->getCategoria();
           return $objCategoria;    
       }
      
      public function agregarProducto($nombre,$marca,$precio,$stock,$proveedor,$idCategoria){
           $objProducto = new ProductoModel();
           //mandar los datos
           $objProducto->setNombre($nombre);
           $objProducto->setMarca($marca);
            $objProducto->setPrecio($precio);
           $objProducto->setStock($stock);
           $objProducto->setProveedor($proveedor);
            $objProducto->setIdCategoria($idCategoria);
          
           //Guardar los datos en Base de Datos
           $respuesta = $objProducto->insertarProducto();
           return $respuesta;
      } 
      
      public function eliminarProducto($id){
             $objProducto = new ProductoModel();
             $objProducto->setIdProducto($id);
             $respuesta = $objProducto->deleteProducto();
             return $respuesta;
      }
      
      public function ModificarProducto($idProducto,$nombre,$marca,$precio,$stock,$cantidadExtra,$proveedor,$idCategoria){
             $objProducto = new ProductoModel();
             $objProducto->setIdProducto($idProducto);
             $objProducto->setNombre($nombre);
             $objProducto->setMarca($marca);
             $objProducto->setPrecio($precio);
             $objProducto->setStock($stock);
             $objProducto->setCantidadExtra($cantidadExtra);
             $objProducto->setProveedor($proveedor);
             $objProducto->setIdCategoria($idCategoria);
             
             $respuesta = $objProducto->updateProducto();
             return $respuesta;
      }
    
}

//test
$objeto = new ProductoController();
//echo $objeto->ModificarProducto(1, "jasdas", "DOVE", 1,100,10,"UNILEVER", 5);
//print_r($objeto->listarCategoria());"
//echo $objeto->agregarProducto("salsa ketchup", "Mackornie", 2, 25, "la casona", 3);
//print_r( $objeto->listarCategoriaPorNombre("jabones"));

//echo $objeto->eliminarProducto(6);
//var_dump($objeto->listarProductosPorNombre());//nombre de proceso de get en model
//echo $objeto->ModificarProducto(5, "Pañales", "Huggies", 3, 100, 25, "unilever", 5);