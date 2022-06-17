<?php require'../head.php';

$co = connexion();

$imageType=$_FILES["pic"]["type"];

$from = 'robotPic';
$path = "img/";

uploadPic($co, $imageType, $from, $path);

header('location:oie.php');