<?php
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    require('config.php');
    $query = 'select * from singer where singer_id = "'.$id.'"';
    $result = mysql_query($query);
    if(mysql_num_rows($result) < 1){
        echo '';
        exit;
    }
    $row = mysql_fetch_array($result);
}
?>
<div class="singer-img">
    <img src='<?php echo $row['singer_img'];?>'>
</div>
<div class="singer-info">
    <p>
        <h2>Ca sỹ: <?php echo $row['singer_name'];?></h2>
    </p>
    <p>
        Ngày sinh: <?php echo $row['ngaysinh'];?>
    </p>
    <p>
        Nguyên quán: <?php echo $row['nguyenquan'];?>
    </p>
    <p>
        Công ty:<?php echo $row['congty'];?>
    </p>
    <p>
        Danh sách Album: 
        <select name='album' id="singer-album" data-singerid='<?php echo $id;?>'>
            <option value='0'>--select album--</option>
            <?php 
                $query = 'select album_id,album_name from album where singer_id = "'.$id.'"';
                $result_album = mysql_query($query);
                while($row_album = mysql_fetch_array($result_album)){
            ?>
                <option value='<?php echo $row_album['album_id'];?>'><?php echo $row_album['album_name'];?></option>
            <?php } //het while album?>
        </select>
    </p>
</div>

<p id='singer-view-history' data-singerid='<?php echo $id;?>'>
    <a href="#">Xem tiểu sử...</a>
    <div id='history-click'>

    </div>
</p>