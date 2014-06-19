<?php
$connect = mysql_connect("localhost","root","giang" ) or die("Server disconnect");
mysql_select_db("music",$connect);
mysql_set_charset('utf8');