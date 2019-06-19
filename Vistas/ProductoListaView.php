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
            require_once '../Controlador/ProductoController.php';
            
            $objProducto = new ProductoController();
            
        ?>
        <style>
         
        </style>
    </head>
    <body>
    <section class="container-fluid">
        <?php  
            //barra de navegación        
            include '../Vistas/plantilla/menuPlantillaProducto.php'; 
            
            if(isset($_GET['mensaje'])){
                switch ($_GET['mensaje']) {
                    case 1:
                         echo "<div class='alert alert-primary col-lg-6 offset-3 alert-custom'>
                              <strong>PRODUCTO MODIFIOCADO </strong> de forma satisfactoria
                              </div>";
                     break;
                     case 2:
                         echo "<div class='alert alert-danger col-lg-6 offset-3 alert-custom'>
                              <strong>PRODUCTO MELIMINADO </strong> de forma satisfactoria
                              </div>";
                     break;
                     case 3:
                         echo "<div class='alert alert-primary col-lg-6 offset-3 alert-custom'>
                              <strong>PRODUCTO AGREGADO </strong> de forma satisfactoria
                              </div>";
                     break;

                    default:
                        echo "!!Opción incorrecta!!";
                        break;
                }
            }
        ?> 
        
        <section class="row">
            <div class=" offset-0 col-12" id="cntTablaProductos">
                <h1 id="productoH1">Tabla Productos</h1>
                <table id="tbProductos" class="table"> 
                    <?php
                      
                       $producto = $objProducto->listarProducto();
                       //acceso a los arreglos de forma individual
                       $contador = 0;
                       foreach ($producto as $arreglos) {
                           echo '<thead class="table table-bordered table-striped table-hover bg-dark"> '
                                . '<tr> <th scope="col"> Id </th> <th scope="col"> Nombre </th>  '
                                .'<th scope="col"> Marca </th> <th scope="col"> Precio </th> <th scope="col"> Stock </th> <th scope="col"> Estado </th> <th scope="col"> Proveedor </th> <th scope="col"> Categoria </th> <th scope="col"> Acciones </th>'
                                . ' </tr> </thead>';
                           //acceso a los elementos del arreglo de forma individual

                           foreach ($arreglos as $elemento) {
                            if($contador == 0){
                                $contador += 1;
                                echo "<tbody>";
                            }else{
                                
                                echo '<tr>'
                                         .'<td>'.$elemento['idProducto'].'</td>'
                                         .'<td>'.$elemento['nombre'].'</td>'
                                         .'<td>'.$elemento['marca'].'</td>'
                                         .'<td>'.$elemento['precio'].'</td>'
                                        .'<td>'.$elemento['stock'].'</td>';
                                      
                                        if($elemento['estado'] == 1){
                                            $estado = "Activo";
                                        }else{
                                            $estado = "Inactivo";
                                        }
                                        
                                        echo '<td>'.$estado.'</td>'
                                          .'<td>'.$elemento['proveedor'].'</td>'
                                          .'<td>'.$elemento['nombreCategoria'].'</td>'
                                        
                                         .'<td>'.'<a class="btn btn-warning" href="ProductoModificarView.php?idProducto='.$elemento['idProducto'].'&nombre='.$elemento['nombre'].'&marca='.$elemento['marca'].'&precio='.$elemento['precio'].'&stock='.$elemento['stock'].'&proveedor='.$elemento['proveedor'].'&nombreCategoria='.$elemento['nombreCategoria'].'&idCategoria='.$elemento['idCategoria'].'">Editar</a> | '
                                         .'<a class="btn btn-danger" href="ProductoEliminarView.php?idProducto='.$elemento['idProducto'].'&nombre='.$elemento['nombre'].'">Eliminar</a>'.'</td>' 
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
                    "zeroRecords": "Datos no encontrados - upss",
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
