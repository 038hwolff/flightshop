<?php
session_start();
ob_start();
include $_SERVER['DOCUMENT_ROOT']."/fct_proto.php";

if (!isset($_SESSION["loggued_on_user"]) && empty($_SESSION["loggued_on_user"]))
    header("Location: /login.php");

if ($_POST && isset($_POST["login"]) && isset($_POST["passwd"]))
{
    $login = $_POST["login"];
    $link = db_connect();
    if ($link !== FALSE)
    {
            $check = db_request_unique($link, "user", NULL, ["login" => $_POST["login"]]);
            if ($check !== NULL)
            {
                if ($_SESSION["loggued_on_user"]["id"] == $check["id"] && $check["passwd"] == hash("whirlpool", $_POST["passwd"]) || $_SESSION["loggued_on_user"]["adm"] == 1)
                {
                    $log = db_delete($link, "user", ["id" => $check["id"]]);
                    echo "Votre compte a bien été supprimé:'(";
                    session_destroy();
                }
                else
                    echo "Action impossible";
            }
            else
                echo "Un problème est survenu";
    }
    else
        echo "Error";
}
?>

<div class="login-page">
    <div class="form">
        <form class="login-form" method="POST">
            <input type="text" name="login" placeholder="username" value="<?php echo $_POST["login"]?>"/>
            <input type="password" name="passwd" placeholder="password" value="<?php echo $_POST["passwd"]?>"/>
            <button>I'll be back</button>
        </form>
    </div>
</div>

<?php
$content_for_layout = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT']."/layout.php";
?>
