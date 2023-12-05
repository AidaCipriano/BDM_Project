/*Procedures*/
 /* USE BD_BDM;*/

#1. Gestion de Usuarios
DROP procedure IF EXISTS sp_Usuarios;
DELIMITER $$
 CREATE PROCEDURE sp_Usuarios(
	opc						varchar(30)		,
	pID_USUARIO				int				,
    pNOMBRES				varchar(50)	 	,
    pAPELLIDOS				VARCHAR(50)		,
	pROL					varchar(20)		,
	pGENERO					VARCHAR(10)		,
	pFECHA_NACIMIENTO		date			,
	pEMAIL					VARCHAR(50)		,
	pCONTRASENA				VARCHAR(20)		,
    pIMAGEN					longblob		
	)
BEGIN

	if(opc='Crear')
    then
    
		INSERT INTO USUARIO (NOMBRES, APELLIDOS, GENERO, FECHA_NACIMIENTO, EMAIL, CONTRASENA, ROL, FECHA_REGISTRO, ULTIMA_MODIFICACION, IMAGEN, ACTIVO, ADMINISTRADOR, INTENTOS, BLOQUEO)
        VALUES 				(pNOMBRES, pAPELLIDOS, pGENERO, pFECHA_NACIMIENTO, pEMAIL, pCONTRASENA, pROL, (SELECT DATE(NOW())), (SELECT NOW()), pIMAGEN, 1, false, 0, 0);
	end if;
	
    if(opc='Actualizar')
    then
    		UPDATE USUARIO
			SET
				NOMBRES				= 	pNOMBRES,
				APELLIDOS			= 	pAPELLIDOS,
				GENERO				= 	pGENERO,
				FECHA_NACIMIENTO	= 	pFECHA_NACIMIENTO,
				EMAIL				= 	pEMAIL,
				CONTRASENA			= 	pCONTRASENA,
				ULTIMA_MODIFICACION	= 	(SELECT NOW()),
				IMAGEN				=	pIMAGEN	
		WHERE
			ID_USUARIO 	= pID_USUARIO ;
    end if;
	
    if(opc='Dar de baja')
    then
		UPDATE USUARIO
					SET
						ACTIVO = 0
				WHERE
					ID_USUARIO 	= pID_USUARIO ;
    end if;
END$$

#Iniciar sesion
DROP procedure IF EXISTS sp_Inicio_Sesion;
DELIMITER $$
 CREATE PROCEDURE sp_Inicio_Sesion(
	IN pEMAIL					VARCHAR(50)		,
	IN pCONTRASENA				VARCHAR(20)	,	
    OUT pROL VARCHAR(50)
	) 
BEGIN
DECLARE v_count INT; DECLARE v_buscaremail int ; DECLARE v_buscarpasword VARCHAR(20)	;DECLARE v_id INT; DECLARE intentos tinyint;
  SET v_count =  (SELECT COUNT(ID_USUARIO) FROM USUARIOS WHERE EMAIL = pEMAIL AND CONTRASENA = pCONTRASENA);
  SET v_buscaremail = (SELECT Count(EMAIL) FROM USUARIO WHERE EMAIL = pEmail);

 IF (v_count = 1) 
    THEN
        SET pROL = (SELECT ROL FROM USUARIO WHERE EMAIL = pEmail);
    END IF;
    
    
IF (v_count = 0)
	THEN
    if (v_buscaremail = 1)
    then 
		SET v_id =  (SELECT ID_USUARIO FROM USUARIOS WHERE EMAIL = pEMAIL);
			SET v_buscarpasword =  (SELECT CONTRASENA FROM USUARIOS WHERE ID_USUARIO = v_id);
			if (v_buscarpasword != pCONTRASENA)
			then 
				set intentos = (select Bloqueo(INTENTOS) FROM USUARIO WHERE ID_USUARIO = v_id);
                
                if (intentos > 3)
                then
                UPDATE USUARIO
			SET
				BLOQUEO				= 	1
				
				WHERE
					ID_USUARIO 	= v_id ;
						end if;
			end if;
    end if;
		
        
	END IF;

