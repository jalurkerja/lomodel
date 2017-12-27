ALTER TABLE `model_profiles` CHANGE `bust` `chest` DOUBLE NOT NULL;
ALTER TABLE `model_profiles` ADD `bust` VARCHAR(100) NOT NULL AFTER `chest`;
CREATE TABLE `bust_size` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE `bust_size` ADD PRIMARY KEY (`id`),ADD KEY `name` (`name`);
ALTER TABLE `bust_size` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
INSERT INTO bust_size (name) VALUES ('32 B');
INSERT INTO bust_size (name) VALUES ('32 C');
INSERT INTO bust_size (name) VALUES ('32 D');
INSERT INTO bust_size (name) VALUES ('32 DD');
INSERT INTO bust_size (name) VALUES ('32 E');
INSERT INTO bust_size (name) VALUES ('32 F');
INSERT INTO bust_size (name) VALUES ('32 G');
INSERT INTO bust_size (name) VALUES ('34 B');
INSERT INTO bust_size (name) VALUES ('34 C');
INSERT INTO bust_size (name) VALUES ('34 D');
INSERT INTO bust_size (name) VALUES ('34 DD');
INSERT INTO bust_size (name) VALUES ('34 E');
INSERT INTO bust_size (name) VALUES ('34 F');
INSERT INTO bust_size (name) VALUES ('34 G');
INSERT INTO bust_size (name) VALUES ('36 B');
INSERT INTO bust_size (name) VALUES ('36 C');
INSERT INTO bust_size (name) VALUES ('36 D');
INSERT INTO bust_size (name) VALUES ('36 DD');
INSERT INTO bust_size (name) VALUES ('36 E');
INSERT INTO bust_size (name) VALUES ('36 F');
INSERT INTO bust_size (name) VALUES ('36 G');
INSERT INTO bust_size (name) VALUES ('38 B');
INSERT INTO bust_size (name) VALUES ('38 C');
INSERT INTO bust_size (name) VALUES ('38 D');
INSERT INTO bust_size (name) VALUES ('38 DD');
INSERT INTO bust_size (name) VALUES ('38 E');
INSERT INTO bust_size (name) VALUES ('38 F');
INSERT INTO bust_size (name) VALUES ('38 G');
INSERT INTO bust_size (name) VALUES ('40 B');
INSERT INTO bust_size (name) VALUES ('40 C');
INSERT INTO bust_size (name) VALUES ('40 D');
INSERT INTO bust_size (name) VALUES ('40 DD');
INSERT INTO bust_size (name) VALUES ('40 E');
INSERT INTO bust_size (name) VALUES ('40 F');
INSERT INTO bust_size (name) VALUES ('40 G');
INSERT INTO bust_size (name) VALUES ('42 B');
INSERT INTO bust_size (name) VALUES ('42 C');
INSERT INTO bust_size (name) VALUES ('42 D');
INSERT INTO bust_size (name) VALUES ('42 DD');
INSERT INTO bust_size (name) VALUES ('42 E');
INSERT INTO bust_size (name) VALUES ('42 F');
INSERT INTO bust_size (name) VALUES ('42 G');

ALTER TABLE `a_users` ADD `verified` SMALLINT NOT NULL DEFAULT '0' AFTER `role`, ADD INDEX (`verified`);
ALTER TABLE `a_users` ADD `token` VARCHAR(100) NOT NULL DEFAULT '' AFTER `verified`, ADD INDEX (`token`);

CREATE TABLE model_albums (
	id int(11) NOT NULL,
	user_id int(11) NOT NULL,
	album_id int(11) NOT NULL,
	album_name varchar(255) NOT NULL,
	filename varchar(255) NOT NULL,
	status SMALLINT NOT NULL,
	created_at datetime NOT NULL,
	created_by varchar(100) NOT NULL,
	created_ip varchar(20) DEFAULT NULL,
	xtimestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE `model_albums` ADD PRIMARY KEY (`id`),ADD KEY `user_id` (`user_id`),ADD KEY `album_id` (`album_id`),ADD KEY `album_name` (`album_name`);
ALTER TABLE `model_albums` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `model_albums` CHANGE `album_id` `album_id` VARCHAR(100) NOT NULL;
ALTER TABLE `model_albums` ADD `seqno` INT NOT NULL AFTER `album_name`;