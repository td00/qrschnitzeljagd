USE data;
CREATE TABLE `codes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `schnitzel_qrcode` VARCHAR(255) NOT NULL ,
  `schnitzel_from` VARCHAR(255) NOT NULL ,
  `schnitzel_to` VARCHAR(255) NOT NULL ,
  `schnitzel_text` VARCHAR(255) NOT NULL DEFAULT '' ,
  `schnitzel_location` VARCHAR(255) NOT NULL DEFAULT '' ,
  `schnitzel_counter` VARCHAR(5) NOT NULL DEFAULT '0' ,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`id`), UNIQUE (`schnitzel_qrcode`)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;