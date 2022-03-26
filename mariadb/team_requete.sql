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
  duration time not null,
  created_at time default current_timestamp,
  primary key(formation_id)
);

DROP TABLE IF EXISTS formations_user;
CREATE OR REPLACE TABLE formations_user(
  user_id int not null,
  formation_id int not null,
  prof_id int not null,
  primary key (user_id, formation_id,prof_id),
  constraint fk_user
    foreign key (user_id) references users(ID) ON DELETE CASCADE,
  constraint fk_formation
    foreign key (formation_id) references formations(formation_id) ON DELETE CASCADE,
  constraint fk_prof
    foreign key (prof_id) references users(ID) ON DELETE CASCADE,
  constraint ct_prof_eleve CHECK(user_id <> prof_id)
);

SET FOREIGN_KEY_CHECKS=1;
