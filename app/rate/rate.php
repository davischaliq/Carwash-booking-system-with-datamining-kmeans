<?php
require_once '../init.php';
session_start();
if (isset($_GET['sentrate'])) {
    $fullname = htmlspecialchars($_POST['fullname']);
    $comment = htmlspecialchars($_POST['comment']);
    $rating = htmlspecialchars($_POST['rating_data']);
    $QS01 = htmlspecialchars($_POST['QS01']);
    $QS02 = htmlspecialchars($_POST['QS02']);
    $QS03 = htmlspecialchars($_POST['QS03']);
    $QS04 = htmlspecialchars($_POST['QS04']);
    $QS05 = htmlspecialchars($_POST['QS05']);
    $QS06 = htmlspecialchars($_POST['QS06']);
    $QS07 = htmlspecialchars($_POST['QS07']);
    $QS08 = htmlspecialchars($_POST['QS08']);
    $QS09 = htmlspecialchars($_POST['QS09']);
    $QS10 = htmlspecialchars($_POST['QS10']);
    $QS11 = htmlspecialchars($_POST['QS11']);
    $QS12 = htmlspecialchars($_POST['QS12']);
    $QS13 = htmlspecialchars($_POST['QS13']);
    $QS14 = htmlspecialchars($_POST['QS14']);
    $QS15 = htmlspecialchars($_POST['QS15']);
    $QS16 = htmlspecialchars($_POST['QS16']);
    $QS17 = htmlspecialchars($_POST['QS17']);
    $QS18 = htmlspecialchars($_POST['QS18']);

    $disQS01 = htmlspecialchars($_POST['disQS01']);
    $disQS02 = htmlspecialchars($_POST['disQS02']);
    $disQS03 = htmlspecialchars($_POST['disQS03']);
    $disQS04 = htmlspecialchars($_POST['disQS04']);
    $disQS05 = htmlspecialchars($_POST['disQS05']);
    $disQS06 = htmlspecialchars($_POST['disQS06']);
    $disQS07 = htmlspecialchars($_POST['disQS07']);
    $disQS08 = htmlspecialchars($_POST['disQS08']);
    $disQS09 = htmlspecialchars($_POST['disQS09']);
    $disQS10 = htmlspecialchars($_POST['disQS10']);
    $disQS11 = htmlspecialchars($_POST['disQS11']);
    $disQS12 = htmlspecialchars($_POST['disQS12']);
    $disQS13 = htmlspecialchars($_POST['disQS13']);
    $disQS14 = htmlspecialchars($_POST['disQS14']);
    $disQS15 = htmlspecialchars($_POST['disQS15']);
    $disQS16 = htmlspecialchars($_POST['disQS16']);
    $disQS17 = htmlspecialchars($_POST['disQS17']);
    $disQS18 = htmlspecialchars($_POST['disQS18']);

    $dataQS = array('QS01'=>$QS01, 'QS02'=>$QS02, 'QS03'=>$QS03, 'QS04'=>$QS04, 'QS05'=>$QS05, 'QS06'=>$QS06, 'QS07'=>$QS07, 'QS08'=>$QS08, 'QS09'=>$QS09, 'QS10'=>$QS10, 'QS11'=>$QS11, 'QS12'=>$QS12, 'QS13'=>$QS13, 'QS14'=>$QS14, 'QS15'=>$QS15, 'QS16'=>$QS16, 'QS17'=>$QS17, 'QS18'=>$QS18, 'disQS01'=>$disQS01, 'disQS02'=>$disQS02, 'disQS03'=>$disQS03, 'disQS04'=>$disQS04, 'disQS05'=>$disQS05, 'disQS06'=>$disQS06, 'disQS07'=>$disQS07, 'disQS08'=>$disQS08, 'disQS09'=>$disQS09, 'disQS10'=>$disQS10, 'disQS11'=>$disQS11, 'disQS12'=>$disQS12, 'disQS13'=>$disQS13, 'disQS14'=>$disQS14, 'disQS15'=>$disQS15, 'disQS16'=>$disQS16, 'disQS17'=>$disQS17, 'disQS18'=>$disQS18);

    $sentrate = sentrate($fullname, $rating, $comment, $dataQS);

    return print_r($sentrate);
}