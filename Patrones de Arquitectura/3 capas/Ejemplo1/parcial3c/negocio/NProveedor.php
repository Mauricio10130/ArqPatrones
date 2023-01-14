<?php
include_once "../datos/DProveedor.php";
    class NProveedor
    {
       // private DClientes $datoProveedor;

        function __construct()
        {
            $this->datoProveedor = new DProveedor;
        }

        public function listarProveedor() 
        {
            
            return $this->datoProveedor->listarProveedor();
        }

        public function listarProveedorActivado() 
        {
            
            return $this->datoProveedor->listarProveedorActivado();
        }

        public function agregarProveedor(int $DNI, String $marca, String $direccion, int $celular, String $representante, String $email) :void
        {
            $this->datoProveedor->setDNI($DNI);
            $this->datoProveedor->setMarca($marca);
            $this->datoProveedor->setDireccion($direccion);
            $this->datoProveedor->setCelular($celular);
            $this->datoProveedor->setRepresentante($representante);
            $this->datoProveedor->setEmail($email);
            $this->datoProveedor->agregarProveedor();
        }

        public function modificarProveedor(int $id, int $DNI, String $marca, String $direccion, int $celular, String $representante, String $email) :void
        {
            $this->datoProveedor->setId($id);
            $this->datoProveedor->setDNI($DNI);
            $this->datoProveedor->setMarca($marca);
            $this->datoProveedor->setDireccion($direccion);
            $this->datoProveedor->setCelular($celular);
            $this->datoProveedor->setRepresentante($representante);
            $this->datoProveedor->setEmail($email);
            $this->datoProveedor->modificarProveedor();
        }

        public function deshabilitarProveedor(int $id) :void
        {
            $this->datoProveedor->setId($id);
            $this->datoProveedor->deshabilitarProveedor();
        }

        public function habilitarProveedor(int $id) :void
        {
            $this->datoProveedor->setId($id);
            $this->datoProveedor->habilitarProveedor();
        }
    }
?>