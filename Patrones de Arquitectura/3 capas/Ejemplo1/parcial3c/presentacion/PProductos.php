<?php
    include_once "../../parcial3c/negocio/NProductos.php";
    include_once "../../parcial3c/negocio/NCategoria.php";
    include_once "../../parcial3c/negocio/NAlmacen.php";
    include_once "../../parcial3c/negocio/NProveedor.php";

    $NProductos = new NProductos();
    $NCategoria = new NCategoria();
    $NAlmacen = new NAlmacen();
    $NProveedor = new NProveedor();

    $id = isset($_POST["id"]) ? $_POST["id"] : "";
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
    $precioProduct = isset($_POST["precioProduct"]) ? $_POST["precioProduct"] : "";
    $codigo = isset($_POST["codigo"]) ? $_POST["codigo"] : "";
    $archivo = isset($_FILES["archivo"]) ? $_FILES["archivo"] : "";
    $idCategoria = isset($_POST["idCategoria"]) ? $_POST["idCategoria"] : "";
    $idAlmacen = isset($_POST["idAlmacen"]) ? $_POST["idAlmacen"] : "";
    $idProveedor = isset($_POST["idProveedor"]) ? $_POST["idProveedor"] : "";

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
        global $nombre, $descripcion, $precioProduct,$codigo, $archivo ,$idCategoria, $idAlmacen, $idProveedor, $NProductos;
        $NProductos->agregarProductos($nombre, $descripcion, $precioProduct, $codigo, $archivo, $idCategoria, $idAlmacen, $idProveedor);
    }

    function modificar()
    {
        global $nombre, $descripcion, $precioProduct,$codigo, $archivo,  $idCategoria, $idAlmacen, $idProveedor, $NProductos, $id;
        $NProductos->modificarProductos($id, $nombre, $descripcion, $precioProduct,$codigo, $archivo, $idCategoria, $idAlmacen, $idProveedor);
    }

    function listar()
    {
        global $NProductos;
        return $NProductos->listarProductos();
    }

    function habilitar()
    {
        global $NProductos, $id;
        $NProductos->habilitarProductos($id);
    }

    function deshabilitar()
    {
        global $NProductos, $id;
        $NProductos->deshabilitarProductos($id);
    }

    function listarCategoria()
    {
        global $NCategoria;
        return $NCategoria->listarCategoriaActivado();
    }

    function listarAlmacen()
    {
        global $NAlmacen;
        return $NAlmacen->listarAlmacenActivado();
    }
    function listarProveedor()
    {
        global $NProveedor;
        return $NProveedor->listarProveedorActivado();
    }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Productos</title>
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
            Productos
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
                        <label for="nombre" class="col-sm-2 col-form-label">Descripcion: </label>
                        <div class="col-sm-11">
                            <input type="text" maxlength="100" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion..." value="<?php if (isset($_POST["cargar"])) echo $_POST["descripcion"]; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="producto" class="col-sm-2 col-form-label">PrecioProducto: </label>
                        <div class="col-sm-11">
                            <input type="text" maxlength="100" class="form-control" id="precioProduct" name="precioProduct" placeholder="Precio Producto..." value="<?php if (isset($_POST["cargar"])) echo $_POST["precioProduct"]; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="codigo" class="col-sm-2 col-form-label">Codigo: </label>
                        <div class="col-sm-11">
                            <input type="text" maxlength="100" class="form-control" id="codigo" name="codigo" placeholder="Codigo..." value="<?php if (isset($_POST["cargar"])) echo $_POST["codigo"]; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="archivo" class="col-sm-2 col-form-label">Archivo: </label>
                        <div class="col-sm-11">
                            <input type="file" maxlength="100" class="form-control" id="archivo" name="archivo" placeholder="Archivo..." value="<?php if (isset($_POST["cargar"])) echo $_POST["archivo"]; ?>">
                        </div>
                    </div>

                    <div class=" form-group row">
                        <label for="genero" class="col-sm-2 col-form-label">Categoria* </label>
                        <div class="col-sm-11">
                            <select name="idCategoria" class="form-control" id="idCategoria">
                                <?php
                                    $res = listarCategoria();
                                    $html = '';
                                    while ($ver = $res->fetchObject()) {
                                        $html = $html . ' <option value="' . trim($ver->id) . '"';

                                        if (isset($_POST["cargar"])) {
                                            if ($idCategoria == trim($ver->id)) {
                                                $html = $html . 'selected';
                                            }
                                        }

                                        $html = $html . ' >' . trim($ver->nombre) .  '</option>';
                                    }
                                    echo $html;
                                ?>


                            </select>
                        </div>
                    </div>

                    <div class=" form-group row">
                        <label for="int" class="col-sm-2 col-form-label">Almacen* </label>
                        <div class="col-sm-11">
                            <select name="idAlmacen" class="form-control" id="idAlmacen">
                                <?php
                                    $resu = ListarAlmacen();
                                    $html = '';
                                    while ($ver = $resu->fetchObject()) {
                                        $html = $html . ' <option value="' . trim($ver->id) . '"';

                                        if (isset($_POST["cargar"])) {
                                            if ($idAlmacen == trim($ver->id)) {
                                                $html = $html . 'selected';
                                            }
                                        }

                                        $html = $html . ' >' . trim($ver->cantidad) .  '</option>';
                                    }
                                    echo $html;
                                ?>


                            </select>
                        </div>
                    </div>

                    <div class=" form-group row">
                        <label for="text" class="col-sm-2 col-form-label">Proveedor* </label>
                        <div class="col-sm-11">
                            <select name="idProveedor" class="form-control" id="idProveedor">
                                <?php
                                    $resul = listarProveedor();
                                    $html = '';
                                    while ($ver = $resul->fetchObject()) {
                                        $html = $html . ' <option value="' . trim($ver->id) . '"';

                                        if (isset($_POST["cargar"])) {
                                            if ($idProveedor == trim($ver->id)) {
                                                $html = $html . 'selected';
                                            }
                                        }

                                        $html = $html . ' >' . trim($ver->representante) . '</option>';
                                    }
                                    echo $html;
                                ?>


                            </select>
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
                                                    <a type="button" class="btn btn-info" href="PProductos.php">Cancelar</a>
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
                                <th>Descripcion</th>
                                <th>Precio Producto</th>
                                <th>Codigo</th>
                                <th>Archivo</th>
                                <th>Categoria</th>
                                <th>Almacen</th>
                                <th>Proveedor</th>
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
                                                        <td>' .  trim($ver->descripcion) . '</td>
                                                        <td>' .  trim($ver->precioProduct) . '</td>
                                                        <td>' .  trim($ver->codigo) . '</td>
                                                        <td><a target="_blank"   href="' . '../presentacion/resources/assets/files/' . trim($ver->archivo)  . '"> ' .  trim($ver->archivo) . ' </a></td>
                                                        <td>' .  trim($ver->categorianombre).'</td>
                                                        <td>' .  trim($ver->almacencantidad) . '</td>
                                                        <td>' .  trim($ver->proveedorrepresentante) . '</td>
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
                                                                <input type="hidden" name="descripcion" value="' .  trim($ver->descripcion) . '">
                                                                <input type="hidden" name="precioProduct" value="' .  trim($ver->precioProduct) . '">
                                                                <input type="hidden" name="codigo" value="' .  trim($ver->codigo) . '">
                                                                <input type="hidden" name="idCategoria" value="' .  trim($ver->idCategoria) . '">
                                                                <input type="hidden" name="idAlmacen" value="' .  trim($ver->idAlmacen) . '">
                                                                <input type="hidden" name="idProveedor" value="' .  trim($ver->idProveedor) . '">
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