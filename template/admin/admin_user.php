<?php
session_start();
ob_start();
include $_SERVER['DOCUMENT_ROOT']."/fct_proto.php";
?>

<H2 class="head">GESTION ADMINISTRATEUR</H2>
<H2>Gestion des utilisateurs</H2>
<h3>Utilisateurs</h3>
<div class="admin">
	<a href="/template/admin/users/list.php">Liste des utilisateurs</a>
</div>
<?php
$content_for_layout = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT']."/layout.php";
?>
