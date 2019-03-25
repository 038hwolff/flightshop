<?php
session_start();
ob_start();
include $_SERVER['DOCUMENT_ROOT']."/fct_proto.php";

if (!isset($_SESSION["loggued_on_user"]) && empty($_SESSION["loggued_on_user"]))
    header("Location: /login.php");

if ($_POST && isset($_POST["name"]) && isset($_POST["description"]) && $_SESSION["loggued_on_user"]["adm"] == 1)
{
    $name = $_POST["name"];
    $description = $_POST["description"];
    $link = db_connect();
    if ($link !== FALSE)
    {
            $check = db_request_unique($link, "category", NULL, ["name" => $_POST["name"]]);
            if ($check == NULL)
            {
                $log = db_add($link, "category", ["name" => $_POST["name"], "description" => $_POST["description"]]);
                if ($log == FALSE)
                {
                    echo "Erreur ajout";
                }
                else
                    echo "La nouvelle categorie a bien ete crée!";
            }
            else
                echo "Categorie existante";
    }

}
?>

<div class="login-page admin">
    <div class="form">
        <form class="login-form" method="POST">
            <input type="text" name="name" placeholder="Nom de categorie" value="<?php echo $_POST["name"]?>"/>
            <input type="textarea" name="description" placeholder="Description" value="<?php echo $_POST["description"]?>"/>
            <button class="admin">Enregistrer</button>
        </form>
    </div>
</div>

<?php
$content_for_layout = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT']."/layout.php";
?>
