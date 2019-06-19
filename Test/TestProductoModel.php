<?php

require_once '../Modelo/ProductoModel.php';

$objetoProducto = new ProductoModel;

//------------PRUEBA DEL METODO LISTARPRODUCTOS Y LISTAR PRODUCTOSPORNOMBRE----------------------
    //print_r($objetoProducto->listarProductos());
    var_dump($objetoProducto->getCategoria());
        // $objetoProducto->setIdProducto(1);
       // $objetoProducto->obtnerStockPorId();

//-------------PRUEBA DEL METODO INSERTAR--------------------
//         $objetoProducto->setNombre("Javon ena chibolititita");
//         $objetoProducto->setMarca("AXION");
//         $objetoProducto->setPrecio(0.35);
//         $objetoProducto->setStock(100);
//         $objetoProducto->setProveedor("Unilever");
//         $objetoProducto->setIdCategoria(5);
//         echo $objetoProducto->insertarProducto();
     

//------------PRUEBA DEL METODO ELIMINAR---------------------
//          $objetoProducto->setIdProducto(7);
//          echo $objetoProducto->deleteProducto(); 

//----------PRUEBA DEL METODO UPDATE--------------------------
//         $objetoProducto->setIdProducto(1);
//         $objetoProducto->setNombre("Jabon par niño");
//         $objetoProducto->setMarca("DOVE");
//         $objetoProducto->setStock(100);    // COMO VOY A OBTENER ESTE STOCK, QUIERO QUE QUEDE EN UNA VARIABLE PARA PODER OPERARLO
//         $objetoProducto->setPrecio(0.50);
//         $objetoProducto->setCantidadExtra(50);
//         $objetoProducto->setProveedor("Unilever");
//         $objetoProducto->setIdCategoria(5);
//         echo $objetoProducto->updateProducto();
