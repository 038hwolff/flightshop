<?php

include_once $_SERVER['DOCUMENT_ROOT']."/panier/cart_include.php";

session_start();

/*
**	Function to create cart into $_SESSION
**	$_SESSION["cart"] => Tableau 2d
*/

function cart_create()
{
	if (!isset($_SESSION["cart"]))
		$_SESSION["cart"] = [];
}
