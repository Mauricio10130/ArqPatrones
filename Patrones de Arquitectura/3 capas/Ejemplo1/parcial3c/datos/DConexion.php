<?php

include_once "Estrategia/EstrategiaConexion.php";
include_once "Estrategia/EstrategiaConexionMySql.php";
include_once "Estrategia/EstrategiaConexionPostgresql.php";


    class DConexion{
        private $strategy;

        function __construct()
        {
            // $this->strategy = new EstrategiaConexion;
            $this->setEstrategiaConexion(new EstrategiaConexionMySql);
        }

        public function setEstrategiaConexion(EstrategiaConexion $estrategia)
        {
            $this->strategy = $estrategia;
        }

        public function abrirConexion() 
        {
            return $this->strategy->abrirConexion();
        }
    }
?>