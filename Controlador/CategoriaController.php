<?php

require_once '../Modelo/CategoriaModel.php';

class CategoriaController {
    
    
     public function listarCategoria(){
           $objCategoria = new CategoriaModel();
           $objCategoria->getCategoria();
           return $objCategoria;    
      }
      
      public function agregarCategoria($nombre,$estado){
           $objCategoria = new CategoriaModel();
           $objCategoria->setNombreCategoria($nombre);
           $objCategoria->setEstadoCategoria($estado);
           $respuesta = $objCategoria->setCategoria();
           return $respuesta;
      } 
      
      
      
//      public function eliminarCategoria($id){
//             $objProducto = new CategoriaModel();
//             $objProducto->setIdCategoria($id);
//             $respuesta = $objProducto->deleteCategoria();
//             return $respuesta;
//      }
      
      
      public function ModificarCategoria($id,$nombre,$estado){
             $objCategoria = new CategoriaModel();
             $objCategoria->setIdCategoria($id);
             $objCategoria->setNombreCategoria($nombre);
             $objCategoria->setEstadoCategoria($estado);
             $respuesta = $objCategoria->updateCategoria();
             return $respuesta;
      }
    
}
//test
$objeto = new CategoriaController();
//echo $objeto->agregarCategoria("cepillos",1);
//echo $objeto->eliminarCategoria(8);
//print_r($objeto->listarCategoria());
//echo $objeto->ModificarCategoria(8,"pruebas",1);