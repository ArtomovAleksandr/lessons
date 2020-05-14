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

-- производитель

create table factory(
id int primary key auto_increment,
name varchar(50) not null
)engine=innoDB;

INSERT INTO factory(id,name) VALUES (1,'BCD'),(3,'Bosch'),(4,'Brisk'),(12,'Crosland'),(13,'DOOWON'),(14,'Dayco'),(15,'Delphi'),(16,'Denso'),(17,'Febi'),(18,'Filtron'),(19,'Firrad'),(20,'Flag'),(21,'Flennor'),(24,'Glaser'),(71,'JC'),
(28,'Luqui Moly'),(29,'ADL'),(30,'MonarkDiesel'),(70,'Eberspacher'),(32,'Motorpal'),(33,'NGK'),(68,'Чугуев'),(35,'Perfect Circle'),(36,'Polo'),(67,'Ярославский завод'),(69,'Gates'),
(41,'Stanadyne'),(42,'SVN'),(43,'Shell'),(44,'Spaco'),(45,'Super Diesel'),(46,'TOYA'),(66,'OMS'),(65,'Beru'),(64,'не оригинал'),(50,'UNION'),(63,'Wusetem'),(52,'Zexel'),
(62,'Okm'),(61,'SNR'),(60,'ORS'),(59,'Mercedes'),(72,'Hengst'),(73,'Mann'),(74,'Mitsuboshi'),(75,'Superpar'),(76,'DTP'),(77,'KIA-MOTORS'),(78,'HKT'),(79,'COMMA'),(80,'SEVEN'),(81,'BoRG'),
(82,'Elring'),(83,'Glyco'),(84,'Mahle'),(85,'Goetze'),(86,'TETIK'),(87,'MOPISAN'),(88,'SM'),(89,'ELW'),(90,'AJUSA'),(91,'Herzog'),(92,'Nural'),(93,'Higt Tech'),(94,'Redat'),(95,'Tecnocar'),(96,'Star'),
(97,'ZIMMER'),(98,'CNR'),(99,'Iskra'),(100,'Siemens'),(101,'Mefin'),(102,'Osram'),(103,'Cargo');

-- единица измерения

create table unit(
id int primary key auto_increment,
name varchar(50) not null
)engine=innoDB;
INSERT INTO unit (id,name)values(1,"шт."),(2,"к-т"),(3,"см.");

-- товар
create table `goods`(
id int primary key auto_increment,
num varchar(50), -- кассовый номер
catalog varchar(50), -- каталожный номер
mark varchar(100), -- маркировка
name varchar(100) not null, -- название
unit_id int, -- еденица измерения
 constraint fk_unitid_goods
   foreign key(unit_id)
    references  unit(id)
	on update cascade
	on delete cascade,

currency_id int,
 constraint fk_currencyid_goods
   foreign key(currency_id)
    references  currency(id)
     on update cascade
	 on delete cascade,

factory_id int,
  constraint fk_factoryid_goods
   foreign key(factory_id)
    references factory(id)
        on update cascade
        on delete cascade,
 category_id int,
  constraint fk_categoryid_goods
   foreign key(category_id)
    references category(id)
        on update cascade
        on delete cascade,
inprice varchar(25), -- входная цена
addition varchar(25) default '75', -- наценка в %
countprice boolean default true, -- вычисляемая цена
outprice varchar(25) default 0, -- выходная цена
max_order int default 0 -- максимальное количество в заказе

)engine=innoDB;