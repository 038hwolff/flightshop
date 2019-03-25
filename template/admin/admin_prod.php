<?php
session_start();
ob_start();
include $_SERVER['DOCUMENT_ROOT']."/fct_proto.php";
include $_SERVER['DOCUMENT_ROOT']."/articles/article_include.php";

$link = db_connect();
$product = db_request($link, "product");
?>
<H2 class="head">GESTION ADMINISTRATEUR</H2>
<H2>Gestion des produits</H2>
<table class="table-cs">
	<?php foreach ($product as $key => $value): ?>
		<tr>
			<td><?php echo $value["name"]; ?></td>
			<td><?php echo $value["description"]; ?></td>
			<td><?php echo $value["price"]; ?></td>
			<td><a class="button-buy btn-small" href="/template/admin/product/modify.php?id=<?php echo $value["id"]; ?>">Modifier</a></td>
			<td><a class="button-abort btn-small" href="/template/admin/product/delete.php?id=<?php echo $value["id"]; ?>">Supprimer</a></td>
		</tr>
	<?php endforeach; ?>
	<tr>
		<td colspan="5" style="text-align:right;"><a href="/template/admin/product/ajouter.php" class="button-buy" >Ajouter un article</a></td>
	</tr>
</table>
<p style="width:80%; text-align:right;">
	<a href="/template/admin.php">Retour</a>
</p>
<?php
$content_for_layout = ob_get_clean();
include_once $_SERVER['DOCUMENT_ROOT']."/layout.php";
?>
