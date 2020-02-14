# Host: localhost  (Version: 5.7.26)
# Date: 2020-02-14 20:30:45
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "group_admin"
#

DROP TABLE IF EXISTS `group_admin`;
CREATE TABLE `group_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL COMMENT '管理员名称',
  `password` varchar(200) NOT NULL COMMENT '管理员密码',
  `role_id` int(10) unsigned NOT NULL COMMENT '0是超管',
  `createtime` int(10) unsigned DEFAULT NULL,
  `updatetime` int(10) unsigned DEFAULT NULL,
  `loginip` varchar(50) DEFAULT NULL COMMENT '登录ip',
  `logintime` int(10) unsigned DEFAULT '0' COMMENT '上一次登录时间',
  `logincount` int(255) unsigned DEFAULT '0' COMMENT '登录次数',
  `logouttime` int(10) unsigned DEFAULT '0' COMMENT '最近一次退出时间',
  `status` tinyint(255) unsigned NOT NULL DEFAULT '1' COMMENT '0删除1正常2禁止登录',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='管理员记录表';

#
# Data for table "group_admin"
#

INSERT INTO `group_admin` VALUES (1,'admin','$2y$10$yeFA0EcuhIugrh4PWT856.LNeMXjoMroKQCV1.Tdtrbu04C4b7aWK',1,1562917405,1581683350,'127.0.0.1',1581683219,382,0,1),(2,'psks','$2y$10$JumXdp3Lj2cioas/L9GfI.WtjlFfRJ9wU5Nxjwt71KraTNyAYkByG',1,1563343343,1572328517,'36.5.114.252',1572328517,5,0,1),(3,'psk2','$2y$10$4tbmRMWX1fnPMSmpW/Z.2eRHhaCLkY.f4aB9ilIVYHCbiY8N/G56m',1,1563343482,1581683342,'127.0.0.1',1581677599,14,0,1),(4,'ssaaa','$2y$10$n0s.zPQV58vyWwoskmwP2OYXN1EkmXFNLA0YGOyNr6zQYsq60HwXS',1,1563343509,1581668911,NULL,0,0,0,0),(5,'11','$2y$10$uu9J9HZrkCNC5r7RrbQ3s.NI0AO4ka0OGMqZaflux4kBDiR2tKRt.',0,1563343550,1565247902,NULL,0,0,0,0),(6,'qq','$2y$10$cW0f9S8I4XuVU1yiYazW3eD1BMPk.zwgYqAqjmDGqUP6S.g2LbDTO',0,1563355038,1563355046,NULL,0,0,0,0),(7,'111','$2y$10$qaL14rCh4rBLjSDUAUH2Fu.02Cbaya3mrHALdRLCXOJDGP0rqGWp.',1,1581604827,1581605875,NULL,0,0,0,0),(8,'psk334','$2y$10$KjDEB8HYgRIdKGXqrdoWcOZ/XTtRLuhcvZ429eFkeQBFuRpfzlHqi',5,1581668710,1581668903,NULL,0,0,0,0);

#
# Structure for table "group_admin_log"
#

DROP TABLE IF EXISTS `group_admin_log`;
CREATE TABLE `group_admin_log` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '管理员id',
  `database` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '数据表名称',
  `desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '操作描述',
  `create_at` int(11) unsigned NOT NULL DEFAULT '0',
  `controller` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '控制器名称',
  `action` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '方法名称',
  `module` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '模块名称',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0显示 1删除',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='管理员操作日志表';

#
# Data for table "group_admin_log"
#

