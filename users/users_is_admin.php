<?php

function	users_is_admin()
{
	if (!isset($_SESSION["loggued_on_user"])
		|| empty($_SESSION["loggued_on_user"]))
		return (false);
	if ($_SESSION["loggued_on_user"]["adm"] == 1)
		return (true);
	return (false);
}
