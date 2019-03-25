<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT']."/db_include.php";
include_once $_SERVER['DOCUMENT_ROOT']."/panier/cart_include.php";
?>

<html class="wrap">
<head>
    <meta charset="UTF-8">
    <title>FlightShop</title>
    <link rel="stylesheet" type="text/css" href="/css/main.css">

    <style>
        .niveau1 li{
            float: left;
            width: 9vw;
            padding: 20px;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        ul.niveau2 {
            border: 1px white;
            display: none;
            left: -2px;
            margin: 0;
            padding: 0;
            position: absolute;
            top: 49px;
        }

        ul.niveau3{
            left: 145px;
            position: absolute;
            display: none;
            margin: 0;
            padding: 0;
            top: 0;
        }

        li {
            list-style-type: none;
            position: relative;
            width: 140px;
            padding: 2px;
            margin: 0 0.2vw 0.4vw 0.2vw;
            border: 1px #ffeb99;
        }

        .no-border{
            border-top: none;
            border-left: none;
        }

        li:hover ul.niveau2, li li:hover ul.niveau3 {
            display: block;
        }

        .menu3, .menu3 .niveau2{
            cursor: pointer;
            text-align: center;
        }

        .menu4{
            cursor: pointer;
            text-align: center;
        }

        .menu1, .menu1 .niveau2{
            cursor: pointer;
            text-align: center;
        }

        .menu2, .menu2 .niveau2{
            cursor: pointer;
            text-align: center;
            background: white;
        }

        img:hover {
            -webkit-transform: scaleX(-1);
            transform: scaleX(-1);
        }
    </style>
</head>
<body>
<ul class="niveau1 ">
    <IMG SRC=http://www.fasstransmissions.com/real/sncf/tgv3.gif width="150" height="70">
    <a href="/">
        <li class="rad menu1">
            <b>Home</b>
        </li>
    </a>
    <li class="rad menu2">
		<?php
		$link = db_connect();
		$cat = db_request($link, "category");
		?>
        <b><a href="/">Pack</a></b>
        <ul class="niveau2">
			<?php if (count($cat)): ?>
			<?php foreach ($cat as $key => $value): ?>
				<li><a href="/?filter=<?php echo $value["id"]; ?>"><?php echo $value["name"]; ?></a></li>
			<?php endforeach; ?>
			<?php endif; ?>
        </ul>
    </li>
    <a class="rad menu3" href="/template/panier.php">
        <?php
        $val = 0;
        if (cart_exist() && count($_SESSION["cart"]) > 0)
        {
            $total = 0;
            foreach ($_SESSION["cart"] as $key => $value)
                $val += $value["count"] * $value["price"];
        }
        ?>
        <li class="rad menu1">
            <b>Panier:<?php echo "$val €"?></b>
        </li>
    </a>
    <?php if (!isset($_SESSION["loggued_on_user"]) || empty($_SESSION["loggued_on_user"])): ?>
        <a href="/template/login.php">
            <li class="menu4"><b>Login</b></li>
        </a>
    <?php else :?>
        <li class="rad menu2">
            <b>Bonjour <?php echo $_SESSION["loggued_on_user"]["login"]?></b>
            <ul class="niveau2">
                <li><a href="/logout.php">Me deconnecter</a></li>
                <li><a href="/template/unregister.php">Me desinscrire :'(</a></li>
                <li><a href="/template/modif_mdp.php">Modifier mon mot de passe</a></li>
                <?php if ($_SESSION["loggued_on_user"]["adm"] == 1): ?>
                    <li><a href="/template/admin.php">Espace admin</a></li>
                <?php endif?>
            </ul>
        </li>
    <?php endif ?>
</ul>
<div class="span"></div>
<div>
<a href="/template/contact.php"><center><button type="submit"><font color=black> &#9825; Ecrivez-nous &#9825;</button></center></a>
<br />
<br />
    </div>
</body>
</html>
