<?php
session_start();
ob_start();
include_once $_SERVER['DOCUMENT_ROOT']."/fct_proto.php";
?>

<H2 class="head">GESTION ADMINISTRATEUR</H2>
<div class="admin">
<a href="/template/admin/admin_prod.php">Gestion des Produits</a>
<br />
<a href="/template/admin/admin_cat.php">Gestion des Catégories</a>
<br />
<a href="/template/admin/admin_user.php">Gestion des Utilisateurs</a>
</div>
<?php
$content_for_layout = ob_get_clean();
include_once $_SERVER['DOCUMENT_ROOT']."/layout.php";
?>
