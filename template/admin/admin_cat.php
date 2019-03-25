<?php
session_start();
ob_start();
include_once $_SERVER['DOCUMENT_ROOT']."/fct_proto.php";
?>

<html>
<H2 class="head">GESTION ADMINISTRATEUR</H2>
<H2>Gestion des categories</H2>
<body>
<div class="admin">
    <a href="/template/admin/add_cat.php">Ajouter une categorie</a>
	<br />
	<a href="/template/admin/suppr_cat.php">Supprimer une categorie</a>
	<br />
	<a href="/template/admin/modif_cat.php">Modifier une categorie</a>
</div>
</body>
</html>

<?php
$content_for_layout = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT']."/layout.php";
?>
