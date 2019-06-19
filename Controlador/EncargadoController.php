<?php

require_once '../Modelo/EncargadoModel.php';

class EncargadoController {
    
     public function listarEncargado(){
           $objEncargado = new EncargadoModel();
           $objEncargado->getEncargado();
           return $objEncargado;    
      }
      
      public function agregarEncargado($nombre,$estado){
           $objEncargado = new EncargadoModel();
           $objEncargado->setNombre($nombre);
           $objEncargado->setEstadoEncargado($estado);
           $respuesta = $objEncargado->setEncargado();
           return $respuesta;
      } 
      
//      public function eliminarEncargado($id){
//             $objProducto = new EncargadoModel();
//             $objProducto->setIdEncargado($id);
//             $respuesta = $objProducto->deleteEncargado();
//             return $respuesta;
//      }
      
      public function ModificarEncargado($id, $nombre,$estado){
             $objEncargado = new EncargadoModel();
             $objEncargado->setNombre($nombre);
             $objEncargado->setIdEncargado($id);
             $objEncargado->setEstadoEncargado($estado);
             $respuesta = $objEncargado->updateEncargado();
             return $respuesta;
      }
    
}

//test listar
//$objeto = new EncargadoController();
//print_r($objeto->listarEncargado());
//var_dump($objeto->listarEncargado());


//test agregar
//$objeto = new EncargadoController();
//echo $objeto->agregarEncargado("jose morales", 1);


//test eliminar
//$objeto = new EncargadoController();
//echo $objeto->eliminarEncargado(3);


// test modificar
//$objeto = new EncargadoController();
//echo $objeto->ModificarEncargado(4, "juanita chanita", 1);