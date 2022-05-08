CREATE DATABASE IF NOT EXISTS team_requete;
use team_requete;

SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS users;
CREATE OR REPLACE TABLE users(
  ID int auto_increment,
  user_login varchar(255) not null,
  user_pass varchar(255) not null,
  user_email varchar(255) not null,
  role varchar(255) not null,
  created_at timestamp default current_timestamp,
  constraint ct_role CHECK(role in ("Admin","User")),
  primary key(ID)
);

DROP TABLE IF EXISTS formations;
CREATE OR REPLACE TABLE formations(
  formation_id int auto_increment,
  name varchar(255) not null,
  filename varchar(255) default '',
  content TEXT not null,
  qcm TEXT default '',
  duration int not null,
  prof_id int not null,
  created_at timestamp default current_timestamp,
  primary key(formation_id)
);

DROP TABLE IF EXISTS formations_user;
CREATE OR REPLACE TABLE formations_user(
  user_id int not null,
  formation_id int not null,
  vote TINYINT(1) default 0,
  qcm_result TEXT default '',
  primary key (user_id, formation_id),
  constraint fk_user
    foreign key (user_id) references users(ID) ON DELETE CASCADE,
  constraint fk_formation
    foreign key (formation_id) references formations(formation_id) ON DELETE CASCADE
);

DROP TABLE IF EXISTS forum;
CREATE OR REPLACE TABLE forum(
  forum_id int auto_increment,
  formation_id int not null,
  user_id int not null,
  content TEXT not null,
  created_at timestamp default current_timestamp,
  primary key (forum_id),
  constraint fk_user_forum
    foreign key (user_id) references users(ID) ON DELETE CASCADE,
  constraint fk_formation_forum
    foreign key (formation_id) references formations(formation_id) ON DELETE CASCADE
);

DROP TABLE IF EXISTS forum_thread;
CREATE OR REPLACE TABLE forum_thread(
  thread_id int auto_increment,
  forum_id int not null,
  user_id int not null,
  content TEXT not null,
  created_at timestamp default current_timestamp,
  primary key (thread_id),
  constraint fk_user_forum_thread
    foreign key (user_id) references users(ID) ON DELETE CASCADE,
  constraint fk_forum_forum_thread
    foreign key (forum_id) references forum(forum_id) ON DELETE CASCADE
);

SET FOREIGN_KEY_CHECKS=1;

INSERT INTO `users` VALUES
(1,'admin','$6$rounds=5000$4fde30e40302$PYUYHq/J.QXS/uQF1DqCty94SZTSBLdwV3QsIj1uNug0jJ8yLXGPy13tOz.lXohM2ydObdfI/HYoto9ZCmrAB1','admin@example.com','Admin','2022-05-08 16:39:54');
