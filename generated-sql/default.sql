
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- CalendarEvent
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `CalendarEvent`;

CREATE TABLE `CalendarEvent`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `all_day` TINYINT(1),
    `start_date` DATETIME NOT NULL,
    `end_date` DATETIME NOT NULL,
    `url` VARCHAR(255),
    `editable` TINYINT(1),
    `start_editable` TINYINT(1),
    `duration_editable` TINYINT(1),
    `rendering` VARCHAR(255),
    `overlap` TINYINT(1),
    `constraint_limit` VARCHAR(255),
    `color` VARCHAR(255),
    `class_name` VARCHAR(255),
    `background_color` VARCHAR(255),
    `border_color` VARCHAR(255),
    `text_color` VARCHAR(255),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- DentistEvent
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `DentistEvent`;

CREATE TABLE `DentistEvent`
(
    `id` INTEGER NOT NULL,
    `info` VARCHAR(255),
    `CalendarEvent_id` INTEGER,
    PRIMARY KEY (`id`),
    CONSTRAINT `FK_B5883ACFBF396750`
        FOREIGN KEY (`id`)
        REFERENCES `CalendarEvent` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- WorkEvent
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `WorkEvent`;

CREATE TABLE `WorkEvent`
(
    `id` INTEGER NOT NULL,
    `description` VARCHAR(255),
    `location` VARCHAR(255),
    `CalendarEvent_id` INTEGER,
    PRIMARY KEY (`id`),
    CONSTRAINT `FK_DC786623BF396750`
        FOREIGN KEY (`id`)
        REFERENCES `CalendarEvent` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
