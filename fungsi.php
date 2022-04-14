<?php

include "config.php";

if (!isset($_SESSION['login'])) {
    header("Location: logout.php");
    exit;
}

function user()
{
    global $conn;
    $session = $_SESSION['login'];
    return mysqli_query($conn, "SELECT * FROM `users` WHERE `id` = $session")->fetch_object();
}

function old($key)
{
    if (isset($_POST[$key])) {
        return $_POST[$key];
    }
    return false;
}
