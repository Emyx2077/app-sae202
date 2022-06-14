<?php require '../lib/lib.inc.php';


$pass=$_POST['pass'];
$enc_data=$_SESSION['hash'];

$co=connexion();

$dec_data = openssl_decrypt($enc_data, METHOD, $pass, false, IV);

$dec_data = base64_decode($dec_data);

$_SESSION['uncode'] = $dec_data;

echo $_SESSION['uncode'];
header('location:team_profil.php');

