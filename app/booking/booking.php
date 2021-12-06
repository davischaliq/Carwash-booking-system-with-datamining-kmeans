<?php
require_once '../init.php';
session_start();
 
if (isset($_GET['booking'])) {
   $name = htmlspecialchars($_POST['fullname']);
   $tlp = htmlspecialchars($_POST['telp']);
   $nik = htmlspecialchars($_POST['nik']);
   $servis = htmlspecialchars($_POST['servis']);
   $harga = htmlspecialchars($_POST['harga']);
   $tgl = htmlspecialchars($_POST['tgl']);
   $pesan = htmlspecialchars($_POST['pesan']);
   $booking = bookingSteam($name, $tlp, $nik, $servis, $harga, $tgl, $pesan);
   flash::setFlash($booking['pesan'], $booking['tipe']);
   header('Location:' . BASEURL . '#contact');
}

if (isset($_GET['getOrder'])) {
   $getOrder = getOrder();
   if ($getOrder == 0) {
      $JSON = 0;
   }else{
      $JSON = json_encode($getOrder);
   }
   return print_r($JSON);
}

if (isset($_GET['getMAXbooking'])) {
   $maxBooking = getMaxBooking();
      for ($i=0; $i <= 100; $i++) {
         if ($i % 10 == 0 && $maxBooking % 10 == 0) {
            $data = "Diskon";
         } else {
            $data = $maxBooking;
         }
   }
   return print_r($data);
}