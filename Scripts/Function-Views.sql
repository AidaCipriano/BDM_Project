#Funciones
USE BD_BDM_project;
DROP FUNCTION IF EXISTS Imagen;
DELIMITER $$
CREATE FUNCTION Imagen(pcontenido longblob) RETURNS longblob
 DETERMINISTIC
BEGIN
	DECLARE pmin int; declare imagen longblob;
	 set pmin = (select MIN(id_imagen_producto)  from  imagen_producto i inner join PRODUCTO_VENDEDOR pv on i.producto = pv.id_producto_vendedor  where  pcontenido = i.contenido);
     set imagen = (select contenido from imagen_producto where id_imagen_producto = pmin);
     
	Return imagen ;
end ; $$

#Vistas
#1
/*DROP VIEW IF EXISTS TodosLosProductos;*/
CREATE VIEW TodosLosProductos AS
 SELECT 
 pv.nombre as nombre, pv.vendedor as vendedor, concat(u.nombres, ' ', u.apellidos) as nombrecompleto, pv.costo as costo, pv.descripcion as descripcion,
 pv.id_producto_vendedor as id
        
        FROM producto_vendedor pv
	inner join usuario u
		on u.id_usuario = pv.vendedor
        
        WHERE pv.activo = '1' ;
#2        
/*DROP VIEW IF EXISTS RecienLlegados;*/
CREATE VIEW RecienLlegados AS
 SELECT  
 pv.nombre as nombre, pv.vendedor as vendedor, concat(u.nombres, ' ', u.apellidos) as nombrecompleto, pv.costo as costo, pv.descripcion as descripcion,
 pv.id_producto_vendedor as id
        
        FROM producto_vendedor pv
	inner join usuario u
		on u.id_usuario = pv.vendedor
        
        WHERE pv.activo = '1' 
        order by pv.id_producto_vendedor desc limit 4;
        
CREATE VIEW CreadorCategoriaProductos AS
 SELECT 
    c.id_categoria as idcat, c.nombre as nombrecategoria, c.descripcion as descripcion, c.creador as idcreador, c.imagen as imagencategoria, 
    pv.id_producto_vendedor as idproducto, pv.nombre as nombreproducto, concat(u.nombres, ' ', u.apellidos) as nombrecompleto, pv.costo as costo
        
       FROM categoria c
        inner JOIN producto_vendedor pv
        	on pv.categoria = c.id_categoria
		inner join usuario u
			on u.id_usuario = c.creador
        
        WHERE pv.activo = '1' 
        ORDER BY pv.id_producto_vendedor;

CREATE VIEW RecienLlegados AS
 SELECT  
 pv.nombre as nombre, pv.vendedor as vendedor, concat(u.nombres, ' ', u.apellidos) as nombrecompleto, pv.costo as costo, pv.descripcion as descripcion,
 pv.id_producto_vendedor as id
        
        FROM producto_vendedor pv
	inner join usuario u
		on u.id_usuario = pv.vendedor
        
        WHERE pv.activo = '1' 
        order by pv.id_producto_vendedor desc limit 4;
        
CREATE VIEW CategoriaProductos AS
 SELECT 
     c.id_categoria as id_cat, c.id_categoria as idcat, c.nombre as nombrecategoria, pv.id_producto_vendedor as idproducto, pv.nombre as nombreproducto, 
     concat(u.nombres, ' ', u.apellidos) as nombrecompleto, pv.descripcion as descripcion, pv.costo as costo
        
       FROM producto_vendedor pv
        inner JOIN categoria c
        	on pv.categoria = c.id_categoria
	inner join usuario u
		on u.id_usuario = c.creador
        
        WHERE pv.activo = '1' 
        ORDER BY pv.id_producto_vendedor;