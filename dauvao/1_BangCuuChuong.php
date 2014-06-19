<style>
    td{
        padding: 5px;
    }
</style>
<?php
$row = 5;
$col = 7;

define('START',4);
define('END',7);
$start = 4;
$end = 7;
$limit = 10;

echo "<table border='1'cellspacing='0'cellpadding='0'>";
for($i = START ; $i <= END ; $i++){
    echo "<tr>";
    for($j = 1 ; $j <= $limit ; $j++){
        if($j % 2 == 0)
            echo "<td style='color: red'>";
        else
            echo "<td style='color: blue'>";
        echo "$i x $j = ".($i*$j)."</td>";
    }
    echo "</tr>";
}
echo "<table/>";
