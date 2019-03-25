<?php

include_once $_SERVER['DOCUMENT_ROOT']."/db_include.php";

function	user_delete($id)
{
	$link = db_connect();
	if ($link === false)
		return false;
	if (!is_numeric($id))
		$id = intval($id);
	$ret = db_delete($link, "user", ["id"	=>	$id]);
	return ($ret);
}
