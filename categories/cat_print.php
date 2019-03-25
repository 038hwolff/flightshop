<?php

include_once $_SERVER['DOCUMENT_ROOT']."/db_include.php";
include_once $_SERVER['DOCUMENT_ROOT']."/categories/cat_include.php";

function	cat_print()
{
	$link = db_connect();
	if ($link == false)
		return ;
	$cat = db_request($link, "category");
	echo "<p>";
	foreach ($cat as $key => $value)
	{
		echo "Cat:".$value["name"].":".$value["description"]."<br />";
	}
	echo "</p>";
}
