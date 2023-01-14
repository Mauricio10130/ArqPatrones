<?php
    session_start();
    include_once "../Negocio/NClientes.php";

    $NClientes = new NClientes();
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $contraseña = isset($_POST["contraseña"]) ? $_POST["contraseña"] : "";

    if (!empty($_POST)) {
        if (isset($_POST["login"])) {
            login();
        }
    }

    function login()
    {
        global $NClientes, $email, $contraseña;

        $usuario = $NClientes->login($email, $contraseña);

        if ($usuario != null) {
            $_SESSION["email"] = $usuario["email"];
            $_SESSION["id_cliente"] = $usuario["id"];
            header("Location: PBienvenidoCliente.php");
        } else {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () {
                swal("Acceso denegado!", "Correo o Contraseña incorrecta!", "error");';
            echo '}, 0);</script>';
        }
    }

?>


<!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v4.1.1">
        <title>Login</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

        <!-- Bootstrap core CSS -->
        <link href="resources/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="resources/assets/css/login.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>

        <!-- Custom styles for this template -->
        <link href="signin.css" rel="stylesheet">
    </head>

    <body class="text-center">
        <form class="form-signin" method="POST">

            <h1 class="h3 mb-3 font-weight-normal">Acceso a la Plataforma De Almacen De Pedidos</h1>
            <label for="inputEmail" class="sr-only">Correo</label>
            <input type="email" id="email" maxlength="50" name="email" class="form-control" placeholder="Correo..." required autofocus>
            <label for="inputPassword" class="sr-only">Contraseña</label>
            <input type="password" name="contraseña" maxlength="50" id="contraseña" class="form-control" placeholder="Contraseña..." required>

            <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Ingresar</button>
            <p class="mt-2 mb-3 text-muted">&copy; 2021</p>
        </form>
    </body>

</html>