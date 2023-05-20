 drop database imobiliaria;
drop table agendamento; 
create database imobiliaria;

use imobiliaria;

CREATE TABLE empresa (
cod Int PRIMARY KEY auto_increment,
nome varchar(80) not null
);

CREATE TABLE usuario (
    cod Int PRIMARY KEY auto_increment,
    cod_empresa Int not null,
    nome varchar(80) not null,
    cpf_cnpj varchar(20) not null,
    telefone varchar(20) not null,
    e_mail varchar(80) not null,
    senha varchar(100) not null,
    perfil enum("a","u") not null default "u",
    UNIQUE (cod, e_mail, cpf_cnpj, telefone)
);



CREATE TABLE imovel (
    cod Int PRIMARY KEY UNIQUE auto_increment,
    cod_finalidade Int not null,
    cod_tipo Int not null,
    cod_bairro Int not null,
    cod_empresa Int not null,
    logradouro varchar(80),
    numero int,
    complemento varchar(40),
    cep char(9),
    m2 int,
    quartos int,
    vagas int,
    valor numeric(12,2),
    obs varchar(255),
    desativacao date,
    foto varchar(250)
);
 


CREATE TABLE finalidade (
    cod Int PRIMARY KEY auto_increment,
    descricao varchar(40)
);



CREATE TABLE tipo (
    cod Int PRIMARY KEY auto_increment,
    descricao varchar(40)
);


CREATE TABLE bairro (
    cod int PRIMARY KEY auto_increment,
    bairro varchar(40),
    cod_cidade Int not null,
    UNIQUE (cod, bairro)
);


CREATE TABLE cidade (
    cod Int PRIMARY KEY auto_increment,
    uf varchar(2) not null,
    Cidade varchar(80) not null,
    UNIQUE (uf, Cidade)
);



CREATE TABLE favorito (
    cod Int PRIMARY KEY auto_increment,
    cod_imovel Int not null,
    cod_usuario Int not null
);
 

CREATE TABLE horario (
    cod Int PRIMARY KEY auto_increment,
    descricao varchar(20) not null,
    horario time not null,
    ativo enum("s","n") not null default "s"
);

/* brModelo: */

CREATE TABLE agendamento (
    cod Int PRIMARY KEY auto_increment,
    cod_imovel Int not null,
    cod_usuario Int not null,
    data date ,
    data_cancelamento date,
    cod_horario Int not null,
    horario_cancelamento time,
    obs varchar (255)
);
 
 ALTER TABLE bairro ADD CONSTRAINT fk_bairro_cidade
    FOREIGN KEY (cod_cidade)
    REFERENCES cidade(cod);

ALTER TABLE usuario ADD CONSTRAINT fk_usuario_empresa
	FOREIGN KEY (cod_empresa)
	REFERENCES empresa(cod);    
    
ALTER TABLE imovel ADD CONSTRAINT fk_imovel_empresa
	FOREIGN KEY (cod_empresa)
	REFERENCES empresa(cod);
    
ALTER TABLE imovel ADD CONSTRAINT fk_imovel_tipo
	FOREIGN KEY (cod_tipo)
	REFERENCES tipo(cod);

ALTER TABLE imovel ADD CONSTRAINT fk_imovel_finalidade
	FOREIGN KEY (cod_finalidade)
	REFERENCES finalidade(cod);
 
ALTER TABLE imovel ADD CONSTRAINT fk_imovel_bairro
	FOREIGN KEY (cod_bairro)
	REFERENCES bairro(cod);
    
ALTER TABLE favorito ADD CONSTRAINT fk_favorito_imovel
	FOREIGN KEY (cod_imovel)
	REFERENCES imovel(cod);
    
ALTER TABLE favorito ADD CONSTRAINT fk_favorito_usuario
	FOREIGN KEY (cod_usuario)
	REFERENCES usuario(cod);

ALTER TABLE agendamento ADD CONSTRAINT fk_agendamento_usuario
	FOREIGN KEY (cod_usuario)
	REFERENCES usuario(cod);  
    
