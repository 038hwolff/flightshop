<?php
session_start();
ob_start();
include_once $_SERVER['DOCUMENT_ROOT']."/users/users_include.php";
include_once $_SERVER['DOCUMENT_ROOT']."/fct_proto.php";

$users = users_get();
?>
<H2 class="head">GESTION ADMINISTRATEUR</H2>
<H2>Liste des utilisateurs</H2>

<table class="admin">
	<?php foreach ($users as $key => $value): ?>
		<tr>
			<td><?php echo $value["login"]; ?></td>
			<?php if ($value["adm"] == 0): ?>
				<td><a href="/template/admin/users/modify.php?id=<?php echo $value["id"]; ?>">Passer Admin</a></td>
			<?php else: ?>
				<td><a href="/template/admin/users/modify.php?id=<?php echo $value["id"]; ?>">Retirer Admin</a></td>
			<?php endif; ?>
			<td><a href="/template/admin/users/delete.php?id=<?php echo $value["id"]; ?>">Supprimer</a></td>
		</tr>
	<?php endforeach; ?>
</table>
<a href="/template/admin.php">Retour</a>
<?php
$content_for_layout = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT']."/layout.php";
?>
