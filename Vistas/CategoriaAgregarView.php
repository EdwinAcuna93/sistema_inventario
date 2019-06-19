<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title> Agregar Categoria </title>
        <link rel="stylesheet" href="asets/css/bootstrap.css">
        <link rel="stylesheet" href="asets/css/estilos.css">
        <?php
            require '../Controlador/CategoriaController.php';
            $objetoProducto = new CategoriaController;
            //validacion que existan Y/o esten vacios
             if (isset($_POST['nombreCategoria']) and $_POST['estadoCategoria']) {
                $mensaje =  $objetoProducto->agregarCategoria($_POST['nombreCategoria'], $_POST['estadoCategoria']);
             } else{
                 $mensaje = "";
             }
             
        ?>
    </head>
    <body>  
        <section class="container-fluid" > <!--inicio contenedor principal--->
        <?php 
            //importamos el menu
            include '../Vistas/plantilla/menuPlantillaCategoria.php';
            //validamos
            if($mensaje!= null){
                   echo "<div class='alert alert-success col-lg-6 offset-3 alert-custom'>
                       <strong>REGISTRO AGREGADO: ".$_POST["nombreCategoria"]." </strong> de forma satisfactoria
                       </div>";
                   header('Location: CategoriaListaView.php?mensaje=3');
                   
            }
                 
        ?>
            <section class="offset-lg-3 col-lg-6 col-md-10 bg-dark" id="cntFormProducto"> <!--inicio contenedor form-->
                 <section class="row" >
                     <h3 class="col-lg-12 text-white"> AGREGAR CATEGORIA </h3>
                 </section>       
                 <form action="" method="post" ><!--formulario add productos -->
                     <div class="form-group">
                         <label class="text-white"> Nombre: </label>
                         <input type="text"  class="form-control" name="nombreCategoria" placeholder="Nombre de categoria" required="" autofocus="1">
                     </div>
                     
                     <div class="form-group">
                         <label class="text-white">Estado:</label>
                         <select name="estadoCategoria" class="form-control">
                             
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
