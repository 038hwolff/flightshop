<?php

include_once $_SERVER['DOCUMENT_ROOT']."/panier/cart_include.php";

session_start();

/*
**	cart_destroy
**	Function to delete cart
**	@return void
*/

function cart_destroy()
{
	if (isset($_SESSION["cart"]))
		unset($_SESSION["cart"]);
}
