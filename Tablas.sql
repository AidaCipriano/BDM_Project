
/*create database BD_BDM;

USE BD_BDM;*/


CREATE TABLE USUARIO (
	ID_USUARIO				  INT AUTO_INCREMENT		  NOT NULL comment "ID del Usuario",
	NOMBRES					      VARCHAR(50)					  NOT NULL comment "Nombre o nombres del Usuario",
  APELLIDOS				      VARCHAR(50)					  NOT NULL comment "Apellido o apellidos del Usuario",
	GENERO					      VARCHAR(10)					  NOT NULL comment "Genero del Usuario",
	FECHA_NACIMIENTO	    DATE						      NOT NULL comment "Fecha de Nacimiento del Usuario",
	EMAIL					        VARCHAR(50)					  NOT NULL comment "Email del Usuario",
	CONTRASENA				    VARCHAR(20)				    NOT NULL comment "Contraseña de la cuenta del Usuario",
  ROL						        VARCHAR(20)				    NOT NULL comment "Rol del usuario: Instructor o Estudiante",
	FECHA_REGISTRO		    DATETIME					    NOT NULL comment "Fecha en la que el Usuario se registró",
  ULTIMA_MODIFICACION		DATETIME				  	  NOT NULL comment "Última vez que el Usuario modificó su informacion",
  IMAGEN					      LONGBLOB						          NOT NULL comment "El Bloqueo se activa al intentar ingresar 3 veces sin exito",

	CONSTRAINT PK_USUARIO
			PRIMARY KEY (ID_USUARIO)
);

CREATE TABLE PRODUCTO_VENDEDOR (
	ID_PRODUCTO_VENDEDOR		INT AUTO_INCREMENT		NOT NULL comment "ID del Curso",
	VENDEDOR  				      INT						        NOT NULL comment "ID del Vendedor",
  NOMBRE						      VARCHAR(100)			    NOT NULL comment "Nombre del Producto",
  COSTO						        DECIMAL	(10,2)			  NOT NULL comment "Costo del Producto",
  DESCRIPCION					    VARCHAR(300)			    NOT NULL comment "¿De que trata el Producto?",
  ACTIVO						      BIT						        NOT NULL comment "Estatus del Producto",
  FECHA_CREACION				  DATE					        NOT NULL comment "Fecha de creacion del Producto",
  CANTIDAD                INT                   NOT NULL comment "Cantidad disponible",
  COTIZACION              BIT                   NOT NULL comment "¿Es para cotizar?",
  VENTA                   BIT                   NOT NULL comment "¿Es para vender?",
  CATEGORIA		  INT			NOT NULL comment "¿Que categoria?",

	CONSTRAINT PK_PRODUCTO_VENDEDOR
			PRIMARY KEY (ID_PRODUCTO_VENDEDOR),
	CONSTRAINT FK_PRODUCTO_VENDEDOR_CREADOR
			FOREIGN KEY (VENDEDOR)
			REFERENCES USUARIO(ID_USUARIO)
CONSTRAINT FK_PRODUCTO_VENDEDOR_CATEGORIA
			FOREIGN KEY (CATEGORIA)
			REFERENCES CATEGORIA(ID_CATEGORIA)

);

CREATE TABLE VIDEO (
	ID_VIDEO					INT AUTO_INCREMENT	NOT NULL comment "Id del Video",
	PRODUCTO          INT                 NOT NULL comment "Id del Producto",
  TITULO					VARCHAR(100)		      NULL     comment "Titulo del Video",
  VIDEO						LONGBLOB			        NOT NULL comment "Video",
    

	CONSTRAINT PK_VIDEO
			PRIMARY KEY (ID_VIDEO),
	CONSTRAINT FK_VIDEO_PRODUCTO_VENDEDOR
			FOREIGN KEY (PRODUCTO)
			REFERENCES PRODUCTO_VENDEDOR(ID_PRODUCTO_VENDEDOR)
);

CREATE TABLE IMAGEN (
	ID_IMAGEN					INT AUTO_INCREMENT	NOT NULL comment "Id de la Imagen",
	PRODUCTO          INT                 NOT NULL comment "Id del Producto",
  TITULO						VARCHAR(100)		    NOT      comment "Titulo de la Imagen",
  IMAGEN						LONGBLOB			      NOT NULL comment "Imagen",
    

	CONSTRAINT PK_IMAGEN
			PRIMARY KEY (ID_IMAGEN),
	CONSTRAINT FK_IMAGEN_PRODUCTO_VENDEDOR
			FOREIGN KEY (PRODUCTO)
			REFERENCES PRODUCTO_VENDEDOR(ID_PRODUCTO_VENDEDOR)
);

CREATE TABLE COMPRAPRODUCTO_CLIENTE (
	ID_COMPRAPRODUCTO_CLIENTE	  INT AUTO_INCREMENT	NOT NULL comment "ID de la compra del Producto",
	CLIENTE  					          INT					        NOT NULL comment "ID del Alumno que compró el producto",
  PRODUCTO						        INT					        NOT NULL comment "ID del Producto",
  FECHA_COMPRA			          DATETIME			      NOT NULL comment "Fecha en la que el Cliente compró el Producto",
	FORMA_PAGO					        VARCHAR(30)		    	NOT NULL comment "Forma del pago",
	COSTO						            DECIMAL(10,2)		    NOT NULL comment "Costo del Producto",
	
	CONSTRAINT ID_COMPRAPRODUCTO_CLIENTE
			PRIMARY KEY (ID_COMPRAPRODUCTO_CLIENTE),
	CONSTRAINT FK_ID_COMPRAPRODUCTO_CLIENTE_PRODUCTO
			FOREIGN KEY (PRODUCTO)
            REFERENCES PRODUCTO_VENDEDOR(ID_PRODUCTO_VENDEDOR),
	CONSTRAINT FK_COMPRAPRODUCTO_CLIENTE_CLIENTE
			FOREIGN KEY (CLIENTE)
            REFERENCES USUARIO(ID_USUARIO)
);