/*!40000 ALTER TABLE `group_admin_log` DISABLE KEYS */;
INSERT INTO `group_admin_log` VALUES (16,1,'admin','管理员  【admin】 在  【2020-02-14 16:25:10】 添加了一个名称：【psk3】的管理员',1581668710,'User','add','admin',0),(17,1,'admin','管理员  【admin】 在  【2020-02-14 16:25:27】 修改了一个名称：【admin】的管理员 为 【psk3】  ',1581668728,'User','update','admin',0),(18,1,'admin','管理员  【admin】 在  【2020-02-14 16:26:11】 修改了一个名称：【admin】的管理员 为 【psk33】  ',1581668771,'User','update','admin',0),(19,1,'admin','管理员  【admin】 在  【2020-02-14 16:28:14】 修改了管理员id:【8】的名称：为 【psk334】  ',1581668894,'User','update','admin',0),(20,1,'admin','管理员  【admin】 在  【2020-02-14 16:28:23】 删除了一个名称：【psk334】的管理员   ',1581668903,'User','delete','admin',0),(21,1,'admin','管理员  【admin】 在  【2020-02-14 16:28:31】 删除了一个名称：【ssaaa】的管理员   ',1581668911,'User','delete','admin',0),(22,1,'role','管理员  【admin】 在  【2020-02-14 16:28:46】 修改了一个名称：【测试2】的角色信息   ',1581668926,'Role','update','admin',0),(23,1,'role','管理员  【admin】 在  【2020-02-14 16:28:59】 添加了一个名称：【测试3】的角色信息   ',1581668939,'Role','add','admin',0),(24,1,'role','管理员 【admin】 在 【2020-02-14 16:29:07】 修改角色名称  【测试3】 的权限！',1581668947,'Role','perm','admin',0),(25,1,'role','管理员 【admin】 在 【2020-02-14 16:32:57】 修改角色名称  【测试2】 的权限！',1581669177,'Role','perm','admin',0),(26,1,'admin','管理员  【admin】 在  【2020-02-14 16:33:18】 修改了管理员id:【3】的名称：为 【psk2】  ',1581669198,'User','update','admin',0),(27,3,'admin','管理员  【psk2】 在  【2020-02-14 16:33:33】 登录到后台,登录IP地址是:  【36.5.113.190】 ',1581669213,'Login','ApiLogin','admin',0),(28,1,'admin','管理员  【admin】 在  【2020-02-14 16:33:48】 登录到后台,登录IP地址是:  【127.0.0.1】 ',1581669228,'Login','ApiLogin','admin',0),(29,1,'role','管理员 【admin】 在 【2020-02-14 16:34:09】 修改角色名称  【测试2】 的权限！',1581669249,'Role','perm','admin',0),(30,3,'admin','管理员  【psk2】 在  【2020-02-14 16:34:30】 登录到后台,登录IP地址是:  【127.0.0.1】 ',1581669270,'Login','ApiLogin','admin',0),(31,3,'role','管理员  【psk2】 在  【2020-02-14 16:36:33】 修改了一个名称：【测试4】的角色信息   ',1581669393,'Role','update','admin',0),(32,1,'admin','管理员  【admin】 在  【2020-02-14 16:37:00】 登录到后台,登录IP地址是:  【127.0.0.1】 ',1581669420,'Login','ApiLogin','admin',0),(33,3,'admin','管理员  【psk2】 在  【2020-02-14 16:40:43】 登录到后台,登录IP地址是:  【127.0.0.1】 ',1581669643,'Login','ApiLogin','admin',0),(34,1,'admin','管理员  【admin】 在  【2020-02-14 16:42:45】 登录到后台,登录IP地址是:  【127.0.0.1】 ',1581669765,'Login','ApiLogin','admin',0),(35,1,'admin','管理员  【admin】 在  【2020-02-14 16:42:52】 退出后台管理系统 ',1581669772,'Login','loginOut','admin',0),(36,1,'admin','管理员  【admin】 在  【2020-02-14 16:43:17】 登录到后台,登录IP地址是:  【127.0.0.1】 ',1581669797,'Login','ApiLogin','admin',0),(37,1,'admin','管理员  【admin】 在  【2020-02-14 16:43:24】 退出后台管理系统 ',1581669804,'Login','loginOut','admin',0),(38,1,'admin','管理员  【admin】 在  【2020-02-14 16:45:51】 登录到后台,登录IP地址是:  【127.0.0.1】 ',1581669951,'Login','ApiLogin','admin',0),(39,1,'admin','管理员  【admin】 在  【2020-02-14 16:45:57】 退出后台管理系统 ',1581669957,'Login','loginOut','admin',0),(40,1,'admin','管理员  【admin】 在  【2020-02-14 16:49:46】 登录到后台,登录IP地址是:  【127.0.0.1】 ',1581670186,'Login','ApiLogin','admin',0),(41,1,'admin','管理员  【admin】 在  【2020-02-14 16:49:52】 退出后台管理系统 ',1581670192,'Login','loginOut','admin',0),(42,1,'admin','管理员  【admin】 在  【2020-02-14 16:50:10】 登录到后台,登录IP地址是:  【127.0.0.1】 ',1581670210,'Login','ApiLogin','admin',0),(43,1,'admin','管理员  【admin】 在  【2020-02-14 16:50:17】 退出后台管理系统 ',1581670217,'Login','loginOut','admin',0),(44,1,'admin','管理员  【admin】 在  【2020-02-14 17:53:01】 登录到后台,登录IP地址是:  【127.0.0.1】 ',1581673981,'Login','ApiLogin','admin',0),(45,1,'admin','管理员  【admin】 在  【2020-02-14 17:53:13】 退出后台管理系统 ',1581673993,'Login','loginOut','admin',0),(46,1,'admin','管理员  【admin】 在  【2020-02-14 17:55:31】 登录到后台,登录IP地址是:  【127.0.0.1】 ',1581674131,'Login','ApiLogin','admin',0),(47,1,'admin','管理员  【admin】 在  【2020-02-14 17:55:37】 退出后台管理系统 ',1581674137,'Login','loginOut','admin',0),(48,1,'admin','管理员  【admin】 在  【2020-02-14 18:05:54】 登录到后台,登录IP地址是:  【127.0.0.1】 ',1581674754,'Login','ApiLogin','admin',0),(49,1,'admin','管理员  【admin】 在  【2020-02-14 18:07:30】 退出后台管理系统 ',1581674850,'Login','loginOut','admin',0),(50,1,'admin','管理员  【admin】 在  【2020-02-14 18:16:04】 登录到后台,登录IP地址是:  【127.0.0.1】 ',1581675364,'Login','ApiLogin','admin',0),(51,1,'admin','管理员  【admin】 在  【2020-02-14 18:31:46】 登录到后台,登录IP地址是:  【127.0.0.1】 ',1581676306,'Login','ApiLogin','admin',0),(52,1,'admin','管理员  【admin】 在  【2020-02-14 18:37:55】 退出后台管理系统 ',1581676675,'Login','loginOut','admin',0),(53,1,'admin','管理员  【admin】 在  【2020-02-14 18:41:31】 登录到后台,登录IP地址是:  【127.0.0.1】 ',1581676891,'Login','ApiLogin','admin',0),(54,1,'role','管理员  【admin】 在  【2020-02-14 18:42:31】 添加了一个名称：【测试5】的角色信息   ',1581676951,'Role','add','admin',0),(55,1,'role','管理员 【admin】 在 【2020-02-14 18:52:57】 修改角色名称  【测试5】 的权限！',1581677577,'Role','perm','admin',0),(56,1,'admin','管理员  【admin】 在  【2020-02-14 18:53:07】 修改了管理员id:【3】的名称：为 【psk2】  ',1581677587,'User','update','admin',0),(57,1,'admin','管理员  【admin】 在  【2020-02-14 18:53:12】 退出后台管理系统 ',1581677592,'Login','loginOut','admin',0),(58,3,'admin','管理员  【psk2】 在  【2020-02-14 18:53:19】 登录到后台,登录IP地址是:  【127.0.0.1】 ',1581677599,'Login','ApiLogin','admin',0),(59,3,'admin','管理员  【psk2】 在  【2020-02-14 18:53:53】 退出后台管理系统 ',1581677633,'Login','loginOut','admin',0),(60,1,'admin','管理员  【admin】 在  【2020-02-14 19:55:21】 登录到后台,登录IP地址是:  【127.0.0.1】 ',1581681321,'Login','ApiLogin','admin',0),(61,1,'admin','管理员  【admin】 在  【2020-02-14 19:55:38】 退出后台管理系统 ',1581681338,'Login','loginOut','admin',0),(62,1,'admin','管理员  【admin】 在  【2020-02-14 20:26:59】 登录到后台,登录IP地址是:  【127.0.0.1】 ',1581683219,'Login','ApiLogin','admin',0),(63,1,'role','管理员 【admin】 在 【2020-02-14 20:28:30】 修改角色名称  【系统管理员】 的权限！',1581683310,'Role','perm','admin',0),(64,1,'role','管理员  【admin】 在  【2020-02-14 20:28:38】 删除了一个名称：【测试2】的角色信息   ',1581683318,'Role','delete','admin',0),(65,1,'role','管理员  【admin】 在  【2020-02-14 20:28:43】 删除了一个名称：【测试4】的角色信息   ',1581683323,'Role','delete','admin',0),(66,1,'role','管理员  【admin】 在  【2020-02-14 20:28:48】 删除了一个名称：【测试5】的角色信息   ',1581683328,'Role','delete','admin',0),(67,1,'admin','管理员  【admin】 在  【2020-02-14 20:29:02】 修改了管理员id:【3】的名称：为 【psk2】  ',1581683342,'User','update','admin',0),(68,1,'admin','管理员  【admin】 在  【2020-02-14 20:29:10】 修改了管理员id:【1】的名称：为 【admin】  ',1581683350,'User','update','admin',0);
/*!40000 ALTER TABLE `group_admin_log` ENABLE KEYS */;

