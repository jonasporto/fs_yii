/*estabelecimento
	nome,
	descrição

---------------------

clientes
	nome
	data nascimento

---------------------

	endereco
		logradouro,
		complemento,
		numero,
		cidade,
		estado,
		cep,

	telefone
		ddd
		numero

	email
		endereco

---------------------


cadastro de estabelecimentos
cadastro de clientes

listar estabelecimentos,
mostrar clientes do estabelecimentos
desvincular cliente do estabelecimento.

listar clientes,
mostrar estabelecimentos do cliente.
desvincular estabelecimento do cliente.


*/
/* schema */

CREATE SEQUENCE yii_estabelecimento_id_sq;

CREATE TABLE yii_estabelecimentos(
	id INTEGER PRIMARY KEY DEFAULT nextval('yii_estabelecimento_id_sq'),
	nome VARCHAR(40) NOT NULL,
	descricao VARCHAR(255) NOT NULL
);

CREATE SEQUENCE yii_cliente_id_sq;

CREATE TABLE yii_clientes(
	id INTEGER PRIMARY KEY DEFAULT nextval('yii_cliente_id_sq'),
	nome VARCHAR(40) NOT NULL,
	data_nascimento DATE NOT NULL
);

CREATE SEQUENCE yii_endereco_id_sq;

CREATE TABLE yii_enderecos(
	id INTEGER PRIMARY KEY DEFAULT nextval('yii_endereco_id_sq'),
	logradouro VARCHAR(40) NOT NULL,
	complemento VARCHAR(255),
	numero INTEGER,
	cidade VARCHAR(40) NOT NULL,
	estado VARCHAR(40) NOT NULL,
	cep INTEGER
);

CREATE SEQUENCE yii_cliente_endereco_id_sq;

CREATE TABLE yii_cliente_enderecos(
	id INTEGER PRIMARY KEY DEFAULT nextval('yii_cliente_endereco_id_sq'),
	cliente_id INTEGER NOT NULL,
	endereco_id INTEGER UNIQUE NOT NULL
);

ALTER TABLE yii_cliente_enderecos ADD CONSTRAINT cliente_id_fk FOREIGN KEY (cliente_id) REFERENCES yii_clientes (id);
ALTER TABLE yii_cliente_enderecos ADD CONSTRAINT endereco_id_fk FOREIGN KEY (endereco_id) REFERENCES yii_enderecos (id);


CREATE SEQUENCE yii_estabelecimento_endereco_id_sq;

CREATE TABLE yii_estabelecimento_enderecos(
	id INTEGER PRIMARY KEY DEFAULT nextval('yii_estabelecimento_endereco_id_sq'),
	estabelecimento_id INTEGER NOT NULL,
	endereco_id INTEGER UNIQUE NOT NULL
);

ALTER TABLE yii_estabelecimento_enderecos ADD CONSTRAINT estabelecimento_id_fk FOREIGN KEY (estabelecimento_id) REFERENCES yii_estabelecimentos (id);
ALTER TABLE yii_estabelecimento_enderecos ADD CONSTRAINT endereco_id_fk FOREIGN KEY (endereco_id) REFERENCES yii_enderecos (id);


CREATE SEQUENCE yii_telefone_id_sq;

CREATE TABLE yii_telefones(
	id INTEGER PRIMARY KEY DEFAULT nextval('yii_telefone_id_sq'),
	ddd INTEGER NOT NULL,
	numero INTEGER NOT NULL
);

CREATE SEQUENCE yii_cliente_telefone_id_sq;

CREATE TABLE yii_cliente_telefones(
	id INTEGER PRIMARY KEY DEFAULT nextval('yii_cliente_telefone_id_sq'),
	cliente_id INTEGER NOT NULL,
	telefone_id INTEGER UNIQUE NOT NULL
);


ALTER TABLE yii_cliente_telefones ADD CONSTRAINT cliente_id_fk FOREIGN KEY (cliente_id) REFERENCES yii_clientes (id);
ALTER TABLE yii_cliente_telefones ADD CONSTRAINT telefone_id_fk FOREIGN KEY (telefone_id) REFERENCES yii_telefones (id);

CREATE SEQUENCE yii_estabelecimento_telefone_id_sq;

CREATE TABLE yii_estabelecimento_telefones(
	id INTEGER PRIMARY KEY DEFAULT nextval('yii_estabelecimento_telefone_id_sq'),
	estabelecimento_id INTEGER NOT NULL,
	telefone_id INTEGER UNIQUE NOT NULL
);


ALTER TABLE yii_estabelecimento_telefones ADD CONSTRAINT estabelecimento_id_fk FOREIGN KEY (estabelecimento_id) REFERENCES yii_estabelecimentos (id);
ALTER TABLE yii_estabelecimento_telefones ADD CONSTRAINT telefone_id_fk FOREIGN KEY (telefone_id) REFERENCES yii_telefones (id);


CREATE SEQUENCE yii_email_id_sq;

CREATE TABLE yii_emails(
	id INTEGER PRIMARY KEY DEFAULT nextval('yii_email_id_sq'),
	endereco VARCHAR(40) NOT NULL
);


CREATE SEQUENCE yii_cliente_email_id_sq;

CREATE TABLE yii_cliente_emails(
	id INTEGER PRIMARY KEY DEFAULT nextval('yii_cliente_email_id_sq'),
	cliente_id INTEGER NOT NULL,
	email_id INTEGER UNIQUE NOT NULL
);


ALTER TABLE yii_cliente_emails ADD CONSTRAINT cliente_id_fk FOREIGN KEY (cliente_id) REFERENCES yii_clientes (id);
ALTER TABLE yii_cliente_emails ADD CONSTRAINT email_id_fk FOREIGN KEY (email_id) REFERENCES yii_emails (id);


CREATE SEQUENCE yii_estabelecimento_email_id_sq;

CREATE TABLE yii_estabelecimento_emails(
	id INTEGER PRIMARY KEY DEFAULT nextval('yii_estabelecimento_email_id_sq'),
	estabelecimento_id INTEGER NOT NULL,
	email_id INTEGER UNIQUE NOT NULL
);


ALTER TABLE yii_estabelecimento_emails ADD CONSTRAINT estabelecimento_id_fk FOREIGN KEY (estabelecimento_id) REFERENCES yii_estabelecimentos(id);
ALTER TABLE yii_estabelecimento_emails ADD CONSTRAINT email_id_fk FOREIGN KEY (email_id) REFERENCES yii_emails (id);
