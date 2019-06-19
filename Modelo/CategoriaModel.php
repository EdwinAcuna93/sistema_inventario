<?php   
       
        require ('../Modelo/bd/Conexion.php');

        /**
         * @property int $idCategoria ID de la categoria
         */
        class CategoriaModel extends Conexion{  
            
           
            private $idCategoria = null;     
            private $nombreCategoria = null;
            private $estadoCategoria=null;
    
            function getIdCategoria() {
                return $this->idCategoria;
            }

            function getNombreCategoria() {
                return $this->nombreCategoria;
            }

            function getEstadoCategoria() {
                return $this->estadoCategoria;
            }

            function setIdCategoria($idCategoria) {
                $this->idCategoria = $idCategoria;
            }

            function setNombreCategoria($nombreCategoria) {
                $this->nombreCategoria = $nombreCategoria;
            }

            function setEstadoCategoria($estadoCategoria) {
                $this->estadoCategoria = $estadoCategoria;
            }

                          
           
            public function getCategoria(){
                $consulta = $this->db->query("select * from categoria;");
                $this->categoria = [['idCategoria'=>" ",'nombreCategoria'=>" ",'estadoCategoria'=>" "]];
                while( $filas = $consulta->fetch_array(MYSQLI_ASSOC)){
                        $this->categoria[] = $filas;
                }
                 return $this->categoria;    
            } 
            
            public function setCategoria(){
                if($this->nombreCategoria != null && $this->estadoCategoria != null){
                        $insert = ' "'.$this->getNombreCategoria().'",'.$this->estadoCategoria;
                        $cadena = 'INSERT INTO categoria'.' (nombreCategoria,estadoCategoria) VALUES('. $insert.')';  
                         //Verificacion de insercion
                        if ($this->db->query($cadena) === TRUE and $this->db->affected_rows==true) {
                             $mensaje =  "Categoria agregada con exito"."<br>";
                        } else {
                            $mensaje = "Error: " . $cadena . "<br>" . $this->db->error;
                        }

                }else{
                    $mensaje = "Error no ha enviado todos los datos necesarios para inserar una nueva categoria."; 
                }
                return $mensaje;
            }
            
            
             
            
            public function updateCategoria(){
                if($this->nombreCategoria != null && $this->estadoCategoria != null){
                        $SET = ' SET nombreCategoria = "'.$this->getNombreCategoria().'",  estadoCategoria = '.$this->getEstadoCategoria();
                        
                        $cadena = 'UPDATE categoria '. $SET .' WHERE idCategoria ='. $this->idCategoria.';';
                        
                        if ($this->db->query($cadena) === TRUE and $this->db->affected_rows==true) {
                             $mensaje =  "Categoria Modificada con exito"."<br>";
                        } else {
                            $mensaje = "Error: x" . $cadena . "<br>" . $this->db->error;
                        }

                }else{
                    $mensaje = "Error no ha enviado todos los datos necesarios para realizar la modificacion."; 
                }
                return $mensaje;    
            }
      }   
        
    


        
