<?php
$maxFib = 10000;

$before = 1;
$after = 1;
echo '1<br/>1<br/>';
while($after < $maxFib){
    $tem_after = $after;
    $after += $before;
    if($after < $maxFib)
        echo $after."<br/>";
    $before = $tem_after;
}
?>