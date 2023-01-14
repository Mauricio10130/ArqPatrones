<?php
    class EstrategiaConexionMySql implements EstrategiaConexion
    {
        private  $servidor = "localhost";
        private  $usuario = "root";
        private  $password = "";
        private  $bd = "parcial3c";

        public function __construct()
        {
            
        }

        public function abrirConexion():PDO
        {
            try {
                $conexion = new PDO('mysql:host='.$this->servidor.';'.'dbname='.$this->bd, $this->usuario , $this->password);
                return $conexion;
            } catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
        }
    }
?>