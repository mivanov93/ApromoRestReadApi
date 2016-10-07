#!/bin/bash
USER='bgpromo';
HOST='apromo.bg';
V=`date +%d_%h_%y_%H_%M_%S`;
CLIENTDIR='/opt/api/read_api_dir';

rsync -rlt -zPv --delete -e "ssh" ./ --exclude=".*/" \
--exclude="upload.sh" --exclude="nbproject" --exclude="vendor" \
--exclude="var/logs" --exclude="var/cache" --exclude="var/sessions" \
$USER@$HOST:$CLIENTDIR/$V

ssh $USER@$HOST <<ENDSSH

chmod +x $CLIENTDIR/$V/hook.sh
(cd $CLIENTDIR/$V; composer install)
sudo find $CLIENTDIR/$V -type f -exec chmod 664 {} \;
sudo find $CLIENTDIR/$V -type d -exec chmod 775 {} \;
chmod +x $CLIENTDIR/$V/bin/*
$CLIENTDIR/$V/bin/console cache:clear -e live_prod
$CLIENTDIR/$V/bin/console cache:clear -e live_prod --no-debug
$CLIENTDIR/$V/bin/console cache:clear -e live_demo
$CLIENTDIR/$V/bin/console cache:clear -e live_demo --no-debug
$CLIENTDIR/$V/bin/console cache:clear -e live_dev
$CLIENTDIR/$V/bin/console cache:clear -e live_dev --no-debug
$CLIENTDIR/$V/bin/console doctrine:cache:clear-metadata
$CLIENTDIR/$V/bin/console doctrine:cache:clear-result
$CLIENTDIR/$V/bin/console doctrine:cache:clear-query

ln -sfn $CLIENTDIR/$V $CLIENTDIR/main
curl -k "http://127.0.0.1:8080/localutils/clear_op_cache.php"

ENDSSH