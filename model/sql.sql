DROP database IF EXISTS sjae;
CREATE database sjae DEFAULT CHARACTER SET 'utf8';
use sjae;
set names utf8;
-- ----------------------------
-- Table structure for navbar
-- ----------------------------
DROP TABLE IF EXISTS `navbar`;
CREATE TABLE IF NOT EXISTS `navbar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '0' COMMENT '导航栏目名称',
  `group` int(11) NOT NULL DEFAULT '0' COMMENT '导航栏目分组',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '设置父id',
  `href` text COMMENT '导航栏链接',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='导航栏';
-- ----------------------------
-- Table data for navbar
-- ----------------------------
INSERT INTO `navbar` (`id`, `name`, `group`, `pid`, `href`) VALUES
	(1, '首页', 0, 0, NULL),
	(2, '关于盛达杰森', 1, 0, NULL),
	(3, '企业概况', 0, 2, NULL),
	(4, '价值理念', 0, 2, NULL),
	(5, '发展历程', 0, 2, NULL),
	(6, '产品&服务', 0, 0, NULL),
	(7, '半导体装备', 0, 6, NULL),
	(8, '真空装备', 0, 6, NULL);
-- ----------------------------
-- Table structure for slideshow
-- ----------------------------
DROP TABLE IF EXISTS `slideshow`;
CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(100) DEFAULT NULL COMMENT '保存路径',
  `url` varchar(100) DEFAULT NULL COMMENT '关联的链接',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL COMMENT '文件名',
  `content` varchar(100) DEFAULT NULL COMMENT '文章内容的html路径',
  `create_date` datetime DEFAULT NULL COMMENT '文章修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table data for news
-- ----------------------------
INSERT INTO `news` (`id`, `title`, `content`, `date`) VALUES (1, '北京市委书记蔡奇一行莅临盛达杰森视察调研', '\\resource\\news\\1.html', '2017-09-25 15:27:23');
INSERT INTO `news` (`id`, `title`, `content`, `date`) VALUES (2, 'NAURA GO | 砥砺奋进中的国产集成电路装备产业', '\\resource\\news\\2.html', '2017-09-28 15:27:23');
INSERT INTO `news` (`id`, `title`, `content`, `date`) VALUES (3, '和NAURA一起 | 在IC China带给产业无限可能', '\\resource\\news\\3.html', '2017-10-17 16:27:23');
INSERT INTO `news` (`id`, `title`, `content`, `date`) VALUES (4, '盛达杰森主导编写的SEMI 光伏标准进入最终审核环节', '\\resource\\news\\4.html', '2017-10-24 16:27:23');
INSERT INTO `news` (`id`, `title`, `content`, `date`) VALUES (5, '盛达杰森创参加2017年中国集成电路制造年会', '\\resource\\news\\5.html', '2017-08-25 15:27:23');
INSERT INTO `news` (`id`, `title`, `content`, `date`) VALUES (6, '盛达杰森为中国IGBT生产商提供关键工艺设备解决方案', '\\resource\\news\\6.html', '2017-11-13 16:27:23');
-- ----------------------------
-- Table structure for produces
-- ----------------------------
DROP TABLE IF EXISTS `produces`;
CREATE TABLE `produces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL COMMENT '产品或类别的名称',
  `type` int(1) DEFAULT NULL COMMENT '1分类2产品',
  `father_id` int(11) DEFAULT NULL COMMENT '父级id',
  `html_path` varchar(100) DEFAULT NULL COMMENT 'html的文件路径',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- 导出  表 sjae.admin_login 结构
CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '登录名',
  `pwd` text NOT NULL COMMENT '密码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='后台登录表';

-- 正在导出表  sjae.admin_login 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `admin_login` DISABLE KEYS */;
INSERT INTO `admin_login` (`id`, `name`, `pwd`) VALUES
  (1, 'll', '3049a1f0f1c808cdaa4fbed0e01649b1');