<?php

include_once $_SERVER['DOCUMENT_ROOT']."/db_connect.php";

function	users_get($id = NULL)
{
	$link = db_connect();
	if ($link === FALSE)
		return (NULL);
	if ($id === NULL)
		return db_request($link, "user");
	else
		return db_request($link, "user", NULL, ["id"	=>	$id]);
}
