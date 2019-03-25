<?php
include $_SERVER['DOCUMENT_ROOT']."/fct_proto.php";

function    db_add($connect, $table, $value)
{
    echo "\n";
    echo "<br />";
    // print_r();
    echo "<br />";
    $strkey = implode(",", array_keys($value));
    $tab = [];
    foreach ($value as $val)
        $tab[] = "?";
    $condtype = db_cond_type($value);
    $value = array_values($value);
    $tab = implode(",", $tab);
    $requ = "INSERT INTO `$table` ($strkey) VALUES ($tab)";
    $prequ = mysqli_prepare($connect, $requ);
    if ($prequ === False)
    {
        echo "Mysqli error : $requ";
        return (NULL);
    }
    if ($value !== NULL)
        mysqli_stmt_bind_param($prequ, $condtype, ...$value);
    $ret = false;
    echo "<br />";
    if (mysqli_stmt_execute($prequ) == TRUE)
        $ret = true;
    return ($ret);
}
?>
