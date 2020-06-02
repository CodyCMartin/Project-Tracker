-- SQL script to create db and all needed tables
CREATE DATABASE tracking;


CREATE TABLE `tracking`.`user`
( `user_id` INT
(3) NOT NULL AUTO_INCREMENT , `first_name` VARCHAR
(10) NOT NULL , `last_name` VARCHAR
(15) NOT NULL , `password` VARCHAR
(128) NOT NULL , `email` VARCHAR
(64) NOT NULL , PRIMARY KEY
(`user_id`), UNIQUE
(`email`)) ENGINE = InnoDB;

CREATE TABLE `tracking`.`client`
( `client_id` INT
(3) NOT NULL AUTO_INCREMENT , `first_name` VARCHAR
(10) NOT NULL , `last_name` VARCHAR
(15) NOT NULL , PRIMARY KEY
(`client_id`)) ENGINE = InnoDB;

CREATE TABLE `tracking`.`project`
( `project_id` INT
(3) NOT NULL AUTO_INCREMENT , `user_id` INT
(3) NOT NULL , `client_id` INT
(3) NOT NULL , `project_name` VARCHAR
(20) NOT NULL , `notes` VARCHAR
(500) NOT NULL , PRIMARY KEY
(`project_id`)) ENGINE = InnoDB;