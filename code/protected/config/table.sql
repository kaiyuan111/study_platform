CREATE TABLE `m-action` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aname` varchar(20) NOT NULL DEFAULT '',
  `route` varchar(100) NOT NULL DEFAULT '',
  `is_menu` tinyint(1) NOT NULL DEFAULT '0',
  `logo` varchar(100) NOT NULL DEFAULT '',
  `logo_click` varchar(100) NOT NULL DEFAULT '',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`aid`),
  UNIQUE KEY `aname` (`aname`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8


CREATE TABLE `m-role` (
  `rid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rname` varchar(20) NOT NULL DEFAULT '',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rid`),
  UNIQUE KEY `name` (`rname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8

CREATE TABLE `m-role-action` (
  `rid` int(10) unsigned NOT NULL DEFAULT '0',
  `aid` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rid`,`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8

CREATE TABLE `m-user` (
  `uid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uname` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `pwd` varchar(20) NOT NULL DEFAULT '',
  `rid` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` timestamp NOT NULL DEFAULT
  CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `name` (`uname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8

CREATE TABLE `m-courseclass` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8

CREATE TABLE `m-course` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `desc` blob  COMMENT '课程简介',
  `classid` int(10) not null comment '所属科目',
  `createor` bigint(20) NOT NULL COMMENT '创建者',
  PRIMARY KEY (`id`),
  KEY `createor` (`createor`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8

CREATE TABLE `m-coursecontent` (
 `contentid` bigint(20) unsigned not null AUTO_INCREMENT comment '章节id',
 `courseid` bigint(20) unsigned not null comment '课程id',
 `title` varchar(255) not null comment '课程标题',
 `content` BLOB  NOT NULL COMMENT '章节内容',
 `reserve` int unsigned not null comment'保留，看是否可用作章节权重等',
 PRIMARY KEY (`contentid`),
 key `courseid`(`courseid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8

CREATE TABLE `m-group` (
 `id` bigint(20) unsigned not null auto_increment comment '小组id',
 `name` varchar(20) NOT NULL COMMENT '小组名',
 `creator` bigint(20) NOT NULL COMMENT '创建者',
 `description` blob  COMMENT '小组简介',
 `courseid` bigint(20) unsigned not null comment '课程id',
 `membercount` tinyint unsigned NOT NULL default 12 comment '小组人数（默认12个人）',
 `icon` varchar(30) not null comment '小组图标',
 `jointype` tinyint unsigned NOT NULL default 1 comment '加入方式（1自由加入，2审核加入，3邀请加入）',
 PRIMARY KEY (`id`),
 key `creator`(`creator`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8