END$$


#2. Instructor - Gestion de Cursos
DROP procedure IF EXISTS sp_GestionCursos;
DELIMITER $$
 CREATE PROCEDURE sp_GestionCursos(
	opc							varchar(30),
	pID_CURSO_INSTRUCTOR		int,
    pINSTRUCTOR					int,
    pNOMBRE						varchar(100),
    pCOSTO						decimal,
    pDESCRIPCION				VARCHAR(300),
    pIMAGEN						longblob
	)
BEGIN
DECLARE pNIVEL INT;
    
	if(opc='Crear')
    then
		INSERT INTO CURSO_INSTRUCTOR (INSTRUCTOR, NOMBRE, COSTO, DESCRIPCION, IMAGEN, ACTIVO, FECHA_CREACION)
		VALUES(pINSTRUCTOR, pNOMBRE, pCOSTO, pDESCRIPCION, pIMAGEN, 0, (SELECT DATE(NOW())));
		
	end if;
    
    	if(opc='Pulicar')
    then
		UPDATE CURSO_INSTRUCTOR
			SET
                ACTIVO		= 1
		WHERE
			ID_CURSO_INSTRUCTOR = pID_CURSO_INSTRUCTOR ;
		
	end if;
	
    if(opc='Actualizar')
    then
    		UPDATE CURSO_INSTRUCTOR
			SET
                NOMBRE 		= pNOMBRE, 
                COSTO		= pCOSTO, 
                DESCRIPCION	= pDESCRIPCION, 
                IMAGEN		= pIMAGEN
		WHERE
			ID_CURSO_INSTRUCTOR = pID_CURSO_INSTRUCTOR ;
    end if;
    
	if(opc='Dar de baja')
    then
    		UPDATE CURSO_INSTRUCTOR
			SET
                ACTIVO	= 0
		WHERE
			ID_CURSO_INSTRUCTOR = pID_CURSO_INSTRUCTOR ;
		DELETE FROM CURSO_CATEGORIA WHERE ID_CURSO_CATEGORIA = pID_CURSO_INSTRUCTOR ;
    end if;
END$$
 
#3. Instructor - Gestion de Nivel
DROP procedure IF EXISTS sp_GestionNiveles;
DELIMITER $$
 CREATE PROCEDURE sp_GestionNiveles(
	opc							varchar(30),
	pID_NIVEL					int,
    pCURSO						int,
    pNUMERO_NIVEL				int,
    pTITULO						VARCHAR(100),
    pDESCRIPCION				VARCHAR(300),
    pVIDEO						longblob,
    pCONTENIDO_ADICIONAL		longblob,
    pCOSTO						DECIMAL(10,2)
	)
BEGIN
	if(opc='Crear')
    then
		INSERT INTO NIVEL_INSTRUCTOR (CURSO, NUMERO_NIVEL, TITULO, DESCRIPCION, VIDEO, CONTENIDO_ADICIONAL, COSTO, ACTIVO)
		VALUES(pCURSO, pNUMERO_NIVEL, pTITULO, pDESCRIPCION, pVIDEO, pCONTENIDO_ADICIONAL, pCOSTO, 0);
	end if;
	
    if(opc='Actualizar')
    then
    		UPDATE NIVEL_INSTRUCTOR
			SET
				CURSO			= pCURSO		,
                NUMERO_NIVEL 	= pNUMERO_NIVEL	, 
                TITULO 			= pTITULO		, 
                DESCRIPCION		= pDESCRIPCION,
                VIDEO			= pVIDEO,
                CONTENIDO_ADICIONAL = pCONTENIDO_ADICIONAL,
                COSTO 			= pCOSTO
		WHERE
			ID_NIVEL = pID_NIVEL ;
    end if;
	
    	if(opc='Pulicar')
    then
		UPDATE NIVEL_INSTRUCTOR
			SET
                ACTIVO		= 1
		WHERE
			ID_NIVEL = pID_NIVEL ;
		
	end if;
    
    if(opc='Dar de baja')
    then
    		UPDATE NIVEL_INSTRUCTOR
			SET
                ACTIVO	= 0
		WHERE ID_NIVEL = pID_NIVEL ;
    end if;
