<?php
session_start();
ob_start();
include $_SERVER['DOCUMENT_ROOT']."/fct_proto.php";

if ($_POST && isset($_POST["login"]) && isset($_POST["passwd"]) && isset($_POST["newpw"]))
{
    $login = $_POST["login"];
    $oldpw = $_POST["passwd"];
    $newpw = $_POST["newpw"];
    $link = db_connect();
    if ($link !== FALSE)
    {
        $check_user = db_request_unique($link, "user", NULL, [
            "login" => $_POST["login"]
        ]);
        if ($check_user !== NULL)
        {
            if (hash("whirlpool", $_POST["passwd"]) != $check_user["passwd"])
                echo "Erreur - Mauvais mot de passe - Reessayez";
            else
            {
                $log = db_update($link, "user", ["passwd" => hash("whirlpool", $newpw)], ["login" => $_POST["login"]]);
                echo "Votre mot de passe est bien modifié!";
            }
        }
        else
            echo "Erreur";
    }
}
?>

<div class="login-page">
    <div class="form">
        <form class="login-form" method="POST">
            <input type="text" name="login" placeholder="Utilisateur" value="<?php echo $_POST["login"]?>"/>
            <input type="password" name="passwd" placeholder="Mot de passe actuel" value="<?php echo $_POST["passwd"]?>"/>
            <input type="password" name="newpw" placeholder="Nouveau mot de passe" value="<?php echo $_POST["passwd"]?>"/>
            <button>Enregistrer</button>
        </form>
    </div>
</div>

<?php
$content_for_layout = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT']."/layout.php";
?>
