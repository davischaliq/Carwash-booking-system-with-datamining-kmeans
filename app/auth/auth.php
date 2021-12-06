<?php
require_once '../init.php';
session_start();
if (isset($_GET['regist'])) {
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $regist = regist($firstname, $lastname, $email, $phone, $username, $password);
    return print_r($regist);
}

if (isset($_GET['login'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $login = signin($username, $password);
}

if (isset($_GET['logout'])) {
    if (isset($_SESSION['user']) && $_SESSION['user'] != '') {
        unset($_SESSION['user']);
        session_destroy();
        header('Location:'.BASEURL);
    }
}