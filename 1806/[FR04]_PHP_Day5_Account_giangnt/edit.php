<h1>Sửa bài đăng</h1>
<?php

if(!isset($_GET['id']) || $_GET['id'] == null){
    header('Location: index.php?module=list');
    exit;
}
$id_get = $_GET['id'];
$result = mysql_query('select * from tbl_new where news_id = "'.$id_get.'"');
if(mysql_num_rows($result) != 1){
    header('Location: index.php?module=list');
    exit;
}
require 'validate.php';

$array_post = array('news_title','news_desc','news_info');
$error = _contructArray($array_post);
$param = mysql_fetch_assoc($result);

if(isPost()){
    $param_title_old = $param['news_title'];
    
    $param['news_title'] = getParams('news_title');
    $error['news_title'] = validateMessages('news_title', 'Vui lòng nhập tiêu đề bài đăng');
    
    $param['news_desc'] = getParams('news_desc');
    $error['news_desc'] = validateMessages('news_desc', 'Vui lòng nhập miêu tả bài đăng');
    
    $param['news_info'] = getParams('news_info');
    $error['news_info'] = validateMessages('news_info', 'Vui lòng nhập thông tin chi tiết bài đăng');
        
    if(validate($param)){
        $check_title_after = true;
        if($param_title_old != $param['news_title']){
            $result = mysql_query('select news_id from tbl_new where news_title ="'.$param['news_title'].'"');
            if(mysql_num_rows($result) > 0){
                $error['news_title'] = 'Tiêu đề đã tồn tại';
                $check_title_after = false;
            }
            else
                $check_title_after = true;
        }
        if($check_title_after){
            $query = 'update tbl_new set '
                    . 'news_desc = "'.$param['news_desc'].'",'
                    . 'news_info = "'.$param['news_info'].'"';
            if($param_title_old != $param['news_title']){
                $query .= ', news_title = "'.$param['news_title'].'"';
            }
            $query .= ' where news_id = "'.$id_get.'"';
            
            mysql_query($query);
            $_SESSION['messages'] = 'Cập nhật thành công';
            header('Location: index.php?module=list');
            exit;
            echo '<br/><br/>';
        }
    }
}
?>
<form action="" method="post">    
    <div class="form-gr">
        <label>Title</label>
        <input type="text" name="news_title" value="<?php echo $param['news_title'];  ?>" size="35" />
        <span class="error">
            <?php  echo $error['news_title'];?>
        </span>
    </div>

    <div class="form-gr">
        <label>Miêu tả</label>
        <textarea name="news_desc"><?php echo $param['news_desc'];?></textarea>
        <span class="error">
            <?php echo $error['news_desc'] ?>
        </span>
    </div>

    <div class="form-gr">
        <label>Thông tin chi tiết</label>
        <textarea name="news_info"><?php echo $param['news_info'];?></textarea>
        <span class="error">
            <?php echo $error['news_info'] ?>
        </span>
    </div>

    <label>&nbsp;</label>
    <input type="submit" name="submit" value="Cập nhật" class="btn"/>&nbsp;&nbsp;
    <input type="reset" name="reset" value="reset" class="btn"/>&nbsp;&nbsp;
</form>