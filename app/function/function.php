<?php
function regist($firstname, $lastname, $email, $phone, $username, $password)
{
    $conn = koneksi(); 
    $password = sha1($password);
    $cek = mysqli_query($conn, "SELECT * FROM user_detail WHERE username = '$username' AND email = '$email'");
    $result = mysqli_num_rows($cek);
        if ($result > 0) {
            $result = 1;
        }else {
            $insert_userdetails = mysqli_query($conn, "INSERT INTO user_detail(firstname, lastname, email, phone, img, username) VALUES ('$firstname', '$lastname', '$email', '$phone', 'NULL', '$username')");
            if ($insert_userdetails) {
                $insert_users = mysqli_query($conn, "INSERT INTO users(username, password) VALUES ('$username', '$password')");
                if ($insert_users) {
                    $result = 0;
                }
            }
        }
        return $result;
}

function signin($username, $password)
{
    $password = sha1($password);
    $conn = koneksi();
    if ($username != 'admin') {
        $cek = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
        $result = mysqli_num_rows($cek);
        if ($result > 0) {
            $_SESSION['user'] = $username;
            return print_r($err = 'usersukses');
        }else {
            return print_r($err = 'usergagal');
        }
    }
}
function showProfile() {
    $username = $_SESSION['user'];
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT * FROM user_detail WHERE username = '$username'");
    $result = mysqli_fetch_assoc($cek);
    if (!is_null($result)) {
        return $result;
    }
}

function getMaxbooking() 
{
    $conn = koneksi();
    $username = $_SESSION['user'];
    $cek = mysqli_query($conn, "SELECT * FROM booking_order WHERE status = 'Success' AND username='$username'");
    $cekRow = mysqli_num_rows($cek);
    $data = $cekRow;
    return $data;
}

function getRate()
{
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT name, comment, rating_data, username FROM jawaban ORDER BY id DESC LIMIT 10");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
          $data[] = array(
            'nama' => $result['name'],
            'rating' => $result['rating_data'],
            'comment' => $result['comment'],
            'username' => $result['username']
         );
        }
    }else {
        $data = 0;
    }
    return $data;
}

function Getpp($username)
{
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT img FROM user_detail WHERE username='$username'");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_assoc($cek)) {
          $data = $result['img'];
        }
    }else {
        $data = 0;
    }
    return $data;
}

function countHappyclient() 
{
    $conn = koneksi();
    $cek = mysqli_query($conn, "SELECT * FROM jawaban WHERE rating_data = '5' OR rating_data = '4'");
    $cekRow = mysqli_num_rows($cek);
    $data = $cekRow;
    return $data;
}

function editUser($dataPOST, $dataFILES)
{
    $conn = koneksi();
    $showUser = showProfile();
    $username = $_SESSION['user'];
    if ($dataPOST['firstname'] == '') {
        $firstname = $showUser['firstname'];
    }else{
        $firstname = $dataPOST['firstname'];
    }

    if ($dataPOST['lastname'] == '') {
        $lastname = $showUser['lastname'];
    }else{
        $lastname = $dataPOST['lastname'];
    }

    if ($dataPOST['email'] == '') {
        $email = $showUser['email'];
    }else{
        $email = $dataPOST['email'];
    }

    if ($dataPOST['phone'] == '') {
        $phone = $showUser['phone'];
    }else{
        $phone = $dataPOST['phone'];
    }

    if ($dataFILES['err'] == 4) {
        $NamePP = $showUser['img'];
    }
    if ($dataFILES['err'] == 0) {
        $validext = ['jpg', 'png', 'jpeg'];
        if ($dataFILES['size'] > 1200000) {
            $error = array('pesan'=>'Photo kebesaran', 'tipe'=>'danger');
            return $error;
        }else {
            if (in_array($dataFILES['ext'], $validext)) {
                $NamePP	= "PP" . uniqid();
                $NamePP .= '.';
                $NamePP .= $dataFILES['ext'];
                if (file_exists('../../assets/img/users/pp/'.$showUser['img'])) {
                    unlink('../../assets/img/users/pp/'.$showUser['img']);
                    $NamePP = $NamePP;
                    move_uploaded_file($dataFILES['tmp'], '../../assets/img/users/pp/'.$NamePP);
                }else {
                    $NamePP = $NamePP;
                    move_uploaded_file($dataFILES['tmp'], '../../assets/img/users/pp/'.$NamePP);
                }
            }else {
                $error = array('pesan'=>'extensi file tidak valid', 'tipe'=>'danger');
                return $error;
            }         
        }
    }

    $insert_userdetails = mysqli_query($conn, "UPDATE user_detail SET firstname = '$firstname', lastname = '$lastname', email = '$email', img='$NamePP', phone='$phone' WHERE username = '$username'");
    if ($insert_userdetails) {
        $error = array('pesan'=>'Data berhasil di ubah', 'tipe'=>'success');
        return $error;
    }
}

function bookingSteam($name, $tlp, $nik, $servis, $harga, $tgl, $pesan)
{
    $conn = koneksi();
    $order_id = rand();
    $username = $_SESSION['user'];
    $tgl = date("Y-m-d", strtotime($tgl));
    $insert_order = mysqli_query($conn, "INSERT INTO booking_order(order_id, nama, nik, phone, jenis_layanan, total_harga, arrived, note, status, username) VALUES ('$order_id', '$name', '$nik', '$tlp', '$servis', '$harga', '$tgl', '$pesan', 'Pending', '$username')");
    if ($insert_order) {
        $error = array('pesan'=>'Berhasil booking layanan', 'tipe'=>'success');
        return $error;
    }else{
        echo "gagal" . mysqli_error($conn);
    }
}

