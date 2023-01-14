<?php
include_once "DConexion.php";
    class DProveedor
    {
        private $id;
        private  $DNI;
        private  $marca;
        private  $direccion;
        private  $celular;
        private  $representante;
        private  $email;
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

        public function getDNI() 
        {
            return $this->DNI;
        }

        public function setDNI(String $DNI) :void
        {
            $this->DNI = $DNI;
        }

        public function getMarca() 
        {
            return $this->marca;
        }

        public function setMarca(String $marca) :void
        {
            $this->marca = $marca;
        }
        public function getDireccion() 
        {
            return $this->direccion;
        }

        public function setDireccion(String $direccion) :void
        {
            $this->direccion = $direccion;
        }
        public function getCelular() 
        {
            return $this->celular;
        }

        public function setCelular(String $celular) :void
        {
            $this->celular = $celular;
        }

        public function getRepresentante() 
        {
            return $this->representante;
        }

        public function setRepresentante(String $representante) :void
        {
            $this->representante = $representante;
        }

        public function getEmail() 
        {
            return $this->email;
        }

        public function setEmail(String $email) :void
        {
            $this->email = $email;
        }

        public function getEstado() 
        {
            return $this->estado;
        }

        public function setEstado(String $estado) :void
        {
            $this->estado = $estado;
        }

        public function listarProveedor()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "SELECT id, DNI, marca, direccion, celular, representante, email, estado FROM proveedor ORDER BY id";
            $result = $conexion->query($sql);
            return $result;
        }

        public function listarProveedorActivado()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "SELECT id, DNI, marca, direccion, celular, representante, email, estado FROM proveedor where estado = '1' ORDER BY id";
            $result = $conexion->query($sql);
            return $result;
        }

        public function agregarProveedor()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "INSERT into proveedor (DNI, marca, direccion, celular, representante, email) values ('" . $this->getDNI() . "','" . $this->getMarca() . "','" . $this->getDireccion() . "','" . $this->getCelular() . "','" . $this->getRepresentante() . "','" . $this->getEmail() . "')";
            $result = $conexion->query($sql);
        }

        public function modificarProveedor()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "UPDATE proveedor SET DNI= '" . $this->getDNI() . "', marca='" . $this->getMarca() . "', direccion= '" . $this->getDireccion() . "', celular= '" . $this->getCelular() . "', representante= '" . $this->getRepresentante() ."', email= '" . $this->getEmail()  . "' WHERE id='" . $this->getId() . "' ";
            $result = $conexion->query($sql);
        }

        public function habilitarProveedor()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "UPDATE proveedor SET estado = 1 WHERE id='" . $this->getId() . "'";
            $result = $conexion->query($sql);
        }

        public function deshabilitarProveedor()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "UPDATE proveedor SET estado = 0 WHERE id='" . $this->getId() . "'";
            $result = $conexion->query($sql);
        }
    }
?>