<?php

include_once $_SERVER['DOCUMENT_ROOT']."/articles/article_include.php";

function	article_delete($id)
{
	$link = db_connect();
	if ($link === false)
		return false;
	if (!is_numeric($id))
		$id = intval($id);
	$ret = db_delete($link, "product", ["id"	=>	intval($id)]);
	return ($ret);
}
