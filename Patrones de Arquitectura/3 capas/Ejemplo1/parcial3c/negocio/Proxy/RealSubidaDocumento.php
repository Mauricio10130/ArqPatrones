<?php
include_once "SubirAdjunto.php";
    class RealSubidaDocumento implements SubirAdjunto
    {
        public function upload():String
        {
            try {
                
                $ext = explode(".", $_FILES["archivo"]["name"]);
                // vamos a renombrar el archivo para evitar que se repitan
                $archivo = round(microtime(true)) . '.' . end($ext);
                // ahora cargar el archivo en el proyecto
                move_uploaded_file($_FILES["archivo"]["tmp_name"], "../presentacion/resources/assets/files/" . $archivo);
                return $archivo;
            } catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () {
                    swal("Ocurrio un error", "Intente de nuevo, por un extraño error no se pudo subir el archivo", "error");';
                echo '}, 0);</script>';
                return '';
            }
            
        }
    }
?>