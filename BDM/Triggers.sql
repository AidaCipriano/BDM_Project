#USE BD_BDM;

#Triggers

#1. Inscripcion
DROP TRIGGER IF EXISTS Evento_Inscripcion;
DELIMITER $$
CREATE TRIGGER Evento_Inscripcion 
AFTER INSERT ON REGISTRO_CURSO_ALUMNO FOR EACH ROW
BEGIN
		declare pCurso int;
			set pCurso = (select MAX(CURSO) from REGISTRO_CURSO_ALUMNO);        
    
		INSERT INTO CURSO_INSTRUCTOR_ALUMNO(ID_CURSO_INSTRUCTOR_ALUMNO, ALUMNO, CURSO, FECHA_INSCRIPCION, FECHA_FINALIZACION, ESTADO)
			VALUES(new.ID_REGISTRO_CURSO_ALUMNO, new.ALUMNO, new.CURSO, new.FECHA_INSCRIPCION, null,  "Incompleto");
        INSERT INTO INFO_CURSO_ALUMNO(ID_CURSO_ALUMNO, ALUMNO, CURSO, PROGRESO, FECHA_INSCRIPCION, FECHA_FINALIZACION, ESTATUS, FORMA_PAGO,  ULTIMA_VISITA, ULTIMONIVEL_COMPLETADO)
			VALUES(new.ID_REGISTRO_CURSO_ALUMNO, new.ALUMNO, new.CURSO, 0,  new.FECHA_INSCRIPCION, null, 'Incompleto', new.FORMA_PAGO,  (SELECT NOW()), NULL );
		
		INSERT INTO CURSOCOMPRADO_ALUMNO(ID_CURSOCOMPRADO_ALUMNO, INSTRUCTOR, NOMBRE, COSTO, DESCRIPCION, IMAGEN, ACTIVO)
		SELECT  ID_CURSO_INSTRUCTOR, INSTRUCTOR, NOMBRE, COSTO, DESCRIPCION, IMAGEN, ACTIVO
		FROM CURSO_INSTRUCTOR                                                           
			WHERE CURSO = pCurso;
		
        INSERT INTO NIVELCOMPRADO_ALUMNO(ID_NIVELCOMPRADO_ALUMNO, CURSO, NUMERO_NIVEL, TITULO, DESCRIPCION, VIDEO, CONTENIDO_ADICIONAL, COSTO)            
		SELECT  ID_NIVEL, CURSO, NUMERO_NIVEL, TITULO, DESCRIPCION, VIDEO, CONTENIDO_ADICIONAL, COSTO
		FROM NIVEL_INSTRUCTOR                                                            
			WHERE CURSO = pCurso
			ORDER BY NUMERO_NIVEL;
			
END$$ ;

#2. CREACION INFORMACION NIVELES ALUMNO 
DROP TRIGGER IF EXISTS Evento_NivelesAlumno;
DELIMITER $$
CREATE TRIGGER Evento_NivelesAlumno 
AFTER INSERT ON INFO_CURSO_ALUMNO FOR EACH ROW
BEGIN
	declare pCurso int;
    set pCurso = (select MAX(ID_CURSO_ALUMNO) from INFO_CURSO_ALUMNO);
	
    INSERT INTO INFO_NIVEL_ALUMNO( NIVEL, ESTATUS, CURSO)
	SELECT  NUMERO_NIVEL, 'Incompleto', CURSO
		FROM NIVELCOMPRADO_ALUMNO                                                               
			WHERE CURSO = pCurso
			ORDER BY NUMERO_NIVEL;
        
	
END$$ ;
 

#3. Finalizacion de Curso
DROP TRIGGER IF EXISTS Evento_CursoCompletado;
DELIMITER $$
CREATE TRIGGER Evento_CursoCompletado after update on INFO_CURSO_ALUMNO 
for each row begin 
	  
    declare cursostotal int;
	declare cursoscompletados int;
    declare pAlumno int;
    declare pCurso int;
    
    set pAlumno = (select ALUMNO from INFO_CURSO_ALUMNO);
    set pCurso = (select CURSO from INFO_CURSO_ALUMNO);
    
    set cursostotal = (SELECT COUNT(NIVEL) FROM INFO_NIVEL_ALUMNO N inner join INFO_CURSO_ALUMNO INF ON N.CURSO=INF.ID_CURSO_ALUMNO 
      WHERE INF.ALUMNO = pAlumno);
	set cursoscompletados =  (SELECT COUNT(NIVEL) FROM INFO_NIVEL_ALUMNO N inner join INFO_CURSO_ALUMNO INF ON N.CURSO=INF.ID_CURSO_ALUMNO 
      WHERE INF.ALUMNO = pAlumno and N.ESTATUS='Completado');
      
    
    if(cursostotal=cursoscompletados)
   then
		UPDATE INFO_CURSO_ALUMNO set FECHA_FINALIZACION = (SELECT DATE(NOW())),  ESTATUS = 'Completado. Diploma Entregado.';
		Update CURSO_INSTRUCTOR_ALUMNO set FECHA_FINALIZACION = (SELECT DATE(NOW())), ESTADO = 'Completado. Diploma Entregado.';
        
        INSERT INTO COMENTARIOS( FECHAHORA_CREACION, ALUMNO, CALIFICACION, CURSO, NOTIFICACION)
			VALUES(NULL, pAlumno, null,  Curso, '¡Felicidades! Ahora puedes calificar nuestro curso.' ); 
        
        call sp_Diploma(pAlumno, pCurso);
   end if;
end$$

