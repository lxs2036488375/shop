SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typeid` int(11) DEFAULT NULL,
  `goods` varchar(32) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `descr` text,
  `price` double(6,2) DEFAULT NULL,
  `picname` varchar(255) DEFAULT NULL,
  `state` tinyint(4) DEFAULT '1',
  `store` int(11) DEFAULT '0',
  `num` int(11) DEFAULT '0',
  `clicknum` int(11) DEFAULT '0',
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;