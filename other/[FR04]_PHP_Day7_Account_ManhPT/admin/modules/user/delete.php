<?php

$id = isset($_GET['id']) && $_GET['id'] != "" ? $_GET['id'] : "";
//echo $id;
unset($_SESSION[config::name][$id]);
debug($_SESSION['student']);
header("location:index.php?module=user");