USE mysql;
FLUSH PRIVILEGES ;
GRANT ALL ON *.* TO 'root'@'%' identified by 'roottoor' WITH GRANT OPTION ;
GRANT ALL ON *.* TO 'root'@'localhost' identified by 'roottoor' WITH GRANT OPTION ;
SET PASSWORD FOR 'root'@'localhost'=PASSWORD('placeholder') ;
DROP DATABASE IF EXISTS test ;
FLUSH PRIVILEGES ;
