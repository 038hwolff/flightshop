<?php
include_once $_SERVER['DOCUMENT_ROOT']."/users/users_include.php";

if (!isset($_SESSION))
	session_start();

if (!users_is_admin())
	exit(header("Location: /index.php"));

if (isset($_GET) && isset($_GET["id"]))
{
	if ($_GET["id"] != $_SESSION["loggued_on_user"]["id"])
		users_modify_right($_GET["id"]);
}

exit(header("Location: /template/admin/users/list.php"));
