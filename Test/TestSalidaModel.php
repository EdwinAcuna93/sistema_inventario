<?php
require_once '../Modelo/SalidaModel.php';

$objetoSalida = new SalidaModel(); 
//echo $objetoSalida->obtenerStock(2);

//------------PRUEBA DEL METODO LISTAR----------------------

    //var_dump($objetoEncargado->getEncargado());
    //print_r($objetoSalida->getSalida());
     // echo $objetoSalida->actualizarStock(19);
    
//-------------PRUEBA DEL METODO INSERTAR--------------------
     $objetoSalida->setIdProducto(3);
     $objetoSalida->setCantidad(1);
     $objetoSalida->setIdEncargado(3);
     $objetoSalida->setFecha("2019-12-12");
     echo $objetoSalida->setSalida();
     

//------------PRUEBA DEL METODO ELIMINAR---------------------
    //  $objetoEncargado->setIdEncargado(3);
    //  echo $objetoEncargado->deleteEncargado(); 

//----------PRUEBA DEL METODO UPDATE--------------------------
//    $objetoEncargado->setIdEncargado(2);
//    $objetoEncargado->setNombre("Chepon Aquino");
//    echo $objetoEncargado->updateCategoria();
    