END$$
 
     
#4. Alumno - Inscripcion Curso
DROP procedure IF EXISTS sp_Inscripcion;
DELIMITER $$
 CREATE PROCEDURE sp_Inscripcion(
	pID_REGISTRO_CURSO_ALUMNO	int ,
	pALUMNO  					int,
    pCURSO						int,
    pNIVEL						int,
    pFECHA_INSCRIPCION			DATETIME,
	pFORMA_PAGO					VARCHAR(30)
	)
BEGIN
declare pCosto decimal(10,2);
    set pCosto = (Select COSTO FROM CURSO_INSTRUCTOR where pCurso = ID_CURSO_INSTRUCTOR);

	INSERT INTO REGISTRO_CURSO_ALUMNO ( ALUMNO, CURSO, FECHA_INSCRIPCION, FORMA_PAGO, COSTO)
	VALUES(pALUMNO, pCURSO, (SELECT NOW()), pFORMA_PAGO, pCOSTO);
    
END$$
     
#5. Alumno - Informacion Curso - Perfil Alumno
DROP procedure IF EXISTS sp_PerfilAlumno;
DELIMITER $$
 CREATE PROCEDURE sp_PerfilAlumno(
 opc varchar(50), pUsuario  int, pCategoria varchar(50), pFecha1 datetime, pFecha2 datetime 
 )
BEGIN
	if(opc='Todos mis cursos')
    then
		SELECT Nombre, Imagen, Instructor, Progreso, Finalización, Estatus, Categoria FROM Alumno_MisCursos inner join USUARIO WHERE pUsuario = ID_USUARIO;
	end if;
	
    if(opc='Cursos Terminados')
    then
    	SELECT Nombre, Imagen, Instructor, Progreso, Finalización, Estatus, Categoria FROM Alumno_MisCursos_Terminados inner join INFO_CURSO_ALUMNO WHERE pAlumno = ALUMNO;
    end if;
	
    if(opc='Cursos Activos')
    then
        SELECT Nombre, Imagen, Instructor, Progreso, Finalización, Estatus, Categoria  FROM Alumno_MisCursos_Activos inner join INFO_CURSO_ALUMNO WHERE pAlumno = ALUMNO;
    end if;
       if(opc='Todas las categorias')
    then
       SELECT Nombre, Imagen, Instructor, Progreso, Finalización, Estatus, Categoria  FROM Alumno_MisCursos_Categorias inner join INFO_CURSO_ALUMNO WHERE pAlumno = ALUMNO;
    end if;
       if(opc='Por categoria')
    then
        SELECT Nombre, Imagen, Instructor, Progreso, Finalización, Estatus, Categoria  FROM Alumno_MisCursos_Categorias inner join INFO_CURSO_ALUMNO I inner join CATEGORIA C WHERE pAlumno = I.ALUMNO and pCategoria = C.NOMBRE ;
    end if;
       if(opc='Rango de Fecha de inscripcion')
    then
       SELECT Nombre, Imagen, Instructor, Progreso, Finalización, Estatus, Categoria  FROM Alumno_MisCursos_RangoFechas inner join INFO_CURSO_ALUMNO WHERE pAlumno = ALUMNO between pFecha1 AND pFecha2 ;
    end if;
END$$
     
