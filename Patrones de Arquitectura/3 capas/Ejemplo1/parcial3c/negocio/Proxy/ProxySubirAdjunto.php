<?php
include_once "SubirAdjunto.php";
include_once "RealSubidaDocumento.php";
    class ProxySubirAdjunto implements SubirAdjunto
    {
        private  $real;

        public function upload():String
        
        {
            if(!isset($this->real)){
                $this->real = new RealSubidaDocumento;
            }
            if($_FILES['archivo']['size'] <= 2542880 ){
                if ($_FILES['archivo']['type'] == "application/pdf") {
                    return $this->real->upload();
                }else{
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () {
                        swal("Ocurrio un error", "El tipo de archivo solamente debe ser pdf", "error");';
                    echo '}, 0);</script>';
                }
            }else{
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () {
                    swal("Ocurrio un error", "El tamaño del archivo debe ser menor o igual a 5 megabytes", "error");';
                echo '}, 0);</script>';
            }
            return '';
        }
    }
?>