php bin/magento setup:install \
--base-url=http://magento.local \
--db-host=mysql \
--db-name=magento \
--db-user=root \
--db-password=mysql \
--admin-firstname=Edson \
--admin-lastname=Galan \
--admin-email=edsongalan@wolfsellers.com \
--admin-user=admin \
--admin-password=12345678a \
--language=en_US \
--currency=USD \
--timezone=America/Mexico_City \
--use-rewrites=1 \
--search-engine=elasticsearch7 \
--elasticsearch-host=elasticsearch7 \
--elasticsearch-port=9200

# bin/magento deploy:mode:set developer
