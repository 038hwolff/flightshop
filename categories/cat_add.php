<?php

include_once $_SERVER['DOCUMENT_ROOT']."/db_include.php";
include_once $_SERVER['DOCUMENT_ROOT']."/categories/cat_include.php";

function	cat_add($name, $desc = "")
{
	$link = db_connect();
	if ($link == false)
		return (false);
	$exist = db_request($link, "category", NULL, ["name" => $name]);
	if ($exist === NULL || count($exist) != 0)
		return (false);
	else
		return (db_add($link, "category", ["name" => $name, "description" => $desc]));
	return (true);
}
