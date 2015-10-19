-- 22/09/2015
ALTER TABLE `tables` ADD `top_position` VARCHAR(11) NOT NULL DEFAULT '0' AFTER `deleted`, ADD `left_position` VARCHAR(11) NOT NULL DEFAULT '0' AFTER `top_position`;