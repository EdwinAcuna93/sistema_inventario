<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista Categoria</title>
        <link rel="stylesheet" href="asets/css/bootstrap.css">
        <link rel="stylesheet" href="asets/css/estilos.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <?php
        require_once '../Controlador/CategoriaController.php';
        //objeto
        $objProducto = new CategoriaController();
        ?>
        
    </head>
    <body>
        <section class="container-fluid">
            <?php
            //barra de navegación        
            include '../Vistas/plantilla/menuPlantillaCategoria.php';
            if (isset($_GET['mensaje'])) {
                switch ($_GET['mensaje']) {
                    case 1:
                        echo "<div class='alert alert-primary col-lg-6 offset-3 alert-custom'>
                              <strong>REGISTRO MODIFICADO </strong> de forma satisfactoria
                              </div>";
                        break;
                    case 2:
                        echo "<div class='alert alert-danger col-lg-6 offset-3 alert-custom'>
                              <strong> REGISTRO ELIMINADO </strong> de forma satisfactoria
                              </div>";
                        break;
                    case 3:
                        echo "<div class='alert alert-primary col-lg-6 offset-3 alert-custom'>
                              <strong>REGISTRO AGREGADO </strong> de forma satisfactoria
                              </div>";
                        break;
                   

                    default:
                        echo "!!Opción incorrecta!!";
                        break;
                }
            }
            ?> 

            <section class="row">
                <div class=" offset-3 col-6" id="cntTablaProductos">
                    <h1  id="productoH1">Lista de Categorias</h1>
                    <table id="tbProductos" class="table"> 
                        <?php                       
                        $producto = $objProducto->listarCategoria();
                        
                        //acceso a los arreglos de forma individual
                        $contador = 0;
                        foreach ($producto as $arreglos) {
                            echo '<thead class="table table-bordered table-striped table-hover bg-dark"> '
                            . '<tr> <th scope="col"> Id Categoria </th> <th scope="col"> Nombre categoria </th>  '
                            . '<th scope="col"> Estado Categoria </th> <th scope="col"> Acciones </th>'
                            . ' </tr> </thead>';
                            //acceso a los elementos del arreglo de forma individual

                            foreach ($arreglos as $elemento) {
                                if ($contador == 0) {
                                    $contador += 1;
                                    echo "<tbody>";
                                } else {

                                    echo '<tr>'
                                    . '<td>' . $elemento['idCategoria'] . '</td>'
                                    .'<td>' . $elemento['nombreCategoria'] . '</td>';
                                    if($elemento['estadoCategoria'] == 1){
                                            $estado = "Activo";
                                        }else{
                                            $estado = "Inactivo";
                                        }
                                        
                                        echo '<td>'.$estado.'</td>'                                                        
                                                                         
                                    . '<td>' . '<a class="btn btn-warning" href="CategoriaModificarView.php?idCategoria=' . $elemento['idCategoria'] . '&nombreCategoria=' . $elemento['nombreCategoria'] . '&estadoCategoria=' . $elemento['estadoCategoria'] . '">Editar</a>  '
                                    . '</tr>';
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
            $(document).ready(function () {
                $('#tbProductos').DataTable({
                    "language": {
                        "lengthMenu": "Mostrar _MENU_ ",
                        "zeroRecords": "Datos no encontrados - upss",
                        "info": "Mostar paginas _PAGE_ de _PAGES_",
                        "infoEmpty": "Datos no encontrados",
                        "infoFiltered": "(Filtrados por _MAX_ total registros)",
                        "search": "Buscar:",
                        "paginate": {
                            "first": "First",
                            "last": "Anterior",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }

                    }
                });
            });

        </script>
    </body>
</html>