#6. Admin - Gestion de Categorias
DROP procedure IF EXISTS sp_GestionCategorias;
DELIMITER $$
 CREATE PROCEDURE sp_GestionCategorias(
	opc 				varchar(50)	, 
	pID_CATEGORIA		int		,
	pNOMBRE				VARCHAR(50)	,
	pCREADOR			int		,
	pDESCRIPCION		VARCHAR(100),
	pFECHAHORA_CREACION	datetime
 )
BEGIN
	if(opc='Crear')
    then
		INSERT INTO CATEGORIA (NOMBRE, CREADOR, DESCRIPCION, FECHAHORA_CREACION)
		VALUES(pNOMBRE, pCREADOR, pDESCRIPCION, pFECHAHORA_CREACION);

	end if;
	
    if(opc='Editar')
    then
    		UPDATE CATEGORIA
			SET
				NOMBRE 				= pNOMBRE			, 
                DESCRIPCION			= pDESCRIPCION		,
				FECHAHORA_CREACION 	= pFECHAHORA_CREACION		
		WHERE
			ID_CATEGORIA = pID_CATEGORIA ;
    end if;
	
    if(opc='Eliminar')
    then
        DELETE FROM CATEGORIA WHERE ID_CATEGORIA = pID_CATEGORIA ;
    end if;
END$$
  
#7. Admin - Gestion Curso por Categoria
DROP procedure IF EXISTS sp_GestionCategoriaCursos;
DELIMITER $$
 CREATE PROCEDURE sp_GestionCategoriaCursos(
	opc 				varchar(50)	, 
    pUsuario 				int,
	pID_CURSO_CATEGORIA		int		,
    pCURSO					int		,
	pCATEGORIA				int		,
    pREGISTRO				DATETIME
 )
BEGIN

	if(opc='Agregar')
    then
		INSERT INTO CURSO_CATEGORIA (CURSO, CATEGORIA, REGISTRO)
		VALUES(pCURSO, pCATEGORIA, pREGISTRO);

	end if;
    if(opc='Todos los cursos')
    then
		SELECT Categoria, Curso, Registro FROM MisCategoriasCursos inner join USUARIO WHERE pUsuario = ID_USUARIO;

	end if;
	
    if(opc='Editar')
    then
    		UPDATE CURSO_CATEGORIA
			SET
				CURSO 		= pCURSO			, 
                CATEGORIA	= pCATEGORIA		,
				REGISTRO 	= pREGISTRO		
		WHERE
			ID_CURSO_CATEGORIA = pID_CURSO_CATEGORIA ;
    end if;
	
    if(opc='Eliminar')
    then
        DELETE FROM CURSO_CATEGORIA WHERE ID_CURSO_CATEGORIA = pID_CURSO_CATEGORIA ;
    end if;
END$$

#7. Admin - Menus
DROP procedure IF EXISTS sp_AdminMenus;
DELIMITER $$
 CREATE PROCEDURE sp_AdminMenus(
	opc 				varchar(50)	, 
    pEMAIL 				VARCHAR(50)

 )
BEGIN

	if(opc='Todos los usuarios')
    then
		 SELECT ID_USUARIO ID,  CONCAT(NOMBRES, ' ', APELLIDOS) Nombre, 
        GENERO Genero, FECHA_NACIMIENTO Nacimiento, EMAIL Email, CONTRASENA Contraseña, INTENTOS Intentos, BLOQUEO Bloqueo
		FROM USUARIO ;

	end if;
    	if(opc='Usuario')
    then
		 SELECT ID_USUARIO ID,  CONCAT(NOMBRES, ' ', APELLIDOS) Nombre, 
        GENERO Genero, FECHA_NACIMIENTO Nacimiento, EMAIL Email, CONTRASENA Contraseña, INTENTOS Intentos, BLOQUEO Bloqueo
		FROM USUARIO where EMAIL = pEMAIL;

	end if;
   
   
END$$




