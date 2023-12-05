/*create database BD_BDM;

USE BD_BDM;*/

DROP TABLE IF EXISTS CURSO_CATEGORIA;
DROP TABLE IF EXISTS CATEGORIA;
DROP TABLE IF EXISTS MENSAJE;
DROP TABLE IF EXISTS CHAT_USUARIOS;
DROP TABLE IF EXISTS COMENTARIOS;
DROP TABLE IF EXISTS INFO_NIVEL_ALUMNO;
DROP TABLE IF EXISTS INFO_CURSO_ALUMNO;
DROP TABLE IF EXISTS NIVELCOMPRADO_ALUMNO;
DROP TABLE IF EXISTS CURSOCOMPRADO_ALUMNO;
DROP TABLE IF EXISTS CURSO_INSTRUCTOR_ALUMNO;
DROP TABLE IF EXISTS REGISTRO_CURSO_ALUMNO;
DROP TABLE IF EXISTS NIVEL_INSTRUCTOR;
DROP TABLE IF EXISTS CURSO_INSTRUCTOR;
DROP TABLE IF EXISTS USUARIO;

CREATE TABLE USUARIO (
	ID_USUARIO				int auto_increment			NOT NULL comment "ID del Usuario",
	NOMBRES					varchar(50)					NOT NULL comment "Nombre o nombres del Usuario",
    APELLIDOS				VARCHAR(50)					NOT NULL comment "Apellido o apellidos del Usuario",
	GENERO					VARCHAR(10)					NOT NULL comment "Genero del Usuario",
	FECHA_NACIMIENTO		DATE						NOT NULL comment "Fecha de Nacimiento del Usuario",
	EMAIL					VARCHAR(50)					NOT NULL comment "Email del Usuario",
	CONTRASENA				VARCHAR(20)					NOT NULL comment "Contraseña de la cuenta del Usuario",
    ROL						VARCHAR(20)					NOT NULL comment "Rol del usuario: Instructor o Estudiante",
	FECHA_REGISTRO			datetime					NOT NULL  comment "Fecha en la que el Usuario se registró",
    ULTIMA_MODIFICACION		datetime					NOT NULL comment "Última vez que el Usuario modificó su informacion",
    IMAGEN					longblob					NULL comment "Avatar/Imagen del Perfil del Usuario",
    ACTIVO					BIT							NOT NULL comment "Estado del Usuario.",
    ADMINISTRADOR			BOOL						NOT NULL comment "Si el usuario es Admin o no",
    INTENTOS				tinyint						NOT NULL comment "Intentos de ingresar a su sesion, Usuario",
    BLOQUEO					bit							NOT NULL comment "El Bloqueo se activa al intentar ingresar 3 veces sin exito",

	CONSTRAINT PK_USUARIO
			PRIMARY KEY (ID_USUARIO)
);

CREATE TABLE CURSO_INSTRUCTOR (
	ID_CURSO_INSTRUCTOR			int auto_increment		NOT NULL comment "ID del Curso",
	INSTRUCTOR  				int						NOT NULL comment "ID del Instructor",
    NOMBRE						VARCHAR(100)			NOT NULL comment "Nombre del Curso",
    COSTO						decimal	(10,2)			NOT NULL comment "Costo del Curso",
    DESCRIPCION					VARCHAR(300)			NOT NULL comment "¿De que trata el Curso?",
    IMAGEN						longblob				NULL comment "Imagen del Curso",
    ACTIVO						BIT						NOT NULL comment "Estatus del Curso",
    FECHA_CREACION				date					NOT NULL comment "Fecha de creacion del Curso",

	CONSTRAINT PK_CURSO_INSTRUCTOR
			PRIMARY KEY (ID_CURSO_INSTRUCTOR),
	CONSTRAINT FK_CURSO_INSTRUCTOR_CREADOR
			FOREIGN KEY (INSTRUCTOR)
			REFERENCES USUARIO(ID_USUARIO)
);

