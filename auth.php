<?php

function ft_file_get_contents($path)
{
    $fd = fopen($path, "a");
    flock($fd, LOCK_EX);
    $ret = file_get_contents($path);
    flock($fd, LOCK_UN);
    fclose($fd);
    return ($ret);
}
function auth($login, $passwd)
{
    if (isset($login) && isset($passwd))
    {
        $tab = ft_file_get_contents("../private/passwd");
        $tab = unserialize($tab);
        $hashedpw = hash("whirlpool", $passwd);
        foreach ($tab as $val)
        {
            if ($val['login'] == $login && $val['passwd'] == $hashedpw)
                return (TRUE);  
        }
        return (FALSE);
    }
    return (FALSE);
}
?>