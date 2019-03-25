<?php

function    db_format_cond($cond, &$arr, &$arrval)
{
    $arr = [];
    $arrval = [];
    foreach ($cond as $k => $v)
    {
        $arr[] = "$k = ?";
        $arrval[] = $v;
    }
}

function    db_cond_type($cond)
{
    $ret = "";
    foreach ($cond as $k => $v)
    {
        if (is_string($v))
            $ret .= "s";
        else if (is_numeric($v))
            $ret .= "i";
    }
    return ($ret);
}
?>