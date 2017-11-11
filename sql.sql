-- --------------------------------------------------------
-- 主机:                           127.0.0.1
-- 服务器版本:                        10.1.19-MariaDB - mariadb.org binary distribution
-- 服务器操作系统:                      Win32
-- HeidiSQL 版本:                  9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- 导出 dingcan 的数据库结构
CREATE DATABASE IF NOT EXISTS `dingcan` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dingcan`;

-- 导出  表 dingcan.comment 结构
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(100) NOT NULL DEFAULT '0' COMMENT '评论',
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '评论时间',
  `user` int(11) DEFAULT NULL COMMENT '评论人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='评论';

-- 正在导出表  dingcan.comment 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` (`id`, `content`, `time`, `user`) VALUES
	(1, '1', '2017-11-05 19:10:02', NULL),
	(2, '2', '2017-11-05 19:17:42', NULL),
	(3, '3', '2017-11-05 19:17:48', NULL),
	(4, '4', '2017-11-05 19:17:54', NULL),
	(5, '5', '2017-11-05 19:17:59', NULL),
	(6, '6', '2017-11-05 19:18:03', NULL),
	(7, '7', '2017-11-05 19:18:09', NULL),
	(8, 'alert(1)', '2017-11-05 19:30:11', NULL),
	(9, '123', '2017-11-05 19:30:40', NULL);
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;

-- 导出  表 dingcan.department 结构
CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '0' COMMENT '部门名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='部门';

-- 正在导出表  dingcan.department 的数据：~6 rows (大约)
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` (`id`, `name`) VALUES
	(1, '产品交易事业部'),
	(2, '产业电商事业部'),
	(3, '会员拓展部'),
	(4, '产品交割事业部'),
	(5, '资金结算中心'),
	(6, '技术与大数据中心');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;

-- 导出  表 dingcan.foodcount 结构
CREATE TABLE IF NOT EXISTS `foodcount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `count` int(11) NOT NULL COMMENT '订餐数量',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '订餐日期',
  `department` int(11) NOT NULL COMMENT '部门id',
  `uid` int(11) DEFAULT NULL COMMENT '用户id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='订餐人数统计';

-- 正在导出表  dingcan.foodcount 的数据：~15 rows (大约)
/*!40000 ALTER TABLE `foodcount` DISABLE KEYS */;
INSERT INTO `foodcount` (`id`, `count`, `date`, `department`, `uid`) VALUES
	(5, 10, '2017-11-03 15:36:35', 2, NULL),
	(6, 5, '2017-11-03 16:22:30', 3, NULL),
	(7, 20, '2017-11-05 11:15:12', 3, NULL),
	(8, 10, '2017-11-05 11:39:25', 1, NULL),
	(9, -5, '2017-11-05 11:41:14', 1, NULL),
	(10, 1, '2017-11-05 18:34:08', 1, NULL),
	(11, 1, '2017-11-05 18:34:48', 6, NULL),
	(12, 1, '2017-11-05 18:35:06', 2, NULL),
	(13, 2, '2017-11-05 18:36:01', 1, NULL),
	(14, 1, '2017-11-05 18:36:08', 2, NULL),
	(15, -1, '2017-11-05 18:36:21', 4, NULL),
	(16, 4, '2017-11-05 18:36:40', 4, NULL),
	(17, 0, '2017-11-05 18:36:53', 1, NULL),
	(18, 0, '2017-11-05 18:37:09', 1, NULL),
	(19, 1, '2017-11-05 18:37:18', 1, NULL),
	(20, 0, '2017-11-05 19:32:00', 1, NULL);
/*!40000 ALTER TABLE `foodcount` ENABLE KEYS */;

-- 导出  表 dingcan.user 结构
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0' COMMENT '姓名',
  `password` varchar(50) NOT NULL DEFAULT '0' COMMENT '密码',
  `department` int(11) NOT NULL DEFAULT '0' COMMENT '部门id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

-- 正在导出表  dingcan.user 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
