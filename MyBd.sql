create DATABASE messanger;
create table utilisateur(id varchar(50) PRIMARY key,nom varchar(50),prenom varchar(50),mot_de_passe varchar(50),age int(20),role varchar(50));
create table annoncePub(id varchar(50) PRIMARY key,description varchar(50),date date,userId varchar(50));
create table annoncePrv(id varchar(50) PRIMARY key,description varchar(50),date date,userId varchar(50),destinataire varchar(50));
alter table annoncepub add CONSTRAINT fk_1 FOREIGN key (userId) REFERENCES utilisateur(id) on DELETE CASCADE on UPDATE CASCADE;
ALTER TABLE annoncepub MODIFY COLUMN id INT AUTO_INCREMENT;
alter table annonceprv add CONSTRAINT fk_2 FOREIGN key (userId) REFERENCES utilisateur(id) on DELETE CASCADE on UPDATE CASCADE;
ALTER TABLE annonceprv MODIFY COLUMN id INT AUTO_INCREMENT;