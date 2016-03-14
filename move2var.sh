rm -rf /var/www/html/*
rsync -av --exclude=".*" --exclude="*.sh" ~/github/pare/ /var/www/html/
