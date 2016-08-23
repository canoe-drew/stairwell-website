# Base our image on this public image
FROM php:7.0-apache

# Copy pico into the image
COPY Pico/ /var/www/html/
WORKDIR /var/www/html/

RUN apt-get update
RUN apt-get -y install git unzip
RUN curl -sS https://getcomposer.org/installer | php
RUN php composer.phar install

# Copy the plugins
COPY Pico-Categorized-Pages/PicoCategorizedPages.php /var/www/html/plugins/
COPY pico_multilanguage/PicoMultiLanguage.php /var/www/html/plugins/
COPY Pico-Hide /var/www/html/plugins/

#COPY stairwell-plugins/ /var/www/html/plugins/

# Copy assets and content
COPY assets/ /var/www/html/assets/
COPY content/ /var/www/html/content/

# Copy the config file
COPY config/config.php /var/www/html/config/

# Copy the Stairwell theme
COPY stairwell-theme/ /var/www/html/themes/stairwell/