CREATE TABLE NIVEL_INSTRUCTOR (
	ID_NIVEL					int auto_increment	NOT NULL comment "Id del Nivel",
    CURSO						int					NOT NULL comment "Id del Curso",
    NUMERO_NIVEL				int					NOT NULL comment "Número del Nivel",
    TITULO						VARCHAR(100)		NOT NULL comment "Titulo del Nivel",
    DESCRIPCION					VARCHAR(300)		NOT NULL comment "¿De qué trata el Nivel?",
    VIDEO						longblob			NOT NULL comment "Video del Nivel",
    CONTENIDO_ADICIONAL			longblob			NULL comment "Contenido adicional: pdf o enlaces",
    COSTO						DECIMAL(10,2)		NULL comment "Costo del Nivel",
	ACTIVO						BIT					NOT NULL comment "Estatus del Nivel",

	CONSTRAINT PK_NIVEL_INSTRUCTOR
			PRIMARY KEY (ID_NIVEL),
	CONSTRAINT FK_CURSO_NIVEL_INSTRUCTOR
			FOREIGN KEY (CURSO)
			REFERENCES CURSO_INSTRUCTOR(ID_CURSO_INSTRUCTOR)
);

CREATE TABLE REGISTRO_CURSO_ALUMNO (
	ID_REGISTRO_CURSO_ALUMNO	int auto_increment	NOT NULL comment "ID del Registro del Curso",
	ALUMNO  					int					NOT NULL comment "ID del Alumno que se inscribe",
    CURSO						int					NOT NULL comment "ID del Curso a inscribir",
    FECHA_INSCRIPCION			DATETIME			NOT NULL comment "Fecha en la que el Alumno se inscribió al Curso",
	FORMA_PAGO					VARCHAR(30)			NOT NULL comment "Forma del pago",
	COSTO						DECIMAL(10,2)		NOT NULL comment "Costo del Curso",
	CONSTRAINT ID_REGISTRO_CURSO_ALUMNO
			PRIMARY KEY (ID_REGISTRO_CURSO_ALUMNO),
	CONSTRAINT FK_ID_REGISTRO_CURSO_ALUMNO_CURSO
			FOREIGN KEY (CURSO)
            REFERENCES CURSO_INSTRUCTOR(ID_CURSO_INSTRUCTOR),
	CONSTRAINT FK_REGISTRO_CURSO_ALUMNO_ESTUDIANTE
			FOREIGN KEY (ALUMNO)
            REFERENCES USUARIO(ID_USUARIO)
);

CREATE TABLE CURSO_INSTRUCTOR_ALUMNO (
	ID_CURSO_INSTRUCTOR_ALUMNO			int auto_increment	NOT NULL comment "ID movimiento de inscripción (Vista por el inscripción)",
	ALUMNO  				int								NOT NULL comment "Alumno que se inscribió",
    CURSO					int								NOT NULL comment "Curso a la que el Alumno se inscribió",
    FECHA_INSCRIPCION		DATETIME						NOT NULL comment "Fecha en la que el Alumno se inscribió",
    FECHA_FINALIZACION		DATETIME				 		NULL comment "Fecha em la que el Alumno finalizó el Curso",
    ESTADO					varchar(50)						NOT NULL comment "Estado del Progreso: Completado o Incompleto ",

	CONSTRAINT ID_CURSO_INSTRUCTOR_ALUMNO
			PRIMARY KEY (ID_CURSO_INSTRUCTOR_ALUMNO),
	CONSTRAINT FK_ID_CURSO_INSTRUCTOR_ALUMNO_CURSO
			FOREIGN KEY (CURSO)
            REFERENCES CURSO_INSTRUCTOR(ID_CURSO_INSTRUCTOR),
	CONSTRAINT FK_CURSO_INSTRUCTOR_ALUMNO_ESTUDIANTE
			FOREIGN KEY (ALUMNO)
            REFERENCES USUARIO(ID_USUARIO)
);

