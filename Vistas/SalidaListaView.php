<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <link rel="stylesheet" href="asets/css/bootstrap.css">
         <link rel="stylesheet" href="asets/css/estilos.css">
         <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
         <link rel="stylesheet" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
         <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <?php
            require_once '../Controlador/SalidaController.php';
            
            $objSalida = new SalidaController();
            
        ?>
        <style>
         
        </style>
    </head>
    <body>
    <section class="container-fluid">
        <?php  
            //barra de navegación        
            include '../Vistas/plantilla/menuPlantillaSalida.php'; 
            if(isset($_GET['mensaje'])){
                switch ($_GET['mensaje']) {
                    case 1:
                         echo "<div class='alert alert-primary col-lg-6 offset-3 alert-custom'>
                              <strong>SALIDA AGREGADA</strong> de forma satisfactoria
                              </div>";
                     break;
                     case 2:
                         echo "<div class='alert alert-danger col-lg-6 offset-3 alert-custom'>
                              <strong>REGISTRO MELIMINADO </strong> de forma satisfactoria
                              </div>";
                     break;

                    default:
                        echo "!!Opción incorrecta!!";
                        break;
                }
            }
        ?> 
        
        <section class="row">
            <div class=" offset-1 col-10" id="cntTablaProductos">
                <h1 id="productoH1">Tabla Salidas</h1>
                <table id="tbProductos" class="table"> 
                    <?php
                      
                       $salida = $objSalida->listarSalidas();
                       //acceso a los arreglos de forma individual
                       $contador = 0;
                       echo '<thead class="table table-bordered table-striped table-hover bg-dark"> '
                                . '<tr> <th scope="col"> IdSalida </th> <th scope="col"> idProducto </th> <th scope="col"> NombreProducto </th>  '
                                .'<th scope="col"> Cantidad </th> <th scope="col"> NombreEncargado </th> <th scope="col"> Fecha </th>  <th scope="col"> Acciones </th>'
                                . ' </tr> </thead>';
                       foreach ($salida as $arreglos) {
                           
                          // acceso a los elementos del arreglo de forma individual

                           foreach ($arreglos as $elemento) {
                            if($contador == 0){
                               $contador += 1;
                               }else{
                                
                                echo '<tr>'
                                         .'<td>'.$elemento['idSalida'].'</td>'
                                         .'<td>'.$elemento['idProducto'].'</td>'
                                         .'<td>'.$elemento['p'].'</td>'
                                         .'<td>'.$elemento['cantidad'].'</td>'
                                        .'<td>'.$elemento['nombre'].'</td>'
                                        .'<td>'.$elemento['fecha'].'</td>'
                                       
                                        
                                         .'<td>'.'<a class="btn btn-warning" href="ProductoModificarView.php?idProducto='.$elemento['idProducto'].'&nombre='.$elemento['nombre'].'&marca='.$elemento['marca'].'&precio='.$elemento['precio'].'&stock='.$elemento['stock'].'&proveedor='.$elemento['proveedor'].'&nombreCategoria='.$elemento['nombreCategoria'].'">Editar</a>'                                         
                                         .'</tr>';  
                            }

                       }
                       }
                       echo "</tbody> ";
                       
                    ?>
              </table> 
               
            </div>
            
        </section>
        
    </section>
        <script>
            $(document).ready(function() {
            $('#tbProductos').DataTable( {
                "language": {
                    "lengthMenu": "Mostrar _MENU_ ",
                    "zeroRecords": "Datos no encontrados -",
                    "info": "Mostar paginas _PAGE_ de _PAGES_",
                    "infoEmpty": "Datos no encontrados",
                    "infoFiltered": "(Filtrados por _MAX_ total registros)",
                    "search":         "Buscar:",
                    "paginate": {
                            "first":      "First",
                            "last":       "Anterior",
                            "next":       "Siguiente",
                            "previous":   "Anterior"
                    },
                    
                }
            } );
} );
           
        </script>
    </body>
</html>
