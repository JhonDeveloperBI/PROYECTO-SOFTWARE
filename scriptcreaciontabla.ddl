-- Generado por Oracle SQL Developer Data Modeler 4.1.3.901
--   en:        2016-10-16 20:35:10 COT
--   sitio:      Oracle Database 11g
--   tipo:      Oracle Database 11g




CREATE TABLE Administrador
  (
    id       INTEGER NOT NULL ,
    nombre   VARCHAR2 (255) ,
    username VARCHAR2 (255) NOT NULL ,
    telefono VARCHAR2 (255) ,
    correo   VARCHAR2 (255) ,
    password VARCHAR2 (255)
  ) ;
ALTER TABLE Administrador ADD CONSTRAINT Administrador_PK PRIMARY KEY ( id ) ;


CREATE TABLE CalificacionEstablecimiento
  (
    idCalificacion     INTEGER NOT NULL ,
    puntoscalificacion INTEGER ,
    comentario         VARCHAR2 (255) ,
    Establecimiento    INTEGER NOT NULL
  ) ;
ALTER TABLE CalificacionEstablecimiento ADD CONSTRAINT Calificacion_PK PRIMARY KEY ( idCalificacion ) ;


CREATE TABLE Establecimientos
  (
    idEstablecimiento INTEGER NOT NULL ,
    nombre            VARCHAR2 (255) ,
    direccion         VARCHAR2 (255) ,
    telefono          VARCHAR2 (255) ,
    descripcion       VARCHAR2 (255) ,
    UbicacionGps      VARCHAR2 (255) ,
    Administrador     INTEGER NOT NULL
  ) ;
ALTER TABLE Establecimientos ADD CONSTRAINT Establecimientos_PK PRIMARY KEY ( idEstablecimiento ) ;


CREATE TABLE Usuario
  (
    idusuario     INTEGER NOT NULL ,
    nombre        VARCHAR2 (255) ,
    correo        VARCHAR2 (255) ,
    password      VARCHAR2 (255) ,
    Administrador INTEGER NOT NULL
  ) ;
ALTER TABLE Usuario ADD CONSTRAINT Usuarios_PK PRIMARY KEY ( idusuario ) ;


ALTER TABLE CalificacionEstablecimiento ADD CONSTRAINT Califica_Establecimientos_FK FOREIGN KEY ( Establecimiento ) REFERENCES Establecimientos ( idEstablecimiento ) ;

ALTER TABLE Establecimientos ADD CONSTRAINT Esta_Admin_FK FOREIGN KEY ( Administrador ) REFERENCES Administrador ( id ) ;

ALTER TABLE Usuario ADD CONSTRAINT Usuario_Administrador_FK FOREIGN KEY ( Administrador ) REFERENCES Administrador ( id ) ;


-- Informe de Resumen de Oracle SQL Developer Data Modeler: 
-- 
-- CREATE TABLE                             4
-- CREATE INDEX                             0
-- ALTER TABLE                              7
-- CREATE VIEW                              0
-- ALTER VIEW                               0
-- CREATE PACKAGE                           0
-- CREATE PACKAGE BODY                      0
-- CREATE PROCEDURE                         0
-- CREATE FUNCTION                          0
-- CREATE TRIGGER                           0
-- ALTER TRIGGER                            0
-- CREATE COLLECTION TYPE                   0
-- CREATE STRUCTURED TYPE                   0
-- CREATE STRUCTURED TYPE BODY              0
-- CREATE CLUSTER                           0
-- CREATE CONTEXT                           0
-- CREATE DATABASE                          0
-- CREATE DIMENSION                         0
-- CREATE DIRECTORY                         0
-- CREATE DISK GROUP                        0
-- CREATE ROLE                              0
-- CREATE ROLLBACK SEGMENT                  0
-- CREATE SEQUENCE                          0
-- CREATE MATERIALIZED VIEW                 0
-- CREATE SYNONYM                           0
-- CREATE TABLESPACE                        0
-- CREATE USER                              0
-- 
-- DROP TABLESPACE                          0
-- DROP DATABASE                            0
-- 
-- REDACTION POLICY                         0
-- 
-- ORDS DROP SCHEMA                         0
-- ORDS ENABLE SCHEMA                       0
-- ORDS ENABLE OBJECT                       0
-- 
-- ERRORS                                   0
-- WARNINGS                                 0
