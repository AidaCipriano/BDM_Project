/*Procedures*/
 /* USE BD_BDM_project;*/

#1. Gestion de Usuarios
DROP procedure IF EXISTS sp_Usuarios;
DELIMITER $$
 CREATE PROCEDURE sp_Usuarios(
	opc						varchar(30)		,
    pid_usuario				int				,
	pnombres				varchar(50)		,
    papellidos				varchar(50)		,
	pgenero					varchar(15)		,
	pnacimiento				date			,
	pemail					varchar(50)		,
    pnombreusuario			varchar(20)		,
	pcontrasena				varchar(20)		,
    ptipousuario			varchar(20)		,
    prol					varchar(20)		,
    pimagen					longblob		
	)
BEGIN
DECLARE busqueda_Cuenta INT; DECLARE v_buscaremail int ;
SET v_buscaremail = (SELECT Count(email) FROM USUARIO WHERE email = pemail);

	if(opc='Registro')
    then
		
         IF (v_buscaremail = 0) 
		THEN
			
			IF(prol='Administrador')
			THEN
				INSERT INTO USUARIO (nombres, apellidos, genero, nacimiento, email, nombreusuario, contrasena, tipousuario, rol, fecharegistro, ultimamodicacion, imagen, activo, administrador)
				VALUES 				(pnombres, papellidos, pgenero, pnacimiento, pemail, pnombreusuario, pcontrasena, ptipousuario, prol, (SELECT NOW()), (SELECT NOW()), pimagen, 1, 1);
                set opc = "Registrado";
                SELECT pnombreusuario as Usuario, opc as Mensaje;
                
			END IF;

			IF(prol!='Administrador')
			THEN
				INSERT INTO USUARIO (nombres, apellidos, genero, nacimiento, email, nombreusuario, contrasena, tipousuario, rol, fecharegistro, ultimamodicacion, imagen, activo, administrador)
				VALUES 				(pnombres, papellidos, pgenero, pnacimiento, pemail, pnombreusuario, pcontrasena, ptipousuario, prol, (SELECT NOW()), (SELECT NOW()), pimagen, 1, 0);
                
                set opc = "Registrado";
                SELECT pnombreusuario as Usuario, opc as Mensaje;
			END IF;
			
			
			
		END IF;
        
        IF (v_buscaremail = 1) 
		THEN
				set opc = "Cuenta existente";
                SELECT pnombreusuario as Usuario, opc as Mensaje;
		END IF;

	end if;
	if(opc='ID')
	then
		SELECT id_usuario FROM usuario where pnombreusuario = nombreusuario;
	end if;
	
    if(opc='Actualizar')
    then
    		UPDATE USUARIO
			SET
				nombres				= 	pnombres,
				apellidos			= 	papellidos,
				genero				= 	pgenero,
				nacimiento			= 	pnacimiento,
				nombreusuario		= 	pnombreusuario,
				email				= 	pemail,
				contrasena			= 	pcontrasena,
				ultimamodicacion	= 	(SELECT NOW()),
				imagen				=	pimagen	
		WHERE
			id_usuario 	= pid_usuario ;
            
            set opc = "Actualizado";
             SELECT pnombreusuario as Usuario, opc as Mensaje;
    end if;
	
    if(opc='Dar de baja')
    then
		UPDATE USUARIO
			SET
				activo = 0,
                ultimamodicacion	= 	(SELECT NOW())

			WHERE
				id_usuario 	= pid_usuario ;
		set opc = "De baja";
		SELECT pnombreusuario as Usuario, opc as Mensaje;
    end if;
	if(opc='Mi Perfil')
	then

		SELECT nombres, apellidos FROM usuario where pnombreusuario = nombreusuario;

	end if;
	

END$$

/*call sp_Usuarios('Actualizar', 1, '1', '2', '3', '2000-12-10', '4', '5', '7', null, null, null);*/
select * from usuario;
/*select * from imagen_avatar;*/
#Iniciar sesion
DROP procedure IF EXISTS sp_Inicio_Sesion;
DELIMITER $$
 CREATE PROCEDURE sp_Inicio_Sesion(
	IN pemail					VARCHAR(50)		,
	IN pcontrasena				VARCHAR(20)	
	) 
BEGIN
	DECLARE busqueda_Cuenta INT; DECLARE v_buscaremail int ; DECLARE v_buscarpasword VARCHAR(20) ; DECLARE v_id INT; declare prol varchar(50);
    declare pactivo bit; declare mensaje varchar(30);
	SET busqueda_Cuenta =  (SELECT COUNT(id_usuario) FROM USUARIO WHERE email = pemail AND contrasena = pcontrasena);
    SET pactivo = (SELECT activo FROM USUARIO WHERE email = pemail);



 IF (busqueda_Cuenta = 1) 
    THEN
		IF (pactivo = 1) 
		THEN
			SELECT rol, id_usuario, tipousuario, nombreusuario, nombres, apellidos FROM USUARIO WHERE email = pemail;
		END IF;
        IF (pactivo = 0) 
		THEN
			UPDATE USUARIO
					SET
						activo = 1
					WHERE
						email 	= pemail ;

					SELECT rol, tipousuario, id_usuario, nombreusuario, nombres, apellidos FROM USUARIO WHERE email = pemail;
                    
				
		END IF;
    END IF;
    
IF (busqueda_Cuenta = 0)
	THEN
		set v_buscaremail = (SELECT COUNT(email) FROM USUARIO WHERE email = pemail);
        set v_buscarpasword = (SELECT COUNT(contrasena) FROM USUARIO WHERE  contrasena = pcontrasena);
        
        if ( v_buscaremail = 1 && v_buscarpasword = 0)
			then
				set mensaje = "Contraseña incorrecta";
                select mensaje as Mensaje;
            end if;
		if ( v_buscaremail = 0 )
			then
				set mensaje = "Email incorrecto";
                select mensaje as Mensaje;
            end if;
        
    END IF;
END$$

DROP procedure IF EXISTS sp_GestionCategorias;
DELIMITER $$
 CREATE PROCEDURE sp_GestionCategorias(
	opc							varchar(30),
	pid_categoria				int,
    pnombre						varchar(50)	,
    pcreador					int,
    pdescripcion				varchar(100)
	)
BEGIN
    DECLARE busqueda_Categoria INT; DECLARE v_buscarcat int ;
SET v_buscarcat = (SELECT Count(pnombre) FROM CATEGORIA WHERE nombre = pnombre);
	
    
    if(opc='Crear')
    then
		 IF (v_buscarcat = 0) 
		THEN
			INSERT INTO CATEGORIA ( nombre, creador, descripcion, fechahoracreacion)
			VALUES( pnombre, pcreador, pdescripcion,  (SELECT DATE(NOW())));
            set opc = "Se registro con exito";
            SELECT pnombre as Categoria, opc as Mensaje;
		END IF;
        IF (v_buscarcat = 1) 
		THEN
			set opc = "Categoria existente";
           SELECT pnombre as Categoria, opc as Mensaje;
		END IF;
	end if;
    
	
    if(opc='Actualizar')
    then
    		UPDATE CATEGORIA
			SET
                nombre 		= pnombre, 
                descripcion	= pdescripcion
		WHERE
			id_categoria = pid_categoria ;
    end if;
    
	
END$$

INSERT INTO CATEGORIA ( nombre, creador, descripcion, fechahoracreacion)
			VALUES( '2', 1, '3',  (SELECT DATE(NOW())));
select * from categoria
call sp_GestionCategorias('Crear', null, '6', 1, '3');
#2. Vendedor - Gestion de los productos
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