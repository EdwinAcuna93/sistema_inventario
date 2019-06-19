<?php

require_once '../Modelo/EncargadoModel.php';

$objetoEncargado = new EncargadoModel();

//------------PRUEBA DEL METODO LISTAR----------------------

    //var_dump($objetoEncargado->getEncargado());
  //  print_r($objetoEncargado->getEncargado());

//-------------PRUEBA DEL METODO INSERTAR--------------------
//     $objetoEncargado->setNombre("Chepe Aquino");
//     $objetoEncargado->setEstadoEncargado(1);
//     echo $objetoEncargado->setEncargado();

//------------PRUEBA DEL METODO ELIMINAR---------------------
    //  $objetoEncargado->setIdEncargado(3);
    //  echo $objetoEncargado->deleteEncargado(); 

//----------PRUEBA DEL METODO UPDATE--------------------------
//   $objetoEncargado->setIdEncargado(3);
//    $objetoEncargado->setNombre("Chepon Aquino");
//    $objetoEncargado->setEstadoEncargado(0);
//    echo $objetoEncargado->updateEncargado();
