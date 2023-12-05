#USE BD_BDM;

#Funciones

#1. Progreso
DROP FUNCTION IF EXISTS Progreso;
DELIMITER $$
CREATE FUNCTION ProgresoCurso(progreso float) RETURNS float
 DETERMINISTIC
BEGIN
	declare cursostotal tinyint;
	declare cursoscompletados tinyint;
     
	set cursostotal = (SELECT COUNT(NIVEL) FROM INFO_NIVEL_ALUMNO N inner join INFO_CURSO_ALUMNO INF ON N.CURSO=INF.ID_CURSO_ALUMNO 
      WHERE progreso = INF.CURSO);
	set cursoscompletados =  (SELECT COUNT(INFO_NIVEL_ALUMNO) FROM INFO_NIVEL_ALUMNO where ESTATUS = 'Completado');
      
	set progreso = cursoscompletados / cursostotal;
	set progreso = progreso * 100;
	Return progreso ;
end ; $$


#2. Funcion Bloqueo Inicio Sesion
DROP FUNCTION IF EXISTS Bloqueo;
DELIMITER $$
CREATE FUNCTION Bloqueo(intentos tinyint) RETURNS tinyint
 DETERMINISTIC
BEGIN
	declare operacion tinyint;
    
    set operacion = operacion + 1;
    set intentos = operacion;
	
	Return intentos ;
end ; $$