CREATE TABLE PRODUCTO_CLIENTE (
	ID_PRODUCTO_CLIENTE	INT		auto_increment		NOT NULL comment "ID Información del Nivel comprado",
	PRODUCTO            INT                     NOT NULL comment "ID Producto comprado",
	CODIGODECOMPRA      INT                     NOT NULL comment "ID de la Compra"
  ESTATUS					    VARCHAR(30)					    NOT NULL comment "Estatus: En Camino o Recibido",
  FECHA_ENTREGA			  DATETIME					      NOT NULL comment "Fecha de entrega del Producto",
  FECHA_RECIBIDO		  DATETIME					      NULL     comment "Fecha de recibido el Producto",
 
	CONSTRAINT PK_PRODUCTO_CLIENTE
			PRIMARY KEY (ID_PRODUCTO_CLIENTE),
	CONSTRAINT FK_COMPRAPRODUCTO_CLIENTE_CODIGODECOMPRA
			FOREIGN KEY (CODIGODECOMPRA)
			REFERENCES COMPRAPRODUCTO_CLIENTE(ID_COMPRAPRODUCTO_CLIENTE),
	CONSTRAINT FK_PRODUCTO_VENDEDOR_PRODUCTO
			FOREIGN KEY (PRODUCTO)
			REFERENCES PRODUCTO_VENDEDOR(ID_PRODUCTO_VENDEDOR)
);

CREATE TABLE COMENTARIOS (
	ID_COMENTARIOS			INT	          NOT NULL comment "ID Comentarios",
  FECHAHORA_CREACION	DATETIME			NULL comment "Fecha de publicado el comentario",
  CLIENTE						  INT 				  NOT NULL comment "ID del Cliente que comentó",
  CALIFICACION				INT 				  NULL comment "Calificacion que da el Alumno al Producto",
  PRODUCTO						INT 				  NOT NULL comment "ID del Producto",
  TEXTO						    VARCHAR(300)	NULL comment "Opinion del Cliente sobre el Producto",
  NOTIFICACION				VARCHAR(100)	NULL comment "Aviso para que el alumno pueda opinar del Producto",

	CONSTRAINT PK_COMENTARIOS
			PRIMARY KEY (ID_COMENTARIOS),
	CONSTRAINT FK_COMENTARIOS_CLIENTE
			FOREIGN KEY (CLIENTE)
            REFERENCES USUARIO(ID_USUARIO),
	CONSTRAINT FK_COMENTARIOS_PRODUCTO
			FOREIGN KEY (PRODUCTO)
			REFERENCES PRODUCTO_VENDEDOR(ID_PRODUCTO_VENDEDOR)
	
);

CREATE TABLE CHAT_USUARIOS (
	ID_CHAT			INT	AUTO_INCREMENT			NOT NULL,
	CONSTRAINT PK_CHAT_USUARIOS
			PRIMARY KEY (ID_CHAT)
);

CREATE TABLE MENSAJE (
	ID_MENSAJE			  INT	AUTO_INCREMENT			NOT NULL,
    TEXTO					  VARCHAR(300)		        NOT NULL,
    FECHA_HORA		  DATETIME			          NOT NULL,
    RECEPTOR			  INT				              NOT NULL,
    EMISOR					INT				              NOT NULL,
    CHAT_USUARIOS		INT				              NOT NULL,

	CONSTRAINT PK_MENSAJE
			PRIMARY KEY (ID_MENSAJE),
	CONSTRAINT FK_MSJ_RECEPTOR
			FOREIGN KEY (RECEPTOR)
			REFERENCES USUARIO(ID_USUARIO),
	CONSTRAINT FK_MSJ_EMISOR
			FOREIGN KEY (EMISOR)
			REFERENCES USUARIO(ID_USUARIO),
	CONSTRAINT FK_MSJ_CHAT_USUARIOS
			FOREIGN KEY (CHAT_USUARIOS)
			REFERENCES CHAT_USUARIOS(ID_CHAT)

);

CREATE TABLE CATEGORIA (
	ID_CATEGORIA				INT					    NOT NULL comment "ID de la Categoría",
  NOMBRE						  VARCHAR(50)			NOT NULL comment "Nombre de la Categoria",
	CREADOR						  INT			        NOT NULL comment "ID del usuario/Admin",
  DESCRIPCION					VARCHAR(100)		NOT NULL comment "Descripcion sobre la categoria",
  FECHAHORA_CREACION	DATETIME			  NOT NULL comment "Fecha de Creación",

	CONSTRAINT PK_CATEGORIA
			PRIMARY KEY (ID_CATEGORIA),
	CONSTRAINT FK_CATEGORIA_CREADOR
			FOREIGN KEY (CREADOR)
			REFERENCES USUARIO(ID_USUARIO)
);



             
		

            
            
            
            
            
            
            
            
            