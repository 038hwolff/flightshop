<?php

include_once $_SERVER['DOCUMENT_ROOT']."/db_include.php";
include_once $_SERVER['DOCUMENT_ROOT']."/categories/cat_include.php";

function	cat_get($id = NULL)
{
	$link = db_connect();
	if ($link == false)
		return (false);
	if ($id == NULL)
		$exist = db_request($link, "category");
	if ($exist === NULL || count($exist) != 0)
		return (false);
	else
	{
		$cond = [
			"id"	=>	$id
		];
		if ($desc == NULL)
			return (db_update($link, "category", ["name" => $name], $cond));
		else
			return (db_update($link, "category", ["name" => $name, "description" => $desc], $cond));
	}
	return (true);
}
