<?php

/*comprobar si la conexion esta funcionando de forma
*correcta
 */
//requerimos la conexion
require_once '../Modelo/bd/Conexion.php';

class Test extends Conexion{
     //testeamos
     public function testConexion(){
         $this->test();
    }
 }
 //creamos el objeto
 $objeto = new Test();
 
 $objeto->testConexion();
 