#
# Structure for table "group_perm"
#

DROP TABLE IF EXISTS `group_perm`;
CREATE TABLE `group_perm` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sortnum` int(10) unsigned DEFAULT '0' COMMENT '排序',
  `name` varchar(20) NOT NULL COMMENT '菜单名称',
  `controller` varchar(50) NOT NULL COMMENT '控制器名称',
  `action` varchar(50) NOT NULL COMMENT '方法名称',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '0代表顶级',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '0隐藏 1显示 2删除',
  `iconfont` varchar(50) DEFAULT NULL COMMENT '图标class 名称 pid为0时必须',
  `is_menu` tinyint(1) unsigned DEFAULT '1' COMMENT '0不是菜单项 1是菜单项',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='权限表';

#
# Data for table "group_perm"
#

INSERT INTO `group_perm` VALUES (7,1,'管理员管理','#','#',1564487926,1581683030,0,1,'layui-icon-username',1),(8,2,'管理员列表','user','index',1564487977,1564488453,7,1,'',1),(9,0,'管理员添加','user','add',1564488205,1564543701,8,1,'',0),(10,0,'管理员修改','user','update',1564488233,1564543694,8,1,'',0),(11,0,'管理员删除','user','delete',1564488291,1564543687,8,1,'',0),(17,0,'角色列表','role','index',1564543611,0,7,1,'',1),(18,0,'角色添加','role','add',1564543680,1564543711,17,1,'',0),(19,0,'角色修改','role','update',1564543759,0,17,1,'',0),(20,0,'角色删除','role','delete',1564543804,0,17,1,'',0),(21,0,'菜单列表','perm','index',1564543826,0,7,1,'',1),(22,0,'菜单添加','perm','add',1564543857,0,21,1,'',0),(23,0,'菜单修改','perm','update',1564543884,0,21,1,'',0),(24,0,'菜单删除','perm','delete',1564543905,0,21,1,'',0),(25,0,'测试','aaa','aa',1581682987,1581682995,0,2,'',1);

#
# Structure for table "group_role"
#

DROP TABLE IF EXISTS `group_role`;
CREATE TABLE `group_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) DEFAULT NULL COMMENT '角色名称',
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '角色状态 1正常2删除',
  `createtime` int(10) unsigned DEFAULT '0',
  `updatetime` int(10) unsigned DEFAULT '0',
  `menu_id` varchar(1000) DEFAULT NULL COMMENT '菜单id 用，分割',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='角色表';

#
# Data for table "group_role"
#

/*!40000 ALTER TABLE `group_role` DISABLE KEYS */;
INSERT INTO `group_role` VALUES (1,'系统管理员',1,1563374504,1581683310,'7,8,9,10,11,17,18,19,20'),(2,'测试管理员',2,1563375320,1565247886,NULL),(5,'测试2',2,1573183629,1581683318,''),(6,'cesaaa',2,1581656131,1581656739,NULL),(7,'测试角色2',2,1581668221,1581668431,'7,17,18,19,20'),(8,'测试4',2,1581668939,1581683323,'7,8,9,10,11,17,18,19,20,21,22,23,24'),(9,'测试5',2,1581676951,1581683328,'7,8,9,10,11,17,18,19,20');
/*!40000 ALTER TABLE `group_role` ENABLE KEYS */;
