#!/bin/sh

service apache2 start
service mariadb start
tail -f /var/log/apache2/access.log
