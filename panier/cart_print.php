<?php

include_once $_SERVER['DOCUMENT_ROOT']."/panier/cart_include.php";

session_start();

function	cart_print()
{
	if (!cart_exist())
		cart_create();
	var_dump($_SESSION["cart"]);
}
