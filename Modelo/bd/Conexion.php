<?php 
require_once('config.php');
//use Model;
abstract class Conexion{
    //Atributos
    protected  $db;
    //Constructor
    public function __construct(){
            //conexión open
            $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            
            if($this->db->connect_errno){
                    echo "Fallo al conectar, error code:".$this->db->connect_errno;
                    return;
            }
           $this->db->set_charset(DB_CHARSET);
    }
    
    /* //conexión close */
    public function __destruct() {
           $this->db->close();   
          // echo "Conexion cerrada"."<br>";
    }
    
    public function test(){
         if($this->db->ping()) {
            echo ("¡La conexión está activa!\n"."<br>");
         } else {
            echo ("Error: ". $this->db->connect_errno);
        }
    }
    
    
    
}

