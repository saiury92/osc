<?php
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    if($id==0){
        echo '';
        exit;
    }
    require('config.php');
    $query = 'select song_url from song where album_id = "'.$id.'"';
    $result = mysql_query($query);
    if(mysql_num_rows($result) < 1){
        echo '';
        exit;
    }
    $row =  mysql_fetch_array($result);
    echo $row['song_url'];
}