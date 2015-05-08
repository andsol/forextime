-- CREATE DATABASE  IF NOT EXISTS `devices`;
USE `devices`;

-- DROP TABLE IF EXISTS `group`;
CREATE TABLE `group` (
  `id`   INT(11)     NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `dt`   DATETIME             DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 4
  DEFAULT CHARSET = utf8;

INSERT INTO `devices` VALUES (3, 1, 1), (4, 1, 12), (5, 2, NULL), (6, 1, 2), (7, 2, NULL), (8, 2, 15);

-- DROP TABLE IF EXISTS `devices`;
CREATE TABLE `devices` (
  `id`       INT(11) NOT NULL AUTO_INCREMENT,
  `group_id` INT(11) NOT NULL,
  `id_type`  INT(11)          DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_dep_idx` (`group_id`),
  CONSTRAINT `group_dep` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 9
  DEFAULT CHARSET = utf8;

ALTER TABLE `devices`.`devices`
ADD INDEX `index3` (`id_type` ASC);


INSERT INTO `group` VALUES (1, 'Group one', '2015-05-07 22:50:49'), (2, 'Group two', '2015-05-07 22:50:49'),
  (3, 'Group three', '2015-05-08 22:51:32');


-- First
SELECT
  g.id,
  g.name,
  g.dt,
  COUNT(d.id) AS qty,
  CASE WHEN d.id_type IS NULL AND COUNT(d.id) > 0 THEN 1
  ELSE 0 END  AS is_null
FROM `group` AS g LEFT JOIN devices AS d ON d.group_id = g.id
GROUP BY g.id
HAVING is_null = 0;
-- Second
SELECT
  g.id,
  g.name,
  g.dt,
  COUNT(d.id_type)
FROM `group` AS g LEFT JOIN devices AS d ON d.group_id = g.id
GROUP BY g.id;