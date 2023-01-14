<?php
include_once "../datos/DCategoria.php";
    class NCategoria
    {
        private $datoCategoria;

        function __construct()
        {
            $this->datoCategoria = new DCategoria;
        }

        public function listarCategoria() 
        {
            
            return $this->datoCategoria->listarCategoria();
        }

        public function listarCategoriaActivado() 
        {
            
            return $this->datoCategoria->listarCategoriaActivado();
        }

        public function agregarCategoria(String $nombre, String $descripcion) :void
        {
            $this->datoCategoria->setNombre($nombre);
            $this->datoCategoria->setDescripcion($descripcion);
            $this->datoCategoria->agregarCategoria();
        }

        public function modificarCategoria(int $id, String $nombre, String $descripcion) :void
        {
            $this->datoCategoria->setId($id);
            $this->datoCategoria->setNombre($nombre);
            $this->datoCategoria->setDescripcion($descripcion);
            $this->datoCategoria->modificarCategoria();
        }

        public function deshabilitarCategoria(int $id) :void
        {
            $this->datoCategoria->setId($id);
            $this->datoCategoria->deshabilitarCategoria();
        }

        public function habilitarCategoria(int $id) :void
        {
            $this->datoCategoria->setId($id);
            $this->datoCategoria->habilitarCategoria();
        }

    }
?>