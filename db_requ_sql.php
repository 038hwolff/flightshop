<?PHP
include_once $_SERVER['DOCUMENT_ROOT']."/fct_proto.php";
function   db_request($connect, $table, $field = NULL, $cond = NULL)
{
    if ($field === NULL)
        $data = "*";
    else
        $data = implode(",", $field);
    $requ = "SELECT $data FROM `$table`";
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
    $ret = [];
    if (mysqli_stmt_execute($prequ) == TRUE)
    {
        $res = mysqli_stmt_get_result($prequ);
        while (($row = mysqli_fetch_assoc($res))) {
            $ret[] = $row;
        }
        mysqli_stmt_close($prequ);
	}
	return ($ret);
}

function    db_request_unique($connect, $table, $field = NULL, $cond = NULL)
{
    $res = db_request($connect, $table, $field, $cond);
    if ($res == NULL || count($res) == 0 || count($res) > 1)
        return (NULL);
    return ($res[0]);
}
?>
