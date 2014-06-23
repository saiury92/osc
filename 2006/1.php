<?php
/**
 * class sinh vien
 * Da xay dung xong
 */
//require('sinhvien.php');
function __autoload($url){
    require $url.'.php';
    echo '<br/>tenclass:'.$url.'<br/>';
}
$obj = new sinhvien('name class');
echo $obj->getName();