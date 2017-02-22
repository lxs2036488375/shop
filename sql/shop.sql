-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-02-22 11:32:35
-- 服务器版本： 5.7.11
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- 表的结构 `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `sname` varchar(32) DEFAULT NULL,
  `sdd` varchar(150) DEFAULT NULL,
  `sjtadd` varchar(255) DEFAULT NULL,
  `scode` char(6) DEFAULT NULL,
  `sphone` varchar(16) DEFAULT NULL,
  `stel` varchar(16) DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `address`
--

INSERT INTO `address` (`id`, `uid`, `sname`, `sdd`, `sjtadd`, `scode`, `sphone`, `stel`, `state`) VALUES
(3, 26, '李磊2222', '山西省 大同市', '迎泽区南内环解放路口建设银行六楼', '000000', '18934782345', '', 1),
(4, 26, '李潇爽', '山西省 太原市', '迎泽区南内环解放路口建设银行六楼', '000000', '18334793282', '', 1),
(5, 26, '李阳', '山西省 晋中市', '迎泽区南内环解放路口建设银行六楼111', '000000', '18334793282', '', 1),
(6, 31, '李潇爽', '山西省 太原市', '小店区山西大学', '000000', '18334793282', '', 1),
(8, 32, '李潇爽111', '山西省 阳泉市', '小店区山西大学', '000000', '18334793282', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `detail`
--

CREATE TABLE `detail` (
  `id` int(11) NOT NULL,
  `orderid` int(11) DEFAULT NULL,
  `goodsid` int(11) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `price` double(6,2) DEFAULT NULL,
  `num` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `detail`
--

INSERT INTO `detail` (`id`, `orderid`, `goodsid`, `name`, `price`, `num`) VALUES
(1, 1, 33, '小米Note 2 ', 2799.00, 2),
(2, 2, 54, '净水器（厨下式） ', 1999.00, 2),
(3, 3, 33, '小米Note 2 ', 2799.00, 1),
(4, 4, 33, '小米Note 2 ', 2799.00, 2),
(5, 5, 33, '小米Note 2 ', 2799.00, 1),
(6, 5, 35, '小米MIX', 3499.00, 1),
(7, 5, 47, '小米电视3s 43英寸', 1799.00, 1),
(8, 6, 33, '小米Note 2 ', 2799.00, 1),
(10, 8, 49, '小米电视3s 55英寸 ', 3499.00, 1),
(12, 10, 33, '小米Note 2 ', 2799.00, 1),
(13, 11, 33, '小米Note 2 ', 2799.00, 1),
(14, 11, 35, '小米MIX', 3499.00, 2),
(15, 12, 33, '小米Note 2 ', 2799.00, 1),
(16, 13, 33, '小米Note 2 ', 2799.00, 1),
(17, 14, 39, '小米5s', 1999.00, 1),
(18, 15, 43, '红米Note 4 ', 899.00, 1),
(19, 16, 33, '小米Note 2 ', 2799.00, 1),
(20, 17, 43, '红米Note 4 ', 899.00, 1),
(21, 18, 33, '小米Note 2 ', 2799.00, 1),
(22, 19, 56, '米家空气净化器Pro ', 1499.00, 2),
(23, 20, 33, '小米Note 2 ', 2799.00, 1),
(24, 21, 33, '小米Note 2 ', 2799.00, 1);

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
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
  `addtime` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`id`, `typeid`, `goods`, `company`, `descr`, `price`, `picname`, `state`, `store`, `num`, `clicknum`, `addtime`) VALUES
(33, 13, '小米Note 2 ', '小米', '5.7', 2799.00, '45aff317cdd622d436490917c866ba1d6673.jpg', 2, 30, 0, 0, 1481166557),
(34, 14, '小米5s', '', '', 1999.00, '5dfbc0b94e3c50d1bec1e52b9715d4f15182.jpg', 1, 123, 0, 0, 1481166596),
(35, 13, '小米MIX', '小米', '6.4" 全面屏，全陶瓷机身，骁龙 821 性能版 4400mAh 大电量，可选128GB版/256GB版', 3499.00, 'bc99c98f39afa6fc01d752e892a0af8c5879.jpg', 1, 30, 0, 0, 1481166699),
(39, 13, '小米5s', '小米', '“暗夜之眼”超感光相机，无孔式超声波指纹识别 骁龙 821 旗舰处理器，全金属一体化机身', 1999.00, '5dfbc0b94e3c50d1bec1e52b9715d4f19069.jpg', 1, 30, 0, 0, 1481211603),
(40, 13, '小米手机5', '小米', '骁龙820处理器，最大可选4GB 内存+128GB闪存 4轴防抖相机，3D陶瓷/玻璃机身', 1599.00, '45aff317cdd622d436490917c866ba1d6670.jpg', 1, 24, 0, 0, 1481211642),
(41, 13, '小米5s Plus', '小米', '5.7" 全高清大屏，1300万后置双摄像头 骁龙 821 旗舰处理器，轻薄金属机身', 2299.00, 'aebbb9d565454c599a8117fba7106ee57938.jpg', 1, 50, 0, 0, 1481211686),
(42, 13, '小米Max', '小米', '6.44" 大屏黄金尺寸，看什么都震撼 4850mAh（typ） / 4760mAh（min）长续航', 1299.00, '898cf83ee3ac44451c1247fd403643639384.jpg', 1, 45, 0, 0, 1481211729),
(43, 6, '红米Note 4 ', '小米', 'Helio X20 十核旗舰处理器,全金属一体化机身 4100mAh 大电量,全网通', 899.00, '8b76027b6b590dcf698461e256a56c311196.jpg', 1, 34, 0, 0, 1481211776),
(44, 6, '红米手机3S', '小米', '指纹识别，金属机身，4100mAh 大电池 性能再升级', 699.00, 'cbbaf098f64e650f9f4b10e4124e5c728444.jpg', 1, 100, 0, 0, 1481211833),
(45, 6, '红米Pro ', '小米', '后置双摄像头，Helio X25 / X20 十核旗舰处理器 5.5英寸 OLED 超鲜艳屏幕，拉丝全金属机身', 1099.00, '3e7ec17abd8b5da2306f002d76ccd0c98405.jpg', 1, 34, 0, 0, 1481211886),
(46, 13, '小米平板 2 ', '小米', '轻薄全金属，图书视频游戏，应有尽有。', 999.00, '1bd8215b9a3c3bb958b9ca7b2515733d1638.jpg', 1, 123, 0, 0, 1481211924),
(47, 27, '小米电视3s 43英寸', '小米', '原装 LG / 友达 液晶屏，超薄金属机身 杜比和DTS音效双解码，内置海量影视内容', 1799.00, '999e39944bc2b7797fc595fd073f6def5608.jpg', 1, 23, 0, 0, 1481261610),
(48, 27, '小米电视3s 48英寸 ', '小米', '原装三星液晶屏，超薄金属机身 杜比和DTS音效双解码，内置海量影视内容', 1999.00, 'c3a84aa998fffd1ec57462218780dac39044.jpg', 1, 34, 0, 0, 1481261661),
(49, 27, '小米电视3s 55英寸 ', '小米', '原装LG 4K IPS硬屏，超薄金属机身 杜比和DTS音效双解码，内置海量影视内容', 3499.00, 'c3d2c81e0b8d294b21dfecd1788f82092582.jpg', 1, 30, 0, 0, 1481261774),
(50, 27, '小米电视3s 55英寸 ', '小米', '原装LG 4K IPS硬屏，超薄金属机身 独立音响、低音炮，内置海量影视内容', 3999.00, '2e71c8abaee59b75d33b764024f57a8e4095.jpg', 1, 234, 0, 0, 1481261833),
(51, 27, '小米电视3s 60英寸 ', '小米', '原装LG 4K IPS硬屏，超薄金属机身 杜比和DTS音效双解码，内置海量影视内容', 4499.00, '79444ea3aad7956be2f1855a1feae81e6253.jpg', 1, 342, 0, 0, 1481261874),
(52, 27, '小米电视3s 65英寸', '小米', '原装三星真4K屏，超薄金属机身 独立音响、低音炮、音箱，内置海量影视内容', 5999.00, '2e71c8abaee59b75d33b764024f57a8e9180.jpg', 1, 34, 0, 0, 1481261955),
(53, 27, '小米电视3 55英寸', '小米', '原装三星 / LG真4K屏 超薄金属机身 标配6扬声器独立音响，内置海量影视内容', 3999.00, 'e94998333deba20349ea267df221e3563710.jpg', 1, 355, 0, 0, 1481262002),
(54, 32, '净水器（厨下式） ', '小米', '400加仑大流量，RO反渗透直出纯净水 隐藏安装，灯光水龙头', 1999.00, '4fdd0fa8ba1a369a5af4aa3a3ae1282a1883.jpg', 1, 34, 0, 0, 1481275560),
(55, 32, '小米空气净化器 2 ', '小米', '10分钟，房间空气焕然一新 净化能力高达310m³/h', 699.00, '22fb09a092475a881565fc4c48dc5bf66424.jpg', 1, 34, 0, 0, 1481275601),
(56, 32, '米家空气净化器Pro ', '小米', 'OLED 显示屏幕，激光颗粒物传感器 500m³/h 颗粒物 CADR,60m² 适用面积', 1499.00, '0ec2985d5d58b6b910da6f6a6a0c18236553.jpg', 1, 45, 0, 0, 1481275639),
(57, 32, '米家PM2.5检测仪 ', '小米', '高精度激光传感器，一体黑 OLED 屏 智能联动，轻便小巧', 399.00, 'd78109066d657c7037ddff32c59299549765.jpg', 1, 124, 0, 0, 1481275681),
(58, 32, '九号平衡车 ', '小米', '年轻人的酷玩具，骑行/遥控两种玩法', 1999.00, 'cbfb47343e392f51a5ad26c09ed4073f7681.jpg', 1, 64, 0, 0, 1481275721),
(59, 32, '小米无人机', '小米', '3轴机械防抖，一体化云台相机，5100mAh大电量 简单便携易上手，实现想飞的梦想', 2499.00, 'd0059d620572c941f9a3cfc00ba97e0c2591.jpg', 1, 245, 0, 0, 1481275762);

-- --------------------------------------------------------

--
-- 表的结构 `link`
--

CREATE TABLE `link` (
  `id` int(11) NOT NULL,
  `url` varchar(150) DEFAULT NULL,
  `descr` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `link`
--

INSERT INTO `link` (`id`, `url`, `descr`) VALUES
(2, 'http://www.mi.com/', '小米商城111'),
(3, 'http://www.miui.com', 'MIUI'),
(4, 'http://www.miliao.com/', '米聊'),
(5, 'http://www.duokan.com/', '多看书城'),
(6, 'http://www.miwifi.com/', '小米路由器'),
(7, 'http://call.mi.com/', '视频电话'),
(8, 'http://blog.xiaomi.com/', '小米后院'),
(9, 'http://xiaomi.tmall.com/', '小米天猫店'),
(10, 'http://shop115048570.taobao.com', '小米淘宝直营店'),
(11, 'http://union.mi.com/', '小米网盟');

-- --------------------------------------------------------

--
-- 表的结构 `mibao`
--

CREATE TABLE `mibao` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `question1` varchar(255) DEFAULT NULL,
  `answer1` varchar(255) DEFAULT NULL,
  `question2` varchar(255) DEFAULT NULL,
  `answer2` varchar(255) DEFAULT NULL,
  `question3` varchar(255) DEFAULT NULL,
  `answer3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mibao`
--

INSERT INTO `mibao` (`id`, `uid`, `question1`, `answer1`, `question2`, `answer2`, `question3`, `answer3`) VALUES
(1, 26, '我的生日是？', '腊月三十', '我母亲的生日是？', '四月初四', '我父亲的生日是？', '正月初五'),
(2, 26, '我的生日是？', '腊月三十', '我母亲的生日是？', '四月初四', '我父亲的生日是？', '正月初五'),
(3, 26, '我的生日是？', '腊月三十', '我母亲的生日是？', '四月初四', '我父亲的生日是？', '正月初五'),
(4, 26, '我的生日是？', '腊月三十', '我母亲的生日是？', '四月初四', '我父亲的生日是？', '正月初五'),
(5, 26, '我的生日是？', '腊月三十', '我母亲的生日是？', '四月初四', '我父亲的生日是？', '正月初五'),
(6, 31, '你是谁', '李潇爽', '你的生日是？', '0101', '你的秘密？', '傻'),
(7, 32, '我的生日是？', '1111', '我母亲的生日是？', '1111', '我父亲的生日是？', '1111');

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `linkman` varchar(32) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `code` char(6) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `total` double(8,2) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`id`, `uid`, `linkman`, `address`, `code`, `phone`, `addtime`, `total`, `status`) VALUES
(1, 26, 'user', '山西省太原市', '01000', '18334793282', 1481296585, 5598.00, 2),
(2, 26, 'user', '山西省太原市', '01000', '18334793282', 1481297130, 3998.00, 1),
(3, 26, 'user', '山西省太原市', '01000', '18334793282', 1481300771, 2799.00, 2),
(4, 26, 'user', '山西省太原市', '01000', '18334793282', 1481300937, 5598.00, 1),
(5, 26, 'user', '山西省太原市', '01000', '18334793282', 1481355519, 8097.00, 1),
(6, 26, 'user', '山西省太原市', '01000', '18334793282', 1481434301, 2799.00, 3),
(8, 26, 'user', '山西省太原市', '01000', '18334793282', 1481434637, 3499.00, 1),
(10, 26, 'user', '山西省太原市', '01000', '18334793282', 1481532067, 2799.00, 0),
(11, 26, 'user', '山西省太原市', '01000', '18334793282', 1481541591, 9797.00, 0),
(12, 26, 'user', '山西省太原市', '01000', '18334793282', 1481542006, 2799.00, 0),
(13, 26, 'user', '山西省太原市', '01000', '18334793282', 1481542377, 2799.00, 0),
(14, 26, 'user', '山西省太原市', '01000', '18334793282', 1481543826, 1999.00, 0),
(15, 26, '李阳', '山西省 晋中市迎泽区南内环解放路口建设银行六楼111', '000000', '18334793282', 1481545739, 899.00, 0),
(16, 26, '李潇爽', '山西省 太原市迎泽区南内环解放路口建设银行六楼', '000000', '18334793282', 1481546788, 2799.00, 0),
(17, 26, '李潇爽', '山西省 太原市迎泽区南内环解放路口建设银行六楼', '000000', '18334793282', 1481548715, 899.00, 0),
(18, 26, '李磊2222', '山西省 大同市迎泽区南内环解放路口建设银行六楼', '000000', '18934782345', 1481548785, 2799.00, 0),
(19, 26, '李潇爽', '山西省 太原市迎泽区南内环解放路口建设银行六楼', '000000', '18334793282', 1481613536, 2998.00, 0),
(20, 32, '李潇爽', '山西省 太原市迎泽区南内环解放路口建设银行六楼', '000000', '18334793282', 1481613798, 2799.00, 3),
(21, 32, '李阳', '山西省 晋中市迎泽区南内环解放路口建设银行六楼111', '000000', '18334793282', 1481613837, 2799.00, 2);

-- --------------------------------------------------------

--
-- 表的结构 `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `pid` int(11) DEFAULT '0',
  `path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `type`
--

INSERT INTO `type` (`id`, `name`, `pid`, `path`) VALUES
(2, '手机 电话卡', 0, '0,'),
(6, '红米', 2, '0,2,'),
(13, '小米手机', 2, '0,2,'),
(22, '笔记本 平板', 0, '0,'),
(23, '小米平板', 22, '0,22,'),
(24, '小米笔记本', 22, '0,22,'),
(25, '配件', 22, '0,22,'),
(26, '电视 盒子', 0, '0,'),
(27, '小米电视', 26, '0,26,'),
(28, '小米盒子', 26, '0,26,'),
(29, '配件', 26, '0,26,'),
(30, '路由器 智能硬件', 0, '0,'),
(31, '小米路由器', 30, '0,30,'),
(32, '智能硬件', 30, '0,30,'),
(33, '移动电源 电池 插线板', 0, '0,'),
(34, '移动电源', 33, '0,33,'),
(35, '电池', 33, '0,33,'),
(36, '插线板', 33, '0,33,'),
(37, '耳机 音响', 0, '0,'),
(38, '耳机', 37, '0,37,'),
(39, '音响', 37, '0,37,'),
(40, '其他', 37, '0,37,'),
(41, '保护套 贴膜', 0, '0,'),
(42, '保护套', 41, '0,41,'),
(43, '贴膜', 41, '0,41,'),
(44, '线材 支架 存储卡', 0, '0,'),
(45, '线材', 44, '0,44,'),
(46, '支架', 44, '0,44,'),
(47, '存储卡', 44, '0,44,'),
(48, '箱包 服饰', 0, '0,'),
(49, '箱包', 48, '0,48,'),
(50, '服饰', 48, '0,48,'),
(51, '米兔 生活周边', 0, '0,'),
(52, '米兔', 51, '0,51,'),
(53, '生活周边', 51, '0,51,');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `pass` char(32) NOT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `code` char(6) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `state` tinyint(1) DEFAULT '1',
  `addtime` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) VALUES
(1, '笨笨熊', '刘强', 'e10adc3949ba59abbe56e057f20f883e', 1, '北京市回龙观', '11111', '1008611', 'liuqing@xdl.cn', 2, 19951230),
(2, '聪明熊', '毕聪聪', 'd41d8cd98f00b204e9800998ecf8427e', 2, '山西省太原市', '01000', '18334793503', '1234563503@qq.com', 1, 1480684427),
(3, 'taopo', '陶坡', '25f9e794323b453885f5181f1b624d0b', 1, '山西省太原市', '1235', '15910522652', '23536574@aa。com', 1, 1480685663),
(4, 'lxs', '李潇爽', '202cb962ac59075b964b07152d234b70', 2, '山西省临汾市', '10100', '18334793282', 'lxs_2036488375@163.com', 0, 1480686283),
(7, '燕子翩翩', '杨慧燕', 'cd9c297ba40834de0f0d836d78f3b39c', 2, '山西省太原市', '1235', '1833479xxxx', '12345678899@aa.com', 2, 1480690244),
(8, 'lilei', '李磊', '3752a328cf125dc589f01a1c1ff9e322', 1, '山西省太原市', '1235', '18334793282', '12345678@aa.com', 1, 1480692895),
(9, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '1233', '1235', '18334793282', '12345678@aa.com', 0, 1480929741),
(10, 'daixiaoshuang', 'daixiaoshuang', 'e10adc3949ba59abbe56e057f20f883e', 1, 'qsdvc', 'asd', '18334793282', 'lxs_2036488375@163.com', 1, 1480930518),
(14, '李阳', '李阳', 'e10adc3949ba59abbe56e057f20f883e', 1, '山西省太原市', '1235', '1777896356', '23536574@ss.com', 1, 1480943102),
(16, 'fangmiao', '方淼', 'b59c67bf196a4758191e42f76670ceba', 2, '山西省太原市', '1235', '15910522652', '2036488375@qq.com', 1, 1480943174),
(17, '崔立坚', '崔立坚', 'e10adc3949ba59abbe56e057f20f883e', 1, '山西省太原市', '1235', '18334793282', '12345678@aa.com', 1, 1480986541),
(19, 'cuilijian', '崔立坚', 'e10adc3949ba59abbe56e057f20f883e', 1, '山西省太原市', '3772', '15910522652', '12345678@aa.com', 1, 1480986678),
(20, 'wangjie', '王杰', '25d55ad283aa400af464c76d713c07ad', 1, '山西省太原市', '3772', '12345678911', '12345678@aa.com', 1, 1480986763),
(25, 'wangtao', '王涛', '6b4dccfb69c362b172bafdfc60c343e1', 1, '山西省太原市', '1235', '18334793282', '12345678@aa.com', 1, 1480987109),
(26, 'user', 'user', '25d55ad283aa400af464c76d713c07ad', 1, '山西省太原市', '01000', '18334793282', '12345678@aa.com', 1, 1481267975),
(27, 'user2', 'user2', '25d55ad283aa400af464c76d713c07ad', 1, NULL, NULL, NULL, '12345678@aa.com', 1, 1481268052),
(28, 'user3', 'use3', '25d55ad283aa400af464c76d713c07ad', 1, NULL, NULL, NULL, '12345678@aa.com', 1, 1481268084),
(34, 'xiaohuaidan', 'lilei', '123', 1, NULL, NULL, NULL, '123@qq.com', 1, 1485272221);

-- --------------------------------------------------------

--
-- 表的结构 `users_copy`
--

CREATE TABLE `users_copy` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `pass` char(32) NOT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `code` char(6) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `state` tinyint(1) DEFAULT '1',
  `addtime` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `users_copy`
--

INSERT INTO `users_copy` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) VALUES
(1, '笨笨熊', '刘强', 'e10adc3949ba59abbe56e057f20f883e', 1, '北京市回龙观', '11111', '1008611', 'liuqing@xdl.cn', 2, 19951230),
(2, '聪明熊', '毕聪聪', 'd41d8cd98f00b204e9800998ecf8427e', 2, '山西省太原市', '01000', '18334793503', '1234563503@qq.com', 1, 1480684427),
(3, 'taopo', '陶坡', '25f9e794323b453885f5181f1b624d0b', 1, '山西省太原市', '1235', '15910522652', '23536574@aa。com', 1, 1480685663),
(4, 'lxs', '李潇爽', '202cb962ac59075b964b07152d234b70', 2, '山西省临汾市', '10100', '18334793282', 'lxs_2036488375@163.com', 0, 1480686283),
(7, '燕子翩翩', '杨慧燕', 'cd9c297ba40834de0f0d836d78f3b39c', 2, '山西省太原市', '1235', '1833479xxxx', '12345678899@aa.com', 2, 1480690244),
(8, 'lilei', '李磊', '3752a328cf125dc589f01a1c1ff9e322', 1, '山西省太原市', '1235', '18334793282', '12345678@aa.com', 1, 1480692895),
(9, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '1233', '1235', '18334793282', '12345678@aa.com', 0, 1480929741),
(10, 'daixiaoshuang', 'daixiaoshuang', 'e10adc3949ba59abbe56e057f20f883e', 1, 'qsdvc', 'asd', '18334793282', 'lxs_2036488375@163.com', 1, 1480930518),
(14, '李阳', '李阳', 'e10adc3949ba59abbe56e057f20f883e', 1, '山西省太原市', '1235', '1777896356', '23536574@ss.com', 1, 1480943102),
(16, 'fangmiao', '方淼', 'b59c67bf196a4758191e42f76670ceba', 2, '山西省太原市', '1235', '15910522652', '2036488375@qq.com', 1, 1480943174),
(17, '崔立坚', '崔立坚', 'e10adc3949ba59abbe56e057f20f883e', 1, '山西省太原市', '1235', '18334793282', '12345678@aa.com', 1, 1480986541),
(19, 'cuilijian', '崔立坚', 'e10adc3949ba59abbe56e057f20f883e', 1, '山西省太原市', '3772', '15910522652', '12345678@aa.com', 1, 1480986678),
(20, 'wangjie', '王杰', '25d55ad283aa400af464c76d713c07ad', 1, '山西省太原市', '3772', '12345678911', '12345678@aa.com', 1, 1480986763),
(25, 'wangtao', '王涛', '6b4dccfb69c362b172bafdfc60c343e1', 1, '山西省太原市', '1235', '18334793282', '12345678@aa.com', 1, 1480987109),
(26, 'user', 'user', '25d55ad283aa400af464c76d713c07ad', 1, '山西省太原市', '01000', '18334793282', '12345678@aa.com', 1, 1481267975),
(27, 'user2', 'user2', '25d55ad283aa400af464c76d713c07ad', 1, NULL, NULL, NULL, '12345678@aa.com', 1, 1481268052),
(28, 'user3', 'use3', '25d55ad283aa400af464c76d713c07ad', 1, NULL, NULL, NULL, '12345678@aa.com', 1, 1481268084),
(34, 'xiaohuaidan', 'lilei', '123', 1, NULL, NULL, NULL, '123@qq.com', 1, 1485272221);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mibao`
--
ALTER TABLE `mibao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_copy`
--
ALTER TABLE `users_copy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- 使用表AUTO_INCREMENT `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- 使用表AUTO_INCREMENT `link`
--
ALTER TABLE `link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `mibao`
--
ALTER TABLE `mibao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- 使用表AUTO_INCREMENT `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- 使用表AUTO_INCREMENT `users_copy`
--
ALTER TABLE `users_copy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
