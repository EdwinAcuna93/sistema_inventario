<?php   
       
        require ('../Modelo/bd/Conexion.php');
       
       
        class EncargadoModel extends Conexion{  
            
            
            private $idEncargado = null;     
            private $nombre= null;
            private $estadoEncargado=null;
            
            function getIdEncargado() {
                return $this->idEncargado;
            }

            function getNombre() {
                return $this->nombre;
            }

            function getEstadoEncargado() {
                return $this->estadoEncargado;
            }

            function setIdEncargado($idEncargado) {
                $this->idEncargado = $idEncargado;
            }

            function setNombre($nombre) {
                $this->nombre = $nombre;
            }

            function setEstadoEncargado($estadoEncargado) {
                $this->estadoEncargado = $estadoEncargado;
            }

                                
      

                      
            public function getEncargado(){
                
                $consulta = $this->db->query("select * from encargado ;");
                $this->encargado = [['idCategoria'=>" ",'nombre'=>" "]];
                while( $filas = $consulta->fetch_array(MYSQLI_ASSOC)){                    
                        $this->encargado[] = $filas;
                }                 
                 return $this->encargado;    
            } 
            
               
             
           public function setEncargado(){
                if($this->nombre != null ){
                        $insert = ' "'.$this->getNombre().'",'.$this->getEstadoEncargado();
                        $cadena = 'INSERT INTO encargado'.' (nombre,estadoEncargado) VALUES('. $insert.')';  
                         
                        if ($this->db->query($cadena) === TRUE and $this->db->affected_rows==true) {
                             $mensaje =  "Encargado agregado con exito"."<br>";
                        } else {
                            $mensaje = "Error: " . $cadena . "<br>" . $this->db->error;
                        }

                }else{
                    $mensaje = "Error no ha enviado todos los datos necesarios para inserar una nuevo encargado."; 
                }
                return $mensaje;
            }
            
            
//            public function deleteEncargado(){
//                if($this->idEncargado != null){                       
//                        $cadena = 'DELETE FROM encargado where idEncargado='.$this->idEncargado.';';                        
//                        if ($this->db->query($cadena) === TRUE and $this->db->affected_rows==true) {
//                             $mensaje =  "Dato eliminado"."<br>";
//                        } else {
//                             $mensaje = "Error: " . $cadena . "<br>" . $this->db->error."Registro no encontrado.<br>";
//                        }  
// 
//                } else {
//                  $mensaje = "Por favor enviar el parametro para eliminar el producto";    
//                }
//                return $mensaje;
//            }
            
            
            
            
           public function updateEncargado(){
                if($this->nombre != null ){
                        $SET = ' SET nombre = "'.$this->getNombre().'",  estadoEncargado = '.$this->getEstadoEncargado();
                        
                        $cadena = 'UPDATE encargado '. $SET .' WHERE idEncargado ='. $this->idEncargado.';';
                        
                        if ($this->db->query($cadena) === TRUE and $this->db->affected_rows==true) {
                             $mensaje =  "Encargado Modificada con exito"."<br>";
                        } else {
                            $mensaje = "Error: x" . $cadena . "<br>" . $this->db->error;
                        }

                }else{
                    $mensaje = "Error no ha enviado todos los datos necesarios para realizar la modificacion."; 
                }
                return $mensaje;    
            }
         
      }   
        
    




        
