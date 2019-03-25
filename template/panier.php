<?php
session_start();
ob_start();
include_once $_SERVER['DOCUMENT_ROOT']."/fct_proto.php";
include_once $_SERVER['DOCUMENT_ROOT']."/panier/cart_include.php";
?>
<h2>Votre panier</h2>
<table class="table-cs">
<?php $val = 0; ?>
<?php if (cart_exist()): ?>
	<?php foreach ($_SESSION["cart"] as $key => $value): ?>
		<tr>
			<td><?php echo $value["name"]; ?></td>
			<td><?php echo $value["count"]; ?> place(s)</td>
			<td><?php $val += $value["count"] * $value["price"]; echo $value["count"] * $value["price"]; ?>euros</td>
		</tr>
	<?php endforeach; ?>
	<tr><td colspan="3" style="text-align:right;">Total : <?php echo $val; ?> euros</td></tr>
	<tr>
		<td><a class="button-abort" name="button" href="/template/panier-reset.php">Annuler</a></td>
		<td colspan="2" style="text-align:right;"><a class="button-buy" name="button" href="/template/panier-valider.php">Payer</a></td>
	</tr>
<?php endif; ?>
</table>

<?php if (cart_exist() && count($_SESSION["cart"]) == 0): ?>
	<h3 style="text-align:center;">panier vide</h3>
<?php endif; ?>
<?php if (!cart_exist()): ?>
	<h3 style="text-align:center;">panier vide</h3>
<?php endif; ?>
<?php
$content_for_layout = ob_get_clean();
include_once $_SERVER['DOCUMENT_ROOT']."/layout.php";
?>
