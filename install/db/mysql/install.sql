CREATE TABLE if not exists `ibc_answers_users`
(
    `ID`     int(20) NOT NULL AUTO_INCREMENT,
    `USER_ID`     int(20) NOT NULL,
    `QUESTION_ID` int(20) COLLATE utf8_unicode_ci NOT NULL,
    `ANSWER_ID`   int(20) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`ID`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE if not exists `ibc_questions`
(
    `ID`       int(20) NOT NULL AUTO_INCREMENT,
    `QUESTION` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`ID`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE if not exists `ibc_answers`
(
    `ID`     int(20) NOT NULL AUTO_INCREMENT,
    `ANSWER` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
    `TYPE` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`ID`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE if not exists `ibc_questions_answers`
(
    `ID`     int(20) NOT NULL AUTO_INCREMENT,
    `QUESTION_ID` int(20) COLLATE utf8_unicode_ci NOT NULL,
    `ANSWER_ID` int(20) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`ID`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE if not exists `ibc_products_link`
(
    `ID`     int(20) NOT NULL AUTO_INCREMENT,
    `PRODUCT` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
    `TYPE_PRODUCT` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`ID`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
