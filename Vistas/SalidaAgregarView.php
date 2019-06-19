<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="asets/css/bootstrap.css">
        <link rel="stylesheet" href="asets/css/estilos.css">
        <?php
        require '../Controlador/SalidaController.php';
        $objetoSalida = new SalidaController();
        //validacion que existan Y/o esten vacios
        if (isset($_POST['idProducto']) and $_POST['cantidad'] and $_POST['idEncargado']and $_POST['fecha']) {
            $mensaje = $objetoSalida->agregarSalidas($_POST['idProducto'], $_POST['cantidad'], $_POST['idEncargado'], $_POST['fecha']);
            echo $mensaje;
            
            
        } else {
            $mensaje = "";
        }
        ?>
    </head>
    <body>  
        <section class="container-fluid" > <!--inicio contenedor principal--->
            <?php
            //importamos el menu
            include '../Vistas/plantilla/menuPlantillaSalida.php';
            //validamos
            if ($mensaje != null) {
                echo "<div class='alert alert-success col-lg-6 offset-3 alert-custom'>
                       <strong>REGISTRO AGREGADO: " . $_POST["idProducto"] . " </strong> de forma satisfactoria
                       </div>";

                header('Location: SalidaListaView.php?mensaje=1');
            }
            ?>
            <section class="offset-lg-3 col-lg-6 col-md-10 bg-dark" id="cntFormProducto"> <!--inicio contenedor form-->
                <section class="row" >
                    <h3 class="col-lg-12 text-white">AGREGAR SALIDA</h3>
                </section>       
                <form action="" method="post" ><!--formulario agregar salida -->
                    <div class="form-group">
                        <label class="text-white">Id Producto: </label>
                        <input type="number"  class="form-control" name="idProducto" placeholder="Id producto" required="" autofocus="1">
                    </div>
                    <div class="form-group">
                        <label class="text-white">NombreProducto:</label>
                        <input type="number"  class="form-control" name="nombreProducto" placeholder="Nombre producto">
                    </div>
                    <div class="form-group">
                        <label class="text-white">Cantidad</label>
                        <input type="number" name="cantidad"  class="form-control" placeholder="cantidad" required="">
                    </div>

                    <div class="form-group">
                        <label class="text-white">Encargado</label>
                        <select name="idEncargado" class="form-control">
                            <option>--SELECCIONE UNA OPCION--</option>
                            <?php
//                                  require_once '../Controlador/EncargadoController.php';
//                                  $objsalida = new EncargadoController();
                            $dato = $objetoSalida->listarEncargado();
                            $cont = 0;
                            //echo "foreach"."<br>";
                            foreach ($dato as $value) {
                                //echo "Primero"."<br>";
                                foreach ($value as $key) {
                                    if ($cont == 0) {
                                        $cont += 1;
                                    } else {
                                        echo "Segundo" . "<br>";
                                        echo '<option value="' . $key['idEncargado'] . '">' . $key['nombre'] . '</option>';
                                    }
                                }
                            }
                            ?>    

                        </select>
                    </div>                     

                    <div class="form-group">
                        <label class="text-white">Fecha</label>
                        <input type="date" name="fecha"  class="form-control" placeholder="fecha" required="">
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
