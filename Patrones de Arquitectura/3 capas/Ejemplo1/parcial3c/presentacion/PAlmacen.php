<?php
    include_once "../../parcial3c/negocio/NAlmacen.php";

    $NAlmacen = new NAlmacen();
    $id = isset($_POST["id"]) ? $_POST["id"] : "";
    $cantidad = isset($_POST["cantidad"]) ? $_POST["cantidad"] : "";
    $precio = isset($_POST["precio"]) ? $_POST["precio"] : "";
    $stock = isset($_POST["stock"]) ? $_POST["stock"] : "";
    
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

    function agregar()
    {
        global $cantidad, $precio, $stock, $NAlmacen;
        $NAlmacen->agregarAlmacen($cantidad, $precio, $stock);
    }

    function modificar()
    {
        global $cantidad, $precio, $stock, $id, $NAlmacen;
        $NAlmacen->modificarAlmacen($id, $cantidad, $precio, $stock);
    }

    function listar()
    {
        global $NAlmacen;
        return $NAlmacen->listarAlmacen();
    }

    function habilitar()
    {
        global $NAlmacen, $id;
        $NAlmacen->habilitarAlmacen($id);
    }
    function deshabilitar()
    {
        global $NAlmacen, $id;
        $NAlmacen->deshabilitarAlmacen($id);
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Almacen</title>
    <?php
    require_once "PHome.php";
    ?>
</head>

<body>
    <div class="container">
        <h1>
            <?php 
                if (isset($_POST['cargar']))
                    echo 'Modificar';
                else echo 'Agregar';
            ?>
            Almacen
        </h1>
        <br>
        <div class="row">
            <div class="col-sm-4">
                <form form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php if (isset($_POST["cargar"])) echo $_POST["id"]; ?>">

                    <div class="form-group row">
                        <label for="cantidad" class="col-sm-2 col-form-label">Cantidad*: </label>
                        <div class="col-sm-11">
                            <input type="int" maxlength="50" required class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad..." value="<?php if (isset($_POST["cargar"])) echo $_POST["cantidad"]; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="precio" class="col-sm-2 col-form-label">Precio*: </label>
                        <div class="col-sm-11">
                            <input type="text" maxlength="50" required class="form-control" id="precio" name="precio" placeholder="Precio..." value="<?php if (isset($_POST["cargar"])) echo $_POST["precio"]; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="stock" class="col-sm-2 col-form-label">Stock*: </label>
                        <div class="col-sm-11">
                            <input type="int" maxlength="50" required class="form-control" id="stock" name="stock" placeholder="Stock..." value="<?php if (isset($_POST["cargar"])) echo $_POST["stock"]; ?>">
                        </div>
                    </div>


                    <div class=" form-group row ">

                        <?php
                            if (isset($_POST['cargar'])) {
                                echo '
                                                <div class=" col-sm-6">
                                                    <button type="submit" name="modificar" id="modificar" class="btn btn-primary">Modificar</button>
                                                </div> 
                                                <div class="col-sm-6">
                                                    <a type="button" class="btn btn-info" href="PAlmacen.php">Cancelar</a>
                                                </div>';
                            } else {
                                echo '
                                                <div class=" col-sm-6">
                                                    <button type="submit" name="agregar" id="agregar" class="btn btn-primary">Agregar</button>
                                                </div> ';
                            }
                        ?>
                    </div>

                </form>
            </div>
            <div class="col-sm">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php

                                $result = listar();
                                $html = '';

                                while ($ver = $result-> fetchObject()) {
                                    $html = $html . '
                                                    <tr >
                                                        <td>' .  trim($ver->id) . '</td>
                                                        <td>' .  trim($ver->cantidad) . '</td>
                                                        <td>' .  trim($ver->precio) . '</td>
                                                        <td>' .  trim($ver->stock) . '</td>
                                                        <td>';
                                    if ($ver->estado == 1) {
                                        $html = $html . '<span class="badge badge-success" style="background-color: #5cc45e;">&nbsp&nbsp&nbspActivado&nbsp&nbsp&nbsp</span>';
                                    } else {
                                        $html = $html . '<span class="badge badge-danger" style="background-color: #f81b06;">Desactivado</span>';
                                    }
                                    $html = $html .     '</td>
                                                        <td style="white-space: nowrap" class="row"> 
                                                            <form  method="POST">
                                                                <input type="hidden" name="id" value="' .  trim($ver->id) . '">
                                                                <input type="hidden" name="cantidad" value="' .  trim($ver->cantidad) . '">
                                                                <input type="hidden" name="precio" value="' .  trim($ver->precio) . '">
                                                                <input type="hidden" name="stock" value="' .  trim($ver->stock) . '">
                                                               
                                                                <button type="submit" value="cargar" name="cargar"  class="btn btn-info" role="button"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></button>';
                                    if ($ver->estado == 1) {
                                        $html = $html . '       <button type="submit" value="deshabilitar" name="deshabilitar"  class="btn btn-danger" role="button"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i></button>';
                                    } else {
                                        $html = $html . '       <button type="submit" value="habilitar" name="habilitar"  class="btn btn-success" role="button"><i class="glyphicon glyphicon-ok" aria-hidden="true"></i></button>';
                                    }

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