#Aqui se guarda el curso como se compro
CREATE TABLE CURSOCOMPRADO_ALUMNO (
	ID_CURSOCOMPRADO_ALUMNO		int auto_increment		NOT NULL comment "ID movimiento de Copia de la informacion del Curso que se compró",
	INSTRUCTOR  				int						NOT NULL comment "ID Instructor del Curso",
    NOMBRE						VARCHAR(100)			NOT NULL comment "Nombre del Curso",
    COSTO						decimal	(10,2)			NOT NULL comment "Costo del Curso",
    DESCRIPCION					VARCHAR(300)			NOT NULL comment "Descripción del Curso",
    IMAGEN						longblob				NULL comment "Imagen del Curso",
    ACTIVO						BIT						NOT NULL comment "Estado del Curso",

	CONSTRAINT PK_CURSOCOMPRADO_ALUMNO
			PRIMARY KEY (ID_CURSOCOMPRADO_ALUMNO),
	CONSTRAINT FK_CURSOCOMPRADO_ALUMNO
			FOREIGN KEY (INSTRUCTOR)
			REFERENCES USUARIO(ID_USUARIO)
);

#Aqui se guarda el nivel como se compro
CREATE TABLE NIVELCOMPRADO_ALUMNO (
	ID_NIVELCOMPRADO_ALUMNO		int auto_increment	NOT NULL comment "ID Copia del Nivel comprado",
    CURSO						int					NOT NULL comment "ID del Curso",
    NUMERO_NIVEL				int					NOT NULL comment "Numero del Nivel",
    TITULO						VARCHAR(100)		NOT NULL comment "Titulo del Nivel",
    DESCRIPCION					VARCHAR(300)		NOT NULL comment "¿De que trata el Nivel?",
    VIDEO						longblob			NOT NULL comment "Video / Clase ",
    CONTENIDO_ADICIONAL			longblob			NULL comment "Contenido adicional: pdf o enlace",
    COSTO						DECIMAL(10,2)		NULL comment "¿De que trata el Nivel?",

	CONSTRAINT PK_NIVELCOMPRADO_ALUMNO
			PRIMARY KEY (ID_NIVELCOMPRADO_ALUMNO),
	CONSTRAINT FK_NIVELCOMPRADO_ALUMNO
			FOREIGN KEY (CURSO)
			REFERENCES CURSOCOMPRADO_ALUMNO(ID_CURSOCOMPRADO_ALUMNO)
);

CREATE TABLE INFO_CURSO_ALUMNO (
	ID_CURSO_ALUMNO			int auto_increment	NOT NULL comment "ID Información del Alumno en el Curso",
	ALUMNO  				int					NOT NULL comment "ID del Alumno",
    CURSO					int					NOT NULL comment "ID del Curso",
    PROGRESO				FLOAT				NOT NULL comment "Progreso en el Curso",
    FECHA_INSCRIPCION		DATETIME			NOT NULL comment "Fecha de inscripcion",
    FECHA_FINALIZACION		DATETIME			NULL	 comment "Fecha de finalización",
    ESTATUS					VARCHAR(30)			NOT NULL comment "Estatus en el curso: Completo o Incompleto",
	FORMA_PAGO				VARCHAR(30)			NOT NULL comment "Forma de pago",
	ULTIMA_VISITA			DATETIME			NOT NULL comment "Última visita a el Curso",
    ULTIMONIVEL_COMPLETADO	int					null	 comment "Último Nivel que se completó",
	CONSTRAINT ID_CURSO_ALUMNO
			PRIMARY KEY (ID_CURSO_ALUMNO),
	CONSTRAINT FK_ID_CURSO_ALUMNO_CURSO
			FOREIGN KEY (CURSO)
            REFERENCES CURSOCOMPRADO_ALUMNO(ID_CURSOCOMPRADO_ALUMNO),
	CONSTRAINT FK_CURSO_ALUMNO_ESTUDIANTE
			FOREIGN KEY (ALUMNO)
            REFERENCES USUARIO(ID_USUARIO)
);

