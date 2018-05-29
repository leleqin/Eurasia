# Host: localhost  (Version: 5.5.53)
# Date: 2018-05-29 16:40:55
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "item"
#

CREATE TABLE `item` (
  `item_Id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `item_title` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `item_file` longblob,
  `item_content` text CHARACTER SET utf8,
  `item_user` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `item_time` date DEFAULT NULL,
  `item_brief` text CHARACTER SET utf8 COMMENT '内容简介',
  PRIMARY KEY (`item_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "item"
#

INSERT INTO `item` VALUES (2,'中心简介','金融实验室',X'696D616765732F626C6F672D70686F746F332E6A70670A',NULL,'陈','2018-05-16','金融学院的金融实验室是专门为金融学、投资学本科专业学生提供有价证券模拟交易及资产组合管理的专业实验室。实验室建设本着欧亚学院以“学生为中心”的教学理念，“国际化、应用型、新体验”办学宗旨，重点培养学生对金融和投资理论知识的实践与应用能力。\n'),(3,'中心简介','实验银行',X'696D616765732F626C6F672D70686F746F322E6A70670A',NULL,'张','2018-05-17','实验银行是专门为金融学、投资学专业学生提供银行业务模拟交易的专业实训室，旨在培养具备扎实金融理论基础和实践操作能力的高级应用型金融人才。\n'),(4,'中心简介','理财工作室',X'696D616765732F626C6F672D70686F746F312E6A70670A',NULL,'杨','2018-05-17','理财工作室是专门为金融学院的学生提供理财模拟操作的专业实训室，工作室旨在培养具有专业理财规划实操能力的应用型人才。当前配套软件包括个人理财及保险软件。\n'),(34,'申报书','11111',NULL,'111111','',NULL,NULL),(35,'资讯','351234645',NULL,'西方和你','',NULL,NULL),(36,'资讯','是如何关闭电脑',NULL,'的发给你的体内','',NULL,NULL),(38,'申报书','123412353',NULL,'1527235635123561.jpg','',NULL,NULL),(46,'中心简介','视频测试again',NULL,'<p><video class=\"edui-upload-video  vjs-default-skin video-js\" controls=\"\" preload=\"none\" width=\"420\" height=\"280\" src=\"/ueditor/php/upload/video/20180526/1527328106178194.mp4\" data-setup=\"{}\"></video></p>','',NULL,NULL),(47,'中心负责人','负责人介绍',NULL,'<p style=\"box-sizing: border-box; color: rgb(157, 157, 157); padding: 12px 0px; font-size: 13px; line-height: 1.8em; font-family: &quot;Open Sans&quot;; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;\">西安欧亚学院的金融实验教学示范中心，起源于2005年的“金融与财务模拟实验室”和2008年的“金融柜台业务仿真实训室”。经过十年的不断完善与发展，金融实验教学示范中心已累计投入资金400余万元，包含理财工作室、实验银行、金融实验室3个已建成的基础实验室，互联网金融应用中心、金融自媒体工作室、大数据应用中心3个校企共建，面向新金融业态、服务众多金融机构的专业特色实验室。</p><p style=\"box-sizing: border-box; color: rgb(157, 157, 157); padding: 12px 0px; font-size: 13px; line-height: 1.8em; font-family: &quot;Open Sans&quot;; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;\">金融实验教学示范中心始终以培养社会应用型人才为宗旨，深知实验教学与实践对培养高素质人才的重要性，经过几年的实践与总结，确定了“育人为本，理论为基，应用为重，特色为先”的教学理念；确定了培养综合素质高，专业基础扎实，应用能力强，具有一定的职业素养和敬业精神的应用型人才培养目标。确定了以金融学科为依托，针对高素质创新型金融、投资人才培养的需要，将实验教学全面引入专业人才培养过程。</p><p style=\"box-sizing: border-box; color: rgb(157, 157, 157); padding: 12px 0px; font-size: 13px; line-height: 1.8em; font-family: &quot;Open Sans&quot;; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;\">金融实验教学示范中心秉承知行合一、能力为尚、积淀特色、共享协作的实践教学理念，为学生提供环境优雅、设备齐全、实验仿真的实验场所。其中实验室建筑面积约855.41平方米。实验教学覆盖了金融、保险、会计、工商管理、国际贸易、计算机应用技术等17个专业方向。</p><p style=\"box-sizing: border-box; color: rgb(157, 157, 157); padding: 12px 0px; font-size: 13px; line-height: 1.8em; font-family: &quot;Open Sans&quot;; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;\">在学院领导的关心与支持下，金融实验教学示范中心将建设成具有政策优势，集实验教学研发、建设、教学与管理为一体，多学科、全方位的实验教学平台。</p><p><br/></p>','',NULL,NULL),(51,'资讯','测试again',NULL,'<p>测试啊啊啊啊啊</p>','',NULL,'你说这是新闻，这就是新闻！'),(54,'资讯','再来个新闻测试吧',NULL,'<p>啦啦啦啦啦</p>','',NULL,'我就是新闻，点我呀！！！你点呀！！！'),(56,'典型案例','典型案例测试',NULL,'<p>aaaaa哦！！~~~</p>','',NULL,'你是猪，他是猪，你们都是猪！！！'),(57,'典型教材','典型教材测试',NULL,'<p>哈</p>','',NULL,'啊啊啊啊  五环  你比四环多一环~~~'),(58,'典型课件','典型课件测试',NULL,'<p><br/></p><h1 style=\"border-bottom-color:#cccccc;border-bottom-width:2px;border-bottom-style:solid;padding:0px 4px 0px 0px;text-align:center;margin:0px 0px 20px;\">典型课件测试</h1><p><img src=\"http://img.baidu.com/hi/youa/y_0034.gif\" width=\"300\" height=\"200\"/>图文混排方法</p><p>1. 图片居左，文字围绕图片排版</p><p>方法：在文字前面插入图片，设置居左对齐，然后即可在右边输入多行文本</p><p><br/></p><p>2. 图片居右，文字围绕图片排版</p><p>方法：在文字前面插入图片，设置居右对齐，然后即可在左边输入多行文本</p><p><br/></p><p>3. 图片居中环绕排版</p><p>方法：亲，这个真心没有办法。。。</p><p><br/></p><p><br/></p><p><img src=\"http://img.baidu.com/hi/youa/y_0040.gif\" width=\"300\" height=\"300\"/></p><p>还有没有什么其他的环绕方式呢？这里是居右环绕</p><p><br/></p><p>欢迎大家多多尝试，为UEditor提供更多高质量模板！</p><p><br/></p><p>占位</p><p><br/></p><p>占位</p><p><br/></p><p>占位</p><p><br/></p><p>占位</p><p><br/></p><p>占位</p><p><br/></p><p><br/></p><p><br/></p>','',NULL,'巴士v就可充分保护的是v阿卡丽吃辣课程'),(59,'产学合作','产学合作测试',NULL,'<table><tbody><tr class=\"firstRow\"><td width=\"186\" valign=\"top\" style=\"word-break: break-all;\">v1</td><td width=\"186\" valign=\"top\"><br/></td><td width=\"186\" valign=\"top\" style=\"word-break: break-all;\">1</td><td width=\"186\" valign=\"top\"><br/></td><td width=\"186\" valign=\"top\"><br/></td><td width=\"186\" valign=\"top\"><br/></td></tr><tr><td width=\"186\" valign=\"top\"><br/></td><td width=\"186\" valign=\"top\" style=\"word-break: break-all;\">1</td><td width=\"186\" valign=\"top\"><br/></td><td width=\"186\" valign=\"top\" style=\"word-break: break-all;\">而让人</td><td width=\"186\" valign=\"top\"><br/></td><td width=\"186\" valign=\"top\"><br/></td></tr><tr><td width=\"186\" valign=\"top\" style=\"word-break: break-all;\">1</td><td width=\"186\" valign=\"top\"><br/></td><td width=\"186\" valign=\"top\" style=\"word-break: break-all;\">1</td><td width=\"186\" valign=\"top\" style=\"word-break: break-all;\">e</td><td width=\"186\" valign=\"top\" style=\"word-break: break-all;\">er</td><td width=\"186\" valign=\"top\"><br/></td></tr><tr><td width=\"186\" valign=\"top\"><br/></td><td width=\"186\" valign=\"top\" style=\"word-break: break-all;\">1</td><td width=\"186\" valign=\"top\"><br/></td><td width=\"186\" valign=\"top\"><br/></td><td width=\"186\" valign=\"top\"><br/></td><td width=\"186\" valign=\"top\"><br/></td></tr><tr><td width=\"186\" valign=\"top\">1</td><td width=\"186\" valign=\"top\"><br/></td><td width=\"186\" valign=\"top\" style=\"word-break: break-all;\">1</td><td width=\"186\" valign=\"top\" style=\"word-break: break-all;\">1</td><td width=\"186\" valign=\"top\" style=\"word-break: break-all;\">er&#39;r</td><td width=\"186\" valign=\"top\"><br/></td></tr><tr><td width=\"186\" valign=\"top\" style=\"word-break: break-all;\"><br/></td><td width=\"186\" valign=\"top\"><br/></td><td width=\"186\" valign=\"top\"><br/></td><td width=\"186\" valign=\"top\"><br/></td><td width=\"186\" valign=\"top\"><br/></td><td width=\"186\" valign=\"top\"><br/></td></tr><tr><td width=\"186\" valign=\"top\"><br/></td><td width=\"186\" valign=\"top\" style=\"word-break: break-all;\">1</td><td width=\"186\" valign=\"top\" style=\"word-break: break-all;\">1</td><td width=\"186\" valign=\"top\"><br/></td><td width=\"186\" valign=\"top\"><br/></td><td width=\"186\" valign=\"top\"><br/></td></tr></tbody></table><p><br/></p>','',NULL,'产学合作测试');

#
# Structure for table "users"
#

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_sex` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `user_date` date NOT NULL,
  `user_pwd` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `user_use` int(2) NOT NULL,
  `info` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'admin','男','2017-08-08','123456',1,'想试试'),(8,'admin','','0000-00-00','789',0,'2'),(21,'123','','0000-00-00','123123',0,'123');
