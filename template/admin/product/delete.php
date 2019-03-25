<?php
include_once $_SERVER['DOCUMENT_ROOT']."/users/users_include.php";
include_once $_SERVER['DOCUMENT_ROOT']."/articles/article_include.php";
session_start();

if (!users_is_admin())
	exit(header("Location: /index.php"));

if (isset($_GET) && isset($_GET["id"]))
	article_delete($_GET["id"]);
exit(header("Location: /template/admin/admin_prod.php"));
