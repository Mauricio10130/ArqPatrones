

<?php

include_once "../datos/DProductos.php";
include_once (__DIR__ . "/Proxy/ProxySubirAdjunto.php");


    class NProductos{
        public $datoProductos;
        private  $proxy;
        private static  $instancia;
        

        public function __construct()
        {
            $this->datoProductos = new DProductos();
            $this->proxy = new ProxySubirAdjunto;
           
        }

        public static function getInstancia() : NProductos
        {
            if(!isset(self::$instancia)){
                self::$instancia = new NProductos;
            }
            return self::$instancia;
        }

        public function listarProductos() 
        {
            
            return $this->datoProductos->listarProductos();
        }

        public function listarProductosActivado() 
        {
            
            return $this->datoProductos->listarProductosActivado();
        }
       

        public function agregarProductos(String $nombre, String $descripcion, String $precioProduct, String $codigo,  $archivo, int $idCategoria, int $idAlmacen, int $idProveedor){
            
           // var_dump($archivo);
            if(isset($_FILES['archivo'])){
                
                    $archivo = $this->proxy->upload();
                    if($archivo != null){
                        $this->datoProductos->setNombre($nombre);
                        $this->datoProductos->setDescripcion($descripcion);
                        $this->datoProductos->setPrecioProduct($precioProduct);
                        $this->datoProductos->setCodigo($codigo);
                        $this->datoProductos->setArchivo($archivo);
                        $this->datoProductos->setIdCategoria($idCategoria);
                        $this->datoProductos->setIdAlmacen($idAlmacen);
                        $this->datoProductos->setIdProveedor($idProveedor);
                        $this->datoProductos->agregarProductos();
                        echo '<script type="text/javascript">';
                        echo 'setTimeout(function () {
                            swal("Archivo entregado", "", "success");';
                        echo '}, 0);</script>';
                    }else{
                        $this->datoProductos->setNombre($nombre);
                        $this->datoProductos->setDescripcion($descripcion);
                        $this->datoProductos->setPrecioProduct($precioProduct);
                        $this->datoProductos->setCodigo($codigo);
                        $this->datoProductos->setArchivo($archivo);
                        $this->datoProductos->setIdCategoria($idCategoria);
                        $this->datoProductos->setIdAlmacen($idAlmacen);
                        $this->datoProductos->setIdProveedor($idProveedor);
                        $this->datoProductos->agregarProductos();
                        echo '<script type="text/javascript">';
                        echo 'setTimeout(function () {
                            swal("Archivo ", "", "success");';
                        echo '}, 0);</script>';
                    }
                
            }

            
        }

        public function modificarProductos(int $id,String $nombre, String $descripcion, String $precioProduct, String $codigo, string $archivo, int $idCategoria, int $idAlmacen, int $idProveedor){
            $this->datoProductos->setId($id);
            $this->datoProductos->setNombre($nombre);
            $this->datoProductos->setDescripcion($descripcion);
            $this->datoProductos->setPrecioProduct($precioProduct);
            $this->datoProductos->setCodigo($codigo);
            $this->datoProductos->setArchivo($archivo);
            $this->datoProductos->setIdCategoria($idCategoria);
            $this->datoProductos->setIdAlmacen($idAlmacen);
            $this->datoProductos->setIdProveedor($idProveedor);
            $this->datoProductos->modificarProductos();
            
        }
        
        public function deshabilitarProductos(int $id) :void
        {
            $this->datoProductos->setId($id);
            $this->datoProductos->deshabilitarProductos();
        }
        public function habilitarProductos(int $id) :void
        {
            $this->datoProductos->setId($id);
            $this->datoProductos->habilitarProductos();
        }
        public function obtenerProductos(int $id)
        {
            $this->datoProductos->setId($id);
            return  $this->datoProductos->obtenerProductos();
        }
    }

?>