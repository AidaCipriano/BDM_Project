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
	pgenero					varchar(10)		,
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
			END IF;

			IF(prol!='Administrador')
			THEN
				INSERT INTO USUARIO (nombres, apellidos, genero, nacimiento, email, nombreusuario, contrasena, tipousuario, rol, fecharegistro, ultimamodicacion, imagen, activo, administrador)
				VALUES 				(pnombres, papellidos, pgenero, pnacimiento, pemail, pnombreusuario, pcontrasena, ptipousuario, prol, (SELECT NOW()), (SELECT NOW()), pimagen, 1, 0);
			END IF;
			
			
			
		END IF;
        
        IF (v_buscaremail = 1) 
		THEN
				UPDATE USUARIO
					SET
						activo = 1
					WHERE
						id_usuario 	= pid_usuario ;
				set opc='Cuenta activa. Inicie sesion.';
		END IF;

	end if;
	
    if(opc='Actualizar')
    then
    		UPDATE USUARIO
			SET
				nombres				= 	pnombres,
				apellidos			= 	papellidos,
				genero				= 	pgenero,
				nacimiento			= 	pnacimiento,
				email				= 	pemail,
				contrasena			= 	pcontrasena,
				ultimamodicacion	= 	(SELECT NOW()),
				imagen				=	pimagen	
		WHERE
			id_usuario 	= pid_usuario ;
    end if;
	
    if(opc='Dar de baja')
    then
		UPDATE USUARIO
			SET
				activo = 0
			WHERE
				id_usuario 	= pid_usuario ;
    end if;
END$$

#Iniciar sesion
DROP procedure IF EXISTS sp_Inicio_Sesion;
DELIMITER $$
 CREATE PROCEDURE sp_Inicio_Sesion(
	IN pemail					VARCHAR(50)		,
	IN pcontrasena				VARCHAR(20)	,	
    OUT prol VARCHAR(50)
	) 
BEGIN
	DECLARE busqueda_Cuenta INT; DECLARE v_buscaremail int ; DECLARE v_buscarpasword VARCHAR(20) ; DECLARE v_id INT; DECLARE intentos tinyint;
    declare pactivo bit;
	SET busqueda_Cuenta =  (SELECT COUNT(id_usuario) FROM USUARIO WHERE email = pemail AND contrasena = pcontrasena);
    SET pactivo = (SELECT activo FROM USUARIO WHERE email = pemail);

 IF (busqueda_Cuenta = 1) 
    THEN
		IF (pactivo = 1) 
		THEN
			SET prol = (SELECT rol FROM USUARIO WHERE email = pemail);
		END IF;
        IF (pactivo = 0) 
		THEN
			SET prol = "Cuenta enexistente. Favor de registrarse";
		END IF;
    END IF;
    

END$$
