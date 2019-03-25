<?php

include_once $_SERVER['DOCUMENT_ROOT']."/panier/cart_include.php";

session_destroy();
session_start();

echo "J'ajoute 1 article test";
echo "<br />";
cart_add("1", "article_test");
cart_print();
echo "<br />";
echo "J'ajoute 1 article japonnnnnnn";
echo "<br />";
cart_add("2", "japonnnnnnn");
cart_print();
echo "<br />";
echo "J'ajoute 3 article test en plus";
echo "<br />";
cart_add("1", "article_test", 3);
cart_print();
echo "<br />";
echo "J'enleve 1 article test";
echo "<br />";
cart_remove("1", 1);
cart_print();
echo "<br />";
echo "Je delete	 article test";
echo "<br />";
cart_remove("1", -1);
cart_print();
echo "<br />";

?>
