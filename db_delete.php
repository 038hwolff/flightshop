<?php
include $_SERVER['DOCUMENT_ROOT']."/fct_proto.php";

function    db_delete($connect, $table, $cond = NULL)
{
    $requ = "DELETE FROM `$table`";
    if ($cond !== NULL)
    {
        $arr = [];
        $arrval = [];
        $condtype = db_cond_type($cond);
        db_format_cond($cond, $arr, $arrval);
        $arr = implode(" AND ", $arr);
        $requ .= " WHERE $arr";
    }
    $prequ = mysqli_prepare($connect, $requ);
    if ($prequ === False)
    {
        echo "Mysqli error : $requ";
        return (NULL);
    }
    if ($cond !== NULL)
		mysqli_stmt_bind_param($prequ, $condtype, ...$arrval);
    $ret = false;
    if (mysqli_stmt_execute($prequ) == TRUE)
        $ret = true;
    return ($ret);
}
?>
