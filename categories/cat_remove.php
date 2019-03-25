<?php

include_once $_SERVER['DOCUMENT_ROOT']."/db_include.php";
include_once $_SERVER['DOCUMENT_ROOT']."/categories/cat_include.php";

function	cat_remove($id)
{
	$link = db_connect();
	if ($link == false)
		return (false);
	if (is_numeric($id))
		return (db_delete($link, "category", ["id"	=>	$id]));
	else if (is_string($id))
		return (db_delete($link, "category", ["name"=>	$id]));
}