#8. Alumno - Ver Curso
DROP procedure IF EXISTS sp_Alumno_VerCurso;
DELIMITER $$
 CREATE PROCEDURE sp_Alumno_VerCurso(
    pCurso				int,
    pAlumno				int
 )
BEGIN
	SELECT C.IMAGEN, C.NOMBRE, C.DESCRIPCION, CONCAT(U.NOMBRES, ' ', U.APELLIDOS), INF.PROGRESO, INF.FECHA_INSCRIPCION, INF.FECHA_FINALIZACION, INF.ULTIMA_VISITA
		FROM INFO_CURSO_ALUMNO INF
				INNER JOIN  CURSOCOMPRADO_ALUMNO C
					ON INF.CURSO = C.ID_CURSOCOMPRADO_ALUMNO
				INNER JOIN USUARIO U
					ON C.INSTRUCTOR = U.ID_USUARIO
			WHERE pAlumno = ALUMNO and pCurso = CURSO  ;
		
	
    SELECT ID_NIVELCOMPRADO_ALUMNO, TITULO
		FROM NIVELCOMPRADO_ALUMNO  
			WHERE pCurso = CURSO  ;  

	
END$$

#9. Alumno - Ver Nivel
DROP procedure IF EXISTS sp_Alumno_VerNivel;
DELIMITER $$
 CREATE PROCEDURE sp_Alumno_VerNivel(
    pCurso				int, 
    pNivel				int
 )
BEGIN
	
	SELECT NUMERO_NIVEL, TITULO, VIDEO, DESCRIPCION, CONTENIDO_ADICIONAL
		FROM NIVELCOMPRADO_ALUMNO  
			WHERE pCurso = CURSO and pNivel = ID_NIVELCOMPRADO_ALUMNO;  

	
END$$

#10. Alumno - Completar Nivel
DROP procedure IF EXISTS sp_Alumno_NivelCompletado;
DELIMITER $$
 CREATE PROCEDURE sp_Alumno_NivelCompletado(
    opc  varchar (20),
    pTitulo	varchar(100),
    pCurso varchar(100)
 )
BEGIN
	declare pID_INFO_NIVEL_ALUMNO int; declare pID_CURSO int; declare pUltimoNivel int;
   
    set pID_CURSO = ( select ID_CURSOCOMPRADO_ALUMNO from CURSOCOMPRADO_ALUMNO where NOMBRE = pCurso);
    set pID_INFO_NIVEL_ALUMNO = (select ID_INFO_NIVEL_ALUMNO from INFO_NIVEL_ALUMNO NA inner join NIVELCOMPRADO_ALUMNO NI on NA.NIVEL = NI.ID_NIVELCOMPRADO_ALUMNO where pTitulo = NI.TITULO and pID_CURSO = NI.CURSO );
    UPDATE INFO_NIVEL_ALUMNO
			SET
				ESTATUS 	= 	'Completado',
                FECHA_VISITA =  (SELECT NOW())
		WHERE
			ID_INFO_NIVEL_ALUMNO = pID_INFO_NIVEL_ALUMNO;
	 set pUltimoNivel = (select max(NIVEL) from INFO_NIVEL_ALUMNO where ESTATUS 	= 	'Completado' and CURSO=pID_CURSO);
    update INFO_CURSO_ALUMNO
		set ULTIMA_VISITA = (SELECT DATE(NOW())), ULTIMONIVEL_COMPLETADO = pUltimoNivel
        where CURSO = pID_CURSO;

END$$

#11. Diploma
DROP procedure IF EXISTS sp_Diploma;
DELIMITER $$
 CREATE PROCEDURE sp_Diploma(
    pAlumno	int,
    pCurso 	int
 )
