<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="asets/css/bootstrap.css">
        <link rel="stylesheet" href="asets/css/estilos.css">
        <title> Editar Producto</title>
         <?php
             require_once '../Controlador/ProductoController.php';
             
            $objProducto = new ProductoController();
            //importamos el menu
            include '../Vistas/plantilla/menuPlantillaProducto.php';
            
            //$id = "";
            if (isset($_GET['idProducto']) and isset($_GET['nombre']) and isset($_GET['marca']) and isset($_GET['precio'])and isset($_GET['stock'])and isset($_GET['proveedor'])and isset($_GET['idCategoria'])and isset($_GET['nombreCategoria'])){
                
                 $idProducto    = $_GET['idProducto'];
                 $nombre = $_GET['nombre'];
                 $marca  = $_GET['marca'];
                 $precio = $_GET['precio'];
                 $stock  = $_GET['stock'];
                 $proveedor=$_GET['proveedor'];
                 $nombreCategoria=$_GET['nombreCategoria'];
                 $idCategoria=$_GET['idCategoria'];
                 
            }
            
               

            if(isset($_POST['nombreProducto']) and isset($_POST['marca']) and isset($_POST['precio']) and isset($_POST['cantidadExtra'])  and isset($_POST['proveedor'])  ){
                echo 'hasdaskdpajsdklasjdlaksm';
                if ($_POST['idCategoria']!=null) {
                    $valorIdCategoira=$_POST['idCategoria'];                            
                    
                }else{
                  $valorIdCategoira=$idCategoria;
                }
                
               
       
              $mensaje =$objProducto->ModificarProducto($idProducto,$_POST['nombreProducto'], $_POST['marca'], $_POST['precio'], $stock,$_POST['cantidadExtra'], $_POST['proveedor'],$valorIdCategoira);
              
                      
              header('Location: ProductoListaView.php?mensaje=1');
              
            }
        ?>
    </head>
    <body>
        <section class="container-fluid" >
            <section class="offset-lg-3 col-lg-6 col-md-10 bg-dark" id="cntFormProducto"> <!--inicio contenedor form-->
                <section class="row" >
                    <div class="form-group col-12">
                        <h3 class="col-lg-12 text-white">MODIFICAR PRODUCTO</h3>
                        <!--formulario modificar productos -->
                        <form action="" method="post">

                            <label class="text-white">Nombre:</label>
                            <input type="text" class="form-control" name="nombreProducto" placeholder="Nombre producto" required="" autofocus="1" value="<?php echo $nombre ?>">

                            <label class="text-white">Marca:</label>
                            <input type="text" class="form-control" name="marca" placeholder="Marca producto" required="" value="<?php echo $marca ?>">

                            <label class="text-white">Precio:</label>
                            <input type="text" class="form-control" name="precio" placeholder="Precio producto" required="" value="<?php echo $precio ?>">

                            <label class="text-white">Stock:</label>
                            <input disabled="" class="form-control" type="text" name="stock" placeholder="Stock" required="" value="<?php echo $stock ?>" >

                            <label class="text-white">Cantidad a modificar en stock:</label>
                            <input type="number" class="form-control" name="cantidadExtra" placeholder="Cantidad a agregar o quitar de stock"  value="0" >

                            <label class="text-white">Proveedor:</label>
                            <input type="text" class="form-control" name="proveedor" placeholder="Proveedor" required="" value="<?php echo $proveedor ?>">

                            <label class="text-white">Categoria:</label>            
                            <select class="form-control" name="idCategoria">
                                <option value="<?php $idCategoria ?>"><?php echo $nombreCategoria ?></option >
                                <option>--SELECCIONE UNA CATEGORIA--</option>


                                <?php
                                //   require_once '../Controlador/EncargadoController.php';
                                // $objsalida = new EncargadoController();
                                $dato = $objProducto->listarCategoria();
                                $cont = 0;
                                //echo "foreach"."<br>";
                                foreach ($dato as $value) {
                                    //echo "Primero"."<br>";
                                    foreach ($value as $key) {
                                        if ($cont == 0) {
                                            $cont += 1;
                                        } else {


                                            echo '<option  value="' . $key['idCategoria'] . '">' . $key['nombreCategoria'] . '</option>';
                                        }
                                    }
                                }
                                ?>    

                            </select>

                            <div class="form-group col-10 offset-3">
                                <br><br>
                                <input  class="btn btn-outline-success btn-custom-form" type="submit"> 
                                <input  class="btn btn-outline-danger btn-custom-form" type="reset">
                            </div>
                        </form> 
                    </div>
                </section> <!--fin contenedor form-->

            </section> <!-- Fin contenedor principal-->
        </section>
    </body>
</html>