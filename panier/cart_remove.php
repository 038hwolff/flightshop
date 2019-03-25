<?php

include_once $_SERVER['DOCUMENT_ROOT']."/panier/cart_include.php";

session_start();

/*
**	Function to remove N item from cart
**	if $count < 0 delete all item
**	$_SESSION["cart"] => Tableau 2d
**	[
**		[
**			"id"	=>	id_article,
**			"name"	=>	name_article,
**			"count"	=>	number of itemm,
**		]
**	]
*/

function	cart_remove($id_article, $count = 1)
{
	if (!cart_exist())
		return (false);
	foreach ($_SESSION["cart"] as $key => $article)
	{
		if ($article["id"] == $id_article)
		{
			if ($article["count"] - $count <= 0 || $count < 0)
				unset($_SESSION["cart"][$key]);
			else
			{
				$_SESSION["cart"][$key]["count"] -= $count;
			}
			return (true);
		}
	}
	return (false);
}
