DROP database IF EXISTS sjae;
CREATE database sjae DEFAULT CHARACTER SET 'utf8';
use sjae;
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
  `file_name` varchar(50) DEFAULT NULL COMMENT '标题',
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
  `content` varchar(5000) DEFAULT NULL COMMENT '文章内容',
  `date` datetime DEFAULT NULL COMMENT '文章修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
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