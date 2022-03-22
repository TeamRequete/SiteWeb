FROM debian:latest
RUN apt-get update -y
RUN apt-get upgrade -y
RUN apt-get install -y apache2 php php-mysql
RUN apt-get install -y mariadb-server

#mariadb config
COPY ./docker_conf/conf_base.sql /root
RUN mysqld --user=mysql --bootstrap --verbose=0 --skip-name-resolve --skip-networking=0 < /root/conf_base.sql

COPY ./docker_conf/database.sql /root
RUN mysqld --user=mysql --bootstrap --verbose=0 --skip-name-resolve --skip-networking=0 < /root/database.sql

RUN rm /etc/php/7.4/apache2/php.ini
COPY ./docker_conf/php.ini /etc/php/7.4/apache2/php.ini

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2

WORKDIR /var/www/html
EXPOSE 80

COPY ./docker_conf/run.sh /root/run.sh
RUN chmod a+x /root/run.sh

ENTRYPOINT ["/root/run.sh"]
