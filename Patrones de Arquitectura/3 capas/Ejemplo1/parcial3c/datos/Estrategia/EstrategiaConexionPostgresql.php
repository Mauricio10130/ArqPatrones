<?php
    class EstrategiaConexionPostgresql implements EstrategiaConexion
    {
        private  $servidor = "localhost";
        private  $usuario = "postgres";
        private  $password = "elena";
        private  $bd = "parcial3cp";

        public function __construct()
        {
            
        }

        public function abrirConexion():PDO
        {
            try {
                $conexion = new PDO('pgsql:host='.$this->servidor.';'.'dbname='.$this->bd, $this->usuario , $this->password);
                return $conexion;
            } catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
        }
    }
?>