--- DB CRUD_RECEIV SCRIPTS
--- BANCO crud_receiv
create table devedores (
	id integer primary key auto_increment not null,
	nome varchar(255) not null,
	cpf_cnpj varchar(255) not null,
	dt_nascimento date not null,
	endereco varchar(255) not null,
	created_at datetime,
	updated_at datetime
);

create table dividas (
	id integer primary key auto_increment not null,
	nome varchar(255) not null,
	descricao text,
	valor float not null,
	dt_vencimento date not null,
	devedor_id integer,
	created_at datetime,
	updated_at datetime
);

-- Relacionamento entre devedor e divida
alter table dividas add constraint fk_divida_devedor foreign key(devedor_id) references devedores(id);