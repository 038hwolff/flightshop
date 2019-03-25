<?php
session_start();
ob_start();
include_once $_SERVER['DOCUMENT_ROOT']."/fct_proto.php";

if (!isset($_SESSION["loggued_on_user"]) || empty($_SESSION["loggued_on_user"]) || $_SESSION["loggued_on_user"]["adm"] != 1)
    header("Location: /index.php");
if ($_POST && isset($_POST["category"]) && isset($_POST["desciption"]))
{
    $link = db_connect();
    if ($link !== FALSE)
    {
            $check = db_request_unique($link, "category", NULL, ["name" => $_POST["category"]]);
            if ($check == NULL)
            {
                $log = db_add($link, "category", ["name" => $_POST["category"], "description" => $_POST["description"]]);
                if ($log == FALSE)
                {
                    echo "Erreur ajout";
                }
                else
                    echo "Catégorie ajoutée!";
            }
            else
                echo "Catégorie existante";
    }

}
?>

<div class="login-page">
    <div class="form">
        <form class="login-form" method="POST">
            <input type="text" name="category" placeholder="Nom de categorie" value="<?php echo $_POST["name"]?>"/>
            <input type="textarea" name="description" placeholder="Tapez votre description" value="<?php echo $_POST["description"]?>"/>
            <button>Enregistrer</button>
        </form>
    </div>
</div>

<?php
$content_for_layout = ob_get_clean();
include_once $_SERVER['DOCUMENT_ROOT']."/layout.php";
?>
