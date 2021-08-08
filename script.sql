--- DB CRUD_RECEIV SCRIPTS
--- BANCO crud_receiv
create table devedores (
	id integer primary key auto_increment not null,
	nome varchar(255) not null,
	cpf_cnpj varchar(255) not null,
	dt_nascimento date not null,
	endereco varchar(255) null,
	descricao varchar(255) not null,
	valor float not null,
	dt_vencimento date not null,
	created_at datetime,
	updated_at datetime
);

