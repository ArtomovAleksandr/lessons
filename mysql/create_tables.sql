drop database if exists dieselclub;
create database if not exists academy character set utf8 default collate utf8_general_ci;

use lessons;

create table category(
id int primary key auto_increment,
name varchar(255) not null,
is_visible boolean default true,
metric_order int,
path_image  varchar(255)
)engine=innoDB;
INSERT INTO category(id,is_visible,metric_order,name) VALUES (1,0,0,'Нет категории'),(2,0,2,'Тепловые экраны под распылитель'),(4,0,1,'Тепловые экраны под форсунку'),(5,0,3,'Шайба уплотнительная медная'),(6,0,4,'Шайба уплотнительная алюминиевая'),(7,1,30,'Запчасти к ТНВД тип VE'),(8,0,18,'Дизельные распылители  MOTORPAL'),(9,1,19,'Дизельные распылители FIRAD'),(10,1,9,'Дизельные распылители Denso'),(11,1,5,'Дизельные распылители Bosch'),(12,1,7,'Дизельные распылители Zexel'),(13,1,11,'Дизельные распылители Delphi'),(14,1,22,'Запчасти к рядным ТНВД'),(15,1,35,'Запчасти к ТНВД тип DPC'),(16,0,5,'Дизельные распылители Herzog'),(17,0,100,'Свеча накала SD'),(18,0,110,'Свеча накала Bosch, Beru'),(30,1,50,'Запчасти к CR-системе'),(29,0,140,'Сопутствующий товар'),(22,0,20,'Свеча накала NGK'),(23,0,120,'Электрофакельные свечи'),(24,0,14,'Дизельные распылители ADL'),(25,1,20,'Запчасти форсунок'),(26,0,24,'Запчасти к подкачивающим насосам'),(27,1,40,'Запчасти к ТНВД тип DPS'),(28,1,45,'Запчасти к ТНВД тип DPA'),(31,0,23,'Запчасти регуляторов'),(32,1,141,'Форсунки Stanadyne'),(33,0,51,'Фильтра'),(34,0,21,'Свеча накала HKT'),(35,1,12,'Дизельные распылители Wusetem'),(36,0,52,'Запчасти Двигателя');

-- курс валют
create table `currency`
(
id int primary key auto_increment,
name varchar(50) not null,
shortname varchar(50) not null,
rate varchar(50)
)engine=innoDB;

insert into `currency` (id,name,shortname,rate) values (1,'Гривня','грн.',1.00),(2,'Доллар','usd',27.00),(3,'Евро','eur',29.00);

-- история влюты
 create table `currencyhistory`
(
id int primary key auto_increment,
name varchar(50) not null,
date_setting varchar(50) not null,
rate varchar(50)
)engine=innoDB;
-- SELECT * FROM `category`;