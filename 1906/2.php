<?php
/*$array = array('mot','hai','ba','bon');
echo json_encode($array);*/
if(isset($_GET['data'])){
    $data = $_GET['data'];
    foreach ($data as $value){
        echo '<br/>'.$value;
    }
}
else{
    echo '';
}
?>