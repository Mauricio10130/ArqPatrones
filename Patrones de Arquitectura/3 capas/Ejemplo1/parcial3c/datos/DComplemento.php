<?php
include_once "DConexion.php";
    class DComplemento{
        private  $id;
        private  $adjunto;
        private  $detalles;
        private  $especificacion;
        private  $fecha_pedido;
        private  $hora_pedido;
        private  $idProductos;
        private  $idPedidos;
        private  $conexion;

        function __construct(){
            $this->conexion = new DConexion();
        }

        public function getId() {
            return $this->id;
        }

        public function setId(int $id) :void{
            $this->id = $id;
        }

        public function getAdjunto() {
            return $this->adjunto;
        }

        public function setAdjunto(String $adjunto) :void{
            $this->adjunto = $adjunto;
        }

        public function getDetalles() {
            return $this->detalles;
        }

        public function setDetalles(String $detalles) :void{
            $this->detalles = $detalles;
        }

        public function getEspecificacion() {
            return $this->especificacion;
        }

        public function setEspecificacion(String $especificacion) :void{
            $this->especificacion = $especificacion;
        }

        public function getFecha_pedido() {
            return $this->fecha_pedido;
        }

        public function setFecha_pedido(String $fecha_pedido) :void{
            $this->fecha_pedido = $fecha_pedido;
        }

        public function getHora_pedido() {
            return $this->hora_pedido;
        }

        public function setHora_pedido(String $hora_pedido) :void{
            $this->hora_pedido = $hora_pedido;
        }

        public function getIdProductos() {
            return $this->idProductos;
        }

        public function setIdProductos(String $idProductos) :void{
            $this->idProductos = $idProductos;
        }

        public function getIdPedidos() {
            return $this->idPedidos;
        }

        public function setIdPedidos(int $idPedidos) :void{
            $this->idPedidos = $idPedidos;
        }

       

        
        public function listarComplemento(){
            $conexion = $this->conexion->abrirConexion();
            $sql = "SELECT complemento.id, adjunto, detalles, especificacion,fecha_pedido, hora_pedido,  idProductos, idPedidos, productos.nombre as productonombre FROM complemento, productos  where complemento.idPedidos = '" . $this->getIdPedidos() . "' and complemento.idProductos = productos.id ORDER BY complemento.id";
            $result = mysqli_query($conexion, $sql);
            return $result;
        }

        public function agregarComplemento(){
            $conexion = $this->conexion->abrirConexion();
            $sql = "INSERT into complemento (adjunto, idProductos, idPedidos) values ('" . $this->getAdjunto() . "','" . $this->getIdProductos() . "','" . $this->getIdPedidos() . "')";
            mysqli_query($conexion, $sql);
        }

        public function listarComplementoProductos(){
            $conexion = $this->conexion->abrirConexion();
            $sql = "SELECT complemento.id, adjunto, detalles, especificacion, fecha_pedido, hora_pedido, idPedidos, idProductos, productos.nombre as productosnombre, pedidos.fecha as pedidosfecha FROM complemento, pedidos, productos where complemento.idPedidos = pedidos.id and complemento.idProductos = productos.id and complemento.idProductos = '" . $this->getIdProductos() . "' ORDER BY complemento.id";
            $result = pg_query($conexion,$sql);
            return $result;
        }

        public function subirPedidos(){
            $conexion = $this->conexion->abrirConexion();
            $sql = "UPDATE complemento SET adjunto= '" . $this->getAdjunto() . "' , especificacion= '" . $this->getEspecificacion() . "', fecha_pedido= '" . $this->getFecha_pedido() . "', hora_pedido= '" . $this->getHora_pedido() . "', idProductos= '" . $this->getIdProductos() . "', idPedidos= '" . $this->getIdPedidos() . "',detalles= '" . $this->getDetalles() . "' WHERE id='" . $this->getId() . "'and idProductos = '" . $this->getIdProductos() . "' ";
            mysqli_query($conexion, $sql);
        }

        public function revisarComplemento(){
            $conexion = $this->conexion->abrirConexion();
            $sql = "UPDATE complemento SET especificacion= '" . $this->getEspecificacion() . "',detalles= '" . $this->getDetalles() . "' WHERE id='" . $this->getId() . "'";
            $conexion->query($sql);
        }
    }
?>