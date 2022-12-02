<?php

if (isset($_COOKIE['UId'])) {
    unset($_COOKIE['UId']);
    setcookie('UId', '', time() - 3600, '/'); // empty value and old timestamp
}
if (isset($_COOKIE['username'])) {
    unset($_COOKIE['username']);
    setcookie('username', '', time() - 3600, '/'); // empty value and old timestamp
}
if (isset($_COOKIE['password'])) {
    unset($_COOKIE['password']);
    setcookie('password', '', time() - 3600, '/'); // empty value and old timestamp
}
header("location: ../index.php");