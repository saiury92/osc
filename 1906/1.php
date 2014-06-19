<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WEB BÁN HÀNG</title>
<!--<link rel="stylesheet" type="text/css" href="css/style.css" />-->
</head>
<body>
    <a href="#" id="1">link1</a>
    <h3>json</h3>
    <div id='json'>
        
    </div>
    
    <h3>ajax</h3>
    <div id="ajax">
        
    </div>
    
    <script src="jquery-1.11.0.min.js" ></script>
<script>
$(document).ready(function(){
    $('#1').click(function(){
        data_sent = new Array(3,4,5,6,7);
        $.ajax({
            url: '2.php',
            type: 'get',
            data: 'data='+data_sent,
            success: function(data){
                alert(data);
                $json = $.parseJSON(data);
                $.each($json, function(key,value){
                    $('#json').append('<div>object: key=>'+key+', value=>'+value+'</div>');
                });
                $('#ajax').html(data);
            }
        });
    }); 
});    
    
</script>
</body>
</html>
