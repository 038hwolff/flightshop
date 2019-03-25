<?php
session_start();
ob_start();
include $_SERVER['DOCUMENT_ROOT']."/fct_proto.php";
include $_SERVER['DOCUMENT_ROOT']."/articles/article_include.php";
require_once 'template/shop.php';
$content_for_layout = ob_get_clean();
include_once $_SERVER['DOCUMENT_ROOT']."/layout.php";
?>
