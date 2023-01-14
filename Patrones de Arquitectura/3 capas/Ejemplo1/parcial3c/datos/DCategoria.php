<?php
include_once "DConexion.php";
    class DCategoria
    {
        private $id;
        private  $nombre;
        private  $descripcion;
        private  $estado;
        private  $conexion;

        function __construct()
        {
            $this->conexion = new DConexion();
        }

        public function getId() 
        {
            return $this->id;
        }

        public function setId(int $id) :void
        {
            $this->id = $id;
        }

        public function getNombre() 
        {
            return $this->nombre;
        }

        public function setNombre(String $nombre) :void
        {
            $this->nombre = $nombre;
        }

        public function getDescripcion() 
        {
            return $this->descripcion;
        }

        public function setDescripcion(String $descripcion) :void
        {
            $this->descripcion = $descripcion;
        }

        
        public function getEstado() 
        {
            return $this->estado;
        }

        public function setEstado(String $estado) :void
        {
            $this->estado = $estado;
        }

        public function listarCategoria()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "SELECT id, nombre, descripcion, estado FROM categoria ORDER BY id";
            $result = $conexion->query($sql);
            return $result;
        }

        public function listarCategoriaActivado()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "SELECT id, nombre, descripcion, estado FROM categoria where estado = '1' ORDER BY id";
            $result = $conexion->query($sql);
            return $result;
        }

        public function agregarCategoria()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "INSERT into categoria (nombre, descripcion) values ('" . $this->getNombre() . "','" . $this->getDescripcion() . "')";
            $conexion->query($sql);
        }

        public function modificarCategoria()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "UPDATE categoria SET nombre= '" . $this->getNombre() . "', descripcion= '" . $this->getDescripcion() . "' WHERE id='" . $this->getId() . "' ";
            $conexion->query($sql);
        }

        public function habilitarCategoria()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "UPDATE categoria SET estado = 1 WHERE id='" . $this->getId() . "'";
            $conexion->query($sql);
        }

        public function deshabilitarCategoria()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "UPDATE categoria SET estado = 0 WHERE id='" . $this->getId() . "'";
            $conexion->query($sql);
        }


    }
?>