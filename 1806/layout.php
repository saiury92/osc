<?php
require 'config.php';
?><!DOCTYPE html>
<html>
    <head>
        <title> <?php if(isset($page_title)) echo $page_title;?> - Users</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>    
<div id="header">
    <div class="menu">
        <a href="userpage.php?module=list_user">Danh sách user</a>
        <a href="userpage.php?module=insert_user">Thêm user</a>
    </div>
</div>
