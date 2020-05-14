FROM webdevops/php-apache:7.3
env PHP_DATE_TIMEZONE='Asia/Kolkata'
env PHP_MEMORY_LIMIT='1073741824'
env WEB_ALIAS_DOMAIN='docker.o3erp.ms'
env PHP_MAX_EXECUTION_TIME='300'
env PHP_POST_MAX_SIZE='50M'
env PHP_UPLOAD_MAX_FILESIZE='50MB'
COPY conf/etc/httpd/vhost.conf /opt/docker/etc/httpd/vhost.conf
RUN apt update -y
RUN apt upgrade -y
RUN apt install apt-utils -y
RUN apt install curl  -y
RUN apt install git -y
RUN cd /app
RUN cd /app && curl -sL https://deb.nodesource.com/setup_12.x | bash && apt-get install nodejs -y
RUN git clone https://github.com/msllp/MS-Frame.git /app
COPY .env /app
RUN chown -R www-data:www-data /app
RUN chmod -R 777 /app
RUN cd /app && curl -s https://getcomposer.org/installer | php
RUN cd /app && composer install
RUN cd /app && npm install
RUN cd /app && npm update
RUN cd /app && npm audit fix
VOLUME /app
VOLUME /app/bootstrap
VOLUME /app/vendor/msllp
EXPOSE 80 443 90

