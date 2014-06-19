<?php
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    require('config.php');
    $query = 'select singer_info from singer where singer_id = "'.$id.'"';
    $result = mysql_query($query);
    if(mysql_num_rows($result) < 1){
        echo '';
        exit;
    }
    $row = mysql_fetch_array($result);
    echo $row['singer_info'];
}
?>