BEGIN
	
    # Informacion Curso
    select  CI.NOMBRE, CONCAT(U.NOMBRES, ' ', U.APELLIDOS)
    FROM INFO_CURSO_ALUMNO INF 
    INNER JOIN CURSOCOMPRADO_ALUMNO CI
    ON INF.CURSO = CI.ID_CURSOCOMPRADO_ALUMNO
    INNER JOIN USUARIO U
	ON CI.INSTRUCTOR = U.ID_USUARIO
    WHERE CI.ID_CURSOCOMPRADO_ALUMNO = pCurso;
    
    # Informacion Alumno
	select  INF.FECHA_INSCRIPCION, INF.FECHA_FINALIZACION, CONCAT(U.NOMBRES, ' ', U.APELLIDOS)
    FROM INFO_CURSO_ALUMNO INF 
    INNER JOIN CURSOCOMPRADO_ALUMNO CI
    ON INF.CURSO = CI.ID_CURSOCOMPRADO_ALUMNO
    INNER JOIN USUARIO U
    ON CI.INSTRUCTOR  = U.ID_USUARIO
    WHERE INF.ALUMNO = pAlumno;


END$$

#12. Perfil Instructor - Informacion Por Curso General
DROP procedure IF EXISTS sp_PerfilInstructor_TodosCursos;
DELIMITER $$
 CREATE PROCEDURE sp_PerfilInstructor_TodosCursos(
	opc 				varchar(50)	, 
    pInstructor 			int,
    pFecha1					date,
    pFecha2					date,
    pCategoria				varchar(50)
    )
BEGIN
	if(opc='Por Fechas')
    then
		select P.Curso, P.Total_Alumnos, P.Nivel_Promedio_Cursado, P.Dinero_Recaudado, P.Forma_Pago_Promedio, P.FECHA_CREACION from PerfilInstructor_Cursos_Todos_RangoFechas P
			INNER JOIN CURSO_INSTRUCTOR CI
        ON P.Curso = CI.NOMBRE
			inner join INSTRUCTOR I
        on CI.INSTRUCTOR = I.ID_INSTRUCTOR
        where I.NOMBRE =  pInstructor  AND FECHA_CREACION between pFecha1 and pFecha2;

	end if;
        if(opc='Todos los cursos')
    then
		
		select P.Curso, P.Total_Alumnos, P.Nivel_Promedio_Cursado, P.Dinero_Recaudado, P.Forma_Pago_Promedio from PerfilInstructor_Cursos_Todos P
			INNER JOIN CURSO_INSTRUCTOR CI
        ON P.Curso = CI.NOMBRE
        where CI.INSTRUCTOR=  pInstructor ;

	end if;
	
    if(opc='Todas las Categorias')
    then
		select P.Curso, P.Total_Alumnos, P.Nivel_Promedio_Cursado, P.Dinero_Recaudado, P.Forma_Pago_Promedio, P.FECHA_CREACION from PerfilInstructor_Cursos_Todos_Categoria P
			INNER JOIN CURSO_INSTRUCTOR CI
       ON P.Curso = CI.NOMBRE
        where CI.INSTRUCTOR=  pInstructor  ;

	end if;
    
        if(opc='Categoria')
    then
		select P.Curso, P.Total_Alumnos, P.Nivel_Promedio_Cursado, P.Dinero_Recaudado, P.Forma_Pago_Promedio, P.FECHA_CREACION from PerfilInstructor_Cursos_Todos_Categoria P
			INNER JOIN CURSO_INSTRUCTOR CI
        ON P.Curso = CI.NOMBRE
        where CI.INSTRUCTOR=  pInstructor 
        AND Categoria = pCategoria;

	end if;
	
    if(opc='Activos')
    then
		select  P.Curso, P.Total_Alumnos, P.Nivel_Promedio_Cursado, P.Dinero_Recaudado, P.Forma_Pago_Promedio, P.FECHA_CREACION from PerfilInstructor_Cursos_Todos_Activos P
            INNER JOIN CURSO_INSTRUCTOR CI
       ON P.Curso = CI.NOMBRE
        where CI.INSTRUCTOR=  pInstructor  ;
    end if;
