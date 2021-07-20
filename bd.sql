drop database if exists cesfam;
create database cesfam;
use cesfam;


create table usuario(
    rut varchar(20),
    nombre varchar(50),
    apellido varchar(50),
    rol varchar(20), -- Administrativo | Operativo
    clave varchar(100),
    telefono varchar(20),
    primary key(rut)
);
			    /* RUT       Contrasenapara ambos:123 */
insert into usuario values('admin', 'Felipe','Carreno', 'administrativo', md5('123') ,123456);
insert into usuario values('1-1', 'Jonathan','Valenzuela','operativo', md5('123') ,1321123);


create table paciente(
    rut_paciente varchar(20),
    nombre_paciente varchar(50),
    direccion_paciente varchar(100),
    telefono_paciente varchar(20),
    fecha_creacion date,
    email_paciente varchar(50),
    primary key(rut_paciente)
);

create table receta(
    id_receta int auto_increment,
    rut_paciente varchar(50),
    fecha_visita date,
    observacion varchar(200),
    sintomas varchar(200),
    rut_operativo varchar(50),
    medicamentos varchar(100),
    diagnostico varchar(200),
    
    primary key(id_receta),
    foreign key(rut_paciente) references paciente(rut_paciente) on delete set null,
    foreign key(rut_operativo) references usuario(rut) on delete set null
    
);

create table informatico(
    rut varchar(20),
    nombre varchar(50),
    clave varchar(100),
    primary key(rut)
);

INSERT INTO informatico VALUES("0-0","Informatico",md5("123456"));
















