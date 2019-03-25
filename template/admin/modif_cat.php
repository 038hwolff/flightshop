<?php
session_start();
ob_start();
include_once $_SERVER['DOCUMENT_ROOT']."/fct_proto.php";
include_once $_SERVER['DOCUMENT_ROOT']."/categories/cat_include.php";

if (!isset($_SESSION["loggued_on_user"]) && empty($_SESSION["loggued_on_user"]))
    header("Location: /login.php");

if ($_POST && isset($_POST["name"]) && isset($_POST["newname"]) && $_SESSION["loggued_on_user"]["adm"] == 1)
{
    $oldname = $_POST["name"];
    $newname = $_POST["newname"];
    $link = db_connect();
    $check_cat = db_request_unique($link, "category", NULL, ["name" => $_POST["name"]]);
    if (cat_change($check_cat["id"], $newname, $_POST["description"]) == true)
        echo "La categorie a bien ete modifiée!";
    else
        echo "Erreur";
    /*if ($link !== FALSE)
    {
        print_r($check_cat);
        if ($check_cat !== NULL)
        {
            echo "La categorie a bien ete modifiée!";
        }
        else
            echo "Erreur";
    } */
}
?>

<div class="login-page admin">
    <div class="form">
        <form class="login-form" method="POST">
            <input type="text" name="name" placeholder="Nom" value="<?php echo $_POST["name"]?>"/>
            <input type="text" name="newname" placeholder="Nouveau nom" value="<?php echo $_POST["newname"]?>"/>
            <input type="textarea" name="description" placeholder="Nouvelle description" value="<?php echo $_POST["description"]?>"/>
            <button>Modifier</button>
        </form>
    </div>
</div>

<?php
$content_for_layout = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT']."/layout.php";
?>
