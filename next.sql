-- 22/09/2015
ALTER TABLE `tables` ADD `top_position` VARCHAR(11) NOT NULL DEFAULT '0' AFTER `deleted`, ADD `left_position` VARCHAR(11) NOT NULL DEFAULT '0' AFTER `top_position`;

-- 21/10/2015
ALTER TABLE `guests` ADD `arrived` BOOLEAN NOT NULL DEFAULT FALSE AFTER `deleted`;

-- 28/10/2015
ALTER TABLE `users` CHANGE `password` `password` VARCHAR(60) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;

-- 30/0/2015
CREATE TABLE IF NOT EXISTS `auth_token` (
`oid` int(11) NOT NULL,
  `token` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

ALTER TABLE `auth_token`
 ADD PRIMARY KEY (`oid`);


CREATE TABLE IF NOT EXISTS `pending_users_projects` (
`oid` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `project_id` int(11) NOT NULL,
  `is_master` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;


