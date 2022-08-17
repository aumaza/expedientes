#!/bin/bash
fecha=`date +%d-%m-%Y`
archivo="gnu_expedientes-$fecha.sql"
mysqldump --user=root --password=slack142 --host=localhost gnu_expedientes > $archivo
#mysqldump --user=root --password=slack142 --host=slackzone.ddns.net mcsal > $archivo
chmod 777 $archivo
mv $archivo sqls/


