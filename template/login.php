<?php
session_start();
ob_start();
include $_SERVER['DOCUMENT_ROOT']."/fct_proto.php";
if ($_POST && isset($_POST["login"]) && isset($_POST["passwd"]))
{
    $login = $_POST["login"];
    $passwd = $_POST["passwd"];
    $link = db_connect();
    if ($link !== FALSE)
    {
        $log = db_request($link, "user", NULL, ["login" => $_POST["login"]]);
        if ($log !== NULL)
        {
            if (count($log) == 1)
            {
                $check_log = hash("whirlpool", $_POST["passwd"]);
                if ($check_log == $log[0]["passwd"])
                {
					$_SESSION["loggued_on_user"] = $log[0];            
                    exit(header("Location: /"));
                }
                else
                    echo "Mot de passe errone";
			}
			else
				echo "Ce compte n'existe pas";
        }
        else
            echo "Ce compte n'existe pas";
    }
    else
        echo "Ce compte n'existe pas";
}
?>

<div class="login-page">
    <div class="form">
        <form class="login-form" method="POST">
            <input type="text" name="login" placeholder="username" value="<?php echo $_SESSION["login"]?>"/>
            <input type="password" name="passwd" placeholder="password" value="<?php echo $_SESSION["passwd"]?>"/>
            <button type="submit">login</button>
        </form>
	</div>
    <div>
	<a href="register.php">Creer son compte</a>
        <br>
	<a href="modif_mdp.php">Modifier mon mot de passe</a>
    </div>
</div>

<?php
$content_for_layout = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT']."/layout.php";
?>
