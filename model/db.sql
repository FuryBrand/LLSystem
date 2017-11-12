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


-- 导出 sjae 的数据库结构
CREATE DATABASE IF NOT EXISTS `sjae` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `sjae`;

-- 导出  表 sjae.navbar 结构
CREATE TABLE IF NOT EXISTS `navbar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '0' COMMENT '导航栏目名称',
  `group` int(11) NOT NULL DEFAULT '0' COMMENT '导航栏目分组',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '设置父id',
  `href` text COMMENT '导航栏链接',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='导航栏';

-- 正在导出表  sjae.navbar 的数据：~8 rows (大约)
/*!40000 ALTER TABLE `navbar` DISABLE KEYS */;
INSERT INTO `navbar` (`id`, `name`, `group`, `pid`, `href`) VALUES
	(1, '首页', 0, 0, NULL),
	(2, '关于盛达杰森', 1, 0, NULL),
	(3, '企业概况', 0, 2, NULL),
	(4, '价值理念', 0, 2, NULL),
	(5, '发展历程', 0, 2, NULL),
	(6, '产品&服务', 0, 0, NULL),
	(7, '半导体装备', 0, 6, NULL),
	(8, '真空装备', 0, 6, NULL);
/*!40000 ALTER TABLE `navbar` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
