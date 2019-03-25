<?php
include_once $_SERVER['DOCUMENT_ROOT']."/fct_proto.php";
function    db_update($connect, $table, $value, $cond)
{
    db_format_cond($value, $arr, $arrval);
    $arr = implode(",", $arr);
    db_format_cond($cond, $arr2, $arrval2);
    $arr2 = implode(" AND ", $arr2);
    $condtype = db_cond_type($value) . db_cond_type($cond);
    $requ = "UPDATE $table SET $arr WHERE $arr2";
    $prequ = mysqli_prepare($connect, $requ);
    if ($prequ === False)
    {
        echo "Mysqli error : $requ";
        return (NULL);
    }
    $concat = array_values($value);
    foreach ($cond as $val)
        $concat[] = $val;
    mysqli_stmt_bind_param($prequ, $condtype, ...$concat);
    $ret = FALSE;
    if (mysqli_stmt_execute($prequ) == TRUE)
    {
        $ret = TRUE;
        mysqli_stmt_close($prequ);
    }
	return ($ret);
}
