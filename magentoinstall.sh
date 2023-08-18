# Config Apache
a2enmod rewrite
cp ./config_files/000-default.conf /etc/apache2/sites-available/000-default.conf
cp ./config_files/apache2.conf /etc/apache2/apache2.conf
# apt-get install ufw -y && ufw allow 'Apache Full'

# Config PHP
cp ./config_files/php.ini /etc/php/7.4/apache2/php.ini
cp ./config_files/dir.conf /etc/apache2/mods-enabled/dir.conf
# find var generated vendor pub/static pub/media app/etc -type f -exec chmod g+w {} + && find var generated vendor pub/static pub/media app/etc -type d -exec chmod g+ws {} + && chown -R :www-data . && chmod u+x bin/magento
