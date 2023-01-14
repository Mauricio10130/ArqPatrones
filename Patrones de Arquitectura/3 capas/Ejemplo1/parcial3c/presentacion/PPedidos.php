<?php
    session_start();
    include_once "../../parcial3c/negocio/NPedidos.php";
    include_once "../../parcial3c/negocio/NProductos.php";
    include_once "../../parcial3c/negocio/NClientes.php";

    $NPedidos = new NPedidos();
    $NProductos = new NProductos();
    $NClientes = new NClientes();

    $complemento = array();

    $id = isset($_POST["id"]) ? $_POST["id"] : "";
    $fecha = isset($_POST["fecha"]) ? $_POST["fecha"] : "";
    $num_pedido = isset($_POST["num_pedido"]) ? $_POST["num_pedido"] : "";
    $observaciones = isset($_POST["observaciones"]) ? $_POST["observaciones"] : "";
    $idCliente = isset($_POST["idCliente"]) ? $_POST["idCliente"] : "";
    

    if (!empty($_POST)) {
        if (isset($agregardetalle)) {
            agregarDetalle($idCliente);
            $fecha = $_POST["fecha"];
            $num_pedido = $_POST["num_pedido"];
            $observaciones = $_POST["observaciones"];
            $complemento = $_SESSION["complemento"];
        }
    
        if (isset($agregarlosdetalles)) {
            agregarDetalles();
            $fecha = $_POST["fecha"];
            $num_pedido = $_POST["num_pedido"];
            $observaciones = $_POST["observaciones"];
            $complemento = $_SESSION["complemento"];
        }
    
        if (isset($limpiar)) {
            limpiar();
            $fecha = $_POST["fecha"];
            $num_pedido = $_POST["num_pedido"];
            $observaciones = $_POST["observaciones"];
        }
    
        if (isset($listarcomplemento)) {
            listarComplemento($id);
            $fecha = "";
            $num_pedido = "";
            $observaciones = "";
        }
    
        if (isset($eliminardetalle)) {
            eliminarDetalle($id);
            $fecha = $_POST["fecha"];
            $num_pedido = $_POST["num_pedido"];
            $observaciones = $_POST["observaciones"];
            $complemento = $_SESSION["complemento"];
        }
    }

     
        
    

    
    function agregarDetalle($idProductos)
    {
        $NProductos = NProductos::getInstancia();
        $sw = 0;
        if ($idProductos != null) {
            $rec = $NProductos->obtenerProductos($idProductos);
            if ($rec != null) {
                // var_dump($_SESSION["presentacion"]);
                if(!empty($_SESSION["complemento"])){
                    
                    foreach ($_SESSION["complemento"] as $det) {
                        if ($det["id"] == $idProductos){
                            $sw = 1;
                            break;
                        }
                    }
                    if ($sw == 0){
                        $_SESSION["complemento"][] = $rec;
                    }
                }else{
                    $_SESSION["complemento"][] = $rec;
                }
            }
        }
    }

    function agregarDetalles()
    {
        $NProductos = NProductos::getInstancia();

        $_SESSION["complemento"] = [];
        $result = $NProductos->listarProductosActivado();
        while ($ver = $result->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION["complemento"][] = $ver;
        }
    }

    function limpiar()
    {
        $_SESSION["complemento"] = [];
    }

    function listarComplemento($id)
    { 
        $NPedidos = NPedidos::getInstancia();
        return $NPedidos->listarComplemento($id);
    }

    function eliminarDetalle($id)
    {
        $contador = 0;
        foreach ($_SESSION["complemento"] as $det) {
            if($det["id"] == $id)
            {
                break;
            }
            $contador++;
        }
        array_splice($_SESSION["complemento"],$contador,1);
    }    

    function listarProductos()
    {
        $NProductos = NProductos::getInstancia();
        return $NProductos->listarProductosActivado();
    }

    function listar()
    {
        $NPedidos = NPedidos::getInstancia();
        return $NPedidos->listarPedidos();
    }

    function listarCliente()
    {
        $NClientes = NClientes::getInstancia();
        return $NClientes->listarCliente();
    }

    

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Pedidos</title>
    <?php
    require_once "PHome.php";
    ?>
</head>

