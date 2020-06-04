FROM webdevops/php-apache:7.3
ENV PHP_DATE_TIMEZONE='Asia/Kolkata'
ENV PHP_MEMORY_LIMIT='1073741824'
ENV WEB_ALIAS_DOMAIN='app.o3erp.ms'
ENV PHP_MAX_EXECUTION_TIME='300'
ENV PHP_POST_MAX_SIZE='50M'
ENV PHP_UPLOAD_MAX_FILESIZE='50MB'
COPY conf/etc/httpd/vhost.conf /opt/docker/etc/httpd/vhost.conf
RUN apt-get update -y
RUN apt-get upgrade -y
RUN apt-get install apt-utils -y
RUN apt-get install curl  -y
RUN apt-get install git -y
#RUN cd /app
#RUN cd /app && curl -sL https://deb.nodesource.com/setup_12.x | bash && apt-get install nodejs -y
#RUN git clone https://github.com/msllp/MS-Frame.git /app
#COPY .env /app
RUN chown -R www-data:www-data /app
RUN chmod -R 777 /app

RUN mkdir /app/backend
RUN chown -R www-data:www-data /app/backend
RUN chmod -R 777 /app/backend

RUN mkdir /app/frontend
RUN chown -R www-data:www-data /app/frontend
RUN chmod -R 777 /app/frontend

RUN mkdir /app/ms-frame-docs
RUN chown -R www-data:www-data /app/ms-frame-docs
RUN chmod -R 777 /app/ms-frame-docs


#RUN cd /app && curl -s https://getcomposer.org/installer | php
#RUN cd /app && composer install
#RUN cd /app && npm install
#RUN cd /app && npm update
#RUN cd /app && npm audit fix

VOLUME /app/frontend
VOLUME /app/backend
VOLUME /app/ms-frame-doc
EXPOSE 80 443 90

