#!/bin/bash

beg=$(date +"%s") #Begin time

#Stop on error
set -e

#File and folder name variables
#These are somewhat superfluous, but increase
#readability.
NOW=$(/bin/date +"%Y.%m.%d")
FOLDER="$NOW-backups"
FILE="$NOW-logback.sql.gz"
UPLOADS="$NOW-uploads.tar.gz"
BACKUPS="home/javi/LabWork/logbook/scripts/backup/"

#Create backup folder for current week
/bin/mkdir /$BACKUPS/$FOLDER

#Command that dumps the database into a file
/usr/bin/mysqldump -u root -pagj321hio --databases logbook | /bin/gzip -9 > /$BACKUPS/$FOLDER/$FILE

#Copies and compresses the current contents of the uploads folder
/bin/cp -r /var/www/html/pocarlab/logbook/daily_log/uploads /$BACKUPS/$FOLDER/tmp_uploads
/bin/tar -zcf /$BACKUPS/$FOLDER/$UPLOADS -C /$BACKUPS/$FOLDER/ tmp_uploads
/bin/rm -r /$BACKUPS/$FOLDER/tmp_uploads

end=$(date +"%s") #End time
runtime=$(($end-$beg))

#Appends message instance of successful log
/bin/echo "Backup successfully created on $NOW, taking $runtime seconds." >> /$BACKUPS/backup_log.txt
