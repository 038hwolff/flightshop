<?php

if ($_GET && isset($_GET["filter"]))
	$filter = $_GET["filter"];
else
	$filter = -1;

$link = db_connect();
$product = db_request($link, "product");
$res = [];
foreach ($product as $key => $value)
{
	$product[$key]["id_category"] = unserialize($value["id_category"]);
	if (isset($product[$key]["id_category"]) && !empty($product[$key]["id_category"]))
	{
		if ($filter > 0 && in_array($filter, $product[$key]["id_category"]))
			$res[] = $product[$key];
	}
}
if ($filter == -1)
{
        $res = $product;
}
echo "<div class='shop'>";
foreach ($res as $item) {
    echo "<div class='rad item'>";
            echo "<div class='line'>";
                     echo "<div class='name'>";
                     echo $item['name']."\n";
                     echo "</div>";

                     echo "<div class='desc'>";
                     echo $item['description']."\n";
                     echo "</div>";
            echo "</div>";

                    echo "<img src='";
                    echo $item['img'];
                    echo "' class='pic'>";

            echo "<div class='price_but'>";
                    echo "<div class='price'>";
                    echo $item['price']." €\n";
                    echo "</div>";
                    echo "<a class='add' href='/template/buy.php?&id=".$item['id']."&price=".$item['price']."&name=".$item['name']."'>Go!</a>";
            echo "</div>";

    echo "</div>";
}

echo "</div>";
