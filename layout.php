<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="./css/main.css">
		<title>FlightShop</title>
	</head>
	<body>
		<?php
		session_start();
		include $_SERVER['DOCUMENT_ROOT']."/template/header.php";
		if (isset($_SESSION["error"]))
		{
			echo "<p class='msg_error'>".$_SESSION["error"]."</p>";
			unset($_SESSION["error"]);
		}
		if (isset($_SESSION["info"]))
		{
			echo "<p class='msg_info'>".$_SESSION["info"]."</p>";
			unset($_SESSION["info"]);
		}
		if (isset($_SESSION["success"]))
		{
			echo "<p class='msg_success'>".$_SESSION["success"]."</p>";
			unset($_SESSION["success"]);
		}
		echo $content_for_layout;
		include("template/footer.html");
		?>
	</body>
</html>
