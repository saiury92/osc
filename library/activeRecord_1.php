<?php
$data = array(
    'name'=>'name1',
    'email'=>'email@gmail.com',
);

function insertData($table = "user",$data = array(),$id="") {
    foreach($data as $key=>$value) {
        $columnArr[] = $key;
        $valueArr[] = "'".$value."'";
    }
    $stringColumn = implode(",",$columnArr);
    $stringValue = implode(",",$valueArr);
    $sql = "INSERT INTO $table($stringColumn) VALUES($stringValue)";
    return mysql_query($sql);
}
function getData($table,$select='*',$where=array(1=>'1')){
    $where_query = ' 1 ';
    foreach($where as $key => $value) {
        $where_query .= " AND $key = '$value' ";
    }
    $sql = "select $select from $table where $where_query";
    return mysql_query($sql);
}
function updateData($table,$data,$id=""){
    $update = '';
    foreach($data as $key=>$value) {
        $update .= " $key = '$value' ,";
    }
    $update = substr($update, 0, strlen($update) - 1);
    $query = "update $table set $update where id = '$id'";
    return mysql_query($query);
    //return $query;
}
function deleteData($table,$id){
    $query = "delete from $table where id = '$id'";
    return mysql_query($query);
}
function getDataLimit($table,$select='*',$limit_start=0,$limit_limit=10){
    $sql = "select $select from $table limit $limit_start,$limit_limit";
    return mysql_query($sql);
}