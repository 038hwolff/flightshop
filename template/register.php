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
            $check = db_request_unique($link, "user", NULL, ["login" => $_POST["login"]]);
            if ($check == NULL)
            {
                $log = db_add($link, "user", ["login" => $_POST["login"], "passwd" => hash("whirlpool", $_POST["passwd"])]);
                if ($log == FALSE)
                {
                    echo "Erreur inscription";
                }
                else
                    echo "Votre compte a bien ete crée!";
            }
            else
                echo "Utilisateur existant";
    }

}
?>

<div class="login-page">
    <div class="form">
        <form class="login-form" method="POST">
            <input type="text" name="login" placeholder="username" value="<?php echo $_POST["login"]?>"/>
            <input type="password" name="passwd" placeholder="password" value="<?php echo $_POST["passwd"]?>"/>
            <button>Enregistrer</button>
        </form>
    </div>
</div>

<?php
$content_for_layout = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT']."/layout.php";
?>