ALTER TABLE agendamento ADD CONSTRAINT fk_agendamento_imovel
	FOREIGN KEY (cod_imovel)
	REFERENCES imovel(cod);
    
insert into empresa (nome) values ('Gadri Imóveis');    
    

insert into finalidade (descricao) values
('venda'), ('locação');

select * from finalidade;

insert into tipo (descricao) values
('casa residencial'), ('sala comercial'), ('apartamento'), ('terreno');


select * from tipo;

insert into cidade (uf, cidade) values
('PR', 'Curitiba'), ('PR', 'Pinhais');

select* from cidade;


insert into bairro (bairro, cod_cidade) values
('Batel', 1), ('Boa Vista', 1),
('Bom Retiro', 1), ('Centro', 1),
('Centro Cívico', 1), ( 'Juveve', 1),
( 'Rebouças', 1), ('Alto Tarumã', 2);

select * from bairro;

insert into imovel 
(cod_finalidade, cod_tipo, cod_bairro, logradouro, numero, complemento, cep, m2, quartos, vagas, valor, foto, cod_empresa)
values
( 1, 1, 3, 'Rua Casinha Bonita', 123, null, '53800-333', 110, 3, 2, 500000.00, "202201-1.jpg", 1),
( 1, 3, 4, 'Rua cachorrinho feliz', 577, null, '50400-222', 65, 2, 1, 300000.00, "202202-1.jpg", 1),
( 2, 2, 1, 'Av fulaninho de tal', 281, null, '80300-300', 30, 1, 1, 2000.00, "202203-1.jpg", 1),
( 1, 3, 8, 'Av Predinho Show', 1684, 'ap 212', '81200-000', 40, 1, 1, 350000.00, "202204-1.jpg", 1),
( 1, 2, 4, 'Rua Cachinhos Dourados', 12, null, '36470-800', 70, 0, 4, 950000.00, "202205-1.jpg", 1),
( 2, 1, 2, 'Rua Ciclano Legal', 1205, null, '51560-400', 35, 1, 0, 1300.00, "202206-1.jpg", 1),
( 2, 1, 5, 'Av Chico Bananinha', 559, null, '85400-000', 55, 2, 2, 2500.00, "202207-1.jpg", 1),
( 1, 4, 7, 'Rua Cansadinha da Silva', 386, null, '40002-040', 100, null, null, 500000.00, "202208-1.jpg", 1),
( 2, 3, 6, 'Rua Angelo Tolotti', 10, 'ap 718', '89220-444', 50, 2, 1, 1900.00, "202209-1.jpg", 1),
( 1, 4, 3, 'Rua Amendoim Salgado', 2587, null, '36400-080', 60, null, null, 400000.00, "202210-1.jpg", 1);


select * from imovel;

insert into usuario
(nome, e_mail, senha, perfil, telefone, cpf_cnpj, cod_empresa)
values
( 'Gadri', 'contato@gadri.com.br', 'admin', 'a', '+55 (41) 99999-9999', '00.000.000/0000-00', 1);


