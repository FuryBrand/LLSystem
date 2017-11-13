DROP database IF EXISTS llsystem;
CREATE database llsystem DEFAULT CHARACTER SET 'utf8';
use llsystem;
-- ----------------------------
-- Table structure for navi
-- ----------------------------
DROP TABLE IF EXISTS `navi`;
CREATE TABLE `navi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  `father_id` int(11) DEFAULT NULL COMMENT '父标题的id',
  `url` varchar(100) DEFAULT NULL COMMENT '关联的链接',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
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