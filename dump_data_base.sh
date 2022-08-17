#!/bin/bash
fecha=`date +%d-%m-%Y`
archivo="gnu_expedientes-$fecha.sql"
mysqldump --user=root --password=slack142 --host=localhost gnu_expedientes > $archivo
#mysqldump --user=gnu_exp --password=gnu_exp --host=localhost gnu_expedientes > $archivo
chmod 777 $archivo
mv $archivo sqls/


