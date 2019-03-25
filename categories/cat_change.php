<?php

include_once $_SERVER['DOCUMENT_ROOT']."/db_include.php";
include_once $_SERVER['DOCUMENT_ROOT']."/categories/cat_include.php";

function	cat_change($id, $name, $desc = NULL)
{
	$link = db_connect();
	if ($link == false)
		return (false);
	$exist = db_request_unique($link, "category", NULL, ["id" => intval($id)]);
	if ($exist === NULL)
		return (false);
	else
	{
		$cond = [
			"id"	=>	intval($id)
		];
		if ($desc == NULL || empty($desc))
			return (db_update($link, "category", ["name" => $name], $cond));
		else
			return (db_update($link, "category", ["name" => $name, "description" => $desc], $cond));
	}
	return (true);
}