insert into usuario
(nome, e_mail, senha, telefone, cpf_cnpj, cod_empresa)
values
('Arnaldo Pacheco', 'arnaldopacheco@hotmail.com', 'padrao','+55 (41) 99999-9999','000.000.000-00', 1),
('Angelo Tolotti', 'angelotolotti@gmail.com', 'padrao','+55 (41) 99999-9999','000.000.000-00', 1),
('Beatriz Fonseca', 'beatrizfonseca@hotmail.com', 'padrao','+55 (41) 99999-9999','000.000.000-00', 1),
( 'Fernanda Castro', 'fernandacastro@gmail.com', 'padrao','+55 (41) 99999-9999','000.000.000-00', 1),
('Bruna Prado', 'brunaprado@hotmail.com', 'padrao','+55 (41) 99999-9999','000.000.000-00', 1),
('Everton Dantas', 'evertondantas@gmail.com', 'padrao','+55 (41) 99999-9999','000.000.000-00', 1),
('Gabriel Coelho', 'gabrielcoelho@hotmail.com', 'padrao','+55 (41) 99999-9999','000.000.000-00', 1),
('Giobana Macedo', 'giobanamacedo@gmail.com', 'padrao','+55 (41) 99999-9999','000.000.000-00', 1),
('Felipe Giordano', 'felipegiordano@hotmail.com', 'padrao','+55 (41) 99999-9999','000.000.000-00', 1),
('Juliana Freitas', 'julianafreitas@gmail.com', 'padrao','+55 (41) 99999-9999','000.000.000-00', 1),
('José Souza', 'josesouza@hotmail.com', 'padrao','+55 (41) 99999-9999','000.000.000-00', 1),
('Lucas Nascimento', 'lucasnascimento@gmail.com', 'padrao','+55 (41) 99999-9999','000.000.000-00', 1),
('Larissa Bittencourt', 'larissabittencourt@hotmail.com', 'padrao','+55 (41) 99999-9999','000.000.000-00', 1),
('Jessica Toledo', 'jessicatoledo@gmail.com', 'padrao','+55 (41) 99999-9999','000.000.000-00', 1),
('Matheus Vinicius', 'matheusvinicius@hotmail.com', 'padrao','+55 (41) 99999-9999','000.000.000-00', 1),
('Marcelo Fagundes', 'marcelofagundes@gmail.com', 'padrao','+55 (41) 99999-9999','000.000.000-00', 1),
('Rafaela Silva', 'rafaelasilva@hotmail.com', 'padrao','+55 (41) 99999-9999','000.000.000-00', 1),
('Rodolfo Castelo', 'rodolfocastelo@hotmail.com', 'padrao','+55 (41) 99999-9999','000.000.000-00', 1),
('Sara Botelho', 'sarabotelho@gmail.com', 'padrao','+55 (41) 99999-9999','000.000.000-00', 1),
('Vinicius Ramalho', 'viniciusramalho@hotmail.com', 'padrao','+55 (41) 99999-9999','000.000.000-00', 1);

select * from usuario;

insert into favorito (cod_usuario, cod_imovel) values
( 20, 3), (19, 2), (18, 2),
(16, 9), ( 20, 7), (20, 6),
( 12, 10), ( 13, 6), (13, 7),
( 1, 1), (1, 4), (5, 5);

insert into horario ( descricao, horario) values
('Úteis', '08:00:00'), ('Úteis', '10:00:00'), ( 'Úteis', '12:00:00'),
('Úteis', '14:00:00'), ('Úteis', '16:00:00'), ('Úteis', '18:00:00'),
('Úteis', '20:00:00'),('Domingos-Feriados', '08:00:00'), ('Domingos-Feriados', '10:00:00'),
( 'Domingos-Feriados', '12:00:00'), ('Domingos-Feriados', '14:00:00'), ( 'Domingos-Feriados', '16:00:00'),
('Domingos-Feriados', '18:00:00');
       
insert into agendamento (cod_imovel, cod_usuario, data, cod_horario)
values
(3, 20, '2022-06-08', 5 ),
(1, 19, '2022-06-10', 4 ),
(2, 18, '2022-06-07', 3 ),
(9, 17, '2022-06-08', 6),
(9, 16, '2022-06-06', 1),
(2, 15, '2022-06-07', 4),
(6, 13, '2022-06-04', 10),
(7, 13, '2022-06-08', 7),
(10, 12, '2022-06-09', 2),
(3, 11, '2022-06-09', 4),
(1, 10, '2022-06-05', 9),
(4, 2, '2022-06-11', 11),
(6, 11, '2022-06-10', 4),
(1, 1, '2022-06-11', 12),
( 4, 6, '2022-06-12', 10),
( 5, 5, '2022-06-10', 6),
( 8, 4, '2022-06-13', 2),
(6, 20, '2022-06-14', 3),
( 7, 20, '2022-06-14', 4),
( 1, 19, '2022-06-17', 4),
( 3, 2, '2022-06-15', 7),
( 3, 3, '2022-06-16', 12),
( 2, 5, '2022-06-18', 10),
( 4, 5, '2022-06-17', 6),
( 2, 15, '2022-06-17', 7);

 