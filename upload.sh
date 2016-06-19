#bin/console cache:clear -e live_prod
#bin/console cache:clear -e live_prod --no-debug
#bin/console cache:clear -e live_dev
#bin/console cache:clear -e live_dev --no-debug
#bin/console doctrine:cache:clear-metadata
#bin/console doctrine:cache:clear-result
#bin/console doctrine:cache:clear-query

rsync -rlt -zPv --delete -e "ssh" ./ --exclude=".*/" \
--exclude="upload.sh" --exclude="nbproject" --exclude="vendor" \
bgpromo@apromo.bg:/var/www/localutils/test