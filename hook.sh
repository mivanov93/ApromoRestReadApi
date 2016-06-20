composer install
sudo find /opt/api/read_api -type f -exec chmod 664 {} \;
sudo find /opt/api/read_api -type d -exec chmod 775 {} \;
chmod +x /opt/api/read_api/bin/*
/opt/api/read_api/bin/console cache:clear -e live_prod
/opt/api/read_api/bin/console cache:clear -e live_prod --no-debug
/opt/api/read_api/bin/console cache:clear -e live_dev
/opt/api/read_api/bin/console cache:clear -e live_dev --no-debug
/opt/api/read_api/bin/console doctrine:cache:clear-metadata
/opt/api/read_api/bin/console doctrine:cache:clear-result
/opt/api/read_api/bin/console doctrine:cache:clear-query