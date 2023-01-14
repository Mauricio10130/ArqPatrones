<?php
    include_once "../../parcial3c/negocio/NProveedor.php";

    $NProveedor = new NProveedor();
    $id = isset($_POST["id"]) ? $_POST["id"] : "";
    $DNI = isset($_POST["DNI"]) ? $_POST["DNI"] : "";
    $marca = isset($_POST["marca"]) ? $_POST["marca"] : "";
    $direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : "";
    $celular = isset($_POST["celular"]) ? $_POST["celular"] : "M";
    $representante = isset($_POST["representante"]) ? $_POST["representante"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";

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
        global $DNI, $marca, $direccion, $celular, $representante, $email, $NProveedor;
        $NProveedor->agregarProveedor($DNI, $marca, $direccion, $celular, $representante, $email);
    }

    function modificar()
    {
        global  $DNI, $marca, $direccion, $celular, $representante, $email, $id, $NProveedor;
        $NProveedor->modificarProveedor($id, $DNI, $marca, $direccion, $celular, $representante, $email);
    }

    function listar()
    {
        global $NProveedor;
        return $NProveedor->listarProveedor();
    }

    function habilitar()
    {
        global $NProveedor, $id;
        $NProveedor->habilitarProveedor($id);
    }
    function deshabilitar()
    {
        global $NProveedor, $id;
        $NProveedor->deshabilitarProveedor($id);
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Proveedor</title>
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
            Proveedor
        </h1>
        <br>
        <div class="row">
            <div class="col-sm-4">
                <form form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php if (isset($_POST["cargar"])) echo $_POST["id"]; ?>">

                    <div class="form-group row">
                        <label for="DNI" class="col-sm-2 col-form-label">DNI*: </label>
                        <div class="col-sm-11">
                            <input type="int" maxlength="50" required class="form-control" id="DNI" name="DNI" placeholder="DNI..." value="<?php if (isset($_POST["cargar"])) echo $_POST["DNI"]; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="marca" class="col-sm-2 col-form-label">Marca*: </label>
                        <div class="col-sm-11">
                            <input type="text" maxlength="50" required class="form-control" id="marca" name="marca" placeholder="Marca..." value="<?php if (isset($_POST["cargar"])) echo $_POST["marca"]; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="direccion" class="col-sm-2 col-form-label">Dirección*: </label>
                        <div class="col-sm-11">
                            <input type="text" maxlength="50" required class="form-control" id="direccion" name="direccion" placeholder="Dirección..." value="<?php if (isset($_POST["cargar"])) echo $_POST["direccion"]; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="celular" class="col-sm-2 col-form-label">Celular*: </label>
                        <div class="col-sm-11">
                            <input type="int" maxlength="50" required class="form-control" id="celular" name="celular" placeholder="Celular..." value="<?php if (isset($_POST["cargar"])) echo $_POST["celular"]; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="representante" class="col-sm-2 col-form-label">Representante*: </label>
                        <div class="col-sm-11">
                            <input type="text" maxlength="50" required class="form-control" id="representante" name="representante" placeholder="Representante..." value="<?php if (isset($_POST["cargar"])) echo $_POST["representante"]; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Correo*: </label>
                        <div class="col-sm-11">
                            <input type="email" maxlength="50" required class="form-control" id="email" name="email" placeholder="Correo..." value="<?php if (isset($_POST["cargar"])) echo $_POST["email"]; ?>">
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
                                                    <a type="button" class="btn btn-info" href="PProveedor.php">Cancelar</a>
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
                                <th>DNI</th>
                                <th>Marca</th>
                                <th>Dirección</th>
                                <th>Celular</th>
                                <th>Representante</th>
                                <th>Correo</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php

                                $result = listar();
                                $html = '';

                                while ($ver =  $result->fetchObject()) {
                                    $html = $html . '
                                                    <tr >
                                                        <td>' .  trim($ver->id) . '</td>
                                                        <td>' .  trim($ver->DNI) . '</td>
                                                        <td>' .  trim($ver->marca) . '</td>
                                                        <td>' .  trim($ver->direccion) . '</td>
                                                        <td>' .  trim($ver->celular) . '</td>
                                                        <td>' .  trim($ver->representante) . '</td>
                                                        <td>' .  trim($ver->email) . '</td>
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
                                                                <input type="hidden" name="DNI" value="' .  trim($ver->DNI) . '">
                                                                <input type="hidden" name="marca" value="' .  trim($ver->marca) . '">
                                                                <input type="hidden" name="direccion" value="' .  trim($ver->direccion) . '">
                                                                <input type="hidden" name="celular" value="' .  trim($ver->celular) . '">
                                                                <input type="hidden" name="representante" value="' .  trim($ver->representante) . '">
                                                                <input type="hidden" name="email" value="' .  trim($ver->email) . '">
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