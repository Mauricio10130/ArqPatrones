<?php
include_once "DConexion.php";
    class DAlmacen
    {
        private $id;
        private  $cantidad;
        private  $precio;
        private  $stock;
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

        public function getCantidad() 
        {
            return $this->cantidad;
        }

        public function setCantidad(String $cantidad) :void
        {
            $this->cantidad = $cantidad;
        }

        public function getPrecio() 
        {
            return $this->precio;
        }

        public function setPrecio(String $precio) :void
        {
            $this->precio = $precio;
        }

        public function getStock() 
        {
            return $this->stock;
        }

        public function setStock(String $stock) :void
        {
            $this->stock = $stock;
        }

        public function getEstado() 
        {
            return $this->estado;
        }

        public function setEstado(String $estado) :void
        {
            $this->estado = $estado;
        }

        public function listarAlmacen()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "SELECT id, cantidad, precio, stock, estado FROM almacen ORDER BY id";
            $result = $conexion->query($sql);
            return $result;
        }

        public function listarAlmacenActivado()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "SELECT id, cantidad, precio, stock, estado FROM almacen where estado = '1' ORDER BY id";
            $result = $conexion->query($sql);
            return $result;
        }

        public function agregarAlmacen()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "INSERT into almacen (cantidad, precio, stock) values ('" . $this->getCantidad() . "','" . $this->getPrecio() . "','" . $this->getStock() . "')";
            $result = $conexion->query($sql);
        }

        public function modificarAlmacen()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "UPDATE almacen SET cantidad= '" . $this->getCantidad() . "', precio= '" . $this->getPrecio() . "', stock= '" . $this->getStock() . "' WHERE id='" . $this->getId() . "' ";
            $result = $conexion->query($sql);
        }

        public function habilitarAlmacen()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "UPDATE almacen SET estado = 1 WHERE id='" . $this->getId() . "'";
            $result = $conexion->query($sql);
        }

        public function deshabilitarAlmacen()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "UPDATE almacen SET estado = 0 WHERE id='" . $this->getId() . "'";
            $result = $conexion->query($sql);
        }

        public function obtenerAlmacen()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "SELECT id, cantidad, precio, stock, estado FROM almacen WHERE id = '" . $this->getId() . "' ORDER BY id";
            $result = $conexion->query($sql);
            $result->fetchObject($result);
            return $result;
        }

    }
?>