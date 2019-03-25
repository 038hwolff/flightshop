<?php

include_once $_SERVER['DOCUMENT_ROOT']."/panier/cart_include.php";

session_start();

/*
**	Function to add N item to cart
**	@return void
**	$_SESSION["cart"] => Tableau 2d
**	[
**		[
**			"id"	=>	id_article,
**			"name"	=>	name_article,
**			"count"	=>	number of itemm,
**		]
**	]
*/

function cart_add($id_article, $name_article, $price, $count = 1)
{
	if (!cart_exist())
		cart_create();
	foreach ($_SESSION["cart"] as $key => $article)
	{
		if ($article["id"] == $id_article)
		{
			$_SESSION["cart"][$key]["count"] += $count;
			return ;
		}
	}
	$_SESSION["cart"][] = [
		"id"	=>	$id_article,
		"name"	=>	$name_article,
		"price"	=>	$price,
		"count"	=>	1
	];
}
