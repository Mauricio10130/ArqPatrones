<?php
session_start();
include_once "../../parcial3c/negocio/NPedidos.php";

$NPedidos = new NPedidos();

$id = isset($_POST["id"]) ? $_POST["id"] : "";
$adjunto = isset($_POST["adjunto"]) ? $_POST["adjunto"] : "";
$detalles = isset($_POST["detalles"]) ? $_POST["detalles"] : "";
$especificacion = isset($_POST["especificacion"]) ? $_POST["especificacion"] : "";
$idProductos = isset($_POST["idProductos"]) ? $_POST["idProductos"] : "";
$hora_pedido = isset($_POST["hora_pedido"]) ? $_POST["hora_pedido"] : "";

if (!empty($_POST)) {
    if (isset($_POST["agregar"])) {
        agregar();
    }
    if (isset($_POST["modificar"])) {
        modificar();
    }
    if (isset($_POST["habilitar"])) {
        habilitar();
    }
    if (isset($_POST["deshabilitar"])) {
        deshabilitar();
    }
}

 function modificar()
{
    $id = $_REQUEST['id'];
    $id_estudiante = $_SESSION["id_estudiante"];
    date_default_timezone_set('America/La_Paz');
    $fecha = date("Y-m-d");
    $hora = date("H:i:s");
    $tareafecha = $_REQUEST['tareafecha'];
    $this->presentacionestudiante->subirTarea($id, $fecha, $tareafecha, $hora, $id_estudiante);
   
}

    function listar($idProductos)
    {
        $NPedidos = NPedidos::getInstancia();
        return $NPedidos->listarComplementoProductos($idProductos);
    }
    
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Adjunto</title>
    <?php
    require_once "PHome.php";
    ?>
</head>

<body>
    <div class="container">
        <h1>
            <?php 
                if (isset($_POST['cargar']))
                    echo 'Subir Adjunto';
                else echo 'Seleccione ';
            ?>
        </h1>
        <br>
        <div class="row">
            <div class="card-body">
                <form form method="POST" enctype="multipart/form-data">
                    
                    <input type="hidden" name="id" value="<?php if (isset($_POST["cargar"])) echo $_POST["id"]; ?>">
                    <input type="hidden" name="fecha" value="<?php if (isset($_POST["cargar"])) echo $_POST["fecha"]; ?>">

                    <div class="form-group row">
                        <label for="nombre" class="col-sm-2 col-form-label">Subir Adjunto: </label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="adjunto" name="adjunto" accept=".pdf" required>
                        </div>
                    </div>

                    <div class=" form-group row ">

                        <?php
                            if (isset($_POST['cargar'])) {
                                echo '
                                                <div class=" col-sm-2">
                                                    <button type="submit" name="accion" value="modificar" id="modificar" class="btn btn-primary">Subir</button>
                                                </div> 
                                                <div class="col-sm-2">
                                                    <a type="button" class="btn btn-info" href="?controlador=PProductos">Cancelar</a>
                                                </div>';
                            }

                        ?>
                    </div>

                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Adjunto</th>
                                <th>Detalles</th>
                                <th>Especificacion</th>
                                <th>Productos</th>
                                <th>Descripcion</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>

                        <tbody>


                            <?php

                                $result = listar($idProductos);
                                $html = '';

                                while ($ver = $result->fetchObject()) {
                                    $html = $html . '
                                                    <tr >
                                                        <td>' .  trim($ver->idProductos) . '</td>
                                                        <td><a target="_blank"   href="' . '../colegiomvcpatterns/vista/resources/assets/files/' . trim($ver->tarea)  . '"> ' .  trim($ver->tarea) . ' </a></td>
                                                        <td>' .  trim($ver->detalles) . '</td>
                                                        <td>' .  trim($ver->especificacion) . '</td>
                                                        <td>' .  trim($ver->productonombre) .  '</td>
                                                        <td>' .  trim($ver->productodescripcion) . '</td>
                                                        <td>' .  trim($ver->productofecha) . '</td>
                                                        ';

                                    $html = $html .     '
                                                        <td style="white-space: nowrap" class="row"> 
                                                            <form  method="POST">
                                                                <input type="hidden" name="id_pedidos" value="' .  trim($ver->id_dpedidos) . '">
                                                                <input type="hidden" name="productofecha" value="' .  trim($ver->productofecha) . '">
                                                                <button type="submit" value="cargar" name="cargar"  class="btn btn-info" role="button"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></button>
                                                            </form>
                                                            <form method="POST" action="">
                                                                <input type="hidden" value="CPresentacionEstudiante" name="controlador">
                                                                <li><a href="PAdjuntoProductos.php"> adjunto</a></li>
                                                                <input type="hidden" name="id_pedidos" value="' .  trim($ver->id_pedidos) . '">
                                                            ';
                                                            
                                    $html = $html . '
                                                            </form>
                                                        </td>
                                                    </tr>    ';
                                }
                                echo $html;
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>