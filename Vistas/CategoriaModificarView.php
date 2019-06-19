<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
         <link rel="stylesheet" href="asets/css/bootstrap.css">
        <link rel="stylesheet" href="asets/css/estilos.css">
        <title> Modificar Categoria </title>
         <?php
             require_once '../Controlador/CategoriaController.php';
             //importamos el menu
            include '../Vistas/plantilla/menuPlantillaCategoria.php';
             //Validación
            $obj = new CategoriaController();
            $id = "";
            if (isset($_GET['idCategoria']) and isset($_GET['nombreCategoria']) and isset($_GET['estadoCategoria'])){
                 $id     = $_GET['idCategoria'];
                 $nombre = $_GET['nombreCategoria'];
                 $estado  = $_GET['estadoCategoria'];
                  
            }
            if(isset($_POST['ncategoria']) and isset($_POST['ecategoria'])){
              $mensaje = $obj->ModificarCategoria($id,$_POST['ncategoria'], $_POST['ecategoria']);
              header('Location: CategoriaListaView.php?mensaje=1');
              
            }
        ?>
        
    </head>
    <body>
        <section class="container-fluid" >
            <section class="offset-lg-3 col-lg-6 col-md-10 bg-dark" id="cntFormProducto"> <!--inicio contenedor form-->
                <section class="row" >
                    <div class="form-group col-12">
                        <h3 class="col-lg-12 text-white">MODIFICAR CATEGORIA</h3>
                        <!--formulario modificar productos -->
                        <form action="" method="post">

                            <label class="text-white">Nombre:</label>
                            <input type="text" class="form-control" name="ncategoria" placeholder="Nombre producto" required="" autofocus="1" value="<?php echo $nombre ?>">

                            <!--                    <label class="text-white">Estado:</label>
                                                <input type="number" class="form-control" name="ecategoria" placeholder="Estado de producto" required="" value="<?php echo $estado ?>">
                            -->
                            <div class="form-group">
                                <label class="text-white">Estado:</label>
                                <select name="ecategoria" class="form-control">

                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>

                                </select>
                            </div>


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
