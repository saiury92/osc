<?php
class DB{
    const hostname = "localhost";
    const username = "root";
    const password= "giang";
    const dbname = "phpsmartosc";
}
function debug($data = array()) {
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}