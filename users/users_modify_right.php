<?php

include_once $_SERVER['DOCUMENT_ROOT']."/db_include.php";

function	users_modify_right($id)
{
	$link = db_connect();
	if ($link === false)
		return false;
	$user = db_request_unique($link, "user", NULL, ["id"	=>	intval($id)]);
	if (isset($user))
	{
		if ($user["adm"] == "1")
			$ret = db_update($link, "user", ["adm"	=>	0], ["id"	=>	(int)$id]);
		else
			$ret = db_update($link, "user", ["adm"	=>	1], ["id"	=>	(int)$id]);
	}
	return ($ret);
}
