



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
    UNIQUE (e_mail, cpf_cnpj, telefone)
);



CREATE TABLE imovel (
    cod Int PRIMARY KEY UNIQUE auto_increment,
    cod_finalidade Int not null,
    cod_tipo Int not null,
    cod_bairro Int not null,
    cod_empresa Int not null,
    logradouro varchar(80) not null,
    numero int not null,
    complemento varchar(40),
    cep char(9) not null,
    m2 int not null,
    quartos int not null,
    vagas int not null,
    valor numeric (12,2) not null,
    obs varchar(255),
    desativacao date,
    foto varchar(2500)
);
 


CREATE TABLE finalidade (
    cod Int PRIMARY KEY auto_increment,
    descricao varchar(40) not null,
    UNIQUE (descricao)
);



CREATE TABLE tipo (
    cod Int PRIMARY KEY auto_increment,
    descricao varchar(40) not null,
    UNIQUE (descricao)
);


CREATE TABLE bairro (
    cod int PRIMARY KEY auto_increment,
    bairro varchar(40) not null,
    cod_cidade Int not null,
    UNIQUE (bairro)
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
    



 create view view_agendamento as
 select a.cod, u.cod as cod_usuario, u.nome , a.data, h.horario, ci.cod as 'cod_imovel', ci.logradouro, ci.numero, ci.complemento, b.bairro, c.cidade, a.horario_cancelamento, a.data_cancelamento, c.uf, t.descricao as tipo, f.descricao as finalidade
from agendamento a
inner join usuario u 
on u.cod = a.cod_usuario
inner join horario h
on h.cod =a.cod_horario
inner join imovel ci
on ci.cod = a.cod_imovel
inner join bairro b
on b.cod = ci.cod_bairro
inner join cidade c
on c.cod = b.cod_cidade
inner join tipo t
on t.cod = ci.cod_tipo
inner join finalidade f
on f.cod = ci.cod_finalidade;

select * from view_agendamento where data <CURDATE();

 create view view_imoveis as
select i.cod, f.descricao as 'finalidade', t.descricao as 'tipo', i.m2, i.quartos, i.vagas, i.valor, i.obs, i.foto, i.logradouro, i.numero, i.complemento, b.bairro, c.cidade, i.cep, i.desativacao
from imovel i
inner join finalidade f 
on f.cod = i.cod_finalidade
inner join tipo t
on t.cod = i.cod_tipo
inner join bairro b
on b.cod = i.cod_bairro
inner join cidade c
on c.cod = b.cod_cidade;

select * from view_imoveis;

create view view_favoritos as
select fav.cod_imovel, f.descricao as 'finalidade', t.descricao as 'tipo', i.m2, i.quartos, i.vagas, i.valor, i.obs, i.foto, i.logradouro, i.numero, i.complemento, b.bairro, c.cidade, i.desativacao, i.cep, fav.cod, fav.cod_usuario, u.nome, u.telefone, u.e_mail
from favorito fav
inner join usuario u
on u.cod = fav.cod_usuario
inner join imovel i
on i.cod = fav.cod_imovel
inner join finalidade f 
on f.cod = i.cod_finalidade
inner join tipo t
on t.cod = i.cod_tipo
inner join bairro b
on b.cod = i.cod_bairro
inner join cidade c
on c.cod = b.cod_cidade;
SELECT * from bairro;