END$$

#13. Perfil Instructor - Detalle por Curso
DROP procedure IF EXISTS sp_PerfilInstructor_PorCurso;
DELIMITER $$
 CREATE PROCEDURE sp_PerfilInstructor_PorCurso(
	opc 				varchar(50)	, 
    pInstructor 			int,
    pCURSO					int	,	
    pFecha1					date,
    pFecha2					date,
    pCategoria				varchar(50)
    )
BEGIN
	if(opc='Por Fechas')
    then
		select P.Curso, P.Alumno, P.Inscripcion, P.Nivel_Cursado, P.Costo, P.Forma_Pago, P.FECHA_CREACION from PerfilInstructor_Cursos_PorCurso_Fecha P
			INNER JOIN CURSO_INSTRUCTOR CI
       ON P.Curso = CI.NOMBRE
        where CI.INSTRUCTOR=  pInstructor  AND FECHA_CREACION between pFecha1 and pFecha2;

	end if;
        if(opc='Todos')
    then
		select P.Curso, P.Alumno, P.Inscripcion, P.Nivel_Cursado, P.Costo, P.Forma_Pago from PerfilInstructor_Cursos_PorCurso P
        INNER JOIN CURSO_INSTRUCTOR CI
       ON P.Curso = CI.NOMBRE
        where CI.INSTRUCTOR=  pInstructor ;

	end if;
	
    if(opc='Todas las Categorias')
    then
		select P.Categoria, P.Curso, P.Alumno, P.Inscripcion, P.Nivel_Cursado, P.Costo, P.Forma_Pago, P.FECHA_CREACION from PerfilInstructor_Cursos_PorCurso_Categoria P
        INNER JOIN CURSO_INSTRUCTOR CI
        ON P.Curso = CI.NOMBRE
        where CI.INSTRUCTOR=  pInstructor  ;

	end if;
    
        if(opc='Categoria')
    then
		select P.Categoria, P.Curso, P.Alumno, P.Inscripcion, P.Nivel_Cursado, P.Costo, P.Forma_Pago, P.FECHA_CREACION from PerfilInstructor_Cursos_PorCurso_Categoria P
        INNER JOIN CURSO_INSTRUCTOR CI
       ON P.Curso = CI.NOMBRE
        where CI.INSTRUCTOR=  pInstructor 
        and Categoria = pCategoria;

	end if;
	
    if(opc='Activos')
    then
    		select P.Categoria, P.Curso, P.Alumno, P.Inscripcion, P.Nivel_Cursado, P.Costo, P.Forma_Pago, P.FECHA_CREACION from PerfilInstructor_Cursos_PorCurso_Activos;
    end if;
END$$


#14. Informacion del Curso
DROP procedure IF EXISTS sp_VerCurso;
DELIMITER $$
 CREATE PROCEDURE sp_VerCurso(
	opc 				varchar(50)	, 
    pInstructor 		int,
    pCURSO				int	
    )
BEGIN
	if(opc='Ver Curso')
    then
		#Informacion Curso
		select CI.NOMBRE, CI.IMAGEN, CONCAT(U.NOMBRES, ' ', U.APELLIDOS), CI.DESCRIPCION, CI.COSTO  
        from CURSO_INSTRUCTOR CI
        inner join USUARIO U
        ON CI.INSTRUCTOR = U.ID_USUARIO
        WHERE CI.ID_CURSO_INSTRUCTOR = pCURSO
        and CI.INSTRUCTOR = pInstructor;
        
        
        #Barra de comentarios
		select U.IMAGEN, CONCAT(U.NOMBRES, ' ', U.APELLIDOS), C.CALIFICACION, C.FECHAHORA_CREACION , C.TEXTO
        from CURSO_INSTRUCTOR CI
        inner join USUARIO U
        ON CI.ALUMNO = U.ID_USUARIO
        INNER JOIN COMENTARIOS C
        ON CI.ID_CURSO_INSTRUCTOR = C.CURSO
        WHERE CI.ID_CURSO_INSTRUCTOR = pCURSO
        and CI.INSTRUCTOR = pInstructor
        and C.TEXTO is not null;
        
	end if;
