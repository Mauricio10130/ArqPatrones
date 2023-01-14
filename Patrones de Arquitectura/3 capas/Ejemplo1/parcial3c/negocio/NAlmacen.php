<?php
include_once "../datos/DAlmacen.php";
    class NAlmacen
    {
       // private DClientes $datoCliente;

        function __construct()
        {
            $this->datoAlmacen = new DAlmacen;
        }

        public function listarAlmacen() 
        {
            
            return $this->datoAlmacen->listarAlmacen();
        }

        public function listarAlmacenActivado() 
        {
            
            return $this->datoAlmacen->listarAlmacenActivado();
        }

        public function agregarAlmacen(int $cantidad, String $precio, int $stock) :void
        {
            $this->datoAlmacen->setCantidad($cantidad);
            $this->datoAlmacen->setPrecio($precio);
            $this->datoAlmacen->setStock($stock);
            $this->datoAlmacen->agregarAlmacen();
        }

        public function modificarAlmacen(int $id, int $cantidad, String $precio, int $stock) :void
        {
            $this->datoAlmacen->setId($id);
            $this->datoAlmacen->setCantidad($cantidad);
            $this->datoAlmacen->setPrecio($precio);
            $this->datoAlmacen->setStock($stock);
            $this->datoAlmacen->modificarAlmacen();
        }

        public function deshabilitarAlmacen(int $id) :void
        {
            $this->datoAlmacen->setId($id);
            $this->datoAlmacen->deshabilitarAlmacen();
        }

        public function habilitarAlmacen(int $id) :void
        {
            $this->datoAlmacen->setId($id);
            $this->datoAlmacen->habilitarAlmacen();
        }

        
    }
?>