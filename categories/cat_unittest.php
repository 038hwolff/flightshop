<?php

include_once $_SERVER['DOCUMENT_ROOT']."/db_include.php";
include_once $_SERVER['DOCUMENT_ROOT']."/categories/cat_include.php";

?>
Debut
<?php cat_clear(); ?>
Ajout asiat
<?php cat_add("Asiat"); ?>
<?php cat_print(); ?>
<br>
Ajout amerique + desc
<?php cat_add("Amerique", "loin"); ?>
<?php cat_print(); ?>
<br>
Remove amerique
<br>
<?php cat_remove("Amerique"); ?>
<?php cat_print(); ?>
<br>
