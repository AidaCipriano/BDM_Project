/*create database BD_BDM_project;*/

/*USE bd_bdm_project;*/

/*
DROP TABLE IF EXISTS MENSAJES;
DROP TABLE IF EXISTS CHAT;
DROP TABLE IF EXISTS COMENTARIOS;
DROP TABLE IF EXISTS PRODUCTO_CLIENTE;
DROP TABLE IF EXISTS COMPRAPRODUCTO_CLIENTE;
DROP TABLE IF EXISTS IMAGEN_PRODUCTO;
DROP TABLE IF EXISTS VIDEO_PRODUCTO;
DROP TABLE IF EXISTS PRODUCTO_VENDEDOR;
DROP TABLE IF EXISTS CATEGORIA;
DROP TABLE IF EXISTS IMAGEN_AVATAR;
DROP TABLE IF EXISTS USUARIO;*/


CREATE TABLE USUARIO (
	id_usuario				int auto_increment			not null comment "ID del Usuario",
	nombres					varchar(50)					not null comment "Nombre o nombres del Usuario",
    apellidos				varchar(50)					not null comment "Apellido o apellidos del Usuario",
	genero					varchar(15)					not null comment "Genero del Usuario",
	nacimiento				date						not null comment "Fecha de Nacimiento del Usuario",
	email					varchar(50)					not null comment "Email del Usuario",
    nombreusuario			varchar(20)					not null comment "Nombre de Usuario",
	contrasena				varchar(20)					not null comment "Contrasena de la cuenta del Usuario",
    tipousuario				varchar(20)					not null comment "Cuenta publica o privada",
    rol						varchar(20)					not null comment "Rol del usuario: Vendedor, Administrador o Comprador",
    fecharegistro			datetime					not null  comment "Fecha en la que el Usuario se registro",
    ultimamodicacion		datetime					not null comment "Ultima vez que el Usuario modifico su informacion",
    imagen					longblob					null comment 	"Avatar/Imagen del Perfil del Usuario",
    activo					bit							not null comment "Estado del Usuario.",
    administrador			bool						not null comment "Si el usuario es Admin o no",

	CONSTRAINT PK_USUARIO
			PRIMARY KEY (id_usuario)
);

CREATE TABLE IMAGEN_AVATAR (
	id_imagen_avatar		int auto_increment		not null comment "ID de la Imagen",
	titulo  					int					not null comment "Titulo de la foto de perfil del usuario",
    usuario  					int					not null comment "Usuario que guardo la imagen",

	CONSTRAINT PK_IMAGEN_AVATAR
			PRIMARY KEY (id_imagen_avatar),
	CONSTRAINT FK_IMAGEN_AVATAR
			FOREIGN KEY (usuario)
			REFERENCES USUARIO(id_usuario)
);




CREATE TABLE CATEGORIA (
	id_categoria				int					not null comment "ID de la Categoria",
    nombre						varchar(50)			not null comment "Nombre de la Categoria",
	creador						int					not null comment "ID del usuario",
    descripcion					varchar(100)		not null comment "Descripcion sobre la categoria",
    fechahoracreacion			datetime			not null comment "Fecha de Creacion",

	CONSTRAINT PK_CATEGORIA
			PRIMARY KEY (id_categoria),
	CONSTRAINT FK_CATEGORIA_CREADOR
			FOREIGN KEY (creador)
			REFERENCES USUARIO(id_usuario)
);

CREATE TABLE IMAGEN_CATEGORIA (
	id_imagen_categoria		int auto_increment		not null comment "ID de la Imagen",
	titulo  					int					not null comment "Titulo de la imagen de la categoria",
    categoria  					int					not null comment "Nombre de la categoria",
    usuario  					int					not null comment "Usuario que guardo la imagen",

	CONSTRAINT PK_IMAGEN_CATEGORIA
			PRIMARY KEY (id_imagen_avatar),
	CONSTRAINT FK_IMAGEN_CATEGORIA
			FOREIGN KEY (usuario)
			REFERENCES USUARIO(id_usuario),
	CONSTRAINT FK_IMAGEN_CATEGORIA
			FOREIGN KEY (categoria)
			REFERENCES CATEGORIA(id_categoria)
);

CREATE TABLE PRODUCTO_VENDEDOR (
	id_producto_vendedor		int auto_increment		not null comment "ID del Producto",
	vendedor  					int						not null comment "ID del Vendedor",
    nombre						varchar(100)			not null comment "Nombre del Producto",
    costo						decimal	(10,2)			not null comment "Costo del Producto",
    descripcion					varchar(300)			not null comment "De que trata el Producto?",
    activo						bit						not null comment "Estatus del Producto",
    fecha_creacion				date					not null comment "Fecha de creacion del Producto",
    cantidad_disponible			int						not null comment "Cantidad disponible del Producto",
	cotizacion					bit						not null comment "Es para cotizar el Producto?",
	venta						bit						not null comment "Es para venta el Producto?",
	categoria					int						not null comment "A que categoria el Producto?",

	CONSTRAINT PK_PRODUCTO_VENDEDOR
			PRIMARY KEY (id_producto_vendedor),
	CONSTRAINT FK_PRODUCTO_VENDEDOR_CREADOR
			FOREIGN KEY (vendedor)
			REFERENCES USUARIO(id_usuario),
	CONSTRAINT FK_PRODUCTO_VENDEDOR_CATEOGORIA
			FOREIGN KEY (categoria)
			REFERENCES CATEGORIA(id_categoria)
);

