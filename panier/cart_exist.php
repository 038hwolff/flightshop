<?php

include_once $_SERVER['DOCUMENT_ROOT']."/panier/cart_include.php";

session_start();

/*
**	Function to check if cart exist and type
**	@return
**		true	=> cart exist
**		false	=> cart does't exist
*/

function	cart_exist()
{
	if (!isset($_SESSION["cart"])
		|| !is_array($_SESSION["cart"]))
		return (false);
	return (true);
}
