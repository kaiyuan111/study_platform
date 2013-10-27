-- MySQL dump 10.13  Distrib 5.5.25a, for Win32 (x86)
--
-- Host: localhost    Database: study_platform
-- ------------------------------------------------------
-- Server version	5.5.25a

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `m-action`
--

DROP TABLE IF EXISTS `m-action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m-action`
--

LOCK TABLES `m-action` WRITE;
/*!40000 ALTER TABLE `m-action` DISABLE KEYS */;
INSERT INTO `m-action` VALUES (1,'编辑用户','/main/user/edit',0,'/images/frame/leftnav/yhgl.png','/images/frame/leftnav/click/yhgl.png','2013-08-01 13:51:28'),(2,'用户列表','/main/user/list',1,'/images/frame/leftnav/yhgl.png','/images/frame/leftnav/yhgl.png','2013-08-01 13:51:28'),(3,'编辑角色','/main/role/edit',0,'','','2013-08-01 13:51:28'),(4,'角色列表','/main/role/list',1,'','','2013-08-01 13:51:28'),(5,'编辑路由','/main/action/edit',0,'','','2013-08-01 13:51:28'),(6,'路由列表','/main/action/list',1,'','','2013-08-01 13:51:28'),(21,'老师消息列表','/teacher/messagelist',1,'','','2013-08-04 12:13:52'),(8,'创建小组','/teacher/creategroup',1,'/images/frame/leftnav/cjxz.png','/images/frame/leftnav/click/cjxz.png','2013-08-03 06:11:25'),(9,'创建课程','/teacher/createcourse',0,'','','2013-08-03 06:51:07'),(10,'课程列表','/teacher/courselist',1,'/images/frame/leftnav/kcgl.png','/images/frame/leftnav/click/kcgl.png','2013-08-03 07:26:39'),(11,'内容管理','/teacher/managecourse',1,'/images/frame/leftnav/nrgl.png','/images/frame/leftnav/click/nrgl.png','2013-08-03 07:59:50'),(12,'小组管理','/teacher/managegroup',1,'/images/frame/leftnav/xzgl.png','/images/frame/leftnav/click/xzgl.png','2013-08-03 08:39:38'),(13,'查看讨论','/teacher/discusslist',1,'/images/frame/leftnav/cktl.png','/images/frame/leftnav/click/cktl.png','2013-08-03 09:05:46'),(14,'查看消息','/teacher/messagelist',1,'/images/frame/leftnav/ckxx.png','/images/frame/leftnav/click/ckxx.png','2013-08-03 10:03:52'),(15,'添加内容','/teacher/addcontent',0,'','','2013-08-03 10:34:11'),(16,'我的批注','/student/annotationlist',1,'/images/frame/leftnav/wdpz.png','/images/frame/leftnav/click/wdpz.png','2013-08-03 14:11:52'),(17,'讨论列表','/student/discusslist',1,'/images/frame/leftnav/wdtl.png','/images/frame/leftnav/click/wdtl.png','2013-08-04 11:13:28'),(18,'我的摘抄','/student/excerptlist',1,'/images/frame/leftnav/wdzc.png','/images/frame/leftnav/click/wdzc.png','2013-08-04 11:45:06'),(19,'小组信息','/student/groupdetail',0,'','','2013-08-04 11:51:48'),(20,'小组列表','/student/grouplist',1,'/images/frame/leftnav/wdxz.png','/images/frame/leftnav/click/wdxz.png','2013-08-04 12:01:13'),(22,'学生消息列表','/student/messagelist',1,'','','2013-08-04 12:14:51'),(23,'添加科目类别','/teacher/savecourseclass',0,'','','2013-08-05 16:27:39'),(24,'保存课程','/teacher/savecourse',0,'','','2013-08-05 16:36:23'),(25,'保存内容','/teacher/savecontent',0,'','','2013-08-07 15:07:56'),(26,'保存作业','/teacher/savehomework',0,'','','2013-08-09 16:09:52'),(27,'获取单个作业','/teacher/gethomework',0,'','','2013-08-10 03:36:38'),(28,'删除单个作业','/teacher/deletehomework',0,'','','2013-08-10 03:37:00'),(29,'注册','/main/user/register',0,'','','2013-08-10 08:01:23'),(30,'学生课程列表','/student/courselist',1,'/images/frame/leftnav/my4d.png','/images/frame/leftnav/click/my4d.png','2013-08-10 16:37:29'),(31,'课程目录','/student/cataloguelist',0,'','','2013-08-10 17:29:20'),(32,'学习课程','/student/learndetail',0,'','','2013-08-11 04:13:20'),(33,'添加批注摘要显示页面','/student/studydetailpage',0,'','','2013-08-12 14:56:28'),(34,'保存批注摘要讨论内容','/student/addstudydetail',0,'','','2013-08-12 15:39:44'),(35,'获取小组列表','/teacher/getgroups',0,'','','2013-08-26 15:08:39'),(36,'保存小组成员','/teacher/savegroupmember',0,'','','2013-08-26 15:09:26'),(37,'讨论详情','/student/discussdetail',0,'','','2013-08-31 09:28:29'),(38,'回复讨论','/student/adddiscussreply',0,'','','2013-08-31 10:37:16'),(39,'完成作业','/student/saveanswer',0,'','','2013-09-02 17:01:22'),(40,'查看作业','/teacher/homeworkanswerlist',1,'/images/frame/leftnav/ckzy.png','/images/frame/leftnav/click/ckzy.png','2013-09-04 15:34:56'),(41,'根据课程获取目录等','/teacher/getcoursecontentbycid',0,'','','2013-09-05 17:01:09'),(42,'根据课程获取小组','/teacher/getgroupbycid',0,'','','2013-09-05 17:02:18'),(43,'保存点评','/teacher/savehomeworkremark',0,'','','2013-09-07 13:37:06'),(44,'我的作业','/student/homeworklist',1,'/images/frame/leftnav/wdzy.png','/images/frame/leftnav/click/wdzy.png','2013-09-09 16:13:54'),(45,'删除课程','/teacher/deletecourse',0,'','','2013-09-11 16:46:58'),(46,'/申请编辑','/teacher/requestedit',0,'','','2013-09-14 02:21:34'),(47,'回复编辑课程申请','/teacher/returnmessage',0,'','','2013-09-14 02:22:38'),(48,'/删除章节','/teacher/deletechapter',0,'','','2013-09-14 06:17:14'),(49,'删除用户','/main/user/del',0,'','','2013-09-14 06:43:40'),(50,'邀请老师讨论','/student/inviteteacherfordiscuss',0,'','','2013-09-14 08:16:34');
/*!40000 ALTER TABLE `m-action` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m-answer`
--

DROP TABLE IF EXISTS `m-answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m-answer` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '完成作业id',
  `homeworkid` bigint(20) unsigned NOT NULL COMMENT '作业id',
  `answer` blob NOT NULL COMMENT '学生所填答案',
  `remark` blob NOT NULL COMMENT '老师点评',
  `uid` bigint(20) NOT NULL COMMENT '用户id',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m-answer`
--

LOCK TABLES `m-answer` WRITE;
/*!40000 ALTER TABLE `m-answer` DISABLE KEYS */;
/*!40000 ALTER TABLE `m-answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m-course`
--

DROP TABLE IF EXISTS `m-course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m-course` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `desc` blob COMMENT '课程简介',
  `classid` int(10) NOT NULL COMMENT '所属科目',
  `creator` bigint(20) NOT NULL COMMENT '创建者',
  PRIMARY KEY (`id`),
  KEY `creator` (`creator`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m-course`
--

LOCK TABLES `m-course` WRITE;
/*!40000 ALTER TABLE `m-course` DISABLE KEYS */;
/*!40000 ALTER TABLE `m-course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m-courseclass`
--

DROP TABLE IF EXISTS `m-courseclass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m-courseclass` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m-courseclass`
--

LOCK TABLES `m-courseclass` WRITE;
/*!40000 ALTER TABLE `m-courseclass` DISABLE KEYS */;
/*!40000 ALTER TABLE `m-courseclass` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m-coursecontent`
--

DROP TABLE IF EXISTS `m-coursecontent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m-coursecontent` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '章节id',
  `courseid` bigint(20) unsigned NOT NULL COMMENT '课程id',
  `title` varchar(255) NOT NULL COMMENT '章节标题',
  `content` blob NOT NULL COMMENT '章节内容',
  `reserve` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '保留，看是否可用作章节权重等',
  PRIMARY KEY (`id`),
  KEY `courseid` (`courseid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m-coursecontent`
--

LOCK TABLES `m-coursecontent` WRITE;
/*!40000 ALTER TABLE `m-coursecontent` DISABLE KEYS */;
/*!40000 ALTER TABLE `m-coursecontent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m-discuss`
--

DROP TABLE IF EXISTS `m-discuss`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m-discuss` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '讨论id',
  `title` varchar(255) NOT NULL COMMENT '讨论主题',
  `chapterid` int(10) unsigned NOT NULL COMMENT '章节id',
  `content` blob NOT NULL COMMENT '讨论内容',
  `tags` varchar(255) NOT NULL COMMENT '讨论标签',
  `uid` bigint(20) NOT NULL COMMENT '用户id',
  PRIMARY KEY (`id`),
  KEY `chapterid` (`chapterid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m-discuss`
--

LOCK TABLES `m-discuss` WRITE;
/*!40000 ALTER TABLE `m-discuss` DISABLE KEYS */;
/*!40000 ALTER TABLE `m-discuss` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m-discussmember`
--

DROP TABLE IF EXISTS `m-discussmember`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m-discussmember` (
  `discussid` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '讨论id',
  `uid` varchar(20) NOT NULL COMMENT '用户id',
  PRIMARY KEY (`discussid`,`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m-discussmember`
--

LOCK TABLES `m-discussmember` WRITE;
/*!40000 ALTER TABLE `m-discussmember` DISABLE KEYS */;
/*!40000 ALTER TABLE `m-discussmember` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m-discussreply`
--

DROP TABLE IF EXISTS `m-discussreply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m-discussreply` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '回复id',
  `discussid` bigint(20) unsigned NOT NULL COMMENT '讨论id',
  `comment` blob NOT NULL COMMENT '回复内容',
  `uid` bigint(20) NOT NULL COMMENT '用户id',
  `time` int(10) NOT NULL COMMENT '回复时间',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m-discussreply`
--

LOCK TABLES `m-discussreply` WRITE;
/*!40000 ALTER TABLE `m-discussreply` DISABLE KEYS */;
/*!40000 ALTER TABLE `m-discussreply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m-group`
--

DROP TABLE IF EXISTS `m-group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m-group` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '小组id',
  `name` varchar(20) NOT NULL COMMENT '小组名',
  `creator` bigint(20) NOT NULL COMMENT '创建者',
  `description` blob COMMENT '小组简介',
  `leaderid` bigint(20) unsigned NOT NULL COMMENT '组长id',
  `courseid` bigint(20) unsigned NOT NULL COMMENT '课程id',
  `membercount` tinyint(3) unsigned NOT NULL DEFAULT '12' COMMENT '小组人数（默认12个人）',
  `icon` varchar(30) NOT NULL COMMENT '小组图标',
  `jointype` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '加入方式（1自由加入，2审核加入，3邀请加入）',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `creator` (`creator`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m-group`
--

LOCK TABLES `m-group` WRITE;
/*!40000 ALTER TABLE `m-group` DISABLE KEYS */;
/*!40000 ALTER TABLE `m-group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m-groupmember`
--

DROP TABLE IF EXISTS `m-groupmember`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m-groupmember` (
  `groupid` int(10) unsigned NOT NULL COMMENT '小组id',
  `uid` bigint(20) NOT NULL COMMENT '用户id',
  PRIMARY KEY (`groupid`,`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m-groupmember`
--

LOCK TABLES `m-groupmember` WRITE;
/*!40000 ALTER TABLE `m-groupmember` DISABLE KEYS */;
/*!40000 ALTER TABLE `m-groupmember` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m-homework`
--

DROP TABLE IF EXISTS `m-homework`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m-homework` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '作业id，每道题都是一个记录',
  `type` tinyint(3) unsigned NOT NULL COMMENT '1单选，2多选，3问答',
  `title` blob NOT NULL COMMENT '题目',
  `option` blob NOT NULL COMMENT '选择题选项',
  `rightanswer` blob NOT NULL COMMENT '正确答案',
  `chapterid` bigint(20) NOT NULL COMMENT '所属章节id',
  PRIMARY KEY (`id`),
  KEY `chapterid` (`chapterid`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m-homework`
--

LOCK TABLES `m-homework` WRITE;
/*!40000 ALTER TABLE `m-homework` DISABLE KEYS */;
/*!40000 ALTER TABLE `m-homework` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m-info`
--

DROP TABLE IF EXISTS `m-info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m-info` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '消息id',
  `type` varchar(30) NOT NULL DEFAULT '' COMMENT '1通知类型，2需要作出操作',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '消息题目',
  `request_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '申请时间',
  `uid_from` bigint(20) NOT NULL DEFAULT '-1' COMMENT '消息发送者',
  `content` blob NOT NULL COMMENT '消息内容',
  `uid_to` bigint(20) NOT NULL DEFAULT '-1' COMMENT '消息接受者',
  `is_responce` tinyint(4) NOT NULL DEFAULT '0',
  `responce` blob NOT NULL COMMENT '消息响应',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid_to`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m-info`
--

LOCK TABLES `m-info` WRITE;
/*!40000 ALTER TABLE `m-info` DISABLE KEYS */;
/*!40000 ALTER TABLE `m-info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m-role`
--

DROP TABLE IF EXISTS `m-role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m-role` (
  `rid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rname` varchar(20) NOT NULL DEFAULT '',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rid`),
  UNIQUE KEY `name` (`rname`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m-role`
--

LOCK TABLES `m-role` WRITE;
/*!40000 ALTER TABLE `m-role` DISABLE KEYS */;
INSERT INTO `m-role` VALUES (1,'superman','2013-08-01 13:51:28'),(2,'teacher','2013-08-02 08:49:24'),(3,'student','2013-08-02 08:49:24'),(4,'admin','2013-09-14 06:25:57');
/*!40000 ALTER TABLE `m-role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m-role-action`
--

DROP TABLE IF EXISTS `m-role-action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m-role-action` (
  `rid` int(10) unsigned NOT NULL DEFAULT '0',
  `aid` int(10) unsigned NOT NULL DEFAULT '0',
  `menu_pos` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rid`,`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m-role-action`
--

LOCK TABLES `m-role-action` WRITE;
/*!40000 ALTER TABLE `m-role-action` DISABLE KEYS */;
INSERT INTO `m-role-action` VALUES (3,44,5,'2013-09-14 08:16:46'),(3,41,0,'2013-09-14 08:16:46'),(3,39,0,'2013-09-14 08:16:46'),(3,38,0,'2013-09-14 08:16:46'),(2,47,0,'2013-09-14 06:17:26'),(1,6,0,'2013-09-14 06:43:56'),(2,46,0,'2013-09-14 06:17:26'),(2,45,0,'2013-09-14 06:17:26'),(2,43,0,'2013-09-14 06:17:26'),(2,42,0,'2013-09-14 06:17:26'),(2,41,0,'2013-09-14 06:17:26'),(2,40,5,'2013-09-14 06:17:26'),(2,38,0,'2013-09-14 06:17:26'),(2,37,0,'2013-09-14 06:17:26'),(3,37,0,'2013-09-14 08:16:46'),(2,36,0,'2013-09-14 06:17:26'),(2,35,0,'2013-09-14 06:17:26'),(2,28,0,'2013-09-14 06:17:26'),(2,27,0,'2013-09-14 06:17:26'),(2,26,0,'2013-09-14 06:17:26'),(2,25,0,'2013-09-14 06:17:26'),(2,24,0,'2013-09-14 06:17:26'),(2,23,0,'2013-09-14 06:17:26'),(1,1,0,'2013-09-14 06:43:56'),(1,2,0,'2013-09-14 06:43:56'),(1,3,0,'2013-09-14 06:43:56'),(1,4,0,'2013-09-14 06:43:56'),(3,34,0,'2013-09-14 08:16:46'),(3,33,0,'2013-09-14 08:16:46'),(1,5,0,'2013-09-14 06:43:56'),(3,32,0,'2013-09-14 08:16:46'),(3,31,0,'2013-09-14 08:16:46'),(3,30,0,'2013-09-14 08:16:46'),(3,29,0,'2013-09-14 08:16:46'),(3,20,1,'2013-09-14 08:16:46'),(2,15,0,'2013-09-14 06:17:26'),(2,14,6,'2013-09-14 06:17:26'),(3,19,0,'2013-09-14 08:16:46'),(3,18,3,'2013-09-14 08:16:46'),(2,13,4,'2013-09-14 06:17:26'),(2,12,3,'2013-09-14 06:17:26'),(2,11,1,'2013-09-14 06:17:26'),(2,10,0,'2013-09-14 06:17:26'),(3,17,2,'2013-09-14 08:16:46'),(3,16,4,'2013-09-14 08:16:46'),(2,9,0,'2013-09-14 06:17:26'),(2,8,2,'2013-09-14 06:17:26'),(2,48,0,'2013-09-14 06:17:26'),(4,2,0,'2013-09-14 06:43:51'),(4,1,0,'2013-09-14 06:43:51'),(4,49,0,'2013-09-14 06:43:51'),(1,49,0,'2013-09-14 06:43:56'),(3,50,0,'2013-09-14 08:16:46');
/*!40000 ALTER TABLE `m-role-action` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m-study`
--

DROP TABLE IF EXISTS `m-study`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m-study` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `type` tinyint(3) unsigned NOT NULL COMMENT '1我的摘抄，2我的批注',
  `content` blob NOT NULL COMMENT '内容',
  `chapterid` bigint(20) NOT NULL COMMENT '所属章节id',
  `uid` bigint(20) NOT NULL COMMENT '用户id',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`,`type`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m-study`
--

LOCK TABLES `m-study` WRITE;
/*!40000 ALTER TABLE `m-study` DISABLE KEYS */;
/*!40000 ALTER TABLE `m-study` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m-user`
--

DROP TABLE IF EXISTS `m-user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m-user` (
  `uid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uname` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `pwd` varchar(20) NOT NULL DEFAULT '',
  `rid` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `name` (`uname`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m-user`
--

LOCK TABLES `m-user` WRITE;
/*!40000 ALTER TABLE `m-user` DISABLE KEYS */;
INSERT INTO `m-user` VALUES (1,'superman','','superman',1,'2013-08-01 13:51:28'),(9,'admin','admin@tt.com','admin',4,'2013-09-14 06:30:24');
/*!40000 ALTER TABLE `m-user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m-user-privilege`
--

DROP TABLE IF EXISTS `m-user-privilege`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m-user-privilege` (
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `privilege_tag` varchar(20) NOT NULL DEFAULT '' COMMENT '特权标志',
  `content` varchar(20) NOT NULL DEFAULT '' COMMENT '特权内容',
  PRIMARY KEY (`uid`,`privilege_tag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m-user-privilege`
--

LOCK TABLES `m-user-privilege` WRITE;
/*!40000 ALTER TABLE `m-user-privilege` DISABLE KEYS */;
/*!40000 ALTER TABLE `m-user-privilege` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-17  2:23:59