CREATE TABLE VIDEO_PRODUCTO (
	id_video_producto		int auto_increment		not null comment "ID del Video",
	titulo  					int					not null comment "Titulo del video del Producto",
    producto  					int					not null comment "ID del Producto",
    vendedor  					int					not null comment "Vendedor del Producto",

	CONSTRAINT PK_VIDEO_PRODUCTO
			PRIMARY KEY (id_video_producto),
	CONSTRAINT FK_VIDEO_PRODUCTO_PRODUCTO
			FOREIGN KEY (producto)
			REFERENCES PRODUCTO_VENDEDOR(id_producto_vendedor), 
	CONSTRAINT FK_VIDEO_PRODUCTO_CREADOR
			FOREIGN KEY (vendedor)
			REFERENCES USUARIO(id_usuario)
);

CREATE TABLE IMAGEN_PRODUCTO (
	id_imagen_producto		int auto_increment		not null comment "ID de la Imagen",
	titulo  					int					not null comment "Titulo de la imagen del Producto",
    producto  					int					not null comment "ID del Producto",
    vendedor  					int					not null comment "Vendedor del Producto",

	CONSTRAINT PK_IMAGEN_PRODUCTO
			PRIMARY KEY (id_imagen_producto),
	CONSTRAINT FK_IMAGEN_PRODUCTO_PRODUCTO
			FOREIGN KEY (producto)
			REFERENCES PRODUCTO_VENDEDOR(id_producto_vendedor), 
	CONSTRAINT FK_IMAGEN_PRODUCTO_CREADOR
			FOREIGN KEY (vendedor)
			REFERENCES USUARIO(id_usuario)
);

CREATE TABLE COMPRAPRODUCTO_CLIENTE (
	id_compraproducto_cliente	int auto_increment	not null comment "ID de la compra",
	cliente  					int					not null comment "Quien es el cliente?",
    producto  					int					not null comment "ID del Producto",
    costo  						decimal	(10,2)		not null comment "Costo del producto",
	fechacompra  				datetime			not null comment "Fecha de la compra",
	formapago					varchar(50)			not null comment "Forma de pago",

	CONSTRAINT PK_COMPRAPRODUCTO_CLIENTE
			PRIMARY KEY (id_compraproducto_cliente),
	CONSTRAINT FK_COMPRAPRODUCTO_CLIENTE_PRODUCTO
			FOREIGN KEY (producto)
			REFERENCES PRODUCTO_VENDEDOR(id_producto_vendedor), 
	CONSTRAINT FK_COMPRAPRODUCTO_CLIENTE_CLIENTE
			FOREIGN KEY (cliente)
			REFERENCES USUARIO(id_usuario)
);

CREATE TABLE PRODUCTO_CLIENTE (
	id_producto_cliente		int auto_increment		not null comment "ID del producto comprado por el cliente",
	estatus  				varchar(50)				not null comment "Estatus del producto: En proceso, enviado, entregado",
	fechaderecibido 		datetime				null comment "Fecha de la entrega del producto",
	codigodecompra			int						not null comment "Codigo de la compra",

	CONSTRAINT PK_PRODUCTO_CLIENTE
			PRIMARY KEY (id_producto_cliente),
	CONSTRAINT FK_PRODUCTO_CLIENTE_CODIGO
			FOREIGN KEY (codigodecompra)
			REFERENCES COMPRAPRODUCTO_CLIENTE(id_compraproducto_cliente)
);

CREATE TABLE COMENTARIOS (
	id_comentarios		int auto_increment		not null comment "ID del comentario por el cliente",
	fechapublicado		datetime				not null comment "Fecha publicado del comentario",
    calificacion		decimal	(10,2)			not null comment "Calificacion del producto",
    texto				varchar(300)			null comment "Texto del comentario",
    notificacion		varchar(100)			null comment "Notificacion para comentar",
    cliente				int						not null comment "Cliente que compro el producto y publico el comentario",
	codigodeproducto	int						not null comment "Codigo del producto",

	CONSTRAINT PK_COMENTARIOS
			PRIMARY KEY (id_comentarios),
	CONSTRAINT FK_COMENTARIOS_CODIGOPRODUCTO
			FOREIGN KEY (codigodeproducto)
			REFERENCES PRODUCTO_CLIENTE(id_producto_cliente),
	CONSTRAINT FK_COMENTARIOS_CLIENTE
			FOREIGN KEY (cliente)
			REFERENCES USUARIO(id_usuario)
);

CREATE TABLE CHAT (
	id_chat			int auto_increment		not null comment "ID del chat",
	activo			datetime				not null comment "Chat activo o no",
    imagen			decimal	(10,2)			not null comment "Imagen del chat",
	codigocompra	int						not null comment "Codigo de la compra del producto",

	CONSTRAINT PK_CHAT
			PRIMARY KEY (id_chat),
	CONSTRAINT FK_CHAT_CODIGOCOMPRAPRODUCTO
			FOREIGN KEY (codigocompra)
			REFERENCES COMPRAPRODUCTO_CLIENTE(id_compraproducto_cliente)
);

CREATE TABLE MENSAJES (
	id_mensajes			int auto_increment		not null comment "ID del mensaje",
	texto				varchar(300)			not null comment "Texto del mensaje",
    fecha_hora			datetime				not null comment "Fecha y hora del mensaje",
	receptor			int						not null comment "Receptor del mensaje",
	emisor				int						not null comment "Emisor del mensaje",
    chat				int						not null comment "Chat al que pertenece el mensaje",
	CONSTRAINT PK_MENSAJES
			PRIMARY KEY (id_mensajes),
	CONSTRAINT FK_MENSAJES_CHAT
			FOREIGN KEY (chat)
			REFERENCES CHAT(id_chat),
	CONSTRAINT FK_MENSAJES_RECEPTOR
			FOREIGN KEY (receptor)
			REFERENCES USUARIO(id_usuario),
	CONSTRAINT FK_MENSAJES_EMISOR
			FOREIGN KEY (emisor)
			REFERENCES USUARIO(id_usuario)
);