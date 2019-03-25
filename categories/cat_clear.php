<?php

include_once $_SERVER['DOCUMENT_ROOT']."/db_include.php";
include_once $_SERVER['DOCUMENT_ROOT']."/categories/cat_include.php";

function	cat_clear()
{
	$link = db_connect();
	if ($link == false)
		return (false);
	$cat_list = db_request($link, "category");
	foreach ($cat_list as $key => $value)
		cat_remove($value["id"]);
}
