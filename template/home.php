<?php
session_start();
date_default_timezone_set("Europe/Paris");

function ft_file_get_contents($path)
{
    $fd = fopen($path, "a");
    flock($fd, LOCK_EX);
    $ret = file_get_contents($path);
    flock($fd, LOCK_UN);
    fclose($fd);
    return ($ret);
}

function open_file($PATH)
{
    if (file_exists("../private/") === FALSE && mkdir("../private/") === FALSE)
        return (FALSE);
    if (file_exists("../private/chat") === FALSE)
        file_put_contents($PATH, "", LOCK_EX);
    $content = ft_file_get_contents($PATH);
    if ($content === FALSE)
        return (FALSE);
    else if ($content === "")
        return NULL;
    $content = unserialize($content);
    if ($content === FALSE)
        return (FALSE);
    return ($content);
}

if (isset($_SESSION["loggued_on_user"]) && !empty($_SESSION["loggued_on_user"]))
{
    $msg = open_file("../private/chat");
    if ($msg !== FALSE && is_array($msg))
        foreach ($msg as $message)
            echo $message["login"] . " " . date("M D H:i $> ", $message["heure"]) . " " . $message["message"] . "<br />";
}
?>
