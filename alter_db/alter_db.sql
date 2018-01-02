CREATE TABLE `agency_albums` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `album_id` varchar(100) NOT NULL,
  `album_name` varchar(255) NOT NULL,
  `seqno` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE `agency_albums` ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `album_id` (`album_id`), ADD KEY `album_name` (`album_name`);
ALTER TABLE `agency_albums` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

DROP TABLE IF EXISTS `agency_models`;
CREATE TABLE `agency_models` (
  `id` int NOT NULL,
  `agency_user_id` int NOT NULL,
  `model_user_id` int NOT NULL,
  `mode` smallint NOT NULL,
  `join_status` smallint NOT NULL,
  `join_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE `agency_models` ADD PRIMARY KEY (`id`), ADD KEY `agency_user_id` (`agency_user_id`), ADD KEY `model_user_id` (`model_user_id`), ADD KEY `mode` (`mode`), ADD KEY `join_status` (`join_status`);
ALTER TABLE `agency_models` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
INSERT INTO agency_models (agency_user_id,model_user_id,mode,join_status,join_at) VALUES (69,26,1,2,NOW());
INSERT INTO agency_models (agency_user_id,model_user_id,mode,join_status,join_at) VALUES (69,27,1,2,NOW());
INSERT INTO agency_models (agency_user_id,model_user_id,mode,join_status,join_at) VALUES (69,28,1,2,NOW());
INSERT INTO agency_models (agency_user_id,model_user_id,mode,join_status,join_at) VALUES (69,68,1,2,NOW());
INSERT INTO agency_models (agency_user_id,model_user_id,mode,join_status,join_at) VALUES (69,72,1,2,NOW());