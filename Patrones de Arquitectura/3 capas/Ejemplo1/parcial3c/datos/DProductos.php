<?php
include_once "DConexion.php";
    class DProductos{
        private $id;
        private $nombre;
        private $descripcion;
        private $precioProduct;
        private $codigo;
        private $estado;
        private $idCategoria;
        private $idAlmacen;
        private $idProveedor;
        private $archivo;
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

        public function getNombre() {
            return $this->nombre;
        }

        public function setNombre(String $nombre) :void{
            $this->nombre = $nombre;
        }

        public function getDescripcion() {
            return $this->descripcion;
        }

        public function setDescripcion(String $descripcion) :void{
            $this->descripcion = $descripcion;
        }

        public function getPrecioProduct() {
            return $this->precioProduct;
        }

        public function setPrecioProduct(String $precioProduct) :void{
            $this->precioProduct = $precioProduct;
        }

        public function getCodigo() {
            return $this->codigo;
        }

        public function setCodigo(String $codigo) :void{
            $this->codigo = $codigo;
        }

        public function getEstado() {
            return $this->estado;
        }

        public function setEstado(String $estado) :void{
            $this->estado = $estado;
        }

        public function getIdCategoria() {
            return $this->idCategoria;
        }

        public function setIdCategoria(int $idCategoria) :void{
            $this->idCategoria = $idCategoria;
        }

        public function getIdAlmacen() {
            return $this->idAlmacen;
        }

        public function setIdAlmacen(int $idAlmacen) :void{
            $this->idAlmacen = $idAlmacen;
        }

        public function getIdProveedor() {
            return $this->idProveedor;
        }

        public function setIdProveedor(int $idProveedor) :void{
            $this->idProveedor = $idProveedor;
        }
        public function getArchivo() {
            return $this->archivo;
        }

        public function setArchivo(string $archivo) :void{
            $this->archivo = $archivo;
        }

        public function listarProductos()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "SELECT productos.id, productos.nombre, productos.descripcion, productos.precioProduct, productos.codigo, productos.estado, productos.archivo, idCategoria, idAlmacen, idProveedor, categoria.nombre as categorianombre, almacen.cantidad as almacencantidad, proveedor.representante as proveedorrepresentante FROM productos, categoria, almacen, proveedor where productos.idCategoria=categoria.id and productos.idAlmacen=almacen.id and productos.idProveedor=proveedor.id ORDER BY productos.id";
            $result = $conexion->query($sql);
            return $result;
        }

        public function listarProductosActivado()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "SELECT productos.id, productos.nombre, productos.descripcion, productos.precioProduct, productos.codigo, productos.estado, productos.archivo, idCategoria, idAlmacen, idProveedor, categoria.nombre as categorianombre,  almacen.cantidad as almacencantidad, proveedor.representante as proveedorrepresentante FROM productos, categoria, almacen, proveedor where productos.idCategoria=categoria.id and productos.idAlmacen=almacen.id and productos.idProveedor=proveedor.id and productos.estado = '1' ORDER BY productos.id";
            $result = $conexion->query($sql);
            return $result;
        }

        public function agregarProductos()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "INSERT into productos (nombre, descripcion, precioProduct, codigo, archivo, idCategoria, idAlmacen, idProveedor) values ('" . $this->getNombre() . "','" . $this->getDescripcion() . "','" . $this->getPrecioProduct() . "','" . $this->getCodigo() . "','" . $this->getArchivo() . "','" . $this->getIdCategoria() . "','" . $this->getIdAlmacen() . "','" . $this->getIdProveedor(). "')";
            $result = $conexion->query($sql);
        }

        public function modificarProductos()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "UPDATE productos SET nombre= '" . $this->getNombre() . "', descripcion='" . $this->getDescripcion() . "', precioProduct='" . $this->getPrecioProduct() . "', codigo='" . $this->getCodigo() . "', archivo='" . $this->getArchivo() . "', idCategoria='" . $this->getIdCategoria() . "', idAlmacen='" . $this->getIdAlmacen() . "', idProveedor='" . $this->getIdProveedor(). "' WHERE id='" . $this->getId() . "' ";
            $result = $conexion->query($sql);
        }

        public function habilitarProductos()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "UPDATE productos SET estado = 1 WHERE id='" . $this->getId() . "'";
            $result = $conexion->query($sql);
        }       

        public function deshabilitarProductos()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "UPDATE productos SET estado = 0 WHERE id='" . $this->getId() . "'";
            $result = $conexion->query($sql);
        }
        public function obtenerProductos()
        {
            $conexion = $this->conexion->abrirConexion();
            $sql = "SELECT id, (nombre, descripcion, precioProduct, codigo, archivo,  idCategoria, idAlmacen, idProveedor FROM productos  WHERE id = '" . $this->getId() . "' ORDER BY id";
            $result = $conexion->query($sql);
            $result->fetchObject($result);
            return $result;
        }

    }
?>