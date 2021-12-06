<?php
require_once '../init.php';
session_start();
if (isset($_GET['PPusers'])) {
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);

    $pptype = $_FILES['pp']['type'];
    $pptmp = $_FILES['pp']['tmp_name'];
    $ppsize = $_FILES['pp']['size'];
    $pperr = $_FILES['pp']['error'];
    $extfile = strtolower(pathinfo($_FILES['pp']['name'],PATHINFO_EXTENSION));

    $dataPOST = array('firstname' => $firstname, 'lastname' => $lastname, 'email' => $email, 'phone'=>$phone);
    $dataFILES = array('type'=>$pptype, 'tmp'=>$pptmp, 'size'=>$ppsize, 'ext'=>$extfile, 'err'=>$pperr);
    $editUser = editUser($dataPOST, $dataFILES);
    
    flash::setFlash($editUser['pesan'], $editUser['tipe']);
    header('Location:' . BASEURL .'Dashboard/users/userDashboard.php');
}