<?php
include_once "DConexion.php";
    class DPedidos{
        private $id;
        private $fecha;
        private $num_pedido;
        private $observaciones;
        private $idCliente;
        private $conexion;

        function __construct(){
            $this->conexion = new DConexion();
        }

        public function getId() {
            return $this->id;
        }

        public function setId(int $id) :void{
            $this->id = $id;
        }

        public function getFecha() {
            return $this->fecha;
        }

        public function setFecha(String $fecha) :void{
            $this->fecha = $fecha;
        }

    

        public function getNum_pedido() {
            return $this->num_pedido;
        }

        public function setNum_pedido(String $num_pedido) :void{
            $this->num_pedido = $num_pedido;
        }


  

        public function getObservaciones() {
            return $this->observaciones;
        }

        public function setObservaciones(string $observaciones) :void{
            $this->observaciones = $observaciones;
        }
      
        public function getIdCliente() {
            return $this->idCliente;
        }

        public function setIdCliente(int $idCliente) :void{
            $this->idCliente = $idCliente;
        }

        public function listarPedidos()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "SELECT pedidos.id, pedidos.fecha, pedidos.num_pedido, pedidos.observaciones, idCliente, cliente.nombre as clientenombre FROM pedidos, cliente where pedidos.idCliente=cliente.id ORDER BY pedidos.id";
            $result = $conexion->query($sql);
            return $result;
        }


        public function agregarPedidos()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "INSERT into pedidos (fecha, num_pedido, observaciones, idCliente) values ('" . $this->getFecha()  . "','" . $this->getNum_pedido() . "','" . $this->getObservaciones() . "','" . $this->getIdCliente(). "')";
            $result = $conexion->query($sql);
        }
        public function listarUltimoPedido(){
            $conexion = $this->conexion->abrirConexion();
            $sql = "SELECT id from pedidos ORDER BY id DESC LIMIT 1";
            $result = $conexion->query($sql);
            $result = $result->fetch(PDO::FETCH_ASSOC);
            return (int)$result['id'];
        }

    }
?>