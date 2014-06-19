<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','giang');
define('DB_DATABASE','qlcv');

mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
mysql_select_db(DB_DATABASE);
mysql_set_charset('utf8');
?>