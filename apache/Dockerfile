ARG APACHE_VERSION=""
FROM httpd:${APACHE_VERSION:+${APACHE_VERSION}-}alpine

RUN apk update; \
    apk upgrade;

# Copy apache vhost file to proxy php requests to php-fpm container
COPY apache2.conf /usr/local/apache2/conf/demo.apache.conf
COPY demo.virtualhost.conf /usr/local/apache2/conf/extra/httpd-vhosts.conf
COPY security.conf /usr/local/apache2/conf/security.conf
RUN echo "Include /usr/local/apache2/conf/demo.apache.conf" \
    >> /usr/local/apache2/conf/httpd.conf
RUN echo "Include /usr/local/apache2/conf/extra/httpd-vhosts.conf" \
    >> /usr/local/apache2/conf/httpd.conf
RUN echo "Include /usr/local/apache2/conf/security.conf" \
    >> /usr/local/apache2/conf/httpd.conf
