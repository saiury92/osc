<?php
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    if($id==0){
        echo '';
        exit;
    }
    require('config.php');
    $query = 'select * from song where album_id = "'.$id.'"';
    $result = mysql_query($query);
    if(mysql_num_rows($result) < 1){
        echo '';
        exit;
    }
?>
<h3>Danh sách album</h3>
<table cellpadding='0' cellspacing='0' border='1' width='530'>
    <thead>
    <td>STT</td>
    <td>Tên bài hát</td>
    <td>Nghe thử</td>
    </thead>

<?php
$stt=1;
    while($row = mysql_fetch_array($result)){       
?>
    <tr>
    <td><?php echo $stt;?></td>
    <td><?php echo $row['song_name'];?></td>
    <td><a href='#' class="nghe-thu" data-songid='<?php echo $row['song_id'];?>'>Nghe thử</a></td>
    </tr>
<?php
        $stt++;
    }//het while
    
}
?>
</table>