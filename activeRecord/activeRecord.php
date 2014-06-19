<?php
    $data = array(
                "name"=>"value1",
                "email"=>"value2",
                "address"=>"value3"
            );
    function insertData($data = array(),$table = "user",$id="") {
        foreach($data as $key=>$value) {
            $columnArr[] = $key;
            $valueArr[] = "'".$value."'";
        }
        $stringColumn = implode(",",$columnArr);
        $stringValue = implode(",",$valueArr);
        echo $sql = "INSERT INTO $table($stringColumn) VALUES($stringValue)";
    }
    echo insertData($data,"user"); 
    
    