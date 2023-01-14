<?php
include_once "../datos/DClientes.php";
    class NClientes
    {
       private $datoCliente;
       private static  $instancia;

        function __construct()
        {
            $this->datoCliente = new DClientes;
        }

        public static function getInstancia() : NClientes
        {
            if(!isset(self::$instancia)){
                self::$instancia = new NClientes;
            }
            return self::$instancia;
        }

        public function listarCliente() 
        {
            
            return $this->datoCliente->listarCliente();
        }

        public function listarClienteActivado() 
        {
            
            return $this->datoCliente->listarClienteActivado();
        }

        public function agregarCliente(String $nombre, String $direccion, String $telefono, String $email, String $facebook, String $contraseña) :void
        {
            $this->datoCliente->setNombre($nombre);
            $this->datoCliente->setDireccion($direccion);
            $this->datoCliente->setTelefono($telefono);
            $this->datoCliente->setEmail($email);
            $this->datoCliente->setFacebook($facebook);
            $this->datoCliente->setContraseña($contraseña);
            $this->datoCliente->agregarCliente();
        }

        public function modificarCliente(int $id, String $nombre, String $direccion, String $telefono, String $email, String $facebook, String $contraseña) :void
        {
            $this->datoCliente->setId($id);
            $this->datoCliente->setNombre($nombre);
            $this->datoCliente->setDireccion($direccion);
            $this->datoCliente->setTelefono($telefono);
            $this->datoCliente->setEmail($email);
            $this->datoCliente->setFacebook($facebook);
            $this->datoCliente->setContraseña($contraseña);
            $this->datoCliente->modificarCliente();
        }

        public function deshabilitarCliente(int $id) :void
        {
            $this->datoCliente->setId($id);
            $this->datoCliente->deshabilitarCliente();
        }

        public function habilitarCliente(int $id) :void
        {
            $this->datoCliente->setId($id);
            $this->datoCliente->habilitarCliente();
        }

        public function login ($email, $contraseña){
            $this->datoCliente->setEmail($email);
            $this->datoCliente->setContraseña($contraseña);
           return $this->datoCliente->login();
        }
    }
?>