CREATE TABLE INFO_NIVEL_ALUMNO (
	ID_INFO_NIVEL_ALUMNO	int		auto_increment		NOT NULL comment "ID Información del Nivel comprado",
    NIVEL					int							NOT NULL comment "ID del Nivel comprado",
    ESTATUS					varchar(30)					NOT NULL comment "Estatus: Completado o Incompleto",
    INFO_ALUMNO				int							NOT NULL comment "ID Informacion del curso comperado",
    FECHA_VISITA			datetime					NULL comment "Ultima visita al nivel",

	CONSTRAINT PK_NIVEL_ALUMNO
			PRIMARY KEY (ID_INFO_NIVEL_ALUMNO),
	CONSTRAINT FK_NIVEL_ALUMNO_CURSO
			FOREIGN KEY (INFO_ALUMNO)
			REFERENCES INFO_CURSO_ALUMNO(ID_CURSO_ALUMNO),
	CONSTRAINT FK_NIVEL_ALUMNO_NIVEL
			FOREIGN KEY (NIVEL)
			REFERENCES NIVELCOMPRADO_ALUMNO(ID_NIVELCOMPRADO_ALUMNO)
);

CREATE TABLE COMENTARIOS (
	ID_COMENTARIOS				int	auto_increment	NOT NULL comment "ID Comentarios",
    FECHAHORA_CREACION			datetime			NULL comment "Fecha de publicado el comentario",
    ALUMNO						int 				NOT NULL comment "ID del Alumno que comentó",
    CALIFICACION				int 				NULL comment "Calificacion que da el Alumno al Curso",
    CURSO						int 				NOT NULL comment "ID del Curso",
    TEXTO						varchar(300)		null comment "Opinion del Alumno sobre el Curso",
    NOTIFICACION				varchar(100)		null comment "Aviso para que el alumno pueda opinar del Curso",

	CONSTRAINT PK_COMENTARIOS
			PRIMARY KEY (ID_COMENTARIOS),
	CONSTRAINT FK_COMENTARIOS_ESTUDIANTE
			FOREIGN KEY (ALUMNO)
            REFERENCES USUARIO(ID_USUARIO),
	CONSTRAINT FK_COMENTARIOS_CURSO
			FOREIGN KEY (CURSO)
			REFERENCES CURSO_INSTRUCTOR(ID_CURSO_INSTRUCTOR)
	
);

CREATE TABLE CHAT_USUARIOS (
	ID_CHAT			int				NOT NULL,
	CONSTRAINT PK_CHAT_USUARIOS
			PRIMARY KEY (ID_CHAT)
);

CREATE TABLE MENSAJE (
	ID_MENSAJE				int				NOT NULL,
    TEXTO					varchar(300)		NOT NULL,
    FECHA_HORA				datetime			NOT NULL,
    RECEPTOR				int				NOT NULL,
    EMISOR					int				NOT NULL,
    CHAT_USUARIOS			int				NOT NULL,

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
	ID_CATEGORIA				int					NOT NULL comment "ID de la Categoría",
    NOMBRE						VARCHAR(50)			NOT NULL comment "Nombre de la Categoria",
	CREADOR						int					NOT NULL comment "ID del usuario/Admin",
    DESCRIPCION					VARCHAR(100)		NOT NULL comment "Descripcion sobre la categoria",
    FECHAHORA_CREACION			datetime			NOT NULL comment "Fecha de Creación",

	CONSTRAINT PK_CATEGORIA
			PRIMARY KEY (ID_CATEGORIA),
	CONSTRAINT FK_CATEGORIA_CREADOR
			FOREIGN KEY (CREADOR)
			REFERENCES USUARIO(ID_USUARIO)
);

CREATE TABLE CURSO_CATEGORIA (
	ID_CURSO_CATEGORIA			int			NOT NULL comment "ID Registro de un Curso a una Categoría",
    CURSO						int			NOT NULL comment "ID del Curso",
	CATEGORIA					int			NOT NULL comment "ID de la Categoria",
    REGISTRO					DATETIME	NOT NULL comment "Dia de registro",

	CONSTRAINT PK_CURSO_CATEGORIA
			PRIMARY KEY (ID_CURSO_CATEGORIA),
	CONSTRAINT FK_CURSO_CATEGORIA_CURSO
			FOREIGN KEY (CURSO)
			REFERENCES CURSO_INSTRUCTOR(ID_CURSO_INSTRUCTOR),
	CONSTRAINT FK_CURSO_CATEGORIA_CATEGORIA
			FOREIGN KEY (CATEGORIA)
			REFERENCES CATEGORIA(ID_CATEGORIA)
            
);


             
		

            
            
            
            
            
            
            
            
            