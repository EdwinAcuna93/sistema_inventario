<?php


require_once '../Modelo/SalidaModel.php';

class SalidaController {
    
    
     public function listarSalidas(){
           $objSalida = new SalidaModel();
           $objSalida->getSalida();
           return $objSalida;    
      }
      
     public function agregarSalidas($idProducto,$cantidad,$idEncargado,$fecha){
         $objSalida= new SalidaModel();
         $objSalida->setIdProducto($idProducto);
         $objSalida->setCantidad($cantidad);
         $objSalida->setIdEncargado($idEncargado);
         $objSalida->setFecha($fecha);
         $resultado=$objSalida->setSalida();
         return $resultado;
     }
     
      public function listarEncargado(){
           $objEncargado = new SalidaModel();
           $objEncargado->getEncargado();
           return $objEncargado;    
      }
      
    
}

//test
//$objeto = new SalidaController();
//echo 'Controlador'.var_dump($objeto->listarSalidas());
//echo $objeto->agregarSalidas(3, 10, 1, "2019-01-06");


//echo $objeto->agregarProducto("salsa ketchup", "Mackornie", 2, 25, "la casona", 3);
//print_r( $objeto->listarCategoriaPorNombre("jabones"));

//echo $objeto->eliminarProducto(6);
//var_dump($objeto->listarProductosPorNombre());//nombre de proceso de get en model
//echo $objeto->ModificarProducto(5, "Pañales", "Huggies", 3, 100, 25, "unilever", 5);                                       