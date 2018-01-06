CREATE TABLE `corporate_galleries` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gallery_id` varchar(100) NOT NULL,
  `gallery_name` varchar(255) NOT NULL,
  `seqno` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE `corporate_galleries` ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `gallery_id` (`gallery_id`), ADD KEY `gallery_name` (`gallery_name`);
ALTER TABLE `corporate_galleries` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;