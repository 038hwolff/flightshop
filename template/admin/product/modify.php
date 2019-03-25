<?php
session_start();
ob_start();
include_once $_SERVER['DOCUMENT_ROOT']."/fct_proto.php";
include_once $_SERVER['DOCUMENT_ROOT']."/articles/article_include.php";

if (!$_GET || empty($_GET["id"]))
	exit(header("Location: /template/admin/admin_prod.php"));

$link = db_connect();
$cat = db_request($link, "category");
$item = db_request_unique($link, "product", NULL, ["id" => $_GET["id"]]);
$item["id_category"] = unserialize($item["id_category"]);
if ($_POST)
{
	if (empty($_POST["name"]) || empty($_POST["url"] || empty($_POST["cat"])))
		$_SESSION["error"] = "Informations manquantes..";
	else
	{
		$ret = db_update($link, "product", [
			"name"			=>	$_POST["name"],
			"description"	=>	$_POST["description"],
			"img"			=>	$_POST["url"],
			"price"			=>	intval($_POST["price"]),
			"id_category"	=>	serialize($_POST["cat"])
		], [
			"id"			=>	$_GET["id"]
		]);
		if ($ret === true)
		{
			$_SESSION["success"] = "Article ajoute..";
			exit(header("Location: /template/admin/admin_prod.php"));
		}
		else
			$_SESSION["error"] = "Error..";
	}
}
?>
<div style="width:80%; margin:auto;">
	<h3 style="width:50%; margin: auto; padding-bottom: 20px; margin-bottom: 20px; text-align:center; border-bottom:1px solid grey;">Ajouter un article</h3>
	<div style="width:50%; margin:auto;">
	<form style="display:grid; grid-gap: 10px; grid-template-columns: 30% 1fr;" action="/template/admin/product/modify.php?id=<?php echo $_GET["id"]; ?>" method="post">
		<p>Nom de l'article:</p>
		<input type="text" style="height:30px;" name="name" value="<?php echo $item["name"]; ?>" placeholder="Nom de l'article">
		<p>URL:</p>
		<input type="text" style="height:30px;" name="url" value="<?php echo $item["img"]; ?>" placeholder="url">
		<p>Categories:</p>
		<select name="cat[]" multiple>
			<?php foreach ($cat as $key => $value): ?>
				<?php if (in_array($value["id"], $item["id_category"])): ?>
					<option value="<?php echo $value["id"]; ?>" selected="selected"><?php echo $value["name"]; ?></option>
				<?php else: ?>
					<option value="<?php echo $value["id"]; ?>"><?php echo $value["name"]; ?></option>
				<?php endif; ?>
			<?php endforeach; ?>
		</select>
		<p>Description</p>
		<textarea name="description" rows="8" cols="80"><?php echo $item["description"]; ?></textarea>
		<p>Prix</p>
		<input type="number" name="price" value="<?php echo $item["price"]; ?>">
		<button class="button-abort" href="/template/admin/admin_prod.php" type="button-error" name="button">Retour</button>
		<button class="button-buy" type="submit" name="button">Modifier</button>
	</form>
	</div>
</div>
<?php
$content_for_layout = ob_get_clean();
include_once $_SERVER['DOCUMENT_ROOT']."/layout.php";
?>
