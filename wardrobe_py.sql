DROP VIEW IF EXISTS vw_qt_users_categories;

DROP VIEW IF EXISTS vw_qt_users_sizes;

DROP VIEW IF EXISTS vw_qt_users_clothes;

DROP TABLE IF EXISTS clothes;
DROP SEQUENCE IF EXISTS clothes_seq;

DROP TABLE IF EXISTS users;
DROP SEQUENCE IF EXISTS users_seq;

DROP TABLE IF EXISTS sizes;
DROP SEQUENCE IF EXISTS sizes_seq;

DROP TABLE IF EXISTS categories;
DROP SEQUENCE IF EXISTS categories_seq;

CREATE TABLE users (
  id serial primary key NOT NULL,
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  status int NOT NULL
);

CREATE SEQUENCE users_seq INCREMENT 1 MINVALUE 1 START 1;
ALTER TABLE users ALTER COLUMN id SET DEFAULT nextval('users_seq');

CREATE TABLE sizes (
  id serial primary key NOT NULL,
  name varchar(255) NOT NULL
);

CREATE SEQUENCE sizes_seq INCREMENT 1 MINVALUE 1 START 1;
ALTER TABLE sizes ALTER COLUMN id SET DEFAULT nextval('sizes_seq');

CREATE TABLE categories (
  id serial primary key NOT NULL,
  name varchar(255) NOT NULL
);

CREATE SEQUENCE categories_seq INCREMENT 1 MINVALUE 1 START 1;
ALTER TABLE categories ALTER COLUMN id SET DEFAULT nextval('categories_seq');

CREATE TABLE clothes (
  id serial primary key NOT NULL,
  description varchar(255) NOT NULL,
  status int NOT NULL,
  id_size int NOT NULL REFERENCES sizes(id),
  id_category int NOT NULL REFERENCES categories(id),
  id_user int NOT NULL REFERENCES users(id)
);

CREATE SEQUENCE clothes_seq INCREMENT 1 MINVALUE 1 START 1;
ALTER TABLE clothes ALTER COLUMN id SET DEFAULT nextval('clothes_seq');

INSERT INTO users (name, email, password, status) VALUES
('Isabela', 'isabela@teste.com', 'teste', 1);

INSERT INTO sizes (name) VALUES
('pp'),
('p'),
('m'),
('g'),
('gg'),
('unico'),
('36'),
('38'),
('40'),
('42'),
('44'),
('46');

INSERT INTO categories (name) VALUES
('blusa'),
('vestido'),
('calça'),
('saia'),
('bermuda'),
('short'),
('cropped'),
('pijama'),
('camisola');

INSERT INTO clothes (description, status, id_size, id_category, id_user) VALUES
('blusa dourada', 1, 2, 1, 1),
('blusa branca', 1, 3, 1, 1),
('vestido azul longo', 1, 6, 2, 1),
('blusa listrada', 1, 2, 1, 1),
('short azul com flores', 1, 2, 6, 1),
('vestido branco', 0, 2, 2, 1),
('calça preta jeans', 1, 9, 3, 1);

-- View que retorna a quantidade de categorias de roupas por usuário --

CREATE VIEW vw_qt_users_categories AS SELECT users.id AS user_id, users.name AS user_name, categories.name, COUNT(clothes.id_category) AS qt_categoria 
FROM users, categories, clothes 
WHERE users.id = clothes.id_user
AND clothes.id_category = categories.id
GROUP BY users.id, categories.name;

SELECT * FROM vw_qt_users_categories;

-- View que retorna a quantidade de tamanhos de roupas por usuário --

CREATE VIEW vw_qt_users_sizes AS SELECT users.id AS user_id, users.name AS user_name, sizes.name, COUNT(clothes.id_size) AS qt_size 
FROM users, sizes, clothes 
WHERE users.id = clothes.id_user
AND clothes.id_size = sizes.id
GROUP BY users.id, sizes.name;

SELECT * FROM vw_qt_users_sizes;

-- View que retorna a quantidade de roupas por usuário --

CREATE VIEW vw_qt_users_clothes AS SELECT users.id AS user_id, users.name AS user_name, COUNT(clothes.id) AS qt_clothes 
FROM users, clothes 
WHERE users.id = clothes.id_user
GROUP BY users.id;

SELECT * FROM vw_qt_users_clothes;