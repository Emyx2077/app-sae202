<?php require'../head.php';

$co = connexion();

$imageType=$_FILES["pic"]["type"];

$from = 'groupPic';
$path = "img/";

uploadPic($co, $imageType, $from, $path);

header('location:team_profil.php');
