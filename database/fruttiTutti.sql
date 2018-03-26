DROP DATABASE IF EXISTS fruttiTutti;

CREATE DATABASE fruttiTutti
  CHARACTER SET utf8
  COLLATE utf8_general_ci;

USE fruttiTutti;

CREATE TABLE fruit (
  fruitId INT(11) PRIMARY KEY AUTO_INCREMENT,
  name    VARCHAR(255) NOT NULL
);

CREATE TABLE quantityCategory (
  quantityCategoryId INT(11) PRIMARY KEY AUTO_INCREMENT,
  description        VARCHAR(255) NOT NULL,
  additionalDays     VARCHAR(255) NOT NULL,
  totalDays          VARCHAR(255) NOT NULL
);


CREATE TABLE parchOrder (
  parchOrderId        INT(11) PRIMARY KEY AUTO_INCREMENT,
  forename            VARCHAR(255) NOT NULL,
  lastname            VARCHAR(255) NOT NULL,
  email               VARCHAR(255) NOT NULL,
  phone               VARCHAR(255),
  orderDate           TIMESTAMP           DEFAULT CURRENT_TIMESTAMP,
  isDone              TINYINT(1)          DEFAULT 0,
  fruit_fk            INT(11)      NOT NULL,
  quantityCategory_fk INT(11)      NOT NULL,
  FOREIGN KEY (fruit_fk) REFERENCES fruit (fruitId),
  FOREIGN KEY (quantityCategory_fk) REFERENCES quantityCategory (quantityCategoryId)
);


INSERT INTO fruit (`name`) VALUES
  ('Ananas'),
  ('Äpfel'),
  ('Aprikosen'),
  ('Avocado'),
  ('Bananen'),
  ('Birnen'),
  ('Blondorangen'),
  ('Blutorangen'),
  ('Brombeeren'),
  ('Clementinen'),
  ('Erdbeeren'),
  ('Feigen frisch'),
  ('Grapefruits'),
  ('Heidelbeeren'),
  ('Himbeeren'),
  ('Johannisbeeren'),
  ('Kaki'),
  ('Kirschen'),
  ('Kiwi'),
  ('Kiwi Bio Schweiz'),
  ('Limetten'),
  ('Litschis'),
  ('Mango'),
  ('Melonen'),
  ('Mirabellen'),
  ('Nektarinen'),
  ('Papaya'),
  ('Pfirsiche'),
  ('Pflaumen'),
  ('Preiselbeeren'),
  ('Quitten'),
  ('Stachelbeeren'),
  ('Trauben'),
  ('Kirschen'),
  ('Zwetschgen');

INSERT INTO quantityCategory (description, additionalDays, totalDays) VALUE
  ('0-5 kg', '0', '5'),
  ('5-10 kg', '3', '8'),
  ('10-15 kg', '7', '12'),
  ('15-20 kg', '13', '18')