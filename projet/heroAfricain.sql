CREATE DATABASE IF NOT EXISTS test CHARACTER SET utf8;
CREATE USER IF NOT EXISTS 'test'@'localhost' IDENTIFIED BY 'test';
GRANT ALL PRIVILEGES ON test.* TO 'test'@'localhost';


USE test;

CREATE TABLE IF NOT EXISTS heroAfricain (
    id INT(11)  NOT NULL AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100)  NOT NULL,
    nationnalite VARCHAR(100)  NOT NULL ,
    PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `heroAfricain` ( `id`,`nom`, `prenom`,`nationnalite`) 
VALUES 
(1,'Diop', 'Cheikh', 'Senegalaise'),

(2,'Toure', 'Ahmed Sekou', 'Guineenne'),
(3,'Sankara', 'Thomas', 'Burkinabe'),

(4,'Tall', 'Elhadj Oumar', 'Senegalaise'),

(5,'Diallo', 'Tely', 'Guineenne');





