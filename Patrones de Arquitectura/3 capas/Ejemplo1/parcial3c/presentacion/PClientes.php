<?php
    include_once "../../parcial3c/negocio/NClientes.php";

    $NClientes = new NClientes();
    $id = isset($_POST["id"]) ? $_POST["id"] : "";
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : "";
    $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "M";
    $facebook = isset($_POST["facebook"]) ? $_POST["facebook"] : "";
    $contraseña = isset($_POST["contraseña"]) ? $_POST["contraseña"] : "";

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
        global $nombre, $direccion, $telefono, $email, $facebook, $contraseña, $NClientes;
        $NClientes->agregarCliente($nombre, $direccion, $telefono, $email, $facebook, $contraseña);
    }

    function modificar()
    {
        global $nombre, $direccion, $telefono, $email, $facebook, $contraseña, $id, $NClientes;
        $NClientes->modificarCliente($id, $nombre, $direccion, $telefono, $email, $facebook, $contraseña);
    }

    function listar()
    {
        global $NClientes;
        return $NClientes->listarCliente();
    }

    function habilitar()
    {
        global $NClientes, $id;
        $NClientes->habilitarCliente($id);
    }
    function deshabilitar()
    {
        global $NClientes, $id;
        $NClientes->deshabilitarCliente($id);
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Cliente</title>
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
            Cliente
        </h1>
        <br>
        <div class="row">
            <div class="col-sm-4">
                <form form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php if (isset($_POST["cargar"])) echo $_POST["id"]; ?>">

                    <div class="form-group row">
                        <label for="nombre" class="col-sm-2 col-form-label">Nombre*: </label>
                        <div class="col-sm-11">
                            <input type="text" maxlength="50" required class="form-control" id="nombre" name="nombre" placeholder="Nombre..." value="<?php if (isset($_POST["cargar"])) echo $_POST["nombre"]; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="direccion" class="col-sm-2 col-form-label">Direccion*: </label>
                        <div class="col-sm-11">
                            <input type="text" maxlength="50" required class="form-control" id="direccion" name="direccion" placeholder="Dirección..." value="<?php if (isset($_POST["cargar"])) echo $_POST["direccion"]; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="telefono" class="col-sm-2 col-form-label">Telefono*: </label>
                        <div class="col-sm-11">
                            <input type="int" maxlength="50" required class="form-control" id="telefono" name="telefono" placeholder="Teléfono..." value="<?php if (isset($_POST["cargar"])) echo $_POST["telefono"]; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email*: </label>
                        <div class="col-sm-11">
                            <input type="email" maxlength="50" required class="form-control" id="email" name="email" placeholder="Correo..." value="<?php if (isset($_POST["cargar"])) echo $_POST["email"]; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="facebook" class="col-sm-2 col-form-label">Facebook*: </label>
                        <div class="col-sm-11">
                            <input type="text" maxlength="50" required class="form-control" id="facebook" name="facebook" placeholder="Facebook..." value="<?php if (isset($_POST["cargar"])) echo $_POST["facebook"]; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="contraseña" class="col-sm-2 col-form-label">Contraseña*: </label>
                        <div class="col-sm-11">
                            <input type="password" maxlength="50" required class="form-control" id="contraseña" name="contraseña" placeholder="Contraseña..." value="<?php if (isset($_POST["cargar"])) echo $_POST["contraseña"]; ?>">
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
                                                    <a type="button" class="btn btn-info" href="PClientes.php">Cancelar</a>
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
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>Facebook</th>
                                <th>Contraseña</th>
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
                                                        <td>' .  trim($ver->nombre) . '</td>
                                                        <td>' .  trim($ver->direccion) . '</td>
                                                        <td>' .  trim($ver->telefono) . '</td>
                                                        <td>' .  trim($ver->email) . '</td>
                                                        <td>' .  trim($ver->facebook) . '</td>
                                                        <td>' .  '**********' . '</td>
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
                                                                <input type="hidden" name="nombre" value="' .  trim($ver->nombre) . '">
                                                                <input type="hidden" name="direccion" value="' .  trim($ver->direccion) . '">
                                                                <input type="hidden" name="telefono" value="' .  trim($ver->telefono) . '">
                                                                <input type="hidden" name="email" value="' .  trim($ver->email) . '">
                                                                <input type="hidden" name="facebook" value="' .  trim($ver->facebook) . '">
                                                                <input type="hidden" name="contraseña" value="' .  trim($ver->contraseña) . '">
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