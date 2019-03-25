<?php
session_start();
ob_start();
include_once $_SERVER['DOCUMENT_ROOT']."/fct_proto.php";

if (!isset($_SESSION["loggued_on_user"]) && empty($_SESSION["loggued_on_user"]))
    header("Location: /login.php");

if ($_POST && isset($_POST["name"]) && $_SESSION["loggued_on_user"]["adm"] == 1)
{
    $name = $_POST["name"];
    $link = db_connect();
    if ($link !== FALSE)
    {
            $check = db_request_unique($link, "category", NULL, ["name" => $_POST["name"]]);
            if ($check !== NULL)
            {
                    $log = db_delete($link, "category", ["id" => $check["id"]]);
                    echo "La categorie a bien ete supprimee";
            }
            else
                echo "Probleme bdd";
    }
    else
        echo "Error";
}
?>

<div class="login-page admin">
    <div class="form">
        <form class="login-form" method="POST">
            <input type="text" name="name" placeholder="Nom de la categorie" value="<?php echo $_POST["name"]?>"/>
            <button>Supprimer</button>
        </form>
    </div>
</div>

<?php
$content_for_layout = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT']."/layout.php";
?>
