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