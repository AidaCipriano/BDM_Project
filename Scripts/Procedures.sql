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

		SELECT nombres, apellidos, imagen FROM usuario where pid_usuario = id_usuario;

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
    
	if(opc='Ver')
    then
		select c.id_categoria as id_categoria, c.nombre as nombre , c.creador as creador, c.descripcion as descripcion, u.nombreusuario as nombreusuario
        from categoria c
         inner join usuario u
			on u.id_usuario = c.creador
        where pcreador = creador;
    end if;
        
    if(opc='Editar Categoria')
    then
		SELECT id_categoria, nombre, creador, descripcion, fechahoracreacion FROM categoria where id_categoria = pid_categoria;
    end if;
END$$

DROP procedure IF EXISTS sp_Gestion;
DELIMITER $$
 CREATE PROCEDURE sp_Gestion(
	opc							varchar(30),
    pid_usuario				varchar(50)	
	)
BEGIN
	if(opc='Mis Categorias')
    then
		select c.id_categoria as id_categoria, c.nombre as nombre , c.creador as creador, c.descripcion as descripcion, date(c.fechahoracreacion) as creacion, u.nombreusuario as nombreusuario, concat(u.nombres, ' ', u.apellidos) as nombrecompleto
        from categoria c
         inner join usuario u
			on u.id_usuario = c.creador
        where pid_usuario = u.id_usuario;
    end if;
    if(opc='Editar Perfil')
    then
		SELECT nombres, apellidos, email, nombreusuario, contrasena, genero, nacimiento, imagen, id_usuario FROM usuario where id_usuario = pid_usuario;
    end if;
END$$


INSERT INTO CATEGORIA ( nombre, creador, descripcion, fechahoracreacion)
			VALUES( '2', 1, '3',  (SELECT DATE(NOW())));
select * from categoria
call sp_GestionCategorias('Ver', null, null, 1, null);
#2. Vendedor - Gestion de los productos
DROP procedure IF EXISTS sp_GestionProductos;
DELIMITER $$
 CREATE PROCEDURE sp_GestionProductos(
	opc							varchar(30),
	pid_producto_vendedor		int ,
	pvendedor  					int,
    pnombre						varchar(100),
    pcosto						decimal	(10,2),
    pdescripcion				varchar(300),
    pcantidad_disponible		int,
	pcotizacion					bit,
	pventa						bit,
	pcategoria					int
	)
BEGIN
DECLARE busqueda_producto INT;

	SET busqueda_producto =  (SELECT COUNT(id_producto_vendedor) FROM PRODUCTO_VENDEDOR WHERE nombre = pnombre and pvendedor = vendedor);
    
	if(opc='Crear')
    then
		if (busqueda_producto= 0)
        then
			INSERT INTO PRODUCTO_VENDEDOR (vendedor, nombre, costo, descripcion, activo, fecha_creacion, cantidad_disponible, cotizacion, venta, categoria)
			VALUES(pvendedor, pnombre, pcosto, pdescripcion, 1,  (SELECT DATE(NOW())), pcantidad_disponible, pcotizacion, pventa, pcategoria);
		end if;
        
         if(busqueda_producto= 1)
		then
			set opc = "El producto ya existe";
             SELECT pnombre as Producto, opc as Mensaje;
        end if;
	end if;
	
    if(opc='Actualizar')
    then
    		UPDATE PRODUCTO_VENDEDOR
			SET
                nombre	= pnombre, 
                costo	= pcosto, 
                descripcion		= pdescripcion, 
                cantidad_disponible		= pcantidad_disponible, 
                cotizacion	= pcotizacion, 
                venta		= pventa,
                categoria = pcategoria
		WHERE
			id_producto_vendedor = pid_producto_vendedor ;
    end if;
    
	if(opc='Dar de baja')
    then
    		UPDATE PRODUCTO_VENDEDOR
			SET
                activo	= 0
		WHERE
			id_producto_vendedor = pid_producto_vendedor ;
	
    end if;
    	if(opc='Ver')
    then
		select pv.id_producto_vendedor as id_producto_vendedor, pv.nombre as nombre , pv.vendedor as vendedor, pv.costo as costo, pv.descripcion as descripcion, pv.cantidad_disponible as cantidad_disponible,
        pv.cotizacion as cotizacion, pv.venta as venta, pv.categoria as categoria,  u.nombreusuario as nombreusuario
        from PRODUCTO_VENDEDOR pv 
         inner join usuario u
			on u.id_usuario = c.creador
        where pcreador = creador;
    end if;
        
    if(opc='Editar Producto')
    then
		SELECT *  FROM PRODUCTO_VENDEDOR where id_producto_vendedor = pid_producto_vendedor;
    end if;
END$$
call sp_GestionProductos('Crear', null, 1, '2', '1', '1', 1, 1, 1, 1);