END$$

#15. Todos los cursos
DROP procedure IF EXISTS sp_TodosLosCursos;
DELIMITER $$
 CREATE PROCEDURE sp_TodosLosCursos(
	opc 				varchar(50)
    )
BEGIN
	if(opc='Ver Cursos')
    then
		select CI.NOMBRE, CI.IMAGEN, CONCAT(U.NOMBRES, ' ', U.APELLIDOS), CI.DESCRIPCION, CI.COSTO  from CURSO_INSTRUCTOR CI
        inner join USUARIO U
        ON CI.INSTRUCTOR = U.ID_USUARIO
        WHERE CI.ACTIVO = 1;
	end if;
END$$

#16. Comentar
DROP procedure IF EXISTS sp_Comentar;
DELIMITER $$
 CREATE PROCEDURE sp_Comentar(
	opc 				varchar(50)	, 
    pALUMNO				int ,
    pCURSO				int,
    pTEXTO				varchar(300),
    pCALIFICACION		int
    )
BEGIN
    
    if(opc='Comentar')
    then
        UPDATE COMENTARIOS
			SET
				pFECHAHORA_CREACION	= 	(SELECT NOW()),
                TEXTO				= pTEXTO,
				CALIFICACION		= 	pCALIFICACION
		WHERE
			ALUMNO 	= pALUMNO 
		AND CURSO = pCURSO;

	end if;
END$$

/*

call sp_Alumno_VerCurso('Entrar Curso', 1, 1);
call sp_Alumno_VerNivel( 1, 1);

call sp_Inscripcion(null, 1, 1, null, 'tarjeta');
SELECT * FROM CURSO_INSTRUCTOR_ALUMNO;
     
     SELECT * FROM REGISTRO_CURSO_ALUMNO;
      SELECT * FROM INFO_CURSO_ALUMNO;
     
     
     
     
CALL sp_Usuarios( 'Crear', null ,'Juan', 'Apellido', 'Estudiante', 'genero', '2023-02-28' , 'email', 'contrasena',  null);
CALL sp_Usuarios( 'Crear', null ,'Jose', 'Apellido', 'Instructor', 'genero', '2023-02-28' , 'email', 'contrasena',  null);
  
CALL sp_Usuarios( 'Actualizar', 2 , 'Hola 1' ,'Apellido', null, 'genero', '2023-02-28', 'email', 'contrasena',  null);
 
CALL sp_Usuarios( 'Eliminar', 2 , null , null, null, null, null, null, null,  null);

CALL sp_GestionCursos( 'Crear', null , 1 ,'Curso 1',  100 , 'Descripcion', null);
CALL sp_GestionCursos( 'Crear', null , 1 ,'Curso 2',  200 , 'Descripcion', null);

CALL sp_GestionNiveles( 'Crear', null,  1, 1, 'Titulo 1' ,'descripcion', null);
CALL sp_GestionNiveles( 'Crear', null,  1, 2, 'Titulo 2' ,'descripcion', null);
CALL sp_GestionNiveles( 'Crear', null,  2, 1, 'Titulo 2' ,'descripcion', null);



CALL sp_GestionNiveles( 'Crear', NULL,  1 ,'Nivel 1', 2);
CALL sp_GestionSubiveles( 'Crear', null,  1, 'Titulo 3' ,'descripcion', null, 3);

 select * FROM USUARIO;
 SELECT * FROM INSTRUCTOR;
  SELECT * FROM ESTUDIANTE;
  SELECT * FROM CURSO_INSTRUCTOR;
    SELECT * FROM NIVEL_INSTRUCTOR;  
  */  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    