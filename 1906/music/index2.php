<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My music</title>
<link href="css/style.css" type="text/css" rel="stylesheet" />

</head>
<body>
<div id="head"></div><!--End #head-->
<div id="top"><!--End #search-->
</div><!--End #menutop-->
<div id="main">
	<div id="left"><!--End #thanhvien-->
<div id="theloai"  class="leftbar">
        	<h1>Danh Sach Ca Sy</h1>
               <ul>  
   	    	   <?php
                   require('config.php');
                    $sql = "SELECT * FROM singer";
                    $query = mysql_query($sql);
                    while($data = mysql_fetch_assoc($query)){
                        echo "<li><a href='#' class='singerid' data-id='".
                                $data['singer_id']."'>".$data['singer_name'].
                                "</a></li>";
                    }
               ?>
               </ul>
  			<p></p>
   </div><!--End #thanhvien-->
   <div id="album"  class="leftbar">
   	  <h1><img src="images/index_r8_c9.jpg" /></h1>
      	<div id="kqdangnhap"></div>
        <div id="thanhvien">
     		 <div id="myform"><form action="" method="post"><label>Tên Đang Nhập</label><input type="text" id="txtuser" name="txtuser" value=""><label>Mật khẩu</label><input type="password" id="txtpass" name="txtpass" value=""><br><input type="submit" id="dangnhap" name="dangnhap" value="Đang nhập"></form></div>
        
        </div>
      <p>:: Xem chi tiết ::</p>
   </div><!--#album-->
   <div id="hotroructuyen"  class="leftbar">
        	<h1><img src='images/index_r28_c6.jpg' /></h1>
            	<img src='images/yahoo.jpg' class="yahoo" />
                <span class="nickname">ht_khoi</span>
         	<p></p>
  	</div>
</div><!--End #left-->
    <div id="center">
    	<div id="nhaconline" class="center_info">
        	<h1><img src="images/index_r8_c35.jpg" /></h1>
         </div>
          <div id="baitap">
                <div id="showsinger">
                    <div id="infosinger"></div>
                    <div id="listsong"></div>
                    <div id="media"></div>
                </div>
                   <div id="comment"></div>
          </div>
    	<div id="nghesi"><!--End #casi--><!--End #nhacsi-->
        </div>
    </div><!--End #center-->
    <div id="right">
    	 <div id="tinnong" class="rightbar">
        	<h1><img src='images/index_r8_c48.jpg' /></h1>
            	<img src="images/index_r26_c7.jpg" align="left" class="tinnong" />
                <ul>
                	<li><a href="#">Untill you</a></li>
                    <li><a href="#">Nhạc trẻ</a></li>
                    <li><a href="#">Nhạc trẻ</a></li>
                    <li><a href="#">Nhạc trẻ</a></li>
                </ul>
                <div class="cls"></div>
                <img src="images/index_r26_c7.jpg" align="left" class="tinnong" />
                <ul>
                	<li><a href="#">Nhạc trẻ</a></li>
                    <li><a href="#">Nhạc trẻ</a></li>
                    <li><a href="#">Nhạc trẻ</a></li>
                    <li><a href="#">Nhạc trẻ</a></li>
                </ul>
                <div class="cls"></div>
                <img src="images/index_r26_c7.jpg" align="left" class="tinnong" />
                <ul>
                	<li><a href="#">Nhạc trẻ</a></li>
                    <li><a href="#">Nhạc trẻ</a></li>
                    <li><a href="#">Nhạc trẻ</a></li>
                    <li><a href="#">Nhạc trẻ</a></li>
                </ul>
                <div class="cls"></div>
                <img src="images/index_r26_c7.jpg" align="left" class="tinnong" />
                <ul>
                	<li><a href="#">Nhạc trẻ</a></li>
                    <li><a href="#">Nhạc trẻ</a></li>
                    <li><a href="#">Nhạc trẻ</a></li>
                    <li><a href="#">Nhạc trẻ</a></li>
                </ul>
                <div class="cls"></div>
         	<p></p>
  	</div><!--End #tinnong--><!--End #tieudiem-->
  <div id="binhchon" class="rightbar" >
    	<h1><img src="images/index_r28_c47.jpg" /></h1>
        	<span>
        	<input type="radio"  name="bc1" value="" />
            <label>Bình chọn số 01</label>
            </span>
           <span>
        	<input type="radio"  name="bc1" value="" />
            Bình chọn số 02
            </span>
            <span>
        	<input type="radio"  name="bc1" value="" />
            Bình chọn số 03
            </span>
            <span>
        	<input type="radio"  name="bc1" value="" />
            Bình chọn số 04
            </span>
            <input type="image" src="images/index_r30_c49.jpg" value="" name="bcbt" id="bcbt" />
        <p></p>
    </div><!--End #binhchon--> 
         
    </div><!--End #right-->
</div><!--End #main-->
<div id="footer">Footer</div><!--End #footer-->

<script src='js/jquery-1.11.0.min.js'></script>
<script type="text/javascript" src="js/music2.js"></script>
<script>
$(document).ready(function(){
    $('.singerid').click(function(){
        $('#listsong').html('');
        $('#media').html('');
        $idSinger = $(this).data('id');
        $.ajax({
            url: 'view_singer.php',
            type: 'get',
            data: 'id='+$idSinger,
            success: function(data){
                $('#infosinger').html(data);
            }
        });
    });
    $(document).on('click','#singer-view-history',function(){
        $singerid = $(this).data('singerid');
        $.ajax({
            url: 'singer_history.php',
            type: 'get',
            data: 'id='+$singerid,
            success: function(data){
                $('#history-click').html(data);
            }
        });
    });
    $(document).on('change','#singer-album',function(){
        $albumid = $(this).val();
        $.ajax({
            url: 'singer_album.php',
            type: 'get',
            data: 'id='+$albumid,
            success: function(data){
                $('#listsong').html(data);
            }
        });
    });
    $(document).on('click','.nghe-thu',function(){
        $songid = $(this).data('songid');
        $.ajax({
            url: 'nghe_thu.php',
            type: 'get',
            data: 'id='+$songid,
            success: function(data){
                $('#media').html(data);
            }
        });
    });
});
</script>
</body>
</html>