function getOrder()
{
    $conn = koneksi();
    $username = $_SESSION['user'];
    $cek = mysqli_query($conn, "SELECT * FROM booking_order WHERE username = '$username'");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_array($cek)) {
          $data[] = array(
            'servis' => $result['jenis_layanan'],
            'nama' => $result['nama'],
            'nik' => $result['nik'],
            'phone' => $result['phone'],
            'harga' => $result['total_harga'],
            'tgl' => date("d-m-Y", strtotime($result['arrived'])),
            'status' => $result['status'],
            'note' => $result['note']
         );
        }
    }else {
        $data = 0;
        return $data;
    }
      
    if (!is_null($data) && isset($data)) {
        return $data;
    }else {
        $data = 0;
        return $data;
    }
}
function sentrate($fullname, $rating, $comment, $dataQS)
{
    $rating = intval($rating);
    $username = htmlspecialchars($_SESSION['user']);
    $conn = koneksi();
    $QS01 = $dataQS['QS01'];
    $QS02 = $dataQS['QS02'];
    $QS03 = $dataQS['QS03'];
    $QS04 = $dataQS['QS04'];
    $QS05 = $dataQS['QS05'];
    $QS06 = $dataQS['QS06'];
    $QS07 = $dataQS['QS07'];
    $QS08 = $dataQS['QS08'];
    $QS09 = $dataQS['QS09'];
    $QS10 = $dataQS['QS10'];
    $QS11 = $dataQS['QS11'];
    $QS12 = $dataQS['QS12'];
    $QS13 = $dataQS['QS13'];
    $QS14 = $dataQS['QS14'];
    $QS15 = $dataQS['QS15'];
    $QS16 = $dataQS['QS16'];
    $QS17 = $dataQS['QS17'];
    $QS18 = $dataQS['QS18'];
    

    $disQS01 = $dataQS['disQS01']; 
    $disQS02 = $dataQS['disQS02'];
    $disQS03 = $dataQS['disQS03'];
    $disQS04 = $dataQS['disQS04'];
    $disQS05 = $dataQS['disQS05'];
    $disQS06 = $dataQS['disQS06'];
    $disQS07 = $dataQS['disQS07'];
    $disQS08 = $dataQS['disQS08'];
    $disQS09 = $dataQS['disQS09'];
    $disQS10 = $dataQS['disQS10'];
    $disQS11 = $dataQS['disQS11'];
    $disQS12 = $dataQS['disQS12'];
    $disQS13 = $dataQS['disQS13'];
    $disQS14 = $dataQS['disQS14'];
    $disQS15 = $dataQS['disQS15'];
    $disQS16 = $dataQS['disQS16'];
    $disQS17 = $dataQS['disQS17'];
    $disQS18 = $dataQS['disQS18'];
    $insert_rating = mysqli_query($conn, "INSERT INTO jawaban(name, QS01, QS02, QS03, QS04, QS05, QS06, QS07, QS08, QS09, QS10, QS11, QS12, QS13, QS14, QS15, QS16, QS17, QS18, disQS01, disQS02, disQS03, disQS04, disQS05, disQS06, disQS07, disQS08, disQS09, disQS10, disQS11, disQS12, disQS13, disQS14, disQS15, disQS16, disQS17, disQS18, rating_data, comment, username) VALUES ('$fullname','$QS01', '$QS02', '$QS03', '$QS04', '$QS05', '$QS06', '$QS07', '$QS08', '$QS09', '$QS10', '$QS11', '$QS12', '$QS13', '$QS14', '$QS15', '$QS16', '$QS17', '$QS18', '$disQS01', '$disQS02', '$disQS03', '$disQS04', '$disQS05', '$disQS06', '$disQS07', '$disQS08', '$disQS09', '$disQS10', '$disQS11', '$disQS12', '$disQS13', '$disQS14', '$disQS15', '$disQS16', '$disQS17', '$disQS18', '$rating', '$comment', '$username')");
    if ($insert_rating) {
        $err = 0;
        return $err;
    }else{
        $err = mysqli_error($conn);
        return $err;
    }
}
function functionalqs()
{
    $conn = koneksi();
    $username = $_SESSION['user'];
    $cek = mysqli_query($conn, "SELECT * FROM functional_question");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_array($cek)) {
          $data[] = array(
            'kode' => $result['kode'],
            'qs' => $result['pertanyaan'],
         );
        }
    }else {
        $data = 0;
        return $data;
    }
      
    if (!is_null($data) && isset($data)) {
        return $data;
    }else {
        $data = 0;
        return $data;
    }
}
function disfunctionalqs()
{
    $conn = koneksi();
    $username = $_SESSION['user'];
    $cek = mysqli_query($conn, "SELECT * FROM dysfunctional_question");
    $cekRow = mysqli_num_rows($cek);
    if ($cekRow > 0) {
        while ($result = mysqli_fetch_array($cek)) {
          $data[] = array(
            'kode' => $result['kode'],
            'qs' => $result['pertanyaan'],
         );
        }
    }else {
        $data = 0;
        return $data;
    }
      
    if (!is_null($data) && isset($data)) {
        return $data;
    }else {
        $data = 0;
        return $data;
    }
}