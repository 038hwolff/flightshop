<?php
session_start();
ob_start();
include_once $_SERVER['DOCUMENT_ROOT']."/fct_proto.php";
include_once $_SERVER['DOCUMENT_ROOT']."/panier/cart_include.php";

if (!isset($_SESSION["loggued_on_user"]) || empty($_SESSION["loggued_on_user"]))
{
	$_SESSION["info"] = "Veuillez vous connecter avant d'acheter..";
	exit(header("Location: /template/login.php"));
}

if (cart_exist() && count($_SESSION["cart"]))
{
	$total = 0;
	$strcmds = serialize($_SESSION["cart"]);
	foreach ($_SESSION["cart"] as $key => $value)
		$val += $value["count"] * $value["price"];
	$link = db_connect();
	db_add($link, "command", [
		"cmds"	=>	$strcmds,
		"login"	=>	$_SESSION["loggued_on_user"]["login"],
		"total"	=>	$total
	]);
	cart_destroy();
	$_SESSION["success"] = "Commande reçue";
	exit(header("Location: /"));
}
?>
<?php
$content_for_layout = ob_get_clean();
include_once $_SERVER['DOCUMENT_ROOT']."/layout.php";
?>
