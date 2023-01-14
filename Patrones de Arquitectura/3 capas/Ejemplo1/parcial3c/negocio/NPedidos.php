<?php
include_once "../datos/DPedidos.php";
include_once "../datos/DComplemento.php";
include_once (__DIR__ . "/Proxy/ProxySubirAdjunto.php");

    class NPedidos{
        private  $datoPedidos;
        private  $datoComplemento;
        private  $proxy;
        private static  $instancia;

        function __construct(){
            $this->datoPedidos = new DPedidos;
            $this->datoComplemento = new DComplemento;
            $this->proxy = new ProxySubirAdjunto;
        }

        public static function getInstancia() : NPedidos
        {
            if(!isset(self::$instancia)){
                self::$instancia = new NPedidos;
            }
            return self::$instancia;
        }

        public function listarPedidos() {
            
            return $this->datoPedidos->listarPedidos();
        }

        public function agregarPedidos(String $fecha,  int $num_pedido, String $observaciones,int $idCliente, array $complemento){
            $this->datoPedidos->setFecha($fecha);
            $this->datoPedidos->setNum_pedido($num_pedido);
            $this->datoPedidos->setObservaciones($observaciones);
            $this->datoPedidos->setIdCliente($idCliente);
            $this->datoPedidos->agregarPedidos();
            if(!empty($complemento))
            {
                $this->agregarComplemento($complemento);
            }
        }

        private function agregarComplemento($complemento){
            // var_dump($complemento);
            $idPedidos = $this->datoPedidos->listarUltimoPedido();
            // print_r($idPedido);
            foreach ($complemento as $res) {
                $this->datoComplemento->setIdPedidos($idPedidos);
                $this->datoComplemento->setIdProductos($res["id"]);
                $this->datoComplemento->agregarComplemento();
            }
        }

        public function listarComplemento(int $id)
        {
            $this->datoComplemento->setIdPedidos($id);
            return $this->datoComplemento->listarComplemento();
        }

        public function listarComplementoProductos(int $idProductos)
        {
            $this->datoComplemento->setIdProductos($idProductos);
            return $this->datoComplemento->listarComplementoProductos();
        }

        public function subirAdjunto(int $id, string $fecha, String $fecha_pedido, String $hora_pedido, int $idProductos)
        {
            if(isset($_FILES['adjunto'])){
                $fecha1 = date('Y-m-d', strtotime($fecha));
                $fechatarea1 = date('Y-m-d', strtotime($fecha_pedido));
                if($fecha1 <= $fechatarea1){
                    $adjunto = $this->proxy->upload();
                    if($adjunto != null){
                        $this->datoComplemento->setId($id);
                        $this->datoComplemento->setFecha_pedido($fecha_pedido);
                        $this->datoComplemento->setHora_pedido($hora_pedido);
                        $this->datoComplemento->setIdProductos($idProductos);
                        $this->datoComplemento->setAdjunto($adjunto);
                        $this->datoComplemento->subirPedidos();
                        echo '<script type="text/javascript">';
                        echo 'setTimeout(function () {
                            swal("Tarea entregada", "", "success");';
                        echo '}, 0);</script>';
                    }
                }else{
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () {
                        swal("Ocurrio un error", "El archivo no pudo enviarse porque la fecha de entrega ya pasó, hable con su respectivo Profesor", "error");';
                    echo '}, 0);</script>';
                }
            }
        }

        public function revisarComplemento(int $id, String $especificacion, int $detalles)
        {
            $this->datoComplemento->setId($id);
            $this->datoComplemento->setEspecificacion($especificacion);
            $this->datoComplemento->setDetalles($detalles);
            $this->datoComplemento->revisarComplemento();
            // $email = 'eden1998darkbreaker1998@gmail.com';
            // $headers = 'From: ' .$email . "\r\n". 
            // 'Reply-To: ' . $email. "\r\n" . 
            // 'X-Mailer: PHP/' . phpversion();
            // $success = mail('jose.mishael.chile@gmail.com', 'My Subject', 'asd', $headers);
            // if (!$success) {
            //     $errorMessage = error_get_last()['message'];
            // }
        }

        
    }   
?>