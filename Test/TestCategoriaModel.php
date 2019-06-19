<?php

require_once '../Modelo/CategoriaModel.php';

$objetoCategoria = new CategoriaModel();

//------------PRUEBA DEL METODO LISTAR----------------------

    print_r($objetoCategoria->getCategoria());
    //print_r($objetoEncargado->getEncargado());

//-------------PRUEBA DEL METODO INSERTAR--------------------
//    $objetoCategoria->setnombreCategoria("diversion");
//    $objetoCategoria->setEstadoCategoria(1);
//    echo $objetoCategoria->setCategoria();

//------------PRUEBA DEL METODO ELIMINAR---------------------
    //  $objetoEncargado->setIdEncargado(3);
    //  echo $objetoEncargado->deleteEncargado(); 

//----------PRUEBA DEL METODO UPDATE--------------------------
//    $objetoCategoria->setIdCategoria(7);
//    $objetoCategoria->setNombreCategoria("Bebidas");
//    $objetoCategoria->setEstadoCategoria(1);
//    echo $objetoCategoria->updateCategoria();
