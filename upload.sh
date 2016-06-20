rsync -rlt -zPv --delete -e "ssh" ./ --exclude=".*/" \
--exclude="upload.sh" --exclude="nbproject" --exclude="vendor" \
bgpromo@apromo.bg:/opt/api/read_api