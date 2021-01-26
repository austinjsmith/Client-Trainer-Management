DROP TABLE IF EXISTS `active_clients`;
CREATE TABLE `active_clients` (
  `name` char(30) NOT NULL,
  `address` char(100) DEFAULT NULL,
  `health` char(10) DEFAULT NULL
);

DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `name` char(30) NOT NULL,
  `height` char(5) DEFAULT NULL,
  `weight` char(4) DEFAULT NULL,
  `health` char(10) DEFAULT NULL,
  `address` char(100) DEFAULT NULL,
  `location` char(5) DEFAULT NULL,
  `diet` char(20) DEFAULT NULL,
  `plan` char(20) DEFAULT NULL,
  PRIMARY KEY (`name`)
);

DROP TABLE IF EXISTS `plans`;
CREATE TABLE `plans` (
  `exercises` char(200) DEFAULT NULL,
  `name` char(20) NOT NULL,
  PRIMARY KEY (`name`)
);

DROP TABLE IF EXISTS `trainer`;
CREATE TABLE `trainer` (
  `name` char(30) NOT NULL,
  `license` int NOT NULL,
  `address` char(100) DEFAULT NULL,
  `location` char(5) DEFAULT NULL,
  PRIMARY KEY (`name`,`license`)
);

DROP TABLE IF EXISTS `trains`;
CREATE TABLE `trains` (
  `trainer` char(30) NOT NULL,
  `client` char(30) NOT NULL,
  `appttime` float DEFAULT NULL,
  `location` char(10) DEFAULT NULL,
  PRIMARY KEY (`trainer`,`client`),
  KEY `FK_client` (`client`),
  CONSTRAINT `FK_client` FOREIGN KEY (`client`) REFERENCES `client` (`name`),
  CONSTRAINT `FK_train` FOREIGN KEY (`trainer`) REFERENCES `trainer` (`name`)
);

DROP TRIGGER IF EXISTS zaycfitnessdatabaseproject.update_client;
CREATE TRIGGER update_client
	AFTER UPDATE ON client FOR EACH ROW
    UPDATE active_clients SET active_clients.name = NEW.name, active_clients.address = NEW.address, active_clients.health = NEW.health
		WHERE active_clients.name = name;

DROP TRIGGER IF EXISTS zaycfitnessdatabaseproject.new_client;
CREATE TRIGGER new_client
	AFTER UPDATE ON client FOR EACH ROW
    INSERT INTO active_clients() VALUES(new.name, new.address, new.health);
