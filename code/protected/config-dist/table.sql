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
  `creator` bigint(20) NOT NULL COMMENT '创建者',
  PRIMARY KEY (`id`),
  KEY `creator` (`creator`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8

CREATE TABLE `m-coursecontent` (
 `id` bigint(20) unsigned not null AUTO_INCREMENT comment '章节id',
 `courseid` bigint(20) unsigned not null comment '课程id',
 `title` varchar(255) not null comment '章节标题',
 `content` BLOB  NOT NULL COMMENT '章节内容',
 `reserve` int unsigned not null default 0 comment'保留，看是否可用作章节权重等',
 PRIMARY KEY (`id`),
 key `courseid`(`courseid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8

CREATE TABLE `m-group` (
 `id` bigint(20) unsigned not null auto_increment comment '小组id',
 `name` varchar(20) NOT NULL COMMENT '小组名',
 `creator` bigint(20) NOT NULL COMMENT '创建者',
 `description` blob  COMMENT '小组简介',
 `courseid` bigint(20) unsigned not null comment '课程id',
 `membercount` tinyint unsigned NOT NULL default 12 comment '小组人数（默认12个人）',
 `icon` varchar(100) not null comment '小组图标',
 `jointype` tinyint unsigned NOT NULL default 1 comment '加入方式（1自由加入，2审核加入，3邀请加入）',
 PRIMARY KEY (`id`),
 key `creator`(`creator`)
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8

CREATE TABLE `m-groupmember` (
 `groupid` int unsigned not null comment '小组id',
 `uid` bigint(20) NOT NULL COMMENT '用户id',
 PRIMARY KEY (`groupid`, `uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8

CREATE TABLE `m-discuss` (
 `id` bigint(20) unsigned not null auto_increment comment '讨论id',
 `title` varchar(255) not null comment '讨论主题',
 `courseid` int unsigned not null comment '课程id',
 `content` BLOB  NOT NULL COMMENT '讨论内容',
 `tags` varchar(255) not null comment '讨论标签',
 PRIMARY KEY (`contentid`),
 key `courseid`(`courseid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8

CREATE TABLE `m-discussmember` (
 `discussid` bigint(20) unsigned not null auto_increment comment '讨论id',
 `uid` varchar(20) NOT NULL COMMENT '用户id',
 PRIMARY KEY (`discussid`,`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8

CREATE TABLE `m-discussreply` (
 `id` bigint(20) unsigned not null comment '回复id',
 `discussid` bigint(20) unsigned not null comment '讨论id',
 `comment` BLOB  NOT NULL COMMENT '回复内容',
 `uid` bigint(20) NOT NULL COMMENT '用户id',
 PRIMARY `id` (`id`)
 key 
) ENGINE=MyISAM DEFAULT CHARSET=utf8

CREATE TABLE `m-study` (
 `id` bigint(20) unsigned not null auto_increment comment 'id',
 `type` tinyint unsigned not null comment '1我的摘抄，2我的批注'
 `content` BLOB  NOT NULL COMMENT '内容',
 `chapterid` bigint(20)  NOT NULL COMMENT '所属章节id',
 `uid` bigint(20) NOT NULL COMMENT '用户id',
 PRIMARY KEY (`id`),
 key `uid`(`uid`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8

CREATE TABLE `m-homework` (
 `id` bigint(20) unsigned not null auto_increment comment '作业id，每道题都是一个记录',
 `type` tinyint unsigned not null comment '1单选，2多选，3问答'
 `title` BLOB  NOT NULL COMMENT '题目',
 `option` BLOB  NOT NULL COMMENT '选择题选项',
 `rightanswer` BLOB  NOT NULL COMMENT '正确答案',
 `chapterid` bigint(20)  NOT NULL COMMENT '所属章节id',
 PRIMARY KEY (`id`),
 key `chapterid`(`chapterid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8

CREATE TABLE `m-answer` (
 `id` bigint(20) unsigned not null auto_increment comment '完成作业id',
 `homeworkid` bigint(20) unsigned not null comment '作业id',
 `answer` BLOB  NOT NULL COMMENT '学生所填答案',
 `uid` bigint(20) NOT NULL COMMENT '用户id',
 PRIMARY KEY (`id`),
 key `uid`(`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8

CREATE TABLE `m-info` (
   `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '消息id',
   `type` TINYINT UNSIGNED NOT NULL COMMENT '1通知类型，2需要作出操作',
   `content` BLOB  NOT NULL COMMENT '消息内容',
   `uid` BIGINT(20) NOT NULL COMMENT '消息接受者',
   `responce` BLOB NOT NULL COMMENT '消息响应',
   PRIMARY KEY (`id`),
   KEY `uid`(`uid`)
) ENGINE=MYISAM DEFAULT CHARSET=utf8
