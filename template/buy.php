<?php
session_start();
ob_start();
include_once $_SERVER['DOCUMENT_ROOT']."/fct_proto.php";
include_once $_SERVER['DOCUMENT_ROOT']."/panier/cart_include.php";

if ($_GET && isset($_GET["name"])
	&& isset($_GET["price"])
	&& isset($_GET["id"]))
{
	cart_add($_GET["id"], $_GET["name"],$_GET["price"]);
}
exit(header("Location: /index.php"));
$content_for_layout = ob_get_clean();
include_once $_SERVER['DOCUMENT_ROOT']."/layout.php";
?>
