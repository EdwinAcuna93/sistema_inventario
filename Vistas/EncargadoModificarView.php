<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="asets/css/bootstrap.css">
        <link rel="stylesheet" href="asets/css/estilos.css">
        <title>Modificar Encargado</title>
         <?php
             require_once '../Controlador/EncargadoController.php';
             //Validación
             
             
            //importamos el menu
            include '../Vistas/plantilla/menuPlantillaProducto.php';
            $obj = new EncargadoController();
            $id = "";
            if (isset ($_GET['idEncargado']) and ($_GET['nombre']) and isset($_GET['estadoEncargado'])){            
                $id= $_GET['idEncargado']; 
                $nombre = $_GET['nombre'];
                $estado  = $_GET['estadoEncargado'];
                 
            }
            if(isset($_POST['nombre']) and isset($_POST['idEstado'])){
              $mensaje = $obj->ModificarEncargado($id,$_POST['nombre'], $_POST['idEstado']);
              header('Location: EncargadoListaView.php?mensaje=1');
              
            }
        ?>
       
    </head>
    <body>
        
        <section class="container-fluid" > <!--inicio contenedor principal--->
        
            <section class="offset-lg-3 col-lg-6 col-md-10 bg-dark" id="cntFormProducto"> <!--inicio contenedor form-->
                 <section class="row" >
                     <h3 class="col-lg-12 text-white"> AGREGAR ENCARGADOS </h3>
                 </section>       
                 <form action="" method="post" ><!--formulario add productos -->
                     
                     <div class="form-group">
                           <label class="text-white"> Nombre: </label>
                           <input type="text"  class="form-control" name="nombre" placeholder="Nombre" required="" value="<?php echo $nombre ?>">
                     </div>
                                         
                     <div class="form-group">
                         <label class="text-white">Estado:</label>
                         <select name="idEstado" class="form-control">
                             
                             <option value="1">Activo</option>
                             <option value="0">Inactivo</option>
                            
                         </select>
                     </div>
                     
                     
                     <div class="form-group col-10 offset-3">
                            <input  class="btn btn-outline-success btn-custom-form" type="submit"> 
                            <input  class="btn btn-outline-danger btn-custom-form" type="reset">  
                            <br><br>
                     </div>
                        
                 </form> <!--fin formulario add productos--> 
            </section> <!--fin contenedor form-->
            
        </section> <!-- Fin contenedor principal-->
        
    </body>
</html>
