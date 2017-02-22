SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `sname` varchar(32) DEFAULT NULL,
  `sdd` varchar(150) DEFAULT NULL,
  `sjtadd` varchar(255) DEFAULT NULL,
  `scode` char(6) DEFAULT NULL,
  `sphone` varchar(16) DEFAULT NULL,
  `stel` varchar(16) DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;