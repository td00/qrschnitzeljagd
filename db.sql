USE data;
CREATE TABLE `codes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `qrcode` VARCHAR(255) NOT NULL ,
  `from` VARCHAR(255) NOT NULL ,
  `to` VARCHAR(255) NOT NULL ,
  `text` VARCHAR(255) NOT NULL DEFAULT '' ,
  `location` VARCHAR(255) NOT NULL DEFAULT '' ,
  `counter` VARCHAR(5) NOT NULL DEFAULT '0' ,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`id`), UNIQUE (`qrcode`)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;