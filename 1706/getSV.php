<?php
include 'layout.php';
?>
<table cellpadding="0" cellspacing="0" width="1000">
    <thead>
    <td>Ma sv</td>
    <td>Ten sv</td>
    <td>email</td>
    <td>Phone</td>
    <td>Dia chi</td>
    <td>Gioi tinh</td>
    </thead>
<?php
$sinhvien = file('sinhvien.txt');

foreach ($sinhvien as $line){
    $one = explode('|', $line);    
    echo '<tr>';
    echo '<td>'.$one[0].'</td>';
    echo '<td>'.$one[1].'</td>';
    echo '<td>'.$one[2].'</td>';
    echo '<td>'.$one[3].'</td>';
    echo '<td>'.$one[4].'</td>';
    echo '<td>'.$one[5].'</td>';
    echo '<td><a href="edit.php?id='.$one[0].'">Sua</a></td>';
    echo '<td><a href="xoa.php?id='.$one[0].'">Xoa</a></td>';
    echo '</tr>';
}

?>
</table>