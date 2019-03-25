<?php
session_start();
ob_start();
include $_SERVER['DOCUMENT_ROOT']."/fct_proto.php";
include_once $_SERVER['DOCUMENT_ROOT']."/panier/cart_include.php";
cart_destroy();
exit(header("Location: /index.php"));
$content_for_layout = ob_get_clean();
include_once $_SERVER['DOCUMENT_ROOT']."/layout.php";
?>
