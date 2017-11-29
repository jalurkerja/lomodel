CREATE TABLE messages (
	id int not null auto_increment,
	thread_id int NOT NULL,
	user_id int NOT NULL,
	user_id2 int NOT NULL,
	message text NOT NULL,
	status smallint NOT NULL,
	created_at datetime NOT NULL,
	created_by varchar(100) NOT NULL,
	created_ip varchar(20) DEFAULT NULL,
	xtimestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	primary key(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;