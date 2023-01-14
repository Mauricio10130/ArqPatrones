
CREATE DATABASE parcial3c;

CREATE TABLE almacen
(
  id SERIAL NOT NULL ,
  cantidad character(50) NOT NULL,
  precio integer NOT NULL,
  stock character(50) NOT NULL,
  estado character(1) DEFAULT 1,
  CONSTRAINT almacen_pkey PRIMARY KEY (id)
);


-- Tabla: estudiante
-- DROP TABLE estudiante;

CREATE TABLE categoria
(
  id SERIAL NOT NULL ,
  nombre character(50) NOT NULL,
  descripcion character(50) NOT NULL,
  estado character(1) DEFAULT 1,
  CONSTRAINT categoria_pkey PRIMARY KEY (id)
);

-- Tabla: proveedor
-- DROP TABLE proveedor;

CREATE TABLE proveedor
(
  id SERIAL NOT NULL ,
  direccion character(50) NOT NULL,
  celular integer NOT NULL,
  DNI integer NOT NULL,
  email character(50) NOT NULL,
  marca character(50) NOT NULL,
  representante character(50) NOT NULL,
  estado character(1) DEFAULT 1,
  CONSTRAINT proveedor_pkey PRIMARY KEY (id)
);


-- Tabla: productos
-- DROP TABLE productos;

CREATE TABLE productos
(
  id SERIAL NOT NULL ,
  nombre character(50) NOT NULL,
  codigo integer NOT NULL,
  descripcion character(50) NOT NULL,
  precioProduct integer NOT NULL,
  id_almacen integer NOT NULL,
  id_categoria integer NOT NULL,
  id_proveedor integer NOT NULL,
  estado character(1) DEFAULT 1,
  CONSTRAINT productos_pkey PRIMARY KEY (id),
  CONSTRAINT productos_fkey1 FOREIGN KEY (id_almacen)
      REFERENCES almacen (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
	
  CONSTRAINT productos_fkey2 FOREIGN KEY (id_categoria)
      REFERENCES categoria (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
	

  CONSTRAINT productos_fkey3 FOREIGN KEY (id_proveedor)
      REFERENCES proveedor (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

-- Tabla: cliente
-- DROP TABLE cliente;

CREATE TABLE cliente
(
  id SERIAL NOT NULL ,
  nombre character(50) NOT NULL,
  telefono integer NOT NULL,
  contraseña character(50) NOT NULL,
  direccion character(50) NOT NULL,
  email character(50) NOT NULL,
  facebook character(50) NOT NULL,
  estado character(1) DEFAULT 1,
  CONSTRAINT cliente_pkey PRIMARY KEY (id)
);

-- Tabla: pedidos
-- DROP TABLE pedidos;

CREATE TABLE pedidos
(
  id SERIAL NOT NULL ,
  fecha_pedido character(50) NOT NULL,
  hora_pedido character(50) NOT NULL,
  num_pedido integer NOT NULL,
  fecha_entrega character(50) NOT NULL,
  hora_entrega character(50) NOT NULL,
  observaciones character(50) NOT NULL,
  id_cliente integer NOT NULL,
  estado character(1) DEFAULT 1,
  CONSTRAINT pedidos_pkey PRIMARY KEY (id),
  CONSTRAINT pedidos_fkey1 FOREIGN KEY (id_cliente)
      REFERENCES cliente (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);





-- Tabla: complemento
-- DROP TABLE complemento;

CREATE TABLE complemento
(
  id SERIAL NOT NULL,
  detalles character(100),
  id_pedidos integer NOT NULL,
  id_productos integer NOT NULL,
  CONSTRAINT complemento_pkey PRIMARY KEY (id, id_pedidos),
  CONSTRAINT complemento_fkey1 FOREIGN KEY (id_pedidos)
      REFERENCES pedidos (id) MATCH SIMPLE
      ON DELETE CASCADE,
  CONSTRAINT complemento_fkey2 FOREIGN KEY (id_productos)
      REFERENCES productos (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

