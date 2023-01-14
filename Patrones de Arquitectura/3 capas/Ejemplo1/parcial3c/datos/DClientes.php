<?php
include_once "DConexion.php";
    class DClientes
    {
        private $id;
        private  $nombre;
        private  $direccion;
        private  $telefono;
        private  $email;
        private  $facebook;
        private  $contraseña;
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

        public function getDireccion() 
        {
            return $this->direccion;
        }

        public function setDireccion(String $direccion) :void
        {
            $this->direccion = $direccion;
        }

        public function getTelefono() 
        {
            return $this->telefono;
        }

        public function setTelefono(String $telefono) :void
        {
            $this->telefono = $telefono;
        }

        public function getEmail() 
        {
            return $this->email;
        }

        public function setEmail(String $email) :void
        {
            $this->email = $email;
        }

        public function getFacebook() 
        {
            return $this->facebook;
        }

        public function setFacebook(String $facebook) :void
        {
            $this->facebook = $facebook;
        }

        public function getContraseña() 
        {
            return $this->contraseña;
        }

        public function setContraseña(String $contraseña) :void
        {
            $this->contraseña = $contraseña;
        }
        
        public function getEstado() 
        {
            return $this->estado;
        }

        public function setEstado(String $estado) :void
        {
            $this->estado = $estado;
        }

        public function listarCliente()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "SELECT id, nombre, direccion, telefono, email, facebook,contraseña, estado FROM cliente ORDER BY id";
            $result = $conexion->query($sql);
            return $result;
        }

        public function listarClienteActivado()
        {
            $conexion = $this->strategy->abrirConexion();
            $sql = "SELECT id, nombre, direccion, telefono, email, facebook, contraseña, estado FROM cliente where estado = '1' ORDER BY id";
            $result = $conexion->query($sql);
            return $result;
        }

        public function agregarCliente()
        {
            $conexion = $this->strategy->abrirConexion();
            $sql = "INSERT into cliente (nombre, direccion, telefono, email, facebook, contraseña) values ('" . $this->getNombre() . "','" . $this->getDireccion() . "','" . $this->getTelefono() . "','" . $this->getEmail() . "','" . $this->getFacebook() . "','" . $this->getContraseña() . "')";
            mysqli_query($conexion,$sql);;
        }

        public function modificarCliente()
        {
            $conexion = $this->strategy->abrirConexion();
            $sql = "UPDATE cliente SET nombre= '" . $this->getNombre() . "',direccion= '" . $this->getDireccion() . "',telefono= '" . $this->getTelefono() . "', email= '" . $this->getEmail() . "', facebook= '" . $this->getFacebook() ."',contraseña='" . $this->getContraseña()  . "' WHERE id='" . $this->getId() . "' ";
            mysqli_query($conexion,$sql);;
        }

        public function habilitarCliente()
        {
            $conexion = $this->trategy->abrirConexion();
            $sql = "UPDATE cliente SET estado = 1 WHERE id='" . $this->getId() . "'";
            mysqli_query($conexion,$sql);;
        }

        public function deshabilitarCliente()
        {
            $conexion = $this->strategy->abrirConexion();
            $sql = "UPDATE cliente SET estado = 0 WHERE id='" . $this->getId() . "'";
            mysqli_query($conexion,$sql);;
        }

        public function login(){
            $conexion = $this->strategy->abrirConexion();
            $sql = "SELECT * FROM cliente WHERE email='".$this->getEmail()."' AND contraseña= '".$this->getContraseña()."' AND estado = '1'";
            $result = mysqli_query($conexion,$sql);;
            $result = mysqli_fetch_object($result);
            return $result;
        }
    }
?>