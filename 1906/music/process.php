<?php
session_start();
require('config.php');
if(isset($_POST['idSinger']) && $_POST['idSinger'] != null ){
    $idSinger = $_POST['idSinger'];
    $sqlSinger = "SELECT * FROM singer WHERE singer_id ='".$idSinger."'";
    $query = mysql_query($sqlSinger);
    $infoSinger = mysql_fetch_assoc($query);
    
    echo '<img src="'.$infoSinger['singer_img'].'" align="left">
    <h2>Ca Sỹ : &nbsp;'.$infoSinger['singer_name'].'</h2>';
    echo '<h4>Sinh ngày : &nbsp;'.$infoSinger['singer_name'].'</h4>';
    echo '<h4>Nguyên quán : &nbsp;</h4>';
    echo '<h4>Công ty:&nbsp; Ca sỹ tự do</h4>';
    echo '<h4><a href="#" class="xemtieusu">Xem tiểu sử...</a></h4>';
    echo "<div class='tieusu' style='display:none;'>".$infoSinger['singer_info']."</div>";
    echo '<h3>Danh Sách Album</h3>';
    $sqlAlbum = "SELECT * FROM album WHERE singer_id='".$idSinger."'";
    $queryAlbum = mysql_query($sqlAlbum);
    echo '<select id="listalbum">';
    while($dataAlbum = mysql_fetch_assoc($queryAlbum)){
        echo '<option value="'.$dataAlbum['album_id'].'">'.$dataAlbum['album_name'].'</option>';
    }
    echo '</select>';
}

if(isset($_POST['idalbum']) && $_POST['idalbum'] != null ){
    $idAlbum = $_POST['idalbum'];
    $sql = "SELECT * FROM song WHERE album_id='".$idAlbum."'";
    $querySong = mysql_query($sql);
    echo "<h3>Danh sách</h3>";
    echo '<table width="500" align="center" bordercolor="#FFFFFF" cellpadding="0" cellspacing="0">';
    echo "<tbody>"; 
    echo "<tr>";
    echo '<td width="20" align="center">STT</td>';
    echo '<td align="center">Tên Bài Hát</td>';
    echo '<td width="120" align="center">Nghe Thử</td>';
    echo '</tr>';
    echo '<tr>';
    while($dataSong = mysql_fetch_assoc($querySong)) {
        echo '<td width="20" align="center">1</td>';
        echo '<td align="center">'.$dataSong['song_name'].'</td>';
        echo '<td width="120" align="center">';
        echo '<a href="#" id="'.$dataSong['song_id'].'" class="nghethu">Nghe Thử</a></td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>'; 
    
}
// Nghe thu
if(isset($_GET['songid']) && $_GET['songid'] != null ){
    $idsong = $_GET['songid'];
    $sqlSong = "SELECT * FROM song WHERE song_id='".$idsong."'";
    $querySong = mysql_query($sqlSong);
    $dataSong = mysql_fetch_assoc($querySong);
    if($dataSong['song_url'] == "") {
        echo "Chua co chuong trinh nghe nhac !";
    }else{
        echo $dataSong['song_url'];
        echo "<p>&nbsp;</p>";
        echo "<textarea id='content' style='width: 400px;padding:3px; height: 50px;'></textarea>";
        echo "<div style='clear:right'></div>";
        echo "<p style='float:right;'><button id='usercomment'>Comment</button></p>";
    }
}

if(isset($_POST['checkComment']) && $_POST['checkComment'] != null ) {
    if(!isset($_SESSION['user']) || $_SESSION['user']) {
        echo 1;
    }
}