<body>
    <div class="container-fluid">
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>

                <div class="container ">

                    <h2>Agregar Pedido</h2>
                    <br>
                    <!-- Formulario -->
                    <form method="POST" enctype="multipart/form-data">
                        
                        <div class=" form-group row">
                            <label for="nombre" class="col-sm-1 col-form-label"> Fecha*: </label>
                            <div class="col-sm-3">
                                <input type="date" maxlength="50" required name="fecha" class="form-control" id="fecha" placeholder="Fecha..." value="<?php if(isset($fecha)) echo $fecha; ?>">
                            </div>

                            <label for="nombre" class="col-sm-1 col-form-label"> Numero Pedido: </label>
                            <div class="col-sm-3">
                                <input type="text" maxlength="100" name="num_pedido" class="form-control" id="num_pedido" placeholder="Numero Pedido..." value="<?php if(isset($num_pedido)) echo $num_pedido;; ?>">
                            </div>

                            <label for="nombre" class="col-sm-2 col-form-label"> Observaciones*: </label>
                            <div class="col-sm-2">
                                <input type="text" required name="observaciones" class="form-control" id="observaciones" placeholder="Observaciones..." value="<?php if(isset($observaciones)) echo $observaciones; ?>">
                            </div>
                        </div>

                        <div class=" form-group row">
                            <label for="genero" class="col-sm-1 col-form-label">Cliente*: </label>
                            <div class="col-sm-4">
                                <select name="idCliente" class="form-control" id="idCliente">

                                    <?php
                                        
                                        $result = listarCliente();
                                        $html = '';
                                        while ($ver = $result->fetchObject()) {
                                            $html = $html . ' <option value="' . trim($ver->id) . '"';

                                            if (isset($agregardetalle) || isset($agregartodolosdetalles) || isset($limpiar) || isset($eliminardetalle)) {
                                                if ($_POST["idCliente"] == trim($ver->id)) {
                                                    $html = $html . 'selected';
                                                }
                                            }

                                            $html = $html . ' >'  . trim($ver->nombre) . '</option>';
                                        }
                                        
                                        echo $html;
                                    ?>

                                </select>
                            </div>
                        </div>
                        
                        <h2>Detalle Productos o Complemento</h2>
                        
                        <br>
                        <div class="form-group row">
                            <label for="text" class="col-sm-1 col-form-label"> Productos*: </label>
                            <div class="col-sm-3">
                                <select name="idProductos" class="form-control" id="idProductos">
                                    <?php

                                        $result = listarProductos();
                                        $html = '';
                                        while ($ver = $result->fetchObject()) {
                                            $html = $html . ' <option value="' . trim($ver->id) . '"';

                                            if (isset($agregardetalle) || isset($agregartodolosdetalles) || isset($limpiar) || isset($eliminardetalle)) {
                                                if ($_POST["idProductos"] == trim($ver->id)) {
                                                    $html = $html . 'selected';
                                                }
                                            }

                                            $html = $html . ' >' . trim($ver->nombre) . '</option>';
                                        }
                                        
                                        echo $html;
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" formnovalidate="formnovalidate" name="accion" value="agregarDetalle">Agregar Detalle</button>
                            <button type="submit" class="btn btn-success" formnovalidate="formnovalidate" name="accion" value="agregarDetalles">Agregar todos los detalles</button>
                            <button type="submit" class="btn btn-danger" formnovalidate="formnovalidate" name="accion" value="limpiar">Limpiar</button>

                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Productos</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <?php
                                if (is_array($complemento)){
                                    foreach ($complemento as $det) {
                                        echo    '<tr>
                                        <td>' . trim($det["nombre"]) . ' ' . trim($det["precioProduct"]) . '</td>
                                                    <td>
                                                        <form  method="POST">
                                                            <input type="hidden" name="id" value="' .  trim($det["id"]) . '">
                                                            <input type="hidden" name="fecha" value="' .  trim($fecha) . '">
                                                            <input type="hidden" name="num_pedido" value="' .  trim($num_pedido) . '">
                                                            <input type="hidden" name="observaciones" value="' .  trim($observaciones) . '">
                                                            <input type="hidden" name="idCliente" value="' .  trim($_POST["idCliente"]) . '">
                                                            <button type="submit" formnovalidate="formnovalidate" name="accion" value="eliminardetalle" class="btn btn-danger" role="button"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                    ';
                                    }
                                }

                            ?>

                        </table>
                        
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <button type="submit" name="accion" value="agregar" id="agregar" class="btn btn-primary">Agregar Pedidos</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <br>
            <br>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Numero Pedido</th>
                                <th>Observaciones</th>
                                <th>Cliente</th>
                                <th>Opciones</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                $result = listar();
                                $html = '';

                                while ($ver = $result->fetchObject()) {
                                    $html = $html . '
                                            <tr >
                                                <td>' . trim($ver->id) . '</td>
                                                <td>' . trim($ver->fecha) . '</td>
                                                <td>' . trim($ver->num_pedido) . '</td>
                                                <td>' . trim($ver->observaciones) . '</td>
                                                <td>' . trim($ver->clientenombre)  . '</td>
                                              ';

                                    $html = $html . '
                                                <td class="row"> 
                                                    <form  method="POST">
                                                        <input type="hidden" name="controlador" value="CTarea">
                                                        <input type="hidden" name="id" value="' . trim($ver->id) . '">
                                                        <input type="hidden" name="fecha" value="' . trim($ver->fecha) . '">
                                                        <input type="hidden" name="num_pedido" value="' . trim($ver->num_pedido) . '">
                                                        <input type="hidden" name="observaciones" value="' . trim($ver->observaciones) . '">
                                                        <input type="hidden" name="idCliente" value="' . trim($ver->idCliente) . '">
                                                        <button type="submit" name="accion" value="listarpedidos" class="btn btn-info" role="button"><i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i></button>
                                                    </form>
                                                </td>   
                                            </tr>';
                                }
                            
                                echo $html;
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>

            <?php

                if (isset($listarcomplemento)) {

                    $html = ' <div class="card-body">
                                <div class="table-responsive">
                                    <h3>Detalle Pedido o Complemento</h3>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">adjunto</th>
                                                <th scope="col">detalles</th>
                                                <th scope="col">especificacion</th>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Hora</th>
                                                <th scope="col">Productos</th>
                                                <th scope="col">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>';
                    $listarcomplemento = listarComplemento($id);
                    while ($ver = $listarcomplemento->fetchObject()) {
                        $html = $html . '
                                                <th scope="row">' . trim($ver->id) . '</th>
                                                
                                                <td><a target="_blank"   href="' . '../parcial3c/presentacion/resources/assets/files/' . trim($ver->adjunto)  . '"> ' .  trim($ver->adjunto) . ' </a></td>
                                                <td>' . trim($ver->adjunto) . '</td>
                                                <td>' . trim($ver->detalles) . '</td>
                                                <td>' . trim($ver->especificacion) . '</td>
                                                <td>' . trim($ver->fecha_pedido) . '</td>

                                                <td>' . trim($ver->hora_pedido) . '</td>
                                                <td>' . trim($ver->productosnombre) .'</td>
                                                <td> 
                                                    <form  method="POST">
                                                        <
                                                        <input type="hidden" name="id" value="' .  trim($ver->id) . '">
                                                        <input type="hidden" name="adjunto" value="' .  trim($ver->adjunto) . '">
                                                        <input type="hidden" name="detalles" value="' .  trim($ver->detalles) . '">
                                                        <input type="hidden" name="especificacion" value="' .  trim($ver->especificacion) . '">
                                                        <input type="hidden" name="idProductos" value="' .  trim($ver->idProductos) . '">
                                                        <button type="submit" value="revisar" name="accion"  class="btn btn-info" role="button"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></button>
                                                    </form>
                                                </td>
                                            </tr>';
                    }

                    $html = $html . '
                                    </tbody>
                            </table>
                        </div>
                    </div>
                                    ';
                    $_SESSION["revisar"] = $html;
                    echo $html;
                }

                if (isset($revisar)){
                    echo $_SESSION["revisar"];
                    $html2 = '
                        <div class="card-body">
                            <form form method="POST" enctype="multipart/form-data">
                               
                                <input type="hidden" name="idComplemento" value="' . trim($id) . '">

                                <div class="form-group row">
                                    <label for="detalles" class="col-sm-2 col-form-label">Detalles: </label>
                                    <div class="col-sm-5">
                                        <input type="number" min="0" max="100" required class="form-control" id="detalles" name="detalles" placeholder="Detalles..." value="'.   $_POST["detalles"]  .'">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nombre" class="col-sm-2 col-form-label">especificacion: </label>
                                    <div class="col-sm-5">
                                        <input type="text" maxlength="100" required class="form-control" id="especificacion" name="especificacion" placeholder="Especificacion..." value="' . trim($_POST["especificacion"]) . '">
                                    </div>
                                </div>

                                <button type="submit" name="accion" value="revisarcomplemento" id="revisarcomplemento" class="btn btn-primary">Modificar Complemento</button>
                                
                            </form>
                        </div>
                        <br>
                                ';
                    echo $html2;
                }

            ?>
            
        </div>
    </div>
</body>

</html>
