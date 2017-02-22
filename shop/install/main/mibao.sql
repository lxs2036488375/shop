SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `mibao`;
CREATE TABLE `mibao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `question1` varchar(255) DEFAULT NULL,
  `answer1` varchar(255) DEFAULT NULL,
  `question2` varchar(255) DEFAULT NULL,
  `answer2` varchar(255) DEFAULT NULL,
  `question3` varchar(255) DEFAULT NULL,
  `answer3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;