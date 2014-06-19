<?php
define('HOST', 'localhost');
define('USER','root');
define('PASS', 'giang');
define('DB','fresher04');
mysql_connect(HOST,USER,PASS);
mysql_select_db(DB);
mysql_set_charset('utf8');
?>