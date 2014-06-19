$(document).ready(function(){
    $(".singerid").click(function(){
        var id = $(this).attr('id');
        $.ajax({
            url: "process.php",
            type: "POST",
            data: "idSinger="+id,
            async: true,
            success: function(kq){
                $("#infosinger").html(kq);
            }
        })
    })
    
    //Xem tieu su
    
    $(".xemtieusu").live("click",function(){
        $(".tieusu").toggle();  
    })
    
    //Xem danh sach thuoc album
    $("#listalbum").live("change",function(){
        var idAlbum = $(this).val();
        $.ajax({
            url: "process.php",
            type: "POST",
            data:"idalbum="+idAlbum,
            async:true,
            success:function(kq){
                $("#listsong").html(kq);
            }
        })
    })
    //Nghe thu
    $(".nghethu").live("click",function(){
        var idSong = $(this).attr('id');
        $.ajax({
            url: "process.php",
            type: "GET",
            data: "songid="+idSong,
            async: true,
            success: function(kq){
                $("#media").html(kq);
            }
        })
    })
    //Comment
    $("#usercomment").live("click",function(){
        content = "";
        $.ajax({
            url: "process.php",
            type: "POST",
            data: "checkComment=0",
            async: true,
            success: function(kq){
                if(kq == 1){
                    alert("Vui long dang nhap de comment");
                    return false;
                }
            }
        })
    })
})

