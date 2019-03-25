<?php
include $_SERVER['DOCUMENT_ROOT']."/fct_proto.php";

function    db_connect()
{
    $link = mysqli_connect("e1r12p13.42.fr", "rush", "root", "rush");
    if (!$link)
        die('Erreur de connexion (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
    // echo 'Succès... ' . mysqli_get_host_info($link) . "\n";
    return ($link);
}

// db_delete($connect, "user", NULL); <=> reset table user
// db_delete($connect, "user", NULL);

// $connect = db_connect();
// $tab = ["id", "name"];
// $cond = [
//     "id"    =>  2
// ];
// db_request($connect, "user", $tab, $cond);

// $tab = [
//     "name"  =>  "new_user",
//     "mdp"  =>  "new_pass_user"
// ];
// db_add($connect, "user", $tab);

// $tab = [
//     "name"  =>  "new_user2",
//     "mdp"  =>  "new_pass_user2"
// ];
// db_add($connect, "user", $tab);

// $tab = [
//     "name"  =>  "new_user3",
//     "mdp"  =>  "new_pass_user3"
// ];
// db_add($connect, "user", $tab);

// $tab = [
//     "name"  =>  "new_user3",
// ];
// db_delete($connect, "user", $tab);

// $new_val = [
//     "name"  =>  "Hello",
// ];
// $cond = [
//     "name"  =>  "new_user2"
// ];
// db_update($connect, "user", $new_val, $cond);
// db_delete($connect, "user", NULL);
?>
