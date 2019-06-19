<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Agregar Producto</title>
        <link rel="stylesheet" href="asets/css/bootstrap.css">
        <link rel="stylesheet" href="asets/css/estilos.css">
        <?php
            require '../Controlador/ProductoController.php';
            
            $objetoProducto = new ProductoController();
            //validacion que existan Y/o esten vacios
            
             if (isset($_POST['nombre']) and $_POST['marca'] and $_POST['precio']and $_POST['stock']and $_POST['proveedor']and $_POST['categoria']) {
                $mensaje =  $objetoProducto->agregarProducto($_POST['nombre'], $_POST['marca'], $_POST['precio'],$_POST['stock'],$_POST['proveedor'],$_POST['categoria']);
             } else{
                 $mensaje = "";
             }
        ?>
    </head>
    <body>  
        <section class="container-fluid" > <!--inicio contenedor principal--->
         
        <?php 
            //importamos el menu
            include '../Vistas/plantilla/menuPlantillaProducto.php';
            //validamos
            //echo $mensaje;
            if($mensaje!= ""){
                   
                   header('Location: ProductoListaView.php?mensaje=3');
            }
                 
        ?>
            <section class="offset-lg-3 col-lg-6 col-md-10 bg-dark" id="cntFormProducto"> <!--inicio contenedor form-->
                 <section class="row" >
                     <h3 class="col-lg-12 text-white">AGREGAR PRODUCTOS</h3>
                 </section>       
                 <form action="" method="post" ><!--formulario add productos -->
                     
                     
                     
                     <div class="form-group">
                         <label class="text-white">Nombre: </label>
                         <input type="text"  class="form-control" name="nombre" placeholder="Nombre producto" required="" autofocus="1">
                     </div>
                     
                     
                     <div class="form-group">
                             <label class="text-white">Marca:</label>
                             <input type="text" name="marca"  class="form-control" placeholder="Marca producto" required="">
                     </div>
                     
                     
                     <div class="form-group">
                           <label class="text-white">Precio:</label>
                           <input type="text"  class="form-control" name="precio" placeholder="Precio producto" required="">
                     </div>
                     
                     <div class="form-group">
                           <label class="text-white">Stock:</label>
                           <input type="number"  class="form-control" name="stock" placeholder="Stock producto" required="">
                     </div>
                     
                     <div class="form-group">
                           <label class="text-white">Proveedor:</label>
                           <input type="text"  class="form-control" name="proveedor" placeholder="Proveedor producto" required="">
                     </div>
                 
                
               <div class="form-group">
                          
                           <label class="text-white">Categoria:</label>
                           <select name="categoria" class="form-control">
                <option>--SELECCIONE UNA OPCION--</option>
            <?php
            $dato = $objetoProducto->listarCategoria();
            $cont = 0;
            //echo "foreach"."<br>";
            foreach ($dato as $value) {
                foreach ($value as $key) {
                    if($cont == 0){
                        $cont += 1;
                    }else{
                        echo '<option value="'.$key['idCategoria'].'">'.$key['nombreCategoria'].'</option>';
                    }
                    
                }
            }           
            ?>    
        <?php 
            //importamos el menu
            include '../Vistas/plantilla/menuPlantilla.php';
            //validamos
            
            if($mensaje!= null){
                   echo "<div class='alert alert-success col-lg-6 offset-3 alert-custom'>
                       <strong>PRODUCTO AGREGADO: ".$_POST["nombre"]." </strong> de forma satisfactoria
                       </div>";
            }
                 
        ?>
        </select>                     

                           
                     </div>
                     
                     <div class="form-group col-10 offset-3">
                            <input  class="btn btn-outline-success btn-custom-form" type="submit"> 
                            <input  class="btn btn-outline-danger btn-custom-form" type="reset">
                            <br><br>
                     </div>
                        
               </form>  
            </section> <!--fin contenedor form-->
            
        </section> <!-- Fin contenedor principal-->
    </body>